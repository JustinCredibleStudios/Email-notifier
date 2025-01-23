<?php 
// PHP Mailer app that will be ported to client application
// Author: Justin S. Miller
// Date: January 22, 2025

// These Files are required to run the application
require 'config.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Use statements for the mailing portion of the application
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// Set up Database Connection
$datbaseConnection = new mysqli($servername, $username, $password, $dbname);

// Setting the mysql query for the application
$sql =  "SELECT Email FROM email_list";
$emailList = $datbaseConnection->query($sql); 

// Here I am going to craft the message that goes out and send it out to everyone on the database
if ($emailList->num_rows > 0) {

    // Configure the SMTP Settings for the application
    $emailServer = new PHPMailer(true);

   
    $emailServer->isSMTP();
    $emailServer->Host = 'smtp.gmail.com';
    $emailServer->SMTPAuth = true;
    $emailServer->Username = 'justinscottmiller0@gmail.com';
    $emailServer->Password = 'mslmvvdijpzemvdj';
    $emailServer->SMTPSecure = 'tls';
    $emailServer->Port = 587;

    // Setting the Sender Email Address
    $emailServer->setFrom('justinscottmiller0@gmail.com', 'Justin Miller');

    // Here I am going to Loop through the database and send the message
    while ($row = $emailList->fetch_assoc()){
        $receipantEmail = $row['Email'];

        // Setting the recipent email
        $emailServer->addAddress($receipantEmail); 

        // Setting the Subject and body of the Email Message
        $emailServer->Subject = 'This is a test';
        $emailServer->Body = 'Testing my PHP Application';

        // Here is where I am going to actuallly send the email  message
        try {
            $emailServer->send();
            echo "Message was sent to: $receipantEmail\n"; 
        } catch (Exception $e) {
            echo "Email fail";
        }

        $emailServer->clearAddresses();
    }
   

} else {
    echo "No emails Found";
}


?>