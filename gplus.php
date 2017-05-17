<?php

require_once('gplus-lib/vendor/autoload.php');
const CLIENT_ID = '200741670689-aogb5u0rqvst0dsmrfi87efeut2092mg.apps.googleusercontent.com';
const CLIENT_SECRET = 'tOr41fmVRjKnEJGeGx6n0XcX';
const REDIRECT_URI = 'http://awong6201.000webhostapp.com/connect.php';

$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);

if (isset($_REQUEST['logout'])) {
    session_unset();
}

if (isset($_GET['code'])) {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}


if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $me = $plus->people->get('me');

    $user = $me['id'];
    $name = $me['displayName'];
    $email = $me['emails'][0]['value'];
    $profile_image_url = $me['image']['url'];
    $profile_url = $me['url'];

    $_SESSION['user'] = $user;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

} else {
    $authUrl = $client->createAuthUrl();
}

?>

<div>
    <?php

          if (isset($authUrl)) {
              echo "<a class='login' href='" . $authUrl . "'><img src='gplus-lib/signin_button.png' height='50px'/></a>";
          }
    ?>
</div>
