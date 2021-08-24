<?php
namespace Models;

use Components\Extrasens;
use Models\DataBaseSession;


class Posts
{
    public $dataDemo = [
        'Extrasens' => [
            [ 'name' => 'Ext_1', 'veracity' => 0 ],
            [ 'name' => 'Ext_2', 'veracity' => 0 ],
            [ 'name' => 'Ext_3', 'veracity' => 0 ],
        ],

        'History' => [
            [ 'id' => 1, 'userNumber' => 11, 'Ext_1' => 12, 'Ext_2' => 22, 'Ext_3' => 33, ],
            [ 'id' => 2, 'userNumber' => 22, 'Ext_1' => 22, 'Ext_2' => 33, 'Ext_3' => 44, ],
        ],

        'Veracity' => [
            [ 'Ext_1' => 1 ],
            [ 'Ext_2' => 2 ],
            [ 'Ext_3' => 3 ],
        ],

        'Quest' => [
            [ 'id' => 1, 'userNumber' => 11, 'Ext_1' => 12, 'Ext_2' => 22, 'Ext_3' => 33, ],
            [ 'id' => 2, 'userNumber' => 22, 'Ext_1' => 22, 'Ext_2' => 33, 'Ext_3' => 44, ],
        ],

        'Iteration' => 2,
        'Error'     => '',


    ];

    // public $data2;


    public static function QuestStep_1($data)
    {

        // new Extrasens();
        // $db->insert( 'Extrasens', [ 'veracity' => '0', 'name' => 'Ivan' ] );
        // $db->insert( $data );

        // dd($db);

        

        if( ! isset($data['Quest']) )
        {
            $data['Iteration'] += 1;
    
            $data['Quest']['id'] += $data['Iteration'];
            $data['Quest']['userNumber'] = NULL;


            $amountExtrasens = rand(2, 6);
            for ($i = 1; $i <=  $amountExtrasens; $i++)        
            {
                // $ext = new Extrasens($i);
                // Posts::saveQuest2step($ext);

                // dd($amountExtrasens);

                $data = self::QuestStep_2( $data, $i );
                
            }
            // Extrasens::askExrasens($data);
        }

        return $data;

    }

    public static function QuestStep_2($data, $i)
    {
        $ext = new Extrasens($i);
        $data['Quest'][$ext->name] = $ext->sayUserNumber();

        return $data;
    }


    public static function QuestStep_3($data)
    {
        foreach( $data['Quest'] as $extName => $extNum )
        {
            $data['Quest']['userNumber'] = $_POST['user_number'];
    
            if ($extName == 'id' || $extName == 'userNumber')
            {
                continue;
            }
    
            if ($_POST['user_number'] == $extNum)
            {
                // BestResult
                $data['Veracity'][$extName] += 1;
            } 
            else {
                // BadResult
                $data['Veracity'][$extName] -= 1;
            }
        }

        return $data;
    }


    public static function QuestHistory($data)
    {
        $data['History'][$data['Iteration']] = $data['Quest'];
        unset($data['Quest']);

        return $data;
    }





    public static function saveQuest1step()
    {
        
        // $db = new DataBaseSession();

        // $db->insert('tableName', 'data')
        


        if(!isset($_SESSION['quest']))
        {
            $_SESSION['iteration'] += 1;
    
            $_SESSION['quest']['id'] += $_SESSION['iteration'];
            $_SESSION['quest']['userNumber'] = NULL;

            Extrasens::askExrasens();
        }
    }


    public static function saveQuest2step($ext)
    {
        $_SESSION['quest'][$ext->name] = $ext->sayUserNumber();
    }


    public static function saveQuest3step()
    {
        foreach( $_SESSION['quest'] as $extName => $extNum )
        {
            $_SESSION['quest']['userNumber'] = $_POST['user_number'];
    
            if ($extName == 'id' || $extName == 'userNumber')
            {
                continue;
            }
    
            if ($_POST['user_number'] == $extNum)
            {
                // BestResult
                $_SESSION['veracity'][$extName] += 1;
            } 
            else {
                // BadResult
                $_SESSION['veracity'][$extName] -= 1;
            }
        }
    }

    
    public static function saveQuestHistory()
    {
        $_SESSION['history_quests'][$_SESSION['iteration']] = $_SESSION['quest'];
        unset($_SESSION['quest']);
    }


    public static function sessionDestroy($destroy = false)
    {
        if ( isset($_POST['ses_detroy']) || $destroy === true ){
            session_destroy();
            header('Location: /');
        }
        
    }
}
