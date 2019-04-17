<?php

require __DIR__ . '/vendor/autoload.php';
// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$app = new \Slim\App($config);

// Define app routes
$app->get('/notes', function ($request, $response, $args) {
    return $response->write("Hello Notes");
});

$app->post('/notes', function ($request, $response, $args) {
    return $response->write($key);
});

$app->get('/notes/{idnote}', function ($request, $response, $args) use ($app) {
    return $response->write("Hello " . $args['idnote']);
});

$app->delete('/notes/{idnote}', function ($request, $response, $args) use ($app) {
    $app->response->redirect('/notes');
});

// Run app
$app->run();