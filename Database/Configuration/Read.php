<?php


namespace Database\Configuration;


interface Read
{
    public function getConfiguration(): Database;
}