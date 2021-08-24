<?php
namespace Models;

// use Models\DataBase;

interface DataBaseInterface 
{
    // public function insert($tableName, $data);
    public function insert($data);
    public function get();

    
}

class DataBaseSession implements DataBaseInterface
{
    // private $db;

    public function insert($data)
    {

        // $_SESSION['db'] = $data;
        $_SESSION = $data;
        // $_SESSION[$tableName][] = [
        //     // 'id' => $data['id'],
        //     'name' => $data['name'],
        //     'veracity' => $data['veracity'],
        // ];

        // $this->db = $_SESSION;
    }

    public function get()
    {
        
        return $_SESSION;
        // return $_SESSION['db'];
    }
}