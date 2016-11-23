#!/bin/bash
set -e

escape_sed() {
    echo "$1" | sed -e 's/[\/&]/\\&/g'
}

if [ "$1" == nginx ]; then
    : "${POST_MAX_SIZE:=64m}"
    : "${BEHIND_PROXY:=$([ -z ${VIRTUAL_HOST} ] && echo "false" || echo "true")}"
    : "${REAL_IP_HEADER:=X-Forwarded-For}"
    : "${REAL_IP_FROM:=172.17.0.0/16}"

    if [ "${BEHIND_PROXY}" == "true" ]; then
        sed -i 's/real_ip_header .*;/real_ip_header '"$(escape_sed "${REAL_IP_HEADER}")"';/' /etc/nginx/global/proxy.conf
        sed -i 's/set_real_ip_from .*;/set_real_ip_from '"$(escape_sed "${REAL_IP_FROM}")"';/' /etc/nginx/global/proxy.conf
        grep -qF 'include global/proxy.conf;' /etc/nginx/conf.d/default.conf || \
            sed -i '/^}/i\    include global/proxy.conf;' /etc/nginx/conf.d/default.conf
    else
        sed -i '/include global\/proxy.conf;/d' /etc/nginx/conf.d/default.conf
    fi
fi

exec "$@"