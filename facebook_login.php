<?php

require_once '/includes/facebook.php';

if (isset($accessToken)){
    if (!isset($_SESSION['facebook_access_token']))
    {
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        $oAuth2Client = $fb->getOAuth2Client();

        $longLiveAccessToken = $oAuth2Client->getLongLiveAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLiveAccessToken;

        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    else {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    //redirect the user to the index page if it has $_GET['code']
    if (isset($_GET['code'])) 
    {
        header('Location: ./');
    }


    try {
        $fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
        $fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');
        
        $fb_user = $fb_response->getGraphUser();
        $picture = $fb_response_picture->getGraphUser();
        
        $_SESSION['fb_user_id'] = $fb_user->getProperty('id');
        $_SESSION['fb_user_name'] = $fb_user->getProperty('name');
        $_SESSION['fb_user_email'] = $fb_user->getProperty('email');
        $_SESSION['fb_user_pic'] = $picture['url'];
        
        
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        echo 'Facebook API Error: ' . $e->getMessage();
        session_destroy();
        // redirecting user back to app login page
        header("Location: ./");
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK Error: ' . $e->getMessage();
        exit;
    }
    } 
    else 
    {	
    // replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used
    $fb_login_url = $fb_helper->getLoginUrl('http://localhost/facebook1/', $permissions);
    }

    ?>