<?php

namespace Config;

use App\Filters\FilterAdmin;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\FilterSuperadmin;
use App\Filters\FilterUser;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'filterSuperadmin' => FilterSuperadmin::class,
        'filterAdmin' => FilterAdmin::class,
        'filterUser' => FilterUser::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'filterSuperadmin' => [
                'except' => [
                    'login/*', 'login', '/'
                ]
            ],
            'filterAdmin' => [
                'except' => [
                    'login/*', 'login', '/'
                ]
            ],
            'filterUser' => [
                'except' => [
                    'login/*', 'login', '/'
                ]
            ]
        ],
        'after' => [
            // 'filterSuperadmin' => [
            //     'except' => ['user', 'user/*', '/', 'login/*', 'login',]
            // ],
            // 'filterSuperadmin' => [
            //     'except' => ['user', 'user/*', 'statistik', 'statistik/*', '/', 'login/*', 'login']
            // ],
            // 'filterUser' => [
            //     'except' => ['home', 'home/*', 'pelaporan', 'pelaporan/*', '/', 'login/*', 'login']
            // ],
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
