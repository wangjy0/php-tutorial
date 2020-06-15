FROM alpine:3.10

LABEL maintainer="ma.alex@qq.com"

ENV TIME_ZONE Asia/Shanghai

# 修改镜像源
#RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories

# 安装依赖,核心扩展,pecl扩展,git,composer,npm工具
RUN apk update && apk add --no-cache \
        #安装tzdata安装包 空镜像空的没有了时区
        tzdata \  
        #设置时区
        && echo "${TIME_ZONE}" > /etc/timezone \ 
        && ln -sf /usr/share/zoneinfo/${TIME_ZONE} /etc/localtime \
    && apk add --no-cache \
        nginx \
        php7 \
        php7-fpm \
        php7-cgi \
        php7-json \
        php7-curl \
        php7-bcmath \
        php7-session \
        php7-sockets \
        php7-intl \
        php7-openssl \
        php7-pdo \
        php7-pdo_mysql \
        php7-pdo_pgsql \
        php7-gd \
        php7-iconv	\
        php7-mysqli \
        php7-mbstring \
        php7-xml \
        php7-pecl-amqp	\
        php7-pecl-redis \
        php7-phalcon

ADD ./nginx /etc/nginx
ADD ./php7 /etc/php7
ADD ./run.sh /run.sh

RUN mkdir -p /run/nginx
RUN chmod 775 /run.sh

VOLUME ["/var/www/localhost"]
EXPOSE 80
EXPOSE 443

CMD ["sh", "/run.sh"]