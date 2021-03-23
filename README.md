## 测试环境

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



## Helloword 测试

**测试结果:**

| 框架                                 | QPS   | 响应时间P99(ms) | 响应时间P95(ms) | 最大响应时间(ms) |
| ------------------------------------ | ----- | --------------- | --------------- | ---------------- |
| ~~php: Laravel 8.12~~                | 89    | 12587           | 481             | 29196            |
| ~~php: CodeIgniter 4.1~~             | 416   | 392             | 284             | 988              |
| php: Lumen 8.0 (with Eloquent)       | 1064  | 170             | 110             | 586              |
| php: Lumen 8.0 (without Eloquent)    | 1508  | 125             | 83              | 557              |
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



## ORM - Select 测试 

**测试结果:**

| 框架                               | QPS  | 响应时间P99(ms) | 响应时间P95(ms) | 最大响应时间(ms) |
| ---------------------------------- | ---- | --------------- | --------------- | ---------------- |
| ~~php: Lumen 8.0 (with Eloquent)~~ | 500  | 288             | 210             | 725              |
| ~~php: Lumen 8.0 (with Doctrine)~~ | 511  | 374             | 253             | 779              |
| ~~php: Lumen 8.0 (with Propel)~~   | 562  | 394             | 238             | 1164             |
| php: Slim 4.0 (with Eloquent)      | 531  | 376             | 234             | 813              |
| ~~php: Slim 4.0 (with Doctrine)~~  | 505  | 397             | 251             | 880              |
| php: Slim 4.0 (with Propel)        | 560  | 387             | 242             | 806              |
| go: Echo 4.2 (with gorm)           | 4618 | 58              | 33              | 131              |
| go: Gin 1.6 (with gorm)            | 4258 | 62              | 33              | 250              |
| java: Springboot 2.4 (with JPA)    | 2053 | 102             | 62              | 270              |
|                                    |      |                 |                 |                  |
|                                    |      |                 |                 |                  |



**PHP ORM框架评价**

| 框架     | 优势                                                         | 缺点                                                         |
| -------- | ------------------------------------------------------------ | ------------------------------------------------------------ |
| Eloquent | 1. 代码量少  <br />2. 免配置文件  <br />3. 链式调用，配合 illuminate/collections 库，<br />非常方便做集合数组的Transform | 1. 性能略差  <br />2. IDE不友好(无代码提示)                  |
| Doctrine | 1. Model较轻，没有强制的继承关系  <br />2. IDE友好  <br />3. 基于配置的数据库Scheme差异管理 | 1. 配置太重  <br />2. 加载EntityManager时需要载入所有Entity类，Entity类比较多时，启动时间较长(生成metadata缓存) |
| Propel   | 1. 基于代码生成器模型，运行时依赖最少，性能最好  <br />2. 旧项目代码容易复用    <br />3. 完善的命令行工具链  <br />4. IDE友好 | 1. 生成器生成的代码重复度高  <br />2. 额外的xml配置文件      |



**本轮淘汰**

| 框架           | 理由                                                         |
| -------------- | ------------------------------------------------------------ |
| php: Lumen 8.0 | 1. 虽然与Laravel相似度80%，但很多为Laravel开发的第三方库，并不能直接用； 有些坑需要趟<br />2. 因为带着Laravel的包袱，作为Laravel的非完全体，真正用的时候会感觉还不如直接用Laravel |
| Doctrine       | 1. 重配置、大型项目初次启动时间长<br />2. 与Eloquent比性能优势不明显，在Slim下甚至不如Doctrine |

