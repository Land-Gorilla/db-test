<?php declare(strict_types=1);


namespace Database\Dsn;


use Database\Configuration\Database;

final class MysqlDsn implements Dsn
{
    private Database $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function buildDsn(): string
    {
        return "{$this->db->driver()}:host={$this->db->host()};dbname={$this->db->databaseName()};charset=utf8";
    }
}