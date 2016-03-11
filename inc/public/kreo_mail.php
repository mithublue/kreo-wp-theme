<?php
/**
 * Created by PhpStorm.
 * User: mithu_000
 * Date: 3/8/2016
 * Time: 12:42 AM
 */

class kreo_mail {

    function __construct(){
        add_action( 'wp_ajax_kreo_send_mail', array( $this, 'kreo_send_mail' ) );
        add_action( 'wp_ajax_nopriv_kreo_send_mail', array( $this, 'kreo_send_mail' ) );
    }

    function kreo_send_mail() {

// Replace this with your own email address
        $siteOwnersEmail = get_bloginfo('admin_email');


        if($_POST) {

            $name = trim(stripslashes($_POST['contactName']));
            $email = trim(stripslashes($_POST['contactEmail']));
            $subject = trim(stripslashes($_POST['contactSubject']));
            $contact_message = trim(stripslashes($_POST['contactMessage']));

            // Check Name
            if (strlen($name) < 2) {
                $error['name'] = "Please enter your name.";
            }
            // Check Email
            if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
                $error['email'] = "Please enter a valid email address.";
            }
            // Check Message
            if (strlen($contact_message) < 15) {
                $error['message'] = "Please enter your message. It should have at least 15 characters.";
            }
            // Subject
            if ($subject == '') { $subject = "Contact Form Submission"; }


            // Set Message
            $message = '';
            $message .= "Email from: " . $name . "<br />";
            $message .= "Email address: " . $email . "<br />";
            $message .= "Message: <br />";
            $message .= $contact_message;
            $message .= "<br /> ----- <br /> This email was sent from your site's contact form. <br />";

            // Set From: header
            $from =  $name . " <" . $email . ">";

            // Email Headers
            $headers = "From: " . $from . "\r\n";
            $headers .= "Reply-To: ". $email . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


            if (!isset($error)) {

                ini_set("sendmail_from", $siteOwnersEmail); // for windows server
                $mail = wp_mail($siteOwnersEmail, $subject, $message, $headers);

                if ($mail) { echo "OK"; }
                else { echo "Something went wrong. Please try again."; }

            } # end if - no validation error

            else {

                $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
                $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
                $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;

                echo $response;

            } # end if - there was a validation error

        }
        exit;
    }

    public static function init(){
        new kreo_mail();
    }
}

kreo_mail::init();