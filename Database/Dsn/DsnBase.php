<?php declare(strict_types=1);


namespace Database\Dsn;


final class DsnBase
{
    private string $databaseName;
    private string $host;
    private string $driver;

    /**
     * DsnBase constructor.
     * @param string $databaseName
     * @param string $host
     * @param string $driver
     */
    public function __construct(string $databaseName, string $host, string $driver)
    {
        $this->databaseName = $databaseName;
        $this->host = $host;
        $this->driver = $driver;
    }

    public function dsn(): string
    {
        switch ($this->driver) {
            case 'mysql':
                return (new MysqlDsn($this->host, $this->databaseName))->buildDsn();
            default:
                return '';
            // TODO: make exception
        }
    }
}