<?php
include('./includes/title.inc.php');
require_once('./includes/recaptchalib.php');
$public_key = '6LeaUO8SAAAAAD3r6ZEKWwUPHwGfdkmU7T9CjCtR';
$private_key = '6LeaUO8SAAAAAD9rlmCtYztqBw4pTP5wjgGW2Q3H';
$errors = array();
$missing = array();
//check if the form has been submitted.
if (isset($_POST['send'])) {
    //remove magic quote script
    include('./includes/nuke_magic_quotes.php');
    //email processing script
    $to = 'statchou@gmail.com';
    $subject = 'Feedback from Japan Journey';
    //list expected fields
    $expected = array('name', 'email', 'comments', 'subscribe');
    $required = array('name', 'comments', 'email', 'subscribe');
    // set default values for variables that might not exist
    if (!isset($_POST['subscribe'])) {
        $_POST['subscribe'] = '';
    }
    // create additional headers
    $headers = "From: Japan Journey<feedback@example.com>\r\n";
    $headers .= 'Content-Type: text/plain; charset=utf-8';
    $response = recaptcha_check_answer($private_key, $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
    if (!$response->is_valid) {
        $errors['recaptcha'] = true;
    }
    require('./includes/processmail.inc.php');
    if ($mailSent) {
        header("Location: http://{$_SERVER['HTTP_HOST']}" . dirname($_SERVER['PHP_SELF']) . "/thank_you.php");
        exit;
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8">
    <title>Japan Journey<?php if (isset($title)) {
            echo "&#8212;{$title}";
        } ?></title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<div id="header">
    <h1>Japan Journey </h1>
</div>
<div id="wrapper">
    <?php include('./includes/menu.inc.php'); ?>
    <div id="maincontent">
        <h2>Contact Us</h2>
        <?php if (($_POST && $suspect) || ($_POST && isset($errors['mailFail']))) { ?>
            <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
        <?php } elseif ($missing || $errors) { ?>
            <p class="warning">Please fix the item(s) indicated.</p>
        <?php } ?>
        <p>Ut enim ad minim veniam, quis nostrud exercitation consectetur adipisicing elit. Velit esse cillum dolore
            ullamco laboris nisi in reprehenderit in voluptate. Mollit anim id est laborum. Sunt in culpa duis aute
            irure dolor excepteur sint occaecat.</p>

        <form id="feedback" method="post" action="">
            <p>
                <label for="name">Name:
                    <?php if ($missing && in_array('name', $missing)) { ?>
                        <span class="warning">Please enter your name</span>
                    <?php } ?>
                </label>
                <input name="name" id="name" type="text" class="formbox"
                    <?php if ($missing || $errors) {
                        echo 'value="' . htmlentities($name, ENT_COMPAT, 'UTF-8') . '"';
                    } ?> >
            </p>

            <p>
                <label for="email">Email:
                    <?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">Please enter your email address</span>
                    <?php } elseif (isset($errors['email'])) { ?>
                        <span class="warning">Invalid email address</span>
                    <?php } ?>
                </label>
                <input name="email" id="email" type="text" class="formbox"
                    <?php if ($missing || $errors) {
                        echo 'value="' . htmlentities($email, ENT_COMPAT, 'UTF-8') . '"';
                    } ?> >
            </p>

            <p>
                <label for="comments">Comments:
                    <?php if ($missing && in_array('comments', $missing)) { ?>
                        <span class="warning">Please enter your comments</span>
                    <?php } ?>
                </label>
                <textarea name="comments" id="comments" cols="60" rows="8"><?php
                    if ($missing || $errors) {
                        echo htmlentities($comments, ENT_COMPAT, 'UTF-8');
                    } ?></textarea>
            </p>
            <?php /* if (isset($errors['recaptcha'])) { ?>
                <p class="warning">The values didn't match. Try again.</p>
            <?php }
            echo recaptcha_get_html($public_key); */
            ?>
            <fieldset id="subscribe">
                <h4>Subscribe to newsletter?
                    <?php if ($missing && in_array('subscribe', $missing)) { ?>
                        <span class="warning">Please make a selection</span>
                    <?php } ?>
                </h4>

                <p>
                    <input name="subscribe" type="radio" value="Yes" id="subscribe-yes"
                        <?php
                        if ($_POST && $_POST['subscribe'] == 'Yes') {
                            echo 'check';
                        } ?>>
                    <label for="subscribe-yes">Yes</label>
                    <input name="subscribe" type="radio" value="No" id="subscribe-no"
                        <?php
                        if (!$_POST || $_POST['subscribe'] == 'No') {
                            echo 'check';
                        } ?>>
                    <label for="subscribe-no">No</label>
                </p>
            </fieldset>
            <p>
                <input name="send" id="send" type="submit" value="Send message">
            </p>
        </form>
        <pre>
        <?php /* if ($_POST && $mailSent) {
            echo "\n";
            echo htmlentities($message, ENT_COMPAT, 'UTF-8') . "\n";
            echo 'Headers: ' . htmlentities($headers, ENT_COMPAT, 'UTF-8');
        } */
        ?>
        </pre>

    </div>
    <?php include('./includes/footer.inc.php'); ?>
</div>
</body>
</html>
