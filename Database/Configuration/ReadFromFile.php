<?php declare(strict_types=1);


namespace Database\Configuration;


use function parse_ini_file;

final class ReadFromFile implements Read
{
    private $fileName;

    /**
     * ReadFromFile constructor.
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }


    /**
     * Obtains the configuration from file source
     * @return Database
     */
    public function getConfiguration(): Database
    {
        $parse = parse_ini_file($this->fileName);
        return new Database(
            $parse['DATABASE'],
            $parse['HOST'],
            $parse['PASSWORD'],
            $parse['USER'],
            $parse['DRIVER']
        );
    }
}