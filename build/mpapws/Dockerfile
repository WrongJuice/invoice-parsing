FROM registry.univ-lr.fr:81/iutlr-info/iutlr-info-devbox-apache-symfony4

MAINTAINER Jamal Malki <jmalki@univ-lr.fr>
LABEL Vendor="Jamal Malki"
LABEL Description="Apache2-Symfony4-PHP7.2"
LABEL Version="octobre-2018"
RUN rm /etc/apache2/sites-enabled/000-default.conf
RUN rm /etc/apache2/sites-enabled/app.conf
####### vhosts activation 
ADD vhosts /etc/apache2/sites-available

####### add activation 
RUN a2ensite mpapws

####### service apache2 start
#CMD /usr/sbin/apache2ctl -D FOREGROUND
