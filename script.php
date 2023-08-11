<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Compose the email message
    $to = 'adesewaodukoya@yahoo.co.uk'; // Replace with your email address
    $subject = 'New Hire Me Form Submission';
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $messageBody = "Name: $name<br>Email: $email<br>Message: $message";

    // Send the email
    $isSent = mail($to, $subject, $messageBody, $headers);

    if ($isSent) {
        // Email sent successfully
        echo json_encode(['status' => 'success', 'message' => 'Email sent successfully.']);
    } else {
        // Handle email sending errors here
        echo json_encode(['status' => 'error', 'message' => 'Error sending email.']);
    }
}
?>
