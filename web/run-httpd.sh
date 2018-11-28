#!/bin/bash

svn export https://github.com/bbashinskiy/jws/trunk/web/jws /var/www/html --force &&\

chmod 777 /var/www/html/cache && \
chown -Rf apache:apache /var/www/html/*

exec /usr/sbin/apachectl -DFOREGROUND
