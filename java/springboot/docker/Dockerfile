# syntax = docker/dockerfile:1.2
FROM maven:3.6.3-openjdk-16 as builder
WORKDIR /opt/app/src
RUN --mount=type=cache,target=/root/.m2 \
    --mount=type=bind,target=/opt/app/src,rw \
    mvn package -T 8 -am -Dmaven.test.skip=true \
    && cp -ap /opt/app/src/target/demo-*.jar /opt/app/src/target/lib /opt/app \
    && mv /opt/app/demo-*.jar /opt/app/app.jar

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

RUN echo "securerandom.source=file:/dev/./urandom" >> /usr/local/openjdk-16/conf/security/java.security

COPY docker/msyh.ttc /usr/share/fonts/myfonts/msyh.ttc
RUN  fc-cache -fv

COPY --from=builder /opt/app /opt/app
RUN  chown www-data:www-data -R /opt/app
RUN  mkdir /opt/app/logs && chmod a+rwX /opt/app/logs

VOLUME [ "/opt/app/logs" ]
WORKDIR /opt/app
USER www-data

CMD exec java $JAVA_OPTS -cp "app.jar:./lib/*" com.example.demo.DemoApplication
