#
# Using current stable since our specific v1.6.3 of nginx
# is not supported by the official nginx Docker images.
# See: https://hub.docker.com/_/nginx/
#

FROM percona:5.5
MAINTAINER Proper Media <staff@proper.io>

# add DB init file(s)
ADD ./db/sql/change-url.sql /docker-entrypoint-initdb2.d/change-url.sql
