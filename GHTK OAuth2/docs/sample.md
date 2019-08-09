<!-- TOC -->

- [1. API vận hành nội vùng](#1.-api-vận-hành-nội-vùng)
- [2. API danh sách mã đơn toàn trình](#2.-api-danh-sách-mã-đơn-toàn-trình)

<!-- /TOC -->

# 1. API vận hành nội vùng

> request

```
GET /report/stations/rpOperate?param=xxx
```

Parameter | Mandatory | datatype | Description
 --------- | ------- | ------- | -----------
 station_id | y | int  | ID của kho
 date | y | string  | Ngày : 2019-01-01
 
> response 

```
{
    "success": true,
    "data": {
         "import": 500,
         "deliver": {
             [
                "cod": {
                  "alias": "xxx",
                  "fullname": "xxx",
                  "carts": [
                      {
                          "alias": "xxx"
                      }
                  ],
                  "workshift": 1,
                  "ps": 60,
                  "tc": 54
                }
             ]
         },
         "sum_deliver": {
            "morning": {
                "ps": 60,
                "tc": 54
            }
         },
        "pick": {
          [
             "cod": {
               "alias": "xxx",
               "fullname": "xxx",
               "carts": [
                   {
                       "alias": "xxx"
                   }
               ],
               "workshift": 1,
               "ps": 60,
               "tc": 54
             }
          ]
        },
        "sum_pick": {
             "morning": {
                 "ps": 60,
                 "tc": 54
             }
        },
        "ttc": {
            "pick": 100,
            "deliver": 1000,
            "return": 100,
            "ctp": 123, //Chung truyển lấy
            "ctr": 123 //Chung truyển trả
        },
        "tk": {
            "tkht": 100,
            "tktt": 100,
            "thdxd": 1000,
            "not_found": 123,
            "hokh": 100
        },
        "qh": [
            {
                "cart": "xxx",
                "qh3n": 1234,
                "qh7n" 3213
            }
        ]
    }
}
```