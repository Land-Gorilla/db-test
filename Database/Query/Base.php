<?php declare(strict_types=1);


namespace Database\Query;


use Database\Configuration\Read;
use Database\Connection\Db;
use PDO;
use PDOStatement;

final class Base
{

    private Read $read;

    /**
     * Base constructor.
     * @param Read $read
     */
    public function __construct(Read $read)
    {
        $this->read = $read;
    }

    public static function query(string $sql, array $values = [])
    {

    }

    private function prepare(string $sql): PDOStatement
    {
        $statement = $this->handler()->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_CLASS, static::class);
        return $statement;
    }

    public function handler(): ?PDO
    {
        return (new Db($this->read))->get();
    }

}