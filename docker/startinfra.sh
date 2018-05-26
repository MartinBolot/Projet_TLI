sudo service apache2 stop
chown -R www-data:www-data /root/www
sudo -u www-data php ../composer.phar install
cd /root/www/docker/
sudo docker-compose build www
sudo docker-compose up -d
