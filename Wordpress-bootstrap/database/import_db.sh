location=/var/www/database/wordpress.sql

sudo mysql -uroot --password=root -h localhost -e "CREATE DATABASE wordpress"

mysql -u root --password=root -h localhost wordpress < $location