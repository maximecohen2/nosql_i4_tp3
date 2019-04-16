<?php
/* Functions for redis operations starts here   */

$redisObj = new Redis();
$hostName = "redis";
$port = "6379";

function openRedisConnection( $hostName, $port){
    global $redisObj;
    // Opening a redis connection
    $redisObj->connect( $hostName, $port );
    return $redisObj;
}

function postNote( $key ) {

    try{
        global $redisObj;
        $redisObj->set( $key, $_POST["note"]);
        echo $key;
        return $key;
    }catch ( Exception $e ){
        echo $e->getMessage();
    }
}

function getNoteList(){
    try{
        global $redisObj;
        // getting a list of all the keys from redis
        $keyList = $redisObj->getKeys();
        echo $keyList;
        return $keyList;
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

getNoteList();

function getNote(){
    try{
        global $redisObj;
        $key = $_GET["id"];
        // get note from its id
        $note = $redisObj->get( $key );
        echo $note;
        return $note;
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

// bonus
function deleteNote(){
    try{
        global $redisObj;
        $key = $_POST["id"];
        // deleting note from its id
        $redisObj->del( $key);
        echo "you have deleted the note: " + $key;
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}



?>
