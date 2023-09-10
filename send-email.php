<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Set the recipient email address
    $to = "ritterjakub04@gmail.com"; // Replace with your actual email address

    // Set email subject
    $subject = "Contact Form Submission from $name";

    // Compose the email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Set additional headers
    $headers = "From: $email";

    // Send the email
    $mail_success = mail($to, $subject, $email_message, $headers);

    // Check if the email was sent successfully
    if ($mail_success) {
        // Redirect back to the contact page with a success message
        header("Location: index.html?status=success");
        exit();
    } else {
        // Redirect back to the contact page with an error message
        header("Location: index.html?status=error");
        exit();
    }
} else {
    // If the form was not submitted, redirect to the contact page
    header("Location: index.html");
    exit();
}
?>

