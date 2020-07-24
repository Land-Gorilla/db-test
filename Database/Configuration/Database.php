<?php declare(strict_types=1);


namespace Database\Configuration;


final class Database
{
    private string $databaseName;
    private string $host;
    private string $driver;
    private string $password;
    private string $user;

    /**
     * Database constructor.
     * @param string $databaseName
     * @param string $host
     * @param string $password
     * @param string $user
     * @param string $driver
     */
    public function __construct(string $databaseName,
                                string $host,
                                string $password,
                                string $user,
                                string $driver)
    {
        $this->databaseName = $databaseName;
        $this->host = $host;
        $this->password = $password;
        $this->user = $user;
        $this->driver = $driver;
    }

    /**
     * @return string
     */
    public function databaseName(): string
    {
        return $this->databaseName;
    }

    /**
     * @return string
     */
    public function host(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function user(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function driver(): string
    {
        return $this->driver;
    }
}