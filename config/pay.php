<?php

return [
    'alipay' => [
        'app_id'         => '2016091900544217',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuD5MtSv1cl3SlcBPw1mJtc3fx9AP+l9nY/zmheVO3FasVjGt5ZHnclKVxwyImCeIA/xftTBiLah0XUCuKANoVxyc58Ep8nStC00OcTYBp2LRitgrQxzrnd6LA6T15WKMx7uWmfCCIcUuuDq/DOUzXU1Im2VaS+0s6yCElwT1p566d0YPhI6VgYkUkm6T7BbopR6PEtUfWrv4hlb1npd7NINix3rk+HDgTyBfhl6z4N9/GYOHJtT3zocvxenX4C2auLxwkt7qV1/TrDSjGDrr9oeMVdGD1EVvE5KX7La8WNuZf4+Eld3UE18GivlNcJyprRBqpTh1ldtfbIm+zqplawIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEA1o3cbdeuvzc9MALYGl9EI1SlzHC7jJGmNwLNtDOGAPdFbRtHd1xm8cOsfX/0y/czO+wlJIyhi/kON7Dam45HWGxHZQHZEIQ68242ghRiAEDoD6J7fMkQfsPlP7XY/jhNSEf7imf8PNQSzZMx7k7cy4Aa36XriJ9WwB7mrOgnDrzFqm2xhgxRttCqCD5NccpyDQv4J6nGrNEyUQpPePL3LxtTYZFgQ2uQzH87apG6f9sreFldwEhdiGpe6u+nbMoOdtxxudADzBIyy/lQLLhs2FN+AbyWNxX9fwcngWJSjg+oMNpqVVjIc6+LJNNaAQ3iBGIqWk5hOml/V2rXoxAWywIDAQABAoIBAGqFwD0g6nexW0WtA9IEHnZUHoUkK1mdLqL9V1fyhMOSAPwsoQzX6Zx7A/bDQqzJrLxBgCdnUwWFv9NSkRbOSwnRqJizlCupGwOlYpauvAFYOF8a0qifwvrNE9LP3E5LccNDSdXrzsX8nOFIBXBF40V98tm7LPeF9LIqJWkPUeT0V4Clr0OMTxFn7TYd3Wt7seG8/ydZ7ZYT98GExexVBed6WqApggTN0pYs9Qb4wGlXsze0QV72W1i9ffXxMeFFvOYc2Fh9uAGO2pHHp5uj1uq8ZrhSgNvy0ALhEqHOzyUpwv30PFIbzt3PD5pqjv2j7ZapFrSCh8OL2PyHLXoGnoECgYEA76pSUxzh30dfPBkYiXqUapXVi+e1NRIePKg8TsUdrXQhPCcTwvmyxuX44U6EtfJVMHPJwawE9fd50WMBUYDf2dbxO3dYlWyiFc42WlRZyRuIzh1HPNIleig7O1yH9YwgKltpE6wYjnfLYjbpxp13w404XILaafu9HrGpth6XqOsCgYEA5S1mYWAG4Us2VoT822KYwiPGvcnGDCLchKrMhys99VZUueG52Situ0A0aHX7DYFsAzyFN0CntzHT+MXDIKM8X+4IFThtQxsjq2BXpj6/tQq8GscSGK/DnsCr/8JWdhcPo0lPFI3GmXxC+HfhKXTXSRqaIPGUcQ1kmp0pXMyV0aECgYEA7QSHSBTfOH6QK5IyFvw4PTSTLTpoleSmLJzAj7IXSIv5tlB7Fa715AhZWxDY5EuVfkZ0eGmTumEVg0MjcaQ/PWN5zLKZ06TMoz39uNWEugPWBukjo328fJO/CFTZTLhYsysVvtPKsVK9vBLMnZTrdWR7IdpzAK9qeCmByk908yMCgYEAuGKmlIGmB21z8nhc2EWjkc8m/1tvtCP4N+UTWU05NEKZOFScKlPIM3ecss75hgwy0wfGRoYGaiX03Zp/O6sZ0DS63BfiELOtJx0EaATkSMyyOvkfXi1LvlZWDBhXZ/t14XIB5g+LUcHgP/hzd99BttdoWkkDnVGhN6Rquvb/MwECgYBcxN7jO2YtHZeAqD7sFN2tvsLxWyU7Um8RvlkcOmu/nR9czXHormoY9OA6J9TLFV26SjU3gAVzZd/pxj+QsE2GrVOucoDtSEXtnIBLOFerNL/a+sg0BUCVTHBhcH5s4zJiHy20sCNDbSYLM/J8lioj6FqByAzdPjbO4geJYL4Bcg==',
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