<?php

    /*!
     * Validate Message.
     */
    function validate_message(&$guest_input, &$validation_feedback)
    {
        // Sanitize Name
        $guest_input['name'] = filter_var($guest_input['name'], FILTER_SANITIZE_STRING);

        if ($guest_input['name'] === false)
        {
            return false;
        }

        // Sanitize E-mail
        $guest_input['email'] = filter_var($guest_input['email'], FILTER_SANITIZE_EMAIL);

        if ($guest_input['email'] === false)
        {
            return false;
        }

        // Sanitize Message
        $guest_input['message'] = filter_var($guest_input['message'], FILTER_SANITIZE_STRING);

        if ($guest_input['message'] === false)
        {
            return false;
        }

        // Validate Name
        $name_is_valid = (strlen($guest_input['name']) >= 2) ? true : false;

        if ($name_is_valid === false)
        {
            $validation_feedback = 'Name must be at least 2 characters.';
            return false;
        }

        // Validate E-mail
        $email_is_valid = filter_var($guest_input['email'], FILTER_VALIDATE_EMAIL);

        if ($email_is_valid === false)
        {
            $validation_feedback = 'Invalid E-mail address.';
           return false;
        }

        // Validate Message
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
        //$to = 'Coast to Coast Communications <coast_to_coast_2004@yahoo.com>';
        $to = 'Adrian Bavister <adrian.bavister@gmail.com>';
        $subject = 'Website contact form';
        $message = '';
        $headers = array();

        // Construct the message
        $message = sprintf('%s (%s) says: %s', $guest_input['name'], $guest_input['email'], $guest_input['message']);

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





    // Mail Handler.php
/*
    //SMTP server settings
    $host = "smtp.host.com";
    $port = "587";
    $username = "";
    $password = "";


    $messageBody = "";

    if($_POST['name']!='false'){
        $messageBody .= '<p>Visitor: ' . $_POST["name"] . '</p>' . "\n";
        $messageBody .= '<br>' . "\n";
    }
    if($_POST['email']!='false'){
        $messageBody .= '<p>Email Address: ' . $_POST['email'] . '</p>' . "\n";
        $messageBody .= '<br>' . "\n";
    }else{
        $headers = '';
    }
    if($_POST['state']!='false'){
        $messageBody .= '<p>State: ' . $_POST['state'] . '</p>' . "\n";
        $messageBody .= '<br>' . "\n";
    }
    if($_POST['phone']!='false'){
        $messageBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
        $messageBody .= '<br>' . "\n";
    }
    if($_POST['fax']!='false'){
        $messageBody .= '<p>Fax Number: ' . $_POST['fax'] . '</p>' . "\n";
        $messageBody .= '<br>' . "\n";
    }
    if($_POST['message']!='false'){
        $messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
    }

    if($_POST["stripHTML"] == 'true'){
        $messageBody = strip_tags($messageBody);
    }

    if($host=="" or $username=="" or $password==""){
        $owner_email = $_POST["owner_email"];
        $headers = 'From:' . $_POST["email"] . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
        $subject = 'A message from your site visitor ' . $_POST["name"];

        try{
            if(!mail($owner_email, $subject, $messageBody, $headers)){
                throw new Exception('mail failed');
                }else{
                echo 'mail sent';
            }
            }catch(Exception $e){
            echo $e->getMessage() ."\n";
        }
    }else{
        require_once 'Mail.php';

        $to = $_POST["owner_email"];
        $subject = 'A message from your site visitor ' . $_POST["name"];
        $headers = array (
        'From' => 'From:' . $_POST["email"] . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n",
        'To' => $to,
        'Subject' => $subject);

        $smtp = Mail::factory(
                    'smtp',
                    array (
                        'host' => $host,
                        'port' => $port,
                        'auth' => true,
                        'username' => $username,
                        'password' => $password));

        $mail = $smtp->send($to, $headers, $messageBody);

        try{
            if(PEAR::isError($mail)){
                echo $mail->getMessage();
                }else{
                echo 'mail sent';
            }
            }catch(Exception $mail){
            echo $mail->getMessage() ."\n";
        }
    }

*/
