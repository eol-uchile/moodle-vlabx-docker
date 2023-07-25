FROM php:7.4-fpm-buster as base

ADD php-extensions.sh /root/php-extensions.sh
ADD moodle-extension.php /root/moodle-extension.php

RUN /root/php-extensions.sh

# Fix the original permissions of /tmp, the PHP default upload tmp dir.
RUN chmod 777 /tmp && chmod +t /tmp

RUN mkdir /var/www/moodledata && chown www-data /var/www/moodledata && \
  mkdir /var/www/phpunitdata && chown www-data /var/www/phpunitdata && \
  mkdir /var/www/behatdata && chown www-data /var/www/behatdata && \
  mkdir /var/www/behatfaildumps && chown www-data /var/www/behatfaildumps && \
  chown -R www-data:www-data /var/www/html

COPY /src /var/www/html
ADD /es_39.tar.gz /var/www/html/lang
COPY www.conf /usr/local/etc/php-fpm.d/www.conf
COPY php.ini /usr/local/etc/php/php.ini

RUN /root/moodle-extension.php https://moodle.org/plugins/download.php/28966/gradeexport_checklist_moodle42_2023041400.zip /var/www/html/grade/export/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/28962/mod_checklist_moodle42_2023041400.zip /var/www/html/mod/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/29534/filter_poodll_moodle42_2023062800.zip /var/www/html/filter/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/25445/assignfeedback_poodll_moodle41_2021111100.zip /var/www/html/mod/assign/feedback/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/24233/local_feedbackviewer_moodle42_2022051900.zip /var/www/html/local/ \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/24598/theme_moove_moodle311_2021052100.zip /var/www/html/theme \
  && /root/moodle-extension.php https://moodle.org/plugins/download.php/28315/report_coursesize_moodle41_2023010900.zip /var/www/html/report/
#   && /root/moodle-extension.php https://moodle.org/plugins/download.php/28708/mod_customcert_moodle311_2021051704.zip /var/www/html/mod/

# RUN mv /var/www/html/mod/mdjnelson-moodle-mod_customcert-341be84 /var/www/html/mod/customcert

# Descomprimir el archivo edumy.zip
RUN apt-get update && \
  apt-get install -y unzip

WORKDIR /var/www/html

COPY edumy.zip .


RUN unzip edumy.zip -d edumy \
  && cp -Rn edumy/theme/* /var/www/html/theme/ \
  && cp -Rn edumy/blocks/* /var/www/html/blocks/ \
  && cp -Rn edumy/local/* /var/www/html/local/ \
  && cp -Rn edumy/report/* /var/www/html/report/ \
  && chown -R www-data:www-data /var/www/html/theme \
  && chown -R www-data:www-data /var/www/html/blocks \
  && chown -R www-data:www-data /var/www/html/local \
  && chown -R www-data:www-data /var/www/html/report \
  && chmod -R 755 /var/www/html/theme \
  && chmod -R 755 /var/www/html/blocks \
  && chmod -R 755 /var/www/html/local \
  && chmod -R 755 /var/www/html/report

# Eliminar el archivo edumy.zip después de extraer el contenido
RUN rm edumy.zip

VOLUME /var/www/moodledata

FROM nginx:1.19.3 as nginx

COPY --from=base /var/www/html /var/www/html
COPY static.conf /etc/nginx/conf.d/default.conf
RUN chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html
RUN chown -R www-data:www-data /var/www/html/theme/edumy/images