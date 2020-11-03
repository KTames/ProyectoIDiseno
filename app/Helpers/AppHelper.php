<?php

namespace App\Helpers;

class AppHelper {
    static function setActive($routeName) {
        return request()->routeIs($routeName) ? 'active' : '';
    }
}
