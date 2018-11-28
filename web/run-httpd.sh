#!/bin/bash

svn export https://github.com/bbashinskiy/jws/trunk/web/jws /var/www/html --force &&\

chown -Rf apache:apache /var/www/html/*

exec /usr/sbin/apachectl -DFOREGROUND
