<?php
/* Functions for redis operations */

function openRedisConnection($redis, $hostName, $port){
    // Opening a redis connection
    $redis->connect( $hostName, $port );
}

function postNote( $redis, $key, $note ) {
    try {
        $redis->set( $key, $note);
        echo "you have deleted the note: ".$key;
    } catch( Exception $e ){
        echo $e->getMessage();
    }
}

function getNoteList($redis){
    try {
        // getting a list of all the keys from redis
        $keyList = $redis->keys('*');
        foreach ($keyList as $key) {
            echo $key."\n";
        }
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

function getNote($redis, $key){
    try{
        // get note from its key
        $note = $redis->get( $key );
        echo $note;
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

// bonus
function deleteNote($redis, $key){
    try{
        // deleting note from its key
        $redis->del( $key);
        echo "you have deleted the note: ".$key;
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}

function postNoteJSON($redis, $key, $note) {
    try {
        //$redis = new redis();

        $redis->rawCommand("JSON");
    }catch( Exception $e ){
        echo $e->getMessage();
    }
}



?>
