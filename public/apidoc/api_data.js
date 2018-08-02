define({ "api": [
  {
    "type": "post",
    "url": "/api/global",
    "title": "1.全局返回码",
    "description": "<p>全局返回码</p>",
    "group": "01Return",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "-1",
            "description": "<p>系统错误</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "0",
            "description": "<p>请求成功</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "500",
            "description": "<p>请求错误</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "422",
            "description": "<p>请求参数错误</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "400",
            "description": "<p>登陆错误</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "401",
            "description": "<p>Unauthorized（未授权访问接口，指该接口的访问需要登陆）</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "404",
            "description": "<p>找不到资源</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 500\n  {\n  \"status_code\": 500,\n  \"message\": \"错误信息\"\n  }",
          "type": "json"
        }
      ]
    },
    "filename": "app/Http/Controllers/Api/ReturnCodeController.php",
    "groupTitle": "全局返回码",
    "name": "PostApiGlobal"
  },
  {
    "type": "post",
    "url": "Header返回值",
    "title": "",
    "description": "<p>Header返回值</p>",
    "group": "01Return",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Bearer {token} 登录后返回的token 当token过期后也会返回新的token 需要替换本地token</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "filename": "app/Http/Controllers/Api/ReturnCodeController.php",
    "groupTitle": "全局返回码",
    "name": "PostHeader"
  },
  {
    "type": "post",
    "url": "/api/geetest_api_v1",
    "title": "05.极验配置信息返回",
    "name": "geetest_api_v1",
    "group": "02Auth",
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n     \"success\": 1,\n     \"gt\": \"9af3aa9e204402036ff03ca65b64621a\",\n     \"challenge\": \"30d33f3d3cd369458f7831928945f843\",\n     \"new_captcha\": 1,\n     \"status\": 1\n }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/AuthController.php",
    "groupTitle": "用户接口"
  },
  {
    "type": "post",
    "url": "/api/auth/login",
    "title": "02.登陆",
    "name": "login",
    "group": "02Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>M   电子邮箱</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>M   密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_challenge",
            "description": "<p>M   极验参数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_validate",
            "description": "<p>M   极验参数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_seccode",
            "description": "<p>M   极验参数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_status",
            "description": "<p>M   极验参数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n  \"message\": \"\",\n  \"status_code\":0\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n     \"message\": \"验证不通过\",\n     \"errors\": {\n         \"name\": [\"用户名不能为空\"],\n         \"email\": [\"邮箱不能为空\"],\n         \"password\": [\"密码不能为空\"],\n         \"geetest_challenge\": [\"请点击以滑动校验验证码\"],\n         \"geetest_validate\": [\"请点击以滑动校验验证码\"],\n         \"geetest_seccode\": [\"请点击以滑动校验验证码\"],\n         \"geetest_status\": [\"请点击以滑动校验验证码\"]\n     },\n     \"status_code\": 422\n }\n HTTP/1.1 422（极验验证不通过）\n{\n     \"message\": \"验证不通过\",\n     \"errors\": {\n         \"error\": [\"验证失败请重试\"],\n     },\n     \"status_code\": 422\n }\nHTTP/1.1 400\n{\n     \"message\": \"验证不通过\",\n     \"errors\": {\n         \"error\": [\"邮箱或密码不正确\"],\n     },\n     \"status_code\": 400\n }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/AuthController.php",
    "groupTitle": "用户接口"
  },
  {
    "type": "post",
    "url": "/api/auth/logout",
    "title": "04.退出登陆",
    "name": "logout",
    "group": "02Auth",
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n  \"message\":\"退出成功\",\n  \"status_code\":0\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/AuthController.php",
    "groupTitle": "用户接口"
  },
  {
    "type": "get",
    "url": "/api/auth/refresh",
    "title": "03.刷新token",
    "name": "refresh",
    "group": "02Auth",
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/AuthController.php",
    "groupTitle": "用户接口"
  },
  {
    "type": "post",
    "url": "/api/auth/register",
    "title": "01.注册",
    "name": "register",
    "group": "02Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>M   用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>M   电子邮箱</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>M   密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_challenge",
            "description": "<p>M   极验参数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_validate",
            "description": "<p>M   极验参数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_seccode",
            "description": "<p>M   极验参数</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "geetest_status",
            "description": "<p>M   极验参数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n  \"message\": \"\",\n  \"status_code\":0,\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n     \"message\": \"验证不通过\",\n     \"errors\": {\n         \"name\": [\"用户名不能为空\"],\n         \"email\": [\"邮箱不能为空\"],\n         \"password\": [\"密码不能为空\"],\n         \"geetest_challenge\": [\"请点击以滑动校验验证码\"],\n         \"geetest_validate\": [\"请点击以滑动校验验证码\"],\n         \"geetest_seccode\": [\"请点击以滑动校验验证码\"],\n         \"geetest_status\": [\"请点击以滑动校验验证码\"]\n     },\n     \"status_code\": 422\n }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/AuthController.php",
    "groupTitle": "用户接口"
  },
  {
    "type": "get",
    "url": "/api/auth/user",
    "title": "03.获取用户信息",
    "name": "user",
    "group": "02Auth",
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n  \"data\":{\n     \"id\":1,\n     \"name\":\"a\",\n     \"email\":\"a@a.com\",\n     \"created_at\":\"2018-07-10 02:27:51\",\n     \"updated_at\":\"2018-07-10 02:27:51\"\n  },\n  \"status_code\":0\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/AuthController.php",
    "groupTitle": "用户接口"
  },
  {
    "type": "post",
    "url": "/api/cart",
    "title": "01.加入购物车",
    "name": "add",
    "group": "03Cart",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "sku_id",
            "description": "<p>M   商品skuID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "amount",
            "description": "<p>M   商品数量</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n {\n      \"status_code\": 0,\n      \"message\": \"加入购物车成功\"\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n      \"message\": \"验证不通过\",\n      \"errors\": {\n          \"sku_id\": [\"请选择商品\"],\n          \"amount\": [\"请输入商品数量\"]\n      },\n      \"status_code\": 422\n }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/CartController.php",
    "groupTitle": "购物车"
  },
  {
    "type": "get",
    "url": "/api/cart",
    "title": "02.购物车列表",
    "name": "cart",
    "group": "03Cart",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>C   页码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "pSize",
            "description": "<p>C   页面显示数量(默认15)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n      \"status_code\": 0,\n      \"list\": [\n          {\n              \"id\": 1,\n              \"user_id\": 2,\n              \"product_sku_id\": 1,\n              \"amount\": 1,\n              \"productSku\": {\n                  \"id\": 1,\n                  \"title\": \"vel\",\n                  \"description\": \"Rerum maiores eos eligendi dolorum qui corporis.\",\n                  \"price\": \"6127.00\",\n                  \"stock\": 13740,\n                  \"product_id\": 1,\n                  \"created_at\": \"2018-07-23 09:08:19\",\n                  \"updated_at\": \"2018-07-23 09:08:19\",\n                  \"product\": {\n                      \"id\": 1,\n                      \"title\": \"aliquid\",\n                      \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n                      \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n                      \"on_sale\": true,\n                      \"classify_id\": 2,\n                      \"rating\": 3,\n                      \"sold_count\": 0,\n                      \"review_count\": 0,\n                      \"price\": \"1018.00\",\n                      \"created_at\": \"2018-07-23 09:08:19\",\n                      \"updated_at\": \"2018-07-23 09:08:19\"\n                  }\n              }\n          }\n      ],\n      \"totalPage\": 1,\n      \"total\": 1\n  }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/CartController.php",
    "groupTitle": "购物车"
  },
  {
    "type": "delete",
    "url": "/api/cart/{id}",
    "title": "02.购物车移除商品",
    "name": "remove",
    "group": "03Cart",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>M   商品skuID</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n     \"status_code\": 0,\n     \"message\": \"商品移除成功\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/CartController.php",
    "groupTitle": "购物车"
  },
  {
    "type": "post",
    "url": "/api/cart/settle",
    "title": "03.结算",
    "name": "settle",
    "group": "03Cart",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "cartIdCollection",
            "description": "<p>M   购物车商品ID集合</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "传参示例:",
          "content": "{\n   \"cartIdCollection\":[3,2]\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n      \"status_code\": 0,\n      \"list\": [\n         {\n             \"id\": 2,\n             \"user_id\": 2,\n             \"product_sku_id\": 1,\n             \"amount\": 1,\n             \"productSku\": {\n                 \"id\": 1,\n                 \"title\": \"vel\",\n                 \"description\": \"Rerum maiores eos eligendi dolorum qui corporis.\",\n                 \"price\": \"6127.00\",\n                 \"stock\": 13738,\n                 \"product_id\": 1,\n                 \"created_at\": \"2018-07-23 09:08:19\",\n                 \"updated_at\": \"2018-07-25 07:38:07\",\n                 \"product\": {\n                     \"id\": 1,\n                     \"title\": \"aliquid\",\n                     \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n                     \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n                     \"on_sale\": true,\n                     \"classify_id\": 2,\n                     \"rating\": 3,\n                     \"sold_count\": 0,\n                     \"review_count\": 0,\n                     \"price\": \"1018.00\",\n                     \"created_at\": \"2018-07-23 09:08:19\",\n                     \"updated_at\": \"2018-07-23 09:08:19\"\n                 }\n             }\n         },\n         ...\n      ]\n  }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n     \"status_code\": 1,\n     \"message\": \"购物车商品ID集合不能为空\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/CartController.php",
    "groupTitle": "购物车"
  },
  {
    "type": "put",
    "url": "/api/cart/{id}",
    "title": "02.购物车更新商品",
    "name": "update",
    "group": "03Cart",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>M   购物车商品ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "amount",
            "description": "<p>M   购物车商品数量</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n     \"status_code\": 0,\n     \"message\": \"购物车商品更新成功\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 409\n{\n     \"status_code\": 1,\n     \"message\": \"库存不足\"\n}\n HTTP/1.1 422\n{\n     \"status_code\": 1,\n     \"message\": \"找不到该购物车商品\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/CartController.php",
    "groupTitle": "购物车"
  },
  {
    "type": "get",
    "url": "/api/orders",
    "title": "02.订单列表",
    "name": "orders",
    "group": "04Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>C   页码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "pSize",
            "description": "<p>C   页面显示数量(默认15)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n {\n     \"status_code\": 0,\n     \"list\": [\n          {\n             \"id\": 2,\n             \"no\": \"20180725073807750159\",\n             \"user_id\": 2,\n             \"address\": {\n                 \"address\": \"1111\",\n                 \"zip\": 1,\n                 \"contact_name\": \"1\",\n                 \"contact_phone\": \"1\"\n             },\n             \"total_amount\": \"6127.00\",\n             \"remark\": \"\",\n             \"paid_at\": null,\n             \"payment_method\": null,\n             \"payment_no\": null,\n             \"refund_status\": \"pending\",\n             \"refund_no\": null,\n             \"closed\": false,\n             \"reviewed\": false,\n             \"ship_status\": \"pending\",\n             \"ship_data\": null,\n             \"extra\": null,\n             \"items\": [\n                 {\n                     \"id\": 2,\n                     \"order_id\": 2,\n                     \"product_id\": 1,\n                     \"product_sku_id\": 1,\n                     \"amount\": 1,\n                     \"price\": \"6127.00\",\n                     \"rating\": null,\n                     \"review\": null,\n                     \"reviewed_at\": null,\n                     \"product\": {\n                         \"id\": 1,\n                         \"title\": \"aliquid\",\n                         \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n                         \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n                         \"on_sale\": true,\n                         \"classify_id\": 2,\n                         \"rating\": 3,\n                         \"sold_count\": 0,\n                         \"review_count\": 0,\n                         \"price\": \"1018.00\",\n                         \"created_at\": \"2018-07-23 09:08:19\",\n                         \"updated_at\": \"2018-07-23 09:08:19\"\n                     },\n                     \"product_sku\": {\n                         \"id\": 1,\n                         \"title\": \"vel\",\n                         \"description\": \"Rerum maiores eos eligendi dolorum qui corporis.\",\n                         \"price\": \"6127.00\",\n                         \"stock\": 13738,\n                         \"product_id\": 1,\n                         \"created_at\": \"2018-07-23 09:08:19\",\n                         \"updated_at\": \"2018-07-25 07:38:07\"\n                     }\n                 }\n             ],\n             \"created_at\": {\n                 \"date\": \"2018-07-25 07:38:07.000000\",\n                 \"timezone_type\": 3,\n                 \"timezone\": \"UTC\"\n             },\n             \"updated_at\": {\n                 \"date\": \"2018-07-25 07:38:07.000000\",\n                 \"timezone_type\": 3,\n                 \"timezone\": \"UTC\"\n             }\n         },\n         ...\n     ],\n     \"total\": 2,\n     \"totalPage\": 1\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n      \"message\": \"错误信息\",\n      \"status_code\": 500\n  }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/OrdersController.php",
    "groupTitle": "订单"
  },
  {
    "type": "get",
    "url": "/api/payment/{id}/alipay",
    "title": "04.订单支付",
    "name": "payByAlipay",
    "group": "04Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>M 订单ID</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/PaymentController.php",
    "groupTitle": "订单"
  },
  {
    "type": "get",
    "url": "/api/payment/alipay/return",
    "title": "05.支付成功前端回调",
    "name": "return",
    "group": "04Order",
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n            'status_code':0,\n     'message':'付款成功'\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/PaymentController.php",
    "groupTitle": "订单"
  },
  {
    "type": "get",
    "url": "/api/orders/{id}",
    "title": "03.订单详情",
    "name": "show",
    "group": "04Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>C   订单id</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n {\n     \"status_code\": 0,\n     \"list\": {\n             \"id\": 2,\n             \"no\": \"20180725073807750159\",\n             \"user_id\": 2,\n             \"address\": {\n                 \"address\": \"1111\",\n                 \"zip\": 1,\n                 \"contact_name\": \"1\",\n                 \"contact_phone\": \"1\"\n             },\n             \"total_amount\": \"6127.00\",\n             \"remark\": \"\",\n             \"paid_at\": null,\n             \"payment_method\": null,\n             \"payment_no\": null,\n             \"refund_status\": \"pending\",\n             \"refund_no\": null,\n             \"closed\": false,\n             \"reviewed\": false,\n             \"ship_status\": \"pending\",\n             \"ship_data\": null,\n             \"extra\": null,\n             \"items\": [\n                 {\n                     \"id\": 2,\n                     \"order_id\": 2,\n                     \"product_id\": 1,\n                     \"product_sku_id\": 1,\n                     \"amount\": 1,\n                     \"price\": \"6127.00\",\n                     \"rating\": null,\n                     \"review\": null,\n                     \"reviewed_at\": null,\n                     \"product\": {\n                         \"id\": 1,\n                         \"title\": \"aliquid\",\n                         \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n                         \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n                         \"on_sale\": true,\n                         \"classify_id\": 2,\n                         \"rating\": 3,\n                         \"sold_count\": 0,\n                         \"review_count\": 0,\n                         \"price\": \"1018.00\",\n                         \"created_at\": \"2018-07-23 09:08:19\",\n                         \"updated_at\": \"2018-07-23 09:08:19\"\n                     },\n                     \"product_sku\": {\n                         \"id\": 1,\n                         \"title\": \"vel\",\n                         \"description\": \"Rerum maiores eos eligendi dolorum qui corporis.\",\n                         \"price\": \"6127.00\",\n                         \"stock\": 13738,\n                         \"product_id\": 1,\n                         \"created_at\": \"2018-07-23 09:08:19\",\n                         \"updated_at\": \"2018-07-25 07:38:07\"\n                     }\n                 }\n             ],\n             \"created_at\": {\n                 \"date\": \"2018-07-25 07:38:07.000000\",\n                 \"timezone_type\": 3,\n                 \"timezone\": \"UTC\"\n             },\n             \"updated_at\": {\n                 \"date\": \"2018-07-25 07:38:07.000000\",\n                 \"timezone_type\": 3,\n                 \"timezone\": \"UTC\"\n             }\n     },\n }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 404\n{\n      \"message\": \"找不到此订单\",\n      \"status_code\": 404\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/OrdersController.php",
    "groupTitle": "订单"
  },
  {
    "type": "post",
    "url": "/api/orders",
    "title": "01.创建订单",
    "name": "store",
    "group": "04Order",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "address_id",
            "description": "<p>M   地址ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "items",
            "description": "<p>M   商品数量</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "传参示例:",
          "content": "{\n      \"address_id\":2,\n      \"items\":[\n          {\n              \"sku_id\":1,\n              \"amount\":1\n          }\n         ...\n      ]\n  }",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n {\n      \"status_code\": 0,\n      \"message\": \"创建订单成功\",\n      \"order\": {\n          \"address\": {\n              \"address\": \"1111\",\n              \"zip\": 1,\n              \"contact_name\": \"1\",\n              \"contact_phone\": \"1\"\n          },\n          \"remark\": \"\",\n          \"total_amount\": 6127,\n          \"user_id\": 2,\n          \"no\": \"20180725073807750159\",\n          \"updated_at\": \"2018-07-25 07:38:07\",\n          \"created_at\": \"2018-07-25 07:38:07\",\n          \"id\": 2,\n          \"user\": {\n              \"id\": 2,\n              \"name\": \"aa\",\n              \"email\": \"aa@aa.com\",\n              \"created_at\": \"2018-07-24 07:02:50\",\n              \"updated_at\": \"2018-07-24 07:02:50\"\n          }\n      }\n  }",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n      \"message\": \"验证不通过\",\n      \"errors\": {\n          \"address_id\": [\"用户地址ID不能为空\"],\n          \"items\": [\"items 不能为空。\"]\n      },\n      \"status_code\": 422\n  }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/OrdersController.php",
    "groupTitle": "订单"
  },
  {
    "type": "get",
    "url": "/api/productClassify",
    "title": "01.获取商品分类",
    "name": "productClassify",
    "group": "05ProductClassify",
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "  HTTP/1.1 200\n  {\n       \"status_code\": 0,\n       \"list\": [\n            {\n                \"id\": 1,\n                \"name\": \"手机\",\n                \"pid\": 0,\n                \"created_at\": null,\n                \"updated_at\": null,\n                \"_child\": [\n                    {\n                        \"id\": 2,\n                        \"pid\": 1,\n                        \"name\": \"魅族手机\",\n                        \"created_at\": null,\n                        \"updated_at\": null\n                        \"product\": [\n                            {\n                                \"id\": 1,\n                                \"title\": \"aliquid\",\n                                \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n                                \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n                                \"on_sale\": true,\n                                \"classify_id\": 2,\n                                \"rating\": 3,\n                                \"sold_count\": 0,\n                                \"review_count\": 0,\n                                \"price\": \"1018.00\",\n                                \"created_at\": \"2018-07-23 09:08:19\",\n                                \"updated_at\": \"2018-07-23 09:08:19\"\n                            },\n                           ...\n                         ]\n                    },\n                    {\n                        \"id\": 3,\n                        \"pid\": 1,\n                        \"name\": \"魅蓝手机\",\n                        \"created_at\": null,\n                        \"updated_at\": null,\n                        \"product\": [\n                            {\n                                \"id\": 1,\n                                \"title\": \"aliquid\",\n                                \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n                                \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n                                \"on_sale\": true,\n                                \"classify_id\": 2,\n                                \"rating\": 3,\n                                \"sold_count\": 0,\n                                \"review_count\": 0,\n                                \"price\": \"1018.00\",\n                                \"created_at\": \"2018-07-23 09:08:19\",\n                                \"updated_at\": \"2018-07-23 09:08:19\"\n                            },\n                           ...\n                         ]\n                    }\n                  ]\n               },\n               ...\n           ]\n\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/ProductClassifyController.php",
    "groupTitle": "商品分类"
  },
  {
    "type": "delete",
    "url": "/api/products/{id}/favorite",
    "title": "04.取消收藏商品",
    "name": "disfavor",
    "group": "06Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>M   商品ID</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n \"status_code\": 422,\n \"message\": \"ID不能为空\"\n}\nHTTP/1.1 404\n{\n \"status_code\": 404,\n \"message\": \"找不到该商品\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n  \"status_code\":0,\n \"message\":'取消收藏成功'\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/ProductController.php",
    "groupTitle": "商品"
  },
  {
    "type": "post",
    "url": "/api/products/{id}/favorite",
    "title": "03.收藏商品",
    "name": "favorite",
    "group": "06Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>M   商品ID</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n \"status_code\": 422,\n \"message\": \"ID不能为空\"\n}\n\nHTTP/1.1 404\n{\n \"status_code\": 404,\n \"message\": \"找不到该商品\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n  \"status_code\":0,\n \"message\":'收藏成功'\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/ProductController.php",
    "groupTitle": "商品"
  },
  {
    "type": "get",
    "url": "/api/products/favorites",
    "title": "04.收藏列表",
    "name": "favorites",
    "group": "06Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>C   页码</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "pSize",
            "description": "<p>C   页面显示数量(默认15)</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n      \"status_code\": 0,\n      \"list\": [\n          {\n              \"id\": 1,\n              \"title\": \"aliquid\",\n              \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n              \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n              \"on_sale\": true,\n              \"classify_id\": 2,\n              \"rating\": 3,\n              \"sold_count\": 0,\n              \"review_count\": 0,\n              \"price\": \"1018.00\",\n              \"created_at\": {\n                  \"date\": \"2018-07-23 09:08:19.000000\",\n                  \"timezone_type\": 3,\n                  \"timezone\": \"UTC\"\n              },\n              \"updated_at\": {\n                  \"date\": \"2018-07-23 09:08:19.000000\",\n                  \"timezone_type\": 3,\n                  \"timezone\": \"UTC\"\n              }\n          }\n         ...\n      ],\n      \"totalPage\": 1,\n      \"total\": 1\n  }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/ProductController.php",
    "groupTitle": "商品"
  },
  {
    "type": "get",
    "url": "/api/hotProducts",
    "title": "01.热品推荐",
    "name": "hotProducts",
    "group": "06Product",
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "    HTTP/1.1 200\n{\n      \"status_code\": 0,\n      \"list\": [\n          {\n              \"id\": 4,\n              \"title\": \"nulla\",\n              \"description\": \"Alias sapiente reiciendis est quis.\",\n              \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/pa7DrV43Mw.jpg\",\n              \"on_sale\": true,\n              \"classify_id\": 2,\n              \"rating\": 1,\n              \"sold_count\": 0,\n              \"review_count\": 0,\n              \"price\": \"324.00\",\n              \"created_at\": {\n                  \"date\": \"2018-07-23 01:36:48.000000\",\n                  \"timezone_type\": 3,\n                  \"timezone\": \"UTC\"\n              },\n              \"updated_at\": {\n                  \"date\": \"2018-07-23 01:36:48.000000\",\n                  \"timezone_type\": 3,\n                  \"timezone\": \"UTC\"\n              }\n          },\n     ...\n     ],\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/ProductController.php",
    "groupTitle": "商品"
  },
  {
    "type": "get",
    "url": "/api/products/{id}",
    "title": "02.商品详情",
    "name": "products",
    "group": "06Product",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>M   商品ID</p>"
          }
        ]
      }
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n \"status_code\": 422,\n \"message\": \"ID不能为空\"\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n {\n      \"status_code\": 0,\n      \"list\": {\n          \"product\": {\n              \"id\": 1,\n              \"title\": \"aliquid\",\n              \"description\": \"Iusto quia delectus quisquam est aut ducimus autem.\",\n              \"image\": \"https://lccdn.phphub.org/uploads/images/201806/01/5320/XrtIwzrxj7.jpg\",\n              \"on_sale\": true,\n              \"classify_id\": 2,\n              \"rating\": 3,\n              \"sold_count\": 0,\n              \"review_count\": 0,\n              \"price\": \"1018.00\",\n              \"created_at\": {\n                  \"date\": \"2018-07-23 09:08:19.000000\",\n                  \"timezone_type\": 3,\n                  \"timezone\": \"UTC\"\n              },\n              \"updated_at\": {\n                  \"date\": \"2018-07-23 09:08:19.000000\",\n                  \"timezone_type\": 3,\n                  \"timezone\": \"UTC\"\n              }\n          },\n          \"productSkus\": [\n              {\n                  \"id\": 1,\n                  \"title\": \"vel\",\n                  \"description\": \"Rerum maiores eos eligendi dolorum qui corporis.\",\n                  \"price\": \"6127.00\",\n                  \"stock\": 13740,\n                  \"product_id\": 1,\n                  \"created_at\": {\n                      \"date\": \"2018-07-23 09:08:19.000000\",\n                      \"timezone_type\": 3,\n                      \"timezone\": \"UTC\"\n                  },\n                  \"updated_at\": {\n                      \"date\": \"2018-07-23 09:08:19.000000\",\n                      \"timezone_type\": 3,\n                      \"timezone\": \"UTC\"\n                  }\n              },\n          ...\n          ]\n      }\n  }",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/ProductController.php",
    "groupTitle": "商品"
  },
  {
    "type": "get",
    "url": "/api/addresses",
    "title": "01.获取用户地址列表",
    "name": "addresses",
    "group": "07UserAddresses",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "pSize",
            "description": "<p>M   单页显示记录条数（默认10）</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "page",
            "description": "<p>M   页码</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n \"status_code\": 0,\n \"list\": [\n     {\n         \"id\": 1,\n         \"user_id\": 1,\n         \"province\": 11,\n         \"city\": 11,\n         \"district\": 11,\n         \"address\": \"11\",\n         \"zip\": 11,\n         \"contact_name\": \"1\",\n         \"contact_phone\": \"1\",\n         \"created_at\": \"2018-07-16 09-18\",\n         \"updated_at\": \"2018-07-16 09-18\"\n     },\n     {\n         \"id\": 4,\n         \"user_id\": 1,\n         \"province\": 2,\n         \"city\": 2,\n         \"district\": 2,\n         \"address\": \"2\",\n         \"zip\": 2,\n         \"contact_name\": \"2\",\n         \"contact_phone\": \"2\",\n         \"created_at\": \"2018-07-16 09-18\",\n         \"updated_at\": \"2018-07-16 09-18\"\n     }\n ],\n \"total\": 2,\n \"totalPage\": 1\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/UserAddressesController.php",
    "groupTitle": "用户地址接口"
  },
  {
    "type": "delete",
    "url": "/api/addresses/{id}",
    "title": "04.删除用户地址",
    "name": "destroy",
    "group": "07UserAddresses",
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n \"status_code\": 0,\n \"message\": \"操作成功\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n \"status_code\": 422,\n \"message\": \"地址ID不能为空(address)\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/UserAddressesController.php",
    "groupTitle": "用户地址接口"
  },
  {
    "type": "post",
    "url": "/api/addresses",
    "title": "02.用户地址添加",
    "name": "store",
    "group": "07UserAddresses",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "province",
            "description": "<p>M   省份</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "city",
            "description": "<p>M   城市</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "district",
            "description": "<p>M   区域</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>M   详细地址</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "zip",
            "description": "<p>M   邮编</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "contact_name",
            "description": "<p>M   收货人姓名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "contact_phone",
            "description": "<p>M   收货人手机号</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n \"status_code\": 0,\n \"message\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n     \"message\": \"验证不通过\",\n     \"errors\": {\n         \"province\": [\"省份不能为空\"],\n         \"city\": [\"城市不能为空\"],\n     },\n     \"status_code\": 422\n }\nHTTP/1.1 500\n{\n \"status_code\": 1,\n \"message\": \"错误信息\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/UserAddressesController.php",
    "groupTitle": "用户地址接口"
  },
  {
    "type": "put",
    "url": "/api/addresses/{id}",
    "title": "03.用户地址修改",
    "name": "update",
    "group": "07UserAddresses",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "province",
            "description": "<p>M   省份</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "city",
            "description": "<p>M   城市</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "district",
            "description": "<p>M   区域</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>M   详细地址</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "zip",
            "description": "<p>M   邮编</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "contact_name",
            "description": "<p>M   收货人姓名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "contact_phone",
            "description": "<p>M   收货人手机号</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "成功返回",
          "content": "HTTP/1.1 200\n{\n \"status_code\": 0,\n \"message\": \"\"\n}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "错误返回",
          "content": "HTTP/1.1 422\n{\n     \"message\": \"验证不通过\",\n     \"errors\": {\n         \"province\": [\"省份不能为空\"],\n         \"city\": [\"城市不能为空\"],\n     },\n     \"status_code\": 422\n }\nHTTP/1.1 500\n{\n \"status_code\": 1,\n \"message\": \"错误信息\"\n}",
          "type": "json"
        }
      ]
    },
    "version": "0.0.0",
    "filename": "app/Http/Controllers/Api/V1/UserAddressesController.php",
    "groupTitle": "用户地址接口"
  }
] });
