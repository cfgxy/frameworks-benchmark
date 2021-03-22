FROM maven:3.6.3-openjdk-16
WORKDIR /opt/app
COPY . .
RUN --mount=type=cache,target=.m2 mvn package -T 8 -am -Dmaven.repo.local=.m2 -Dmaven.test.skip=true

FROM openjdk:16-jdk-slim-buster

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

COPY docker/msyh.ttc /usr/share/fonts/myfonts/msyh.ttc
RUN  fc-cache -fv

COPY target/lib /opt/app/lib
RUN  chown www-data:www-data -R /opt/app

COPY --from=0 /opt/app/target/demo-*.jar /opt/app/app.jar
WORKDIR /opt/app
RUN  chown www-data:www-data /opt/app/app.jar

USER www-data

CMD exec java $JAVA_OPTS -cp "app.jar:./lib/*" com.example.demo.DemoApplication
