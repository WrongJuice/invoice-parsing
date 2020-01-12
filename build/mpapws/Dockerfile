FROM registry.univ-lr.fr:81/iutlr-info/iutlr-info-devbox-apache-symfony4

MAINTAINER Alfred Gaillard <alfred.gaillard@etudiant.univ-lr.fr>
LABEL Vendor="Alfred Gaillard"
LABEL Description="Apache2-Symfony4-PHP7.2"
LABEL Version="janvier-2020"
RUN rm /etc/apache2/sites-enabled/000-default.conf
RUN rm /etc/apache2/sites-enabled/app.conf
RUN apt-get update
RUN apt install imagemagick -y
RUN apt install php-imagick -y
####### vhosts activation 
ADD vhosts /etc/apache2/sites-available

####### add activation 
RUN a2ensite mpapws

####### service apache2 start
#CMD /usr/sbin/apache2ctl -D FOREGROUND
