<?php
require_once __DIR__ . '/vendor/autoload.php';
$json = file_get_contents(__DIR__ . '/../data.json');
$data = json_decode($json, true);
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
$twig = new \Twig\Environment($loader);
echo $twig->render('pages/homepage.html.twig', [
    'first_name' => $data['first_name'],
    'last_name' => $data['last_name'],
    'website_main' => $data['website_main'],
    'email_main' => $data['email_main'],
    'position' => $data['position'],
    'socials' => $data['socials'],
    'website_cv' => $data['website_cv'],
    'email_cv' => $data['email_cv'],
    'websites' => $data['websites'],
    'emails' => $data['emails'],
    'github_repository' => $data['github_repository']
]);