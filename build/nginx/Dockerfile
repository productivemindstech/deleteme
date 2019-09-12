#
# Using current stable since our specific v1.6.3 of nginx
# is not supported by the official nginx Docker images.
# See: https://hub.docker.com/_/nginx/
#

FROM nginx:stable-alpine
MAINTAINER Proper Media <staff@proper.io>

# copy SSL cert
COPY ./tvtropes.crt /etc/nginx/conf.d/tvtropes.crt
COPY ./tvtropes.key /etc/nginx/conf.d/tvtropes.key

# add server config file
RUN rm /etc/nginx/conf.d/default.conf
COPY default.conf /etc/nginx/conf.d/default.conf
