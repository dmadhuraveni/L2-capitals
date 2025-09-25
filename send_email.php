<?php
// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form data from the POST request
    $name = strip_tags(trim($_POST["name"]));
    $phone = strip_tags(trim($_POST["phone"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // Set the recipient email address.
    // Replace "your_email@example.com" with the email you want to receive leads.
    $recipient = "l2capitalsblr@gmail.com";

    // Set the email subject line
    $subject = "New Loan Application Lead from Website";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Phone: $phone\n";
    $email_content .= "Email: $email\n\n";

    // Build the email headers.
    $email_headers = "From: Website Lead <smartloans@l2capitals.in>";

    // Send the email.
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Redirect to a thank you page on success
        header("Location: thank_you.html");
        exit;
    } else {
        // Display an error message if the email failed to send
        http_response_code(500);
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }

} else {
    // Not a POST request, so set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>