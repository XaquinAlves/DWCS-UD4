<?php

declare(strict_types=1);

namespace Com\Daw2\Model;

use PDO;
class DBManager
{
    private static $instance;
    private $db;

    private function __construct() {}

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}