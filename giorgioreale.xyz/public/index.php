<?php
require_once __DIR__ . '/controllers/vendor/autoload.php';
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', '/controllers/homepage.php');
});
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
$json = file_get_contents(__DIR__ . '/data.json');
$data = json_decode($json, true);
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo $twig->render('errors/error404.html.twig', [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'website_main' => $data['website_main'],
            'email_main' => $data['email_main'],
            'socials' => $data['socials'],
            'website_cv' => $data['website_cv'],
            'email_cv' => $data['email_cv'],
            'github_repository' => $data['github_repository']
        ]);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo $twig->render('errors/error405.html.twig', [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'website_main' => $data['website_main'],
            'email_main' => $data['email_main'],
            'socials' => $data['socials'],
            'website_cv' => $data['website_cv'],
            'email_cv' => $data['email_cv'],
            'github_repository' => $data['github_repository']
        ]);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        require_once __DIR__ . $handler;
        break;
}
