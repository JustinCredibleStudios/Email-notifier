<?php 
// PHP MAILER APP 
// Author: Justin S. Miller
include 'config.php';

// Making Establishing Database Connection on this page
$datbaseConnection = new mysqli($servername, $username, $password, $dbname);

// Making a basic query to verify that we are talking to the database
$sql = "SELECT * FROM email_list";
$results = $datbaseConnection->query($sql);

if ($results->num_rows > 0) {
    $customers = $results -> fetch_all(MYSQLI_ASSOC);
    print_r($customers);
    
}


?>