<?php
/**
 * Created by PhpStorm.
 * User: Ksar
 * Date: 07.12.2018
 * Time: 12:11
 */

class Functions {
    static function sanitizeData($input) {
        return filter_var(FILTER_SANITIZE_STRING);
    }
}