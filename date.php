<?php
$argv = $_SERVER['argv'];

if(count($argv) !== 3){
    die('Parameter missing! -> php date.php jonathan 14.02.2020');
}

$filename = '/home/'.$argv[1].'/.zsh_history';
$file = file_get_contents($filename);

function today($time){
    $argv = $_SERVER['argv'];

    $time = (int) trim($time);


    if($time < strtotime($argv[2]. ' 23:59') && $time > strtotime($argv[2]. ' 00:01')){
        return true;
    }

    return false;
}

$rows = explode(PHP_EOL, $file);

foreach($rows as $key => $row){
    $value = explode(';', $row);
    $time = explode(':', $value[0]);

    if(!empty($time[1]) && today($time[1])){
        var_dump($row);
        var_dump(date('d.m.Y H:i', $time[1]));
    }

}

