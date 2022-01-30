<?php 
    define('APP_NAME', 'HACKATHON');
    define('APP_ID', '');
    define('APP_SECRET', '');
    define('API_VERSION', 'V2.5');
    define('FB_BASE_URL', 'http://localhost/hackathon/facebook_login/');

    require_once('/Facebook/autoload.php');

    $fb = new Facebook\Facebook(
        [
            'app_id' => APP_ID,
            'app_secret' => APP_SECRET,
            'default_graph_version' =>API_VERSION,
        ]
    );

    $fb_hepler = $fb->getRedirectLoginHelper();

    try{
        if(isset($_SESSION['facebook_access_token']))
        {$accessToken = $_SESSION['facebook_access_token'];}
        else {
            $accessToken = $fb_hepler->getAccessToken();}
    } catch(FacebookResponseException $e) {
        echo 'Facebook API error: ' . $e->getMessage();
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK error: ' . $e->getMessage();
        exit;
    }
    
?>