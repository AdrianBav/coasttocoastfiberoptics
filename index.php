<?php

    // App Routes
    $routes = array(
        ''           => 'pages/home.html.php',
        'about-us'   => 'pages/about.html.php',
        'contact-us' => 'pages/contact.html.php',
    );

    // Get the requested route
    $uri = trim($_SERVER['REQUEST_URI'], '/');


    // Load the view
    require $routes[$uri];
