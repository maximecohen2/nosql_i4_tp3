<?php
/* Functions for redis operations */

function openRedisConnection(){
    // Opening a redis connection
    $redis = new redis();
    $host = "redis";
    $port = 6379;
    $redis->connect($host, $port);
    return $redis;
}

function closeRedisConnection($redis) {
    //close redis connection
    $redis->close();
}

function postNote($redis, $key, $note) {
    try {
        // associate a new note with a key
        $redis->set($key, $note);
        return $key;
    } catch( Exception $e ){
        echo $e->getMessage();
    }
}

function getLastKey($redis) {
    try {
        // get the last key that was posted
        $keyListArr = $redis->keys('*');//getNoteList($redis);
        asort($keyListArr);
        $lastKey = end($keyListArr);
        return $lastKey;
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function getNoteList($redis){
    try {
        // getting a list of all the keys from redis
        $keyList = $redis->keys('*');
        $noteList = array();
        foreach ($keyList as $key) {
            $note = $redis->get($key);
            $noteList[$key] = $note;
        }
        ksort($noteList);
        return $noteList;
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function getNote($redis, $key){
    try{
        // get note from its key
        $note = $redis->get($key);
        return $note;
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

// bonus
function deleteNote($redis, $key){
    try{
        // deleting note from its key
        $redis->del($key);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

function postNoteJSON($redis, $author, $key, $note) {
    try {
        //$redis = new redis();

        $currDate = date('l jS \of F Y h:i:s A');
        $noteArray = array('author'=>$author, 'created'=> $currDate, 'note'=>$note);

        $objJSON = json_encode($noteArray);
        $redis->rawCommand("JSON");
    }catch(Exception $e){
        echo $e->getMessage();
    }
}


?>
