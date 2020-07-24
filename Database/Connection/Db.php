<?php declare(strict_types=1);


namespace Database\Connection;


use Database\Configuration\Database;
use Database\Configuration\Read;
use Database\Dsn\DsnBase;
use PDO;
use PDOException;

final class Db
{
    private static PDO $pdo;
    private Database $db;

    /**
     * Db constructor.
     * @param Read $read Read the configuration
     */
    public function __construct(Read $read)
    {
        $this->db = $read->getConfiguration();
    }

    /**
     * @return PDO|null
     */
    public function get(): ?PDO
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO(
                    $this->buildDsn(),
                    $this->db->user(),
                    $this->db->password()
                );
            } catch (PDOException $e) {
                $e->getMessage();
                return null;
            }
        }
        return self::$pdo;
    }

    /**
     * Build DSN according to driver
     * @return string
     */
    private function buildDsn(): string
    {
        return (new DsnBase(
            $this->db->host(),
            $this->db->databaseName(),
            $this->db->driver()
        ))->dsn();
    }

    public function __destruct()
    {
        unset($this->db);
        unset($this->pdo);
    }

    /**
     * @return PDO|null
     */
    private function connect(): ?PDO
    {
        try {
            self::$pdo = new PDO(
                $this->buildDsn(),
                $this->db->user(),
                $this->db->password()
            );
        } catch (PDOException $e) {
            $e->getMessage();
            return null;
        }

        return self::$pdo;
    }
}