**测试环境:** 

CPU: Intel(R) Xeon(R) CPU E5-2609 v2 @ 2.50GHz



**容器限制:** 

CPU: 2核  
内存: 4G



**配置优化:**

PHP: 8.0  
Opcache: On  
JIT: On  
Preloading: 预加载常用类

**测试方法:**

ab -k -c 50 -n 50000 $URL  
最大并发: 50  
次数: 50000  
KeepAlive: On



**测试结果:**

HelloWorld:

| 框架                                 | QPS   | 响应时间P99(ms) | 响应时间P95(ms) | 最大响应时间(ms) |
| ------------------------------------ | ----- | --------------- | --------------- | ---------------- |
| ~~php: Laravel 8.12~~                | 89    | 12587           | 481             | 29196            |
| ~~php: CodeIgniter 4.1~~             | 416   | 392             | 284             | 988              |
| php: Lumen 8.0                       | 1508  | 125             | 83              | 557              |
| php: Slim 4.0 (with Nyholm/psr7)     | 1756  | 106             | 75              | 297              |
| ~~java: micronaut 2.4~~              | 5545  | 34              | 21              | 215              |
| java: Springboot 2.4 (with Tomcat)   | 9155  | 33              | 15              | 55               |
| java: Springboot 2.4 (with Undertow) | 15933 | 53              | 8               | 89               |
| go: Gin 1.6                          | 20108 | 16              | 7               | 59               |
| go: Echo 4.2                         | 31931 | 14              | 4               | 58               |
| java: quarkus 1.12                   | 37163 | 9               | 4               | 38               |
| ~~go: Fasthttp 1.22~~                | 46380 | 6               | 2               | 24               |



**第一轮淘汰:**  

| 框架                 | 理由                                      |
| -------------------- | ----------------------------------------- |
| php: Laravel 8.12    | 性能缺陷                                  |
| php: CodeIgniter 4.1 | 优势不明显                                |
| java: micronaut 2.4  | 生态不足，性能赶不上Springboot            |
| go: Fasthttp 1.22    | 底层库，生态不足; Context存在并发复用问题 |



**Links:**

[2019 Go 三款主流框架 —— Gin Beego Iris 选型对比](https://blog.csdn.net/u012925833/article/details/102499591)  

[fasthttp：高性能背后的惨痛代价](https://cloud.tencent.com/developer/news/462918)  

[2020年你将会选择哪个微服务框架](https://www.jianshu.com/p/c28962be5877)

