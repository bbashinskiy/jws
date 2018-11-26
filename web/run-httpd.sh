#!/bin/bash
rm -rf /var/www/html/*
rm -rf /var/www/html/.git
rm -rf /run/httpd/* /tmp/httpd*

cd /var/www/html/ && \
git init && \
git remote add origin bohdanbashynskyi@178.252.61.49:/home/bohdanbashynskyi/Docker/jws/web/jws && \
git pull origin master

chmod 777 /var/www/html/cache && \
chown -Rf apache:apache /var/www/html/*

exec /usr/sbin/apachectl -DFOREGROUND

