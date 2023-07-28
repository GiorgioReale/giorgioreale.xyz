<?php
require_once __DIR__ . '/vendor/autoload.php';
$json = file_get_contents(__DIR__ . '/../data.json');
$data = json_decode($json, true);
$currentDate = date("d-m-Y");
$age = date_diff(date_create($data['date_of_birth']), date_create(date("d-m-Y")));
$age = $age->format("%y");
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
$twig = new \Twig\Environment($loader);
echo $twig->render('pages/curriculum.html.twig', [
    'website_cv' => $data['website_cv'],
    'first_name' => $data['first_name'],
    'last_name' => $data['last_name'],
    'email_main' => $data['email_main'],
    'email_cv' => $data['email_cv'],
    'position' => $data['position'],
    'github_repository' => $data['github_repository'],
    'role' => $data['role'],
    'date_of_birth' => $data['date_of_birth'],
    'age' => $age,
    'website_main' => $data['website_main'],
    'socials' => $data['socials'],
    'description' => $data['description'],
    'work_experiences' => $data['work_experiences'],
    'other_projects' => $data['other_projects'],
    'educations' => $data['educations'],
    'skills' => $data['skills'],
    'courses_certifications' => $data['courses_certifications']
]);
