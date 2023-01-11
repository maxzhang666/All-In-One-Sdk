# All-In-One-Sdk

淘客相关第三方Api聚合SDK，只需一个引用，调遍所有平台

> 目前只加入了我需要使用的Api,如果没有你想用的欢迎按照规范贡献代码
>
> [](https://)

# 目录结构

```
.
├── src
│   ├── Apps                                    //功能api目录
│   │   └── HaoDanKu                            //三方平台目录
│   │       └── Tools                           //三方平台功能分类目录
│   │           ├── VpConvertRequest.php        //三方平台功能api
│   ├── Client                                  //客户端
│   │   ├── BaseClient.php                      //客户端基类
│   │   ├── HaoDanKuClient.php                  //三方平台客户端
│   │   └── IClient.php                         //客户端接口规范
│   ├── Constants                               //静态常量、枚举
│   │   ├── RequestMethodType.php
│   │   └── RequestPostType.php
│   ├── Exceptions                              //异常
│   │   ├── Exception.php
│   │   ├── HttpException.php
│   │   └── InvalidArgumentException.php
│   └── Request
│       ├── BaseRequest.php
│       ├── HaoDanKuRequest.php                 //三方平台api请求基类
│       └── IRequest.php
└── tests                                       //测试用例
    ├── BaseTest.php
    ├── HaoDanKu
    │       └── Tools
    │           └── VpConvertTest.php
    └── bootstarp.php

```
