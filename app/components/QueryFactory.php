<?php

namespace Components;

use Models\DataBaseSession;

class DataBaseFactory 
{

    public function Create()
    {
        return new DataBaseSession();
    }



}