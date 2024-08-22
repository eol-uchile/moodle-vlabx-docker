FROM php:8.3-fpm-bookworm AS base

ENV DEBIAN_FRONTEND noninteractive
RUN echo "APT::Install-Recommends \"0\";" > /etc/apt/apt.conf.d/01norecommend
RUN echo "APT::Install-Suggests \"0\";" >> /etc/apt/apt.conf.d/01norecommend
RUN apt-get update && apt-get -y dist-upgrade

ADD php-extensions.sh /root/php-extensions.sh
ADD moodle-extension.php /root/moodle-extension.php

RUN /root/php-extensions.sh

# Fix the original permissions of /tmp, the PHP default upload tmp dir. TODO: change by tmpfs volume
RUN chmod 777 /tmp && chmod +t /tmp

# Create data dirs
RUN mkdir /var/www/moodledata && chown www-data /var/www/moodledata && \
  mkdir /var/www/phpunitdata && chown www-data /var/www/phpunitdata && \
  mkdir /var/www/behatdata && chown www-data /var/www/behatdata && \
  mkdir /var/www/behatfaildumps && chown www-data /var/www/behatfaildumps

# Create Moodle dir
COPY /src /var/www/html
RUN chown -R www-data:www-data /var/www/html/ \
  && chmod -R 755 /var/www/html/

WORKDIR /var/www/html

# Add lang español
ADD /lang/es lang/es
RUN chown -R www-data:www-data lang/es \
  && chmod -R 755 lang/es

# Extensions
RUN /root/moodle-extension.php https://moodle.org/plugins/download.php/31738/gradeexport_checklist_moodle44_2024040500.zip /var/www/html/grade/export/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/32138/mod_checklist_moodle44_2024051800.zip /var/www/html/mod/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/32183/filter_poodll_moodle44_2024052200.zip /var/www/html/filter/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/25445/assignfeedback_poodll_moodle44_2021111100.zip /var/www/html/mod/assign/feedback/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/24233/local_feedbackviewer_moodle42_2022051900.zip /var/www/html/local/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/31839/local_contact_moodle44_2024042600.zip /var/www/html/local/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/28087/theme_moove_moodle41_2022112801.zip /var/www/html/theme \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/28315/report_coursesize_moodle41_2023010900.zip /var/www/html/report/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/21951/report_coursestats_moodle41_2020070900.zip /var/www/html/report/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/32046/report_overviewstats_moodle44_2024051000.zip /var/www/html/report/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/32822/format_tiles_moodle41_2024080914.zip /var/www/html/course/format \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/32228/mod_customcert_moodle44_2024042201.zip /var/www/html/mod/

# PHP configuration
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY php.ini /usr/local/etc/php/php.ini

VOLUME /var/www/moodledata

FROM nginx:stable-alpine AS nginx

COPY --from=base /var/www/html /var/www/html
COPY static.conf /etc/nginx/conf.d/default.conf

FROM base AS edumy

# Install Edumy theme
COPY edumy.zip .
RUN unzip -u edumy.zip -x local/contact/ report/coursestats/ report/overviewstats/ \
  && chown -R www-data:www-data theme \
  && chmod -R 755 theme \
  && chown -R www-data:www-data blocks \
  && chmod -R 755 blocks \
  && chown -R www-data:www-data local \
  && chmod -R 755 local
# delete distribution archive
RUN rm edumy.zip

FROM nginx:stable-alpine AS nginx-vlabx

COPY --from=edumy /var/www/html /var/www/html
COPY static.conf /etc/nginx/conf.d/default.conf
