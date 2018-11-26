#!/bin/bash

mysql_install_db
chown -R mysql:mysql /var/lib/mysql
/usr/bin/mysqld_safe & 
sleep 10
mysqladmin -u root password admingenerydey
mysql -uroot -padmingenerydey -e "CREATE DATABASE jf_creativia"
mysql -uroot -padmingenerydey -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'admingenerydey' WITH GRANT OPTION; FLUSH PRIVILEGES;"
mysql -uroot -padmingenerydey jf_creativia < /tmp/jws.sql
mysqladmin -uroot -padmingenerydey shutdown
