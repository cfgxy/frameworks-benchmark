# syntax = docker/dockerfile:1.2
FROM maven:3.6.3-openjdk-16 as builder
WORKDIR /opt/app/src
RUN --mount=type=cache,target=/root/.m2 \
    --mount=type=bind,target=/opt/app/src,rw \
    mvn package -am -Dmaven.test.skip=true \
    && cp -ap target/quarkus-app /opt/app/

FROM openjdk:16-jdk-slim-buster as runner

RUN  sed -i s/deb.debian.org/mirrors.aliyun.com/ /etc/apt/sources.list \
    && sed -i s/security.debian.org/mirrors.aliyun.com/ /etc/apt/sources.list \
    && cat /etc/apt/sources.list

RUN  apt-get update -y

#Timezone & Locale
RUN  apt-get install -y tzdata locales fontconfig
RUN  sed -i -e 's/# zh_CN.UTF-8 UTF-8/zh_CN.UTF-8 UTF-8/' /etc/locale.gen && \
     locale-gen && \
     update-locale LANG=zh_CN.UTF-8
ENV  TZ=Asia/Shanghai
ENV  LANG=zh_CN.UTF-8
ENV  LANGUAGE=zh_CN:en_US:en
ENV  LC_ALL=zh_CN.UTF-8

RUN  apt-get install -y procps

COPY --chown=www-data docker/run-java.sh /opt/app/
RUN chmod 540 /opt/app/run-java.sh
RUN echo "securerandom.source=file:/dev/./urandom" >> /usr/local/openjdk-16/conf/security/java.security

COPY docker/msyh.ttc /usr/share/fonts/myfonts/msyh.ttc
RUN  fc-cache -fv
RUN  mkdir /opt/app/logs && chmod a+rwX /opt/app/logs

VOLUME [ "/opt/app/logs" ]
WORKDIR /opt/app
USER www-data

ENV JAVA_INIT_MEM_RATIO=40 \
    JAVA_MAX_MEM_RATIO=85 \
    JAVA_OPTIONS="\
        -XX:+UseZGC \
        -Xlog:gc*,gc+phases=debug:file=/opt/app/logs/gc.log:tags,time,uptime,level:filecount=5,filesize=20M \
        -Dquarkus.http.host=0.0.0.0 -Djava.util.logging.manager=org.jboss.logmanager.LogManager"

COPY --from=builder --chown=www-data /opt/app/quarkus-app/lib/ /opt/app/lib/
COPY --from=builder --chown=www-data /opt/app/quarkus-app/*.jar /opt/app/
COPY --from=builder --chown=www-data /opt/app/quarkus-app/app/ /opt/app/app/
COPY --from=builder --chown=www-data /opt/app/quarkus-app/quarkus/ /opt/app/quarkus/


EXPOSE 8080
ENTRYPOINT [ "/opt/app/run-java.sh" ]