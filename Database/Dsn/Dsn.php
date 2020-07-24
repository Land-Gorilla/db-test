<?php


namespace Database\Dsn;


interface Dsn
{
    public function buildDsn(): string;
}