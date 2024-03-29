<?php

namespace Config;

use App\Filters\AdminFilter;
use App\Filters\BidanFilter;
use App\Filters\KaderFilter;
use App\Filters\LoginFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

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
        'isLogin' => LoginFilter::class,
        'isAdmin' => AdminFilter::class,
        'isKader' => KaderFilter::class,
        'isBidan' => BidanFilter::class,
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
        ],
        'after' => [
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
    public $filters = [
        'isLogin' => [
            'before' => [
                '/logout',
                '/dashboard',
                '/dashboard/*',
                '/imunisasi',
                '/imunisasi/*',
                '/vitamin',
                '/vitamin/*',
                '/kader',
                '/kader/*',
                '/ibu',
                '/ibu/*',
                '/balita',
                '/balita/*',
                '/imunisasibalita',
                '/imunisasibalita/*',
                '/periksabalita',
                '/periksabalita/*',
                '/periksaibu',
                '/periksaibu/*',
                '/laporan',
                '/laporan/*',
                '/petugas',
                '/petugas/*',
                '/profil',
                '/profil/*',
            ]
        ]
    ];
}
