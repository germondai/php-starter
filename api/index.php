<?php

declare(strict_types=1);

# imports
use Api\ApiController;
use Api\Entity\Article;
use Api\Entity\User;

# require config
require_once "../src/includes/config.php";

# set cors headers
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With");

# preflight error fix
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    die();
}

$orm = true;
if ($orm) {
    $user = (new User())
        ->setName('Jméno')
        ->setSurname('Příjmení')
        ->setEmail('jmeno@prijmeni.cz')
        ->setPassword(password_hash('heslo', PASSWORD_BCRYPT))
        ->setCreatedAt(new DateTime());

    dump($user);

    $articles = [
        ['Název', 'Obsah'],
        ['Název2', 'Obsah2']
    ];

    foreach ($articles as [$title, $content]) {
        $article = (new Article())
            ->setTitle($title)
            ->setContent($content);

        $user->addArticle($article);
    }

    dump($user);
} else {
    # set json header
    header('Content-Type: application/json; charset=utf-8');

    # handle api request
    $api = new ApiController();
    $api->run();
}
