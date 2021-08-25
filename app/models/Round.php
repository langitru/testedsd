<?php

namespace Models;


class Round
{
    private $currentRound;
    private $userNumber;
    private $psychics = [];
    
    public function SaveRound($id, $number, $psychics )
    {
        $this->currentRound = $id;
        $this->userNumber = $number;
        foreach ($psychics as $psychic) 
        {
            array_push( $this->psychics, $psychic->GetCurrentGuess() );
        }
    }


    public function GetCurrentRound()
    {
        return $this->currentRound;
    }


    public function GetUserNumber()
    {
        return $this->userNumber;
    }


    public function GetPsychics()
    {
        return $this->psychics;
    }
}