<?php

require __DIR__ . '/vendor/autoload.php';
// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$app = new \Slim\App($config);

// include redis function file
include 'function.php';

// Define app routes
$app->get('/notes', function ($request, $response, $args) {
    // init redis connection
    $redis = openRedisConnection();

    // create the note list as an array
    $noteList = getNoteList($redis);

    // close connection
    closeRedisConnection($redis);

    return $response->write(print_r($noteList, true));
});

$app->post('/notes', function ($request, $response, $args) {
    // init redis connection
    $redis = openRedisConnection();

    // post a new note to redis in text/plain
    $key = getLastKey($redis);
    $key += 1;
    $note = $request->getBody()->getContents();

    $posted = postNote($redis, $key, $note);

    // close connection
    closeRedisConnection($redis);

    return $response->write($posted);
});

$app->get('/notes/{idnote}', function ($request, $response, $args) use ($app) {
    // init redis connection
    $redis = openRedisConnection();

    // get a note based on its id
    $note = getNote($redis, $args['idnote']);

    // close connection
    closeRedisConnection($redis);

    return $response->write(print_r($note, true));
});

$app->delete('/notes/{idnote}', function ($request, $response, $args) use ($app) {
    // init redis connection
    $redis = openRedisConnection();

    // delete a note from redis db base don its id
    $key = $args['idnote'];
    deleteNote($redis, $key);

    // close connection
    closeRedisConnection($redis);

    return $response->withRedirect('/notes');
});

// Run app
$app->run();