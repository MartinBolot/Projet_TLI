sudo service apache2 stop
chown -R www-data:www-data /root/www
cd /root/www/docker/
sudo docker-compose build www
sudo docker-compose up -d
