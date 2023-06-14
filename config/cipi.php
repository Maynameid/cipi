<?php

    return [

        //Panel Credential
        'username'          => env('CIPI_USERNAME', 'administrator'),
        'password'          => env('CIPI_PASSWORD', '12345678'),

        //JWT Settings
        'jwt_secret'        => env('JWT_SECRET', config('app.key')),
        'jwt_access'        => env('JWT_ACCESS', 900),
        'jwt_refresh'       => env('JWT_REFRESH', 7200),

        //Branding
        'name'              => env('CIPI_NAME', 'Cipi Control Panel'),
        'website'           => env('CIPI_WEBSITE', 'https://cipi.sh'),
        'docs'              => env('CIPI_DOCS', 'https://cipi.sh/docs.html'),
        'background'        => env('CIPI_BACKGROUNG', 'clouds'),
        'activesetupcount'  => env('CIPI_ACTIVESETUPCOUNT', 'https://service.cipi.sh/setupcount'),

        //Global Settings
        'phpvers'           => ['8.2','8.1','8.0','7.4','7.3'],
        'services'          => ['nginx','php','mysql','redis','supervisor'],
        'default_php'       => '8.0',

    ];
