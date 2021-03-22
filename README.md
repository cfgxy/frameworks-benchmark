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

| 框架                             | QPS   | 响应时间P99(ms) | 响应时间P95(ms) | 最大响应时间(ms) |
| -------------------------------- | ----- | --------------- | --------------- | ---------------- |
| php: Laravel 8.12                | 89    | 12587           | 481             | 29196            |
| php: CodeIgniter 4.1             | 416   | 392             | 284             | 988              |
| php: Lumen 8.0                   | 1508  | 125             | 83              | 557              |
| php: Slim 4.0 (with Nyholm/psr7) | 1756  | 106             | 75              | 297              |
| go: Gin 1.6                      | 20108 | 16              | 7               | 59               |
| java: Springboot 2.4             | 9155  | 33              | 15              | 55               |
| java: quarkus 1.12               | 37163 | 9               | 4               | 38               |

