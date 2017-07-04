<?php

    /*!
     * Validate Message.
     */
    function validate_message(&$guest_input, &$validation_feedback)
    {
        // Sanitize Inputs
        $guest_input['name'] = filter_var($guest_input['name'], FILTER_SANITIZE_STRING);

        if ($guest_input['name'] === false)
        {
            return false;
        }

        $guest_input['email'] = filter_var($guest_input['email'], FILTER_SANITIZE_EMAIL);

        if ($guest_input['email'] === false)
        {
            return false;
        }

        // Phone is optional
        if ($guest_input['phone'])
        {
            $guest_input['phone'] = filter_var($guest_input['phone'], FILTER_SANITIZE_STRING);

            if ($guest_input['phone'] === false)
            {
                return false;
            }
        }

        $guest_input['message'] = filter_var($guest_input['message'], FILTER_SANITIZE_STRING);

        if ($guest_input['message'] === false)
        {
            return false;
        }

        // Validate Inputs
        $name_is_valid = (strlen($guest_input['name']) >= 2) ? true : false;

        if ($name_is_valid === false)
        {
            $validation_feedback = 'Name must be at least 2 characters.';
            return false;
        }

        $email_is_valid = filter_var($guest_input['email'], FILTER_VALIDATE_EMAIL);

        if ($email_is_valid === false)
        {
            $validation_feedback = 'Invalid E-mail address.';
           return false;
        }

        // Phone is optional
        if ($guest_input['phone'])
        {
            $phone_is_valid = (strlen($guest_input['phone']) >= 10) ? true : false;

            if ($phone_is_valid === false)
            {
                $validation_feedback = 'Phone must be at least 10 characters.';
                return false;
            }
        }

        $message_is_valid = (strlen($guest_input['message']) >= 20) ? true : false;

        if ($message_is_valid === false)
        {
            $validation_feedback = 'Message must be at least 20 characters.';
            return false;
        }

        // All tests passed
        return true;
    }


    /*!
     * Send Contact Message.
     */
    function send_contact_message(&$guest_input)
    {
        // TODO - $to = 'Coast to Coast Communications <coast_to_coast_2004@yahoo.com>';
        $to = 'Adrian Bavister <adrian.bavister@gmail.com>';
        $subject = 'Website contact form';
        $message = '';
        $headers = array();

        // Construct the message
        if ($guest_input['phone'])
        {
            $message .= sprintf('%s (%s) (%s) says: %s', $guest_input['name'], $guest_input['email'], $guest_input['phone'], $guest_input['message']);
        }
        else
        {
            $message .= sprintf('%s (%s) says: %s', $guest_input['name'], $guest_input['email'], $guest_input['message']);
        }

        // Each line should be separated with a CRLF (\r\n).
        // Lines should not be larger than 70 characters.
        $message = wordwrap($message, 70, "\r\n");

        // Define message headers
        $headers[] = 'From: Coast to Coast Communications <webmaster@coasttocoastfiberoptics.com>';
        $headers[] = 'Reply-To: info@coasttocoastfiberoptics.com';
        $headers[] = 'X-Mailer: PHP/' . phpversion();

        // Send the email
        $success = mail($to, $subject, $message, implode("\r\n", $headers));

        return $success;
    }
