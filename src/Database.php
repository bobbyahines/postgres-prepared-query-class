<?php

declare(strict_types=1);

namespace App;


class Database
{
  
    /**
     * @var \PDO|string
     */
    public \PDO|string $connection;

    /**
     * @const string
     */
    private const APP_DB_HOST = 'app-host-name';

    /**
     * @const integer
     */
    private const APP_DB_PORT = 5432;

    /**
     * @const string
     */
    private const APP_DB_NAME = 'app-db-name';

    /**
     * @const string
     */
    private const APP_DB_USER = 'user-name';

    /**
     * @const string
     */
    private const APP_DB_PASS = 'password';


    public function __construct()
    {
        $this->connection = $this->connection();
    }

    /**
     * @return \PDO|string
     */
    private function connection(): \PDO|string
    {

        // %s are replaced by the values of the variables that follow, in order.
        $params = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
            self::APP_DB_HOST,
            self::APP_DB_PORT,
            self::APP_DB_NAME,
            self::APP_DB_USER,
            self::APP_DB_PASS
        );

        try {

            $pdo = new \PDO($params);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (\PDOException $e) {

            echo  $e->getMessage() . '<br><br>';

            return $e->getTraceAsString();
        }
    }
}
