<?php

return [
    'alipay' => [
        'app_id'         => '2016091900544217',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuD5MtSv1cl3SlcBPw1mJtc3fx9AP+l9nY/zmheVO3FasVjGt5ZHnclKVxwyImCeIA/xftTBiLah0XUCuKANoVxyc58Ep8nStC00OcTYBp2LRitgrQxzrnd6LA6T15WKMx7uWmfCCIcUuuDq/DOUzXU1Im2VaS+0s6yCElwT1p566d0YPhI6VgYkUkm6T7BbopR6PEtUfWrv4hlb1npd7NINix3rk+HDgTyBfhl6z4N9/GYOHJtT3zocvxenX4C2auLxwkt7qV1/TrDSjGDrr9oeMVdGD1EVvE5KX7La8WNuZf4+Eld3UE18GivlNcJyprRBqpTh1ldtfbIm+zqplawIDAQAB',
        'private_key'    => 'MIIEpQIBAAKCAQEAz7puWYIeVSze7sbuUd1GwsIhS1SeGKputRjqMRiCsUDHJ33RBvCLSsP3g464EhSZW3mzMNM3+iItxfDP20EDB9K107F+r6wk4ZX/pz05pHvhIVnBD9VEoFib7L8w8CUd2j7M7UWd8TXVlmRSx8FaxlcKXCktVhg/olaNDi9vXMZxAEAeF8wgXTLiznhpsblqZ2JZ0Isq2XZmHR0eylr8k85U88GmEmU7MtmAlt/0pPJoZ5Ryb+67J4rTMA2PGRD8mDGiMcZL2C0Rxbe0Eb1RT2LojYAMWC1r75YDOf92v9z2mEb4f9RJItMyO8F7i7HSBs9739jqJPksheGZDZpahwIDAQABAoIBAQCu3ZDBNqDUMMamGL5MGcrUbllasau4tdgmCQg0Nh7mmdJMs0Q/5ERNtvPoQj8/sSl78NHgex33KciAhXxkZLDpZ/56a0NrHK2bXQruPMMGbOYSjhzQeEah+JWh0TygG46qxwz5fA4+HIRlaqSo1WLV7jWhaWRpwlXnEZcCZvoHDNzPwr1oRmbk08QTZbDT8lSnkebjzcH4cfDAJZoS/l7TJiGPowblDcOVBHf/B9/0PWEAWfN6oW642yuUVRTdUouKSX7vuAwT1meUeGekwnQD1RR9jMo2XV69N4F7rkSejbCJRQPDfaCti1xsRqAyxBVM/+NMN8T3YFq2njgkblGBAoGBAPXAX9VC1cNU7hRFzPUDHvYnutcTExDebZozrRFFeQuSUvZpmSnCSP+PrZhXmvSrO+JWxDunIyG+JsyPXoIdFOctK0l9G46Tx/eA7f+fg4l8BPXSAedE/S22z3aoiN4aSX5axTuKIw1n6N9wyqfETOoaGKHZ2apZ1gN6ds2HEfjHAoGBANhkH5wWfR3W/ZHNEGPouhH6I+fHcojAqiNukg95eYWam2EcibTYXVevLiq+qiFhXb1uITYEGT0pU9Hqk8nCM7K5fevIhKcdbs7jSBiy5s3S//1587i1qSePfyxwbPKePjMJA2f5pN7toPvb1gXa5C8f9fG66+q6IkOrsphlVFBBAoGBAKPBGpqqvHI6Z6KOmHIzMDBqbO/fv/afoHz+LjayCmSRjkKwPuU6lxXkEZLP3WtnprG9i2kMiDZ11Li+WAVvh3w79vozKWeqRbdA7FZHXokAYPXEiIwoxmPtyvSQfRMyhQJzTbXM6GqIcP5i1EdSYMYluYAwAACpeBg9RGjTtkAFAoGBANbJUyLgo6Ip0xmUvU8eIwtTCa63pvUcoAR5bRtVDQ1TcCVNaVaLaONvK9kb1c06UwyDMw3ltZOi4OM8/yLF1ADz44xVRW6HZYSPzvFNKpFkfdoA4a0XC+cLpUTb9xg/gCeyK6JaBo+MuT0lcWPwaIxqIfql+iPMS9R1qdlgwvbBAoGAI/S/zZueZl6Bqm65v3FWkWGpC9Y2Q4MMlgxOtRVOH0sgDEETrKzxTEl1xLzuQ4HbasPPAbXDN2TBWQNZtOQV1d853n3I9MRJK5RDP5ud32Dh/nBAO9pRsxK7hK0I8IIw/liEJ1u7W9lBPn8WbUr4RAmott0FnoLDtmexX/kvsPk=',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];