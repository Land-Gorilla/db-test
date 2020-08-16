<?php declare(strict_types=1);


namespace Database\Dsn;


use Database\Configuration\Database;

final class DsnBase
{
    private $database;

    /**
     * DsnBase constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function dsn(): string
    {
        switch ($this->database->driver()) {
            case 'mysql':
                return (new MysqlDsn($this->database))->buildDsn();
            default:
                // TODO: make exception
                return '';
        }
    }
}