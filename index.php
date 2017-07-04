<?php

    require_once 'includes/functions.php';


    /*!
     * Handle Submitted Contact Form
     */

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
    {
        $guest_input = array(
            'name'    => $_POST['name'],
            'email'   => $_POST['email'],
            'phone'   => $_POST['phone'] ?? '',
            'message' => $_POST['message'],
        );

        // Define default feedback
        $validation_feedback = 'Check all fields.';

        // Validate Message
        if (! validate_message($guest_input, $validation_feedback))
        {
            echo $validation_feedback;
            exit;
        }

        // Send message
        if (! send_contact_message($guest_input))
        {
            echo 'Sorry, something is wrong.';
            exit;
        }

        // Message sent sucessfully,
        // Continue with controller
    }


    /*!
     * Main Controller
     */

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
