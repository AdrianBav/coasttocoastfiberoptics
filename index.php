<?php

    require_once 'includes/functions.php';

    // App Routes
    $routes = array(
        ''           => 'pages/home.html.php',
        'about-us'   => 'pages/about.html.php',
        'contact-us' => 'pages/contact.html.php',
    );


    /*!
     * Handle Submitted Contact Form
     */

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {

        $guest_input = array(
            'name'    => $_POST['name'],
            'email'   => $_POST['email'],
            'phone'   => $_POST['phone'] ?? '',
            'message' => $_POST['message'],
        );

        // Define default feedback
        $validation_feedback = 'Please check all fields and try again.';

        // Validate Message
        if (! validate_message($guest_input, $validation_feedback))
        {
            $result = array(
                'message' => $validation_feedback,
                'status'  => 0
            );

            echo json_encode($result);
            exit;
        }

        // Send message
        if (! send_contact_message($guest_input))
        {
            $result = array(
                'message' => 'Sorry, something went wrong, please try again.',
                'status'  => 0
            );

            echo json_encode($result);
            exit;
        }

        // Message sent sucessfully
        $result = array(
            'message' => 'Thank you for contacting us!',
            'status'  => 1
        );

        echo json_encode($result);
        exit;
    }


    /*!
     * Routing
     */

    // Get the requested route
    $uri = trim($_SERVER['REQUEST_URI'], '/');

    // Handle undefined routes
    if (! array_key_exists($uri, $routes)) {
        $uri = '';
    }


    /*!
     * Load the view
     */

    require $routes[$uri];
