<?php
function d($something) 
{ // debug function
    echo '<pre>';
    echo var_dump($something);
    echo '</pre>'; //die;
}

function dd($something) 
{ // debug function
    echo '<pre>';
    echo var_dump($something);
    echo '</pre>'; die;
}