<?php
namespace Models;

use Models\DataBaseSession;


class DataBase
{
    // private $db;
    // public function __construct( DataBaseInterface $DataBaseSession )
    // {
    //     $this->CreateDB();
    //     // $this->db = new DataBaseSession();
    // }

    public static function CreateDB()
    {
        return new DataBaseSession();
    }


}