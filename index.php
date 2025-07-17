<?php

$business = [
    'name' => 'Laracasts',
    'cost' => 15,
    'description' => 'Learn PHP, Laravel, and more with Laracasts.',
    'url' => 'https://laracasts.com',
    'image' => 'https://laracasts.com/images/laracasts-logo.png',
    'tags' => ['PHP', 'Laravel', 'Learning', 'Web Development'],
    'categories' => [
        'Web Development',
        'PHP',
        'Laravel',
        'Learning'
    ],
];

function register($user)
{
    // Simulate user registration logic
    echo "User {$user['name']} registered successfully!";
}

require "index.view.php";