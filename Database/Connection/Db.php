<?php declare(strict_types=1);


namespace Database\Connection;


use Database\Configuration\Database;
use Database\Configuration\Read;
use Database\Dsn\DsnBase;
use PDO;
use PDOException;

final class Db
{
    private ?PDO $pdo;
    private Database $db;

    /**
     * Db constructor.
     * @param Read $read Read the configuration
     */
    public function __construct(Read $read)
    {
        $this->db = $read->getConfiguration();
        $this->pdo = null;
    }

    /**
     * @return PDO|null
     */
    public function get(): ?PDO
    {
        if ($this->pdo != null) {
            return $this->pdo;
        }
        try {
            $this->pdo = new PDO(
                $this->buildDsn(),
                $this->db->user(),
                $this->db->password()
            );
            return $this->pdo;
        } catch (PDOException $e) {
            // TODO: Catch this exception on log
            $e->getMessage();
            return null;
        }
    }

    /**
     * Build DSN according to driver
     * @return string
     */
    private function buildDsn(): string
    {
        return (new DsnBase($this->db))->dsn();
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
            $this->pdo = new PDO(
                $this->buildDsn(),
                $this->db->user(),
                $this->db->password()
            );
        } catch (PDOException $e) {
            $e->getMessage();
            return null;
        }

        return $this->pdo;
    }
}