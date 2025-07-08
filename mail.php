<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "darshitrajyaguru@gmail.com"; 

    // Collect and sanitize form data
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';

    // Basic validation
    if (!empty($name) && !empty($email) && !empty($message)) {
        $subject = "New Message from Portfolio Contact Form";

        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Message:\n$message\n";

        $headers = "From: $name <$email>";

        // Send email
        if (mail($to, $subject, $email_content, $headers)) {
            echo "Your message has been sent successfully!";
        } else {
            echo "There was an error sending your message.";
        }
    } else {
        echo "Please complete all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
