<?php
// Required Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_POST) {
  $receipent = "contact@crisdenoronha.com";
  $subject = "Email from my portfolio site";
  $visitor_name = "";
  $visitor_email = "";
  $message = "";
  $fail = array();
  

  // Clean and stores first name in the $visitor_name variable
  if(isset($_POST['firstname']) && !empty($_POST['firstname'])) {
    $visitor_name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
  } else {
    array_push($fail, "firstname");
  }

  // Clean and appends last name in the $visitor_name variable
  if(isset($_POST['lastname']) && !empty($_POST['lastname'])) {
    $visitor_name .= " ".filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
  } else {
    array_push($fail, "lastname");
  }

  // Clean and stores email in the $visitor_email variable
  if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = str_replace(array("\r", "\n", "%0a", "%0d"), "", $_POST['email']);
    $visitor_email = filter_var($email, FILTER_VALIDATE_EMAIL);
  } else {
    array_push($fail, "email");
  }

  // Clean message and stores in $message variable
  if(isset($_POST['message']) && !empty($_POST['message'])) {
    $clean = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $message = htmlspecialchars($clean);
  } else {
    array_push($fail, "message");
  }

  
  $headers = "From: contact@crisdenoronha.com"."\r\n"."Reply-to: again@again.com"."\r\n"."X-Mailer: PHP/".phpversion();
  if(count($fail) == 0) {
    mail($receipent, $subject, $message, $headers);
    $results['message'] = sprintf("Thank you for contaction us, 
    %s. We will respond within 24 hours.", $visitor_name);
  } else {
    header("HTTP/1.1 488 You did NOT fill out the form correctly");
    die(json_encode(['message'=>$fail]));
  }

} else {
  $results['message'] = "Please fill in all required fields on the form.";
}

echo json_encode($results);

?>