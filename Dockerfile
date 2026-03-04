FROM php:8.1-fpm-bookworm AS base

ENV DEBIAN_FRONTEND=noninteractive
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
RUN /root/moodle-extension.php https://moodle.org/plugins/download.php/38292/gradeexport_checklist_moodle51_2025101800.zip /var/www/html/grade/export/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/38287/mod_checklist_moodle51_2025101800.zip /var/www/html/mod/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/39624/filter_poodll_moodle51_2026012700.zip /var/www/html/filter/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/25445/assignfeedback_poodll_moodle51_2021111100.zip /var/www/html/mod/assign/feedback/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/38263/local_feedbackviewer_moodle51_2025101500.zip /var/www/html/local/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/33392/local_contact_moodle50_2024100300.zip /var/www/html/local/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/39908/theme_moove_moodle45_2024100802.zip /var/www/html/theme \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/39076/report_coursesize_moodle45_2025121001.zip /var/www/html/report/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/21951/report_coursestats_moodle43_2020070900.zip /var/www/html/report/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/36382/report_overviewstats_moodle50_2025052900.zip /var/www/html/report/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/39555/format_tiles_moodle45_2025070355.zip /var/www/html/course/format \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/39209/mod_customcert_moodle45_2024042216.zip /var/www/html/mod/

RUN for dir in grade mod filter local theme report course; do chown -R www-data:www-data ${dir}; chmod -R 755 ${dir}; done

# PHP configuration
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY php.ini /usr/local/etc/php/php.ini

VOLUME /var/www/moodledata

# Static server image
FROM nginx:stable-alpine AS nginx

COPY --from=base /var/www/html /var/www/html
COPY static.conf /etc/nginx/conf.d/default.conf

# Moodle with Edumy theme
FROM base AS edumy

# Install Edumy theme
COPY edumy.zip .
RUN unzip -u edumy.zip -x local/contact/ report/coursestats/ report/overviewstats/
RUN for dir in blocks local report theme; do chown -R www-data:www-data ${dir}; chmod -R 755 ${dir}; done
# delete distribution archive
RUN rm edumy.zip

# Static server image for edumy version
FROM nginx:stable-alpine AS nginx-vlabx

COPY --from=base /var/www/html /var/www/html
COPY static.conf /etc/nginx/conf.d/default.conf
