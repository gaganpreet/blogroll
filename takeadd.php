<?php
require_once('lib/recaptchalib.php');
require_once('recaptchakey.php');
require_once('config.inc.php');
require_once('validate_xml.php');

$resp = recaptcha_check_answer ($privatekey,
                              $_SERVER["REMOTE_ADDR"],
                              $_POST["recaptcha_challenge_field"],
                              $_POST["recaptcha_response_field"]);
    unset($_POST['recaptcha_challenge_field']);
    unset($_POST['recaptcha_response_field']);

function error_redirect($message)
{
    $_POST["error_message"] = $message;
    header('Location: add.php?' . http_build_query($_POST));
}

if (!$resp->is_valid) 
{
    error_redirect('Wrong captcha');
} 
else 
{
    $xml = load_and_verify_xml($_POST["feed_url"]);
    if ($xml["success"] )
    {
        if (!file_exists($db_file))
        {
            $entries = "{}";
        }
        else
        {
            $entries = file_get_contents($db_file);
        }
        $array = json_decode($entries);
print("Here");
        
        if (isset($array->$_POST["feed_url"]))
        {
            error_redirect("Feed with the same URL already exists");
        }
        $_POST["email"] = str_replace("@", "-AT-", $_POST["email"]);
        $_POST["email"] = str_replace(".", "<DOT>", $_POST["email"]);
        $array->$_POST["feed_url"] = $_POST;
        $fh = fopen($db_file, "w");    
        fwrite($fh, json_encode($array));
        fclose($fh);
        
        header('Location: index.php?message=Feed successfully inserted');
    }
    else
    {
        error_redirect("Failed to parse feed! <br />" . $xml["errors"]);
    }

}
?>
