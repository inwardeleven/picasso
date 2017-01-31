<?php
 
if(isset($_POST['email'])) {
 
     
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "culvercity@picassosmiles.com";
 
    $email_subject = "Appointment Request";
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email_from']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['requested_month']) ||
 
        !isset($_POST['requested_day']) ||
 
        !isset($_POST['requested_year']) ||
 
        !isset($_POST['requested_time']) ||
 
        !isset($_POST['requested_location']) ||
 
        !isset($_POST['patient_type']) ||
 
        !isset($_POST['comments'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['first_name'];
 
    $last_name = $_POST['last_name'];
 
    $email_from = $_POST['email_from'];
 
    $telephone = $_POST['telephone'];
 
    $requested_month = $_POST['requested_month'];
 
    $requested_day = $_POST['requested_day'];
 
    $requested_year = $_POST['requested_year'];
 
    $requested_time = $_POST['requested_time'];
 
    $requested_location = $_POST['requested_location'];
 
    $patient_type = $_POST['patient_type'];
 
    $comments = $_POST['comments'];
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
     
 
    $email_message .= '<html><body>';
 
    $email_message .= '<table border="1" cellpadding="2" cellspacing="1">';
 
    $email_message .= '<tr><td>First Name:</td><td>'.strip_tags($_POST['first_name']).'</td></tr>';
 
    $email_message .= '<tr><td>Last Name:</td><td>'.strip_tags($_POST['last_name']).'</td></tr>';
 
    $email_message .= '<tr><td>Email:</td><td>'.strip_tags($_POST['email_from']).'</td></tr>';
 
    $email_message .= '<tr><td>Telephone:</td><td>'.strip_tags($_POST['telephone']).'</td></tr>';
 
    $email_message .= '<tr><td>Requested Date:</td><td>'.strip_tags($_POST['requested_month']) ;
 
    $email_message .= strip_tags($_POST['requested_day']).',';
 
    $email_message .= strip_tags($_POST['requested_year']).'</td></tr>';
 
    $email_message .= '<tr><td>Requested Time:</td><td>'.strip_tags($_POST['requested_time']).'</td></tr>';
 
    $email_message .= '<tr><td>Requested Location:</td><td>'.strip_tags($_POST['requested_location']).'</td></tr>';
 
    $email_message .= '<tr><td>Patient Type:</td><td>'.strip_tags($_POST['patient_type']).'</td></tr>';
 
    $email_message .= '<tr><td>Comments:</td><td>'.strip_tags($_POST['comments']).'</td></tr>';
 
    $email_message .= '</body></html>';
 
     
 
     
 
// create email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .

mail($email_to,$email_subject,$email_message,$headers);
 
header('Location: /culver-city/about/thankyou.html');
 
 
}
 
?>