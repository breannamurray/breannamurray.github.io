<?php
    if(empty($_POST) === false) {
        $errors = array();
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        
        if (empty($name) === true || empty($email) === true || empty($message) === true) {
            $errors[] = 'Name, email and message are required!';
        }
        else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'That\'s not a valid email address';
            }
            if (ctype_alpha($name) === false) {
                $errors[] = 'Name must only contain letters';
            }
        }
        if(empty($errors) === true) {
            mail('hmp260@my.utsa.edu', 'Contact form', $message, 'From: ' . $email);
            header('Location: index.html?sent');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> A contact form</title>    
    </head>
    <body>
        <?php
        if (isset($_GET['sent'])) === true) {
            echo '<p>Thanks for contacting me!</p>';
        }

        else {
                if(empty($errors) === false) {
                echo '<ul>';
                    foreach($errors as $error) {
                        echo '<li>', $error, '</li>';
                    }
                echo '</ul'>;
                }
            ?>
            <form action="" method>
                <p>
                    <label for="name">Name:</label><br>
                    <input type="text" name="name" id="name" <?php if (isset($_POST['name']) === true) {echo 'value="', strip_tags($_POST['name']),'"';}?>>
                </p>
                <p>
                    <label for="email">Email:</label><br>
                    <input type="text" name="email" id="email" <?php if (isset($_POST['email']) === true) {echo 'value="', strip_tags($_POST['email']),'"';}?>>
                </p>
                <p>
                    <label for="message">Message:</label><br>
                    <textarea name="message" id="message"><?php if (isset($_POST['message']) === true) {echo strip_tags($_POST['message']);}?></textarea>
                </p>
                <p>
                    <input type="submit" value="submit">
                </p>
            </form>
        <?php
        }
        ?>
    </body>
</html>