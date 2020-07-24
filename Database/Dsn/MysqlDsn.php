<?php declare(strict_types=1);


namespace Database\Dsn;


final class MysqlDsn implements Dsn
{
    private string $host;
    private string $database;

    public function __construct(string $host, string $database)
    {
        $this->host = $host;
        $this->database = $database;
    }

    public function buildDsn(): string
    {
        return "mysql:host={$this->host};dbname={$this->database};charset=utf8";
    }
}