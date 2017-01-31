<?php
/* Set e-mail recipient */
$myemail  = "culvercity@picassosmiles.com";
$subject  = "Appointment Request";

/* Check all form inputs using check_input function */
$first_name = check_input($_POST['first_name'], "Enter your first name");
$last_name = check_input($_POST['last_name'], "Enter your last name");
$email_from    = check_input($_POST['email_from']);
$telephone  = check_input($_POST['telephone']);
$requested_month  = check_input($_POST['requested_month']);
$requested_day  = check_input($_POST['requested_day']);
$requested_year  = check_input($_POST['requested_year']);
$requested_time  = check_input($_POST['requested_time']);
$requested_location  = check_input($_POST['requested_location']);
$patient_type  = check_input($_POST['patient_type']);
$comments  = check_input($_POST['comments']);

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email_from))
{
    show_error("E-mail address not valid");
}


/* Let's prepare the message for the e-mail */
$message = "<html>
<body>
<table border=1 cellpadding=4 cellspacing=0>
	<tr>
		<td>Name</td>
		<td><b>$first_name $last_name</b></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td><b>$email_from</b></td>
	</tr>
	<tr>
		<td>Telephone</td>
		<td><b>$telephone</b></td>
	</tr>
	<tr>
		<td>Requested appt.</td>
		<td><b>$requested_month $requested_day, $requested_year<br />
		$requested_time<br />
		$requested_location</b></td>
	</tr>
	<tr>
		<td>Patient type</td>
		<td><b>$patient_type</b></td>
	</tr>
	<tr>
		<td>Comments</td>
		<td><b>$comments</b></td>
	</tr>
</table>
</body>
</html>";

/* Send the message using mail() function */
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($myemail, $subject, $message, $headers);

/* Redirect visitor to the thank you page */
header('Location: /culver-city/about/thankyou.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>