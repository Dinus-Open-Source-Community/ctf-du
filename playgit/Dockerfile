FROM nginx:alpine

RUN rm -rf /usr/share/nginx/html/*

COPY default.conf /etc/nginx/conf.d/default.conf

COPY . /usr/share/nginx/html/

EXPOSE 80
