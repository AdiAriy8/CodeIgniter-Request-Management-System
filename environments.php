<?php
if (!defined('ENVIRONMENT')) {
    $domain = strtolower($_SERVER['HTTP_HOST']);

    switch ($domain) {
        case 'inventory.maurafarm.com' :
            define('ENVIRONMENT', 'production');
            break;

        default:
            define('ENVIRONMENT', 'development');
            break;
    }
}
