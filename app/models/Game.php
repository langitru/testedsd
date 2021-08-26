<?php

namespace Models;

use Models\Psychic;
use Models\Round;


class Game
{
    private $psychics = [];
    private $rounds = [];
    private $currentRound = 0;
    private $currentStepGame = 0;

    public $error;


    public function __construct($amountPsychics)
    {
        for ($i = 1; $i <= $amountPsychics; $i++) {
            $psychic = new Psychic($i);
            array_push($this->psychics, $psychic);
        }
    }

    public function GetPsychics()
    {
        return $this->psychics;
    }


    public function GetRounds()
    {
        return $this->rounds;
    }


    public function GetCurrentRound()
    {
        return $this->currentRound;
    }


    public function GetCurrentStep()
    {
        return $this->currentStepGame;
    }


    public function StartRound()
    {

        if ($this->currentStepGame != 0) {
            return;
        }

        foreach ($this->psychics as $psychic) {
            $psychic->DoGuess();
        }

        $this->currentRound++;
        $this->currentStepGame++;
    }


    public function PushUserNumber($number)
    {
        $round = new Round;


        foreach ($this->psychics as $psychic) {
            $psychic->CheckUserNumber($number);
        }

        $round->SaveRound(
            $this->currentRound,
            $number,
            $this->psychics
        );

        array_push($this->rounds, $round);

        foreach ($this->psychics as $psychic) {
            $psychic->ResetCurrentGuess();
        }

        $this->currentRound++;
        $this->currentStepGame = 0;
    }


    public function DisplayError()
    {
        return $this->error;
    }
}
