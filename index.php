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
            'message' => $_POST['message'],
        );

        // Define default feedback
        $validation_feedback = 'Check all fields.';

        // Validate Message
        if (! validate_message($guest_input, $validation_feedback))
        {
            $result = array(
                'message'    => $validation_feedback,
                'sendstatus' => 0
            );

            echo json_encode($result);
            exit;
        }

        // Send message
        if (! send_contact_message($guest_input))
        {
            $result = array(
                'message'    => 'Sorry, something is wrong.',
                'sendstatus' => 0
            );

            echo json_encode($result);
            exit;
        }

        // Message sent sucessfully
        $result = array(
            'message'    => 'Thank you for contacting me!',
            'sendstatus' => 1
        );

        echo json_encode($result);
        exit;
    }


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
