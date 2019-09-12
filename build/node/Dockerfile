# Node Docker images don't yet support Alpine-based images
# Check: https://hub.docker.com/_/node/
FROM node:11.15
MAINTAINER Proper Media <staff@proper.io>

EXPOSE 8080
WORKDIR /var/www/assets

RUN npm install webpack-glob-entry --save-dev
RUN npm install --no-progress --ignore-optional
CMD npm install --quiet && npm run start:dev
