#
# data container for Lumen & DB
#

FROM alpine:latest
MAINTAINER Proper Media <staff@proper.io>

# update packages installed on image
RUN apk update && apk upgrade

# add app code
RUN mkdir -p /var/www/site/
ADD ./api /var/www/site/

RUN mkdir -p /var/www/bin/
ADD ./bin /var/www/bin/

# add environment file with IP of cluster instance
ADD ./build/appdata/.env /var/www/site/.env

# add DB data directory
RUN mkdir -p /var/lib/mysql
ADD ./build/percona/db/data /var/lib/mysql

# add DB log directory
RUN mkdir -p /var/log/mysql
ADD ./build/percona/db/log /var/log/mysql

# add article video directory
RUN mkdir -p /var/www/trope_videos/
ADD ./trope_videos /var/www/trope_videos/

# make volumes for bedrock and DB available to other containers
VOLUME /var/www/html /var/lib/mysql /var/log/mysql /docker-entrypoint-initdb.d /var/www/trope_videos