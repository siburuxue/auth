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
        'token_url' => 'https://openapi.alipay.com/gateway.do',
        'user_url' => 'https://api.github.com/user?access_token=',
    ]
];