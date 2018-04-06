<?php
return [
    'Github' => [
        'app_id' => "d76c6418b1fe6fb7a67e",
        'app_secret' => "558fed46acf44438592ba711a03d487edfbcd794",
        'auth_url' => 'https://github.com/login/oauth/authorize',
        'auth_callback' => 'http://auth.siburuxue.com/auth_callback.php',
        'token_url' => 'https://github.com/login/oauth/access_token',
        'user_url' => 'https://api.github.com/user?access_token=',
    ],
    'Alipay' => [
        'app_id' => '2018032702458499',
        'auth_url' => 'https://openauth.alipay.com/oauth2/publicAppAuthorize.htm',
        'auth_callback' => 'http://auth.siburuxue.com/auth_callback.php',
        'gateway' => 'https://openapi.alipay.com/gateway.do',
        'private_key' => 'MIIEowIBAAKCAQEAvldXj44O8L/XbmFERiRxCvDO3AqjaWfL7Ldnr9mxLNp7fx/LmtnFXuSCm81dfOaNNF8xNd9NDWEPdrQSMUOi0U3F1X6SKPVUTqJoVP1fnlWbMskqq3z+V6iGjxgXOnOTTwOAoEJFaFZCSde9RUG8pFKZNpDp9AMBQp/zBaYBsn85bho02YmDZu+sh+4jSQEkc3BDitTEsIpKn1ld3yNbxj7nFK8nkYpibZVzL/g/s1dcrwLQoZN8EzQfQ8dLf6QNBPGgIg+flCZOKYckrXegrV78eTal+fm22dJ1InIaI5h3Rz/SY32q4oU4bxtI+aDCkixmKnzbQu7oEUXm5vKbYQIDAQABAoIBAHlmq+pb6RuUwIsebrVuOMuJm+aswl1QXri0oeV/K4o4L9x9Ixe5HjHP/Z3x9lbbleR5cqGxsyt9ZKeJYrEZOpfUywHIoOCO2R7uZy0ODham8z4JILYQGwk969UIwIf/f00+JqQQoMRTgCQo/gdWTkNgi2hKNW31HLCp5A8OOrblYwzp5DIwTIQA++xhHC1P1VcXarUsNccMAVmBV4H4fmy5DhShtmUfQeo6VuPHuXmbzY+tIGoGXUdDPmv2FawQLcQiT4bV+IHPM78oOhWZQ8UW9ysylPVnpE4yWQGMWsZrq3pbfU8JT71nRoM4WGc1ZwkAFEplAcv/TFdcHs8p6YECgYEA90UKBvbInsI3Z8wVCzLnqo31HJaegpCpdsC8xx51n6OgjeSX8f0bF0JI01p9LX9/ehvTqos2PvZ4o4gXRUm2JkA+08/oT0UDUb1r1FfPB5X9WlrWlBLpkpKFZD5wEiLehKb7qsxyWN7rnYEafC/XznE8B44hhhkAn9jvyajlGeUCgYEAxQ/AW/cbo+T3xEjTTyqnJ3GtHcOEb8SjYpueZT9IQ22VnC2w8BAQZVLP+UL+WJm4lQsPGvh8D5w29ygvNLGnxzBjsorbOmjcZh1x7gO307+pxvMmmPuDzxbN1I2+V6bteqYaXSBWVuvkciaAaQlk6okPJ7iR78lawWS5JQ+/c80CgYEAqQ9C88/3CtSvHQCjwqxjSHEWjR1N8ucFdnQAngNtWGB/fYQ1fvYWd6iSMi9ENr9dYRd1eL0FsbbCdMyvXGgxaaWzTw5vPwNoaZKhDuWaXw1l00kYPNVRbS1QlmE6Lqw4h2nD19tAsxJ29ZE3koEDg9pXuLKsqQqfKqsgBzi6qyECgYBPTOBm4dEQqkJ+jaPjVtG/UMKOmLCB3cq2EtOyAL5OzBmJqOVsJbrDW4jv0OLTusCJ0dJ5UwdxrLZ9zYD5noha4wErxy8jmTEgMrc3Re3C230x34VnyMcpHg8kewne8gDc+1zenvW/stvSh+Xi3vHqY89id6barNfFvYe3/1dW/QKBgDCN+uOR1N5rTrmlH3jkvE7zTMGLwu2SJ1cvQ/ahRvseV74U25n0SepA8aCB69eMJenE+Azf2wPSKFJxMqtVzWCA7AI63IWl0dzSFBDQ+nRwkp+DtJnA1g/r5C2MgM+3JgZBeF+iGXFXgdjO/t/lr04RJWKbX2nnD+6mn31BN41T',
    ],
    'Google' => [
        'app_id' => "424319022798-bht49km09b8mgu0jirm5c8vgvgsaein7.apps.googleusercontent.com",
        'app_secret' => "bch3gpDMt8FZLVoOa-JqJBMO",
        'auth_url' => 'https://accounts.google.com/o/oauth2/v2/auth',
        'scope' => "https://www.googleapis.com/auth/drive.metadata.readonly",
        'auth_callback' => 'http://auth.siburuxue.com/auth_callback.php',
        'token_url' => 'https://www.googleapis.com/oauth2/v4/token',
        'user_url' => 'https://api.github.com/user?access_token=',
    ],
    'Baidu' => [
        'app_id' => "8nyMgeEF8kIvS2b5Zi1Yeqg0",
        'app_secret' => "7YXBEE0SCruyK3biQcsUVZhDA8IVAbT5",
        'auth_url' => 'https://openapi.baidu.com/oauth/2.0/authorize',
        'scope' => "email",
        'auth_callback' => 'http://auth.siburuxue.com/auth_callback.php',
        'token_url' => 'https://openapi.baidu.com/oauth/2.0/token',
        'user_url' => 'https://openapi.baidu.com/rest/2.0/passport/users/getInfo?access_token=',
    ]
];