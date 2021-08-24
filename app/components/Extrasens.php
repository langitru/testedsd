<?php
namespace Components;


use Models\Posts;


class Extrasens
{
    public $name;
    public $veracity;


    public function __construct($id)
    {
        $this->name = $this->generateNameExtrasen($id);
    }


    public function generateNameExtrasen($id)
    {
        return 'Extrasens_'.$id;
    }


    public function sayUserNumber() 
    {
        return rand(10, 99);
    }


    public function veracityLevelUp() 
    {
        $this->veracityLevel += 1;
    }


    public static function askExrasens($data) 
    {
        $amountExtrasens = rand(2, 6);
        for ($i = 1; $i <=  $amountExtrasens; $i++)        
        {
            // $ext = new Extrasens($i);
            // Posts::saveQuest2step($ext);

            Posts::QuestStep_2($data, new Extrasens($i) );
            
        }
    }
}
