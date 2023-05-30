<?php
require_once __DIR__ . '/vendor/autoload.php';
$json = file_get_contents(__DIR__ . '/../data.json');
$data = json_decode($json, true);
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
$twig = new \Twig\Environment($loader);
echo $twig->render('pages/homepage.html.twig', [
    'website_cv' => $data['website_cv'],
    'first_name' => $data['first_name'],
    'last_name' => $data['last_name'],
    'email_main' => $data['email_main'],
    'email_cv' => $data['email_cv'],
    'position' => $data['position'],
    'github_repository' => $data['github_repository'],
    'role' => $data['role'],
    'website_main' => $data['website_main']
]);