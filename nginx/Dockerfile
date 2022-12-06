FROM nginx:alpine

RUN ln -snf /usr/share/zoneinfo/"Europe/Paris" /etc/localtime && echo $TZ > /etc/timezone

WORKDIR /var/www/html

CMD ["nginx"]

EXPOSE 80 443
