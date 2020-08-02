<?php declare(strict_types=1);


namespace Database\Configuration;


final class ReadFromArray implements Read
{
    private array $arrayConfig;

    /**
     * ReadFromFile constructor.
     * @param array $arr
     */
    public function __construct(array $arr)
    {
        $this->arrayConfig = $arr;
    }


    /**
     * Obtains the configuration from file source
     * @return Database
     */
    public function getConfiguration(): Database
    {
        return new Database(
            $this->arrayConfig['DATABASE'],
            $this->arrayConfig['HOST'],
            $this->arrayConfig['PASSWORD'],
            $this->arrayConfig['USER'],
            $this->arrayConfig['DRIVER']
        );
    }
}