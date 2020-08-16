<?php declare(strict_types=1);

namespace Database\Configuration;

final class ReadFromLgFile implements Read
{
    private $fileData;

    /**
     * ReadFromFile constructor.
     */
    public function __construct()
    {
        include_once __DIR__ . '/db/connDb.php';
        $this->fileData = $GLOBALS['SDD_CFG']['database']['master'];
    }


    /**
     * Obtains the configuration from file source
     * @return Database
     */
    public function getConfiguration(): Database
    {
        return new Database(
            $this->fileData['dbname'],
            $this->fileData['server'], // host
            $this->fileData['pwd'],
            $this->fileData['user'],
            'mysql'
        );
    }
}