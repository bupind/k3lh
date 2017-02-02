<?php
/**
 * Created by PhpStorm.
 * User: Joko Hermanto
 * Date: 27/08/2016
 * Time: 10:23
 */

$schedule->call(function (){
    echo 'schedule me!! ';
})->everyFiveMinutes();

?>