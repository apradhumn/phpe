<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">  -->
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<?php 
if(!empty($_POST["send"])){
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userphone = $_POST["userphone"];
    $userMessage = $_POST["userMessage"];
    $toEmail = "agrawalpradhumn35@gmail.com";

    $mailHeaders = "From: " . $userEmail . "\r\n" .
                   "Reply-To: " . $userEmail . "\r\n" .
                   "Content-Type: text/plain; charset=UTF-8\r\n" .
                   "X-Mailer: PHP/" . phpversion();

    $emailBody = "Name: " . $userName . "\r\n" .
                 "Email: " . $userEmail . "\r\n" .
                 "Phone: " . $userphone . "\r\n" .
                 "Message: " . $userMessage . "\r\n";

    if(mail($toEmail, "New Contact Form Submission", $emailBody, $mailHeaders)){
        $message = "Your information was received successfully.";
    } else {
        $message = "There was an error sending your message. Please try again later.";
    }
}
?>
    <div class="form-container">
        <form action="contact.php" method="post" name="emailContact">
            <div class="input-row">
                <label for="userName">Name <em>*</em></label>
                <input type="text" name="userName" required>
            </div>
            <div class="input-row">
                <label for="userEmail">Email <em>*</em></label>
                <input type="email" name="userEmail" required>
            </div>
            <div class="input-row">
                <label for="userphone">Phone <em>*</em></label>
                <input type="tel" name="userphone" required>
            </div>
            <div class="input-row">
                <label for="userMessage">Message <em>*</em></label>
                <textarea name="userMessage" required></textarea>
            </div>
            <div class="input-row">
                <input type="submit" name="send" value="Submit">
            </div>
            <?php if(!empty($message)){ ?>
                <div class="success">
                    <strong><?php echo $message; ?></strong>
                </div>
            <?php } ?>
        </form>
    </div>
</body>
</html>

</body>
</html>