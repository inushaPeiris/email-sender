<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Sender</title>
    <link rel ="stylesheet" href="styles.css">
    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Send Message</h2>
                <p class="text-center">Send mail to anyone from localhost.</p>
                <!-- starting of the PHP coding -->
                <?php
                // if user click on the send button
                if (isset($_POST['send'])){
                    // getting all user entered data
                    $recipient = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $sender = "From: s92068941@ousl.lk";
                    // if user leave empty field among one of them
                    if(empty($recipient) || empty($subject) || empty($message)){
                        ?>
                        <!-- display an alert message if one of them filed is empty -->
                        <div class="alert alert-danger text-center">
                            <?php echo "All input fields are required" ?>
                        </div>
                        <?php
                    }else{
                        // PHP function to send mail
                        if(mail($recipient, $subject, $message, $sender)){
                            ?>
                            <!-- display a success message if mail is sent successfully -->
                            <div class="alert alert-success text-center">
                            <?php echo "Your mail sent successfully to $recipient" ?>
                            </div>
                            <?php
                        }else{
                            ?>
                            <!-- display an error message if some how mail can't be sent -->
                            <div class="alert alert-danger text-center">
                            <?php echo "Failed while sending your mail!" ?>
                            </div>
                            <?php

                        }
                    }

                }
                ?>
                <!-- end of PHP coding -->
                <form action="mail.php" method='POST' autocomplete="off">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Recipients">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="10" class="form-control textarea" placeholder="Compose message.."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="form-control button btn-primary" value="Send">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>