sudo service apache2 stop
chown -R www-data:www-data www
cd /root/www/docker/
sudo docker-compose build www
sudo docker-compose -d up
