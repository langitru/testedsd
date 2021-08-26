<?php

namespace Models;


class Psychic
{
    private $name;
    private $veracity = 0;
    private $currentGuess = 0;


    public function __construct($id)
    {
        $this->name = $this->GenerateNamePsychic($id);
    }


    public function GetName()
    {
        return $this->name;
    }


    public function GetVeracity()
    {
        return $this->veracity;
    }


    public function GetCurrentGuess()
    {
        return $this->currentGuess;
    }


    public function ResetCurrentGuess()
    {
        $this->currentGuess = 0;
    }


    public function GenerateNamePsychic($id)
    {
        return 'Extrasens_' . $id;
    }


    public function DoGuess()
    {
        $this->currentGuess = rand(10, 99);
    }


    public function CheckUserNumber($number)
    {
        if ($number == $this->currentGuess) {
            $this->veracity++;
        } else {
            $this->veracity--;
        }
    }
}
