<?php
if(isset($_POST['submit'])) { // Check if form is submitted
    
    // Extract form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Check phone number validity
    if(strlen($phone) == 10 && is_numeric($phone)) {
        
        // Email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: '.$email. "\r\n";
        
        // Email subject
        $subject = "New Contact Form Submission";
        
        // Email content
        $msg = "<html><body>";
        $msg .= "<div style='max-width: 600px; margin: 0 auto;'>";
        $msg .= "<h2 style='text-align: center; color: #333;'>Contact Form Submission</h2>";
        $msg .= "<table style='width: 100%; border-collapse: collapse; margin-top: 20px;'>";
        $msg .= "<tr><th style='background-color: #f2f2f2; padding: 10px;'>Name</th><td style='padding: 10px;'>$name</td></tr>";
        $msg .= "<tr><th style='background-color: #f2f2f2; padding: 10px;'>Email</th><td style='padding: 10px;'>$email</td></tr>";
        $msg .= "<tr><th style='background-color: #f2f2f2; padding: 10px;'>Phone</th><td style='padding: 10px;'>$phone</td></tr>";
        $msg .= "<tr><th style='background-color: #f2f2f2; padding: 10px;'>Message</th><td style='padding: 10px;'>$message</td></tr>";
        $msg .= "</table>";
        $msg .= "</div>";
        $msg .= "</body></html>";
        
        // Send email
        if(mail("ashis.ghosh170@gmail.com", $subject, $msg, $headers)) {
            header('location: thank_you.html'); // Redirect to thank you page after successful submission
            exit; // Stop further execution
        } else {
            echo "<script>alert('Some Error Occurred while sending the email.')</script>";
            echo "<script>window.location.href='index.html'</script>";
            exit; // Stop further execution
        }
    } else {
        echo "<script>alert('Please enter a valid 10-digit phone number.')</script>";
        echo "<script>window.location.href='index.html'</script>";
        exit; // Stop further execution
    }
} else {
    echo "Form not submitted";
}
?>
