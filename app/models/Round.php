<?php

namespace Models;


class Round
{
    private $currentRound;
    private $userNumber;
    private $psychics = [];
    
    // public 

    public function SaveRound($id, $number, $psychics )
    {
        $this->currentRound = $id;
        $this->userNumber = $number;
        foreach ($psychics as $psychic) 
        {
            // $string_ = [ $psychic->GetName() => $psychic->GetCurrentGuess() ];
            
            // array_push( $this->psychics, [ $psychic->GetName() => $psychic->GetCurrentGuess() ] );
            array_push( $this->psychics, $psychic->GetCurrentGuess() );
            
        }
        // dd($this->psychics);
        // $this->psychics = $psychics;

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