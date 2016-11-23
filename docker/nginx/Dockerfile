FROM nginx:latest

COPY nginxconfig/default.conf /etc/nginx/conf.d/default.conf
COPY nginxconfig/proxy.conf /etc/nginx/global/proxy.conf
COPY nginxconfig/php.conf /etc/nginx/global/php.conf
COPY nginxconfig/docker-entrypoint.sh /entrypoint.sh

RUN chmod 755 /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
CMD ["nginx", "-g", "daemon off;"]