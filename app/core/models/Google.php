<?php

$googleData = App::get('config')['google'];
$client = new Google_Client();
$client->setClientId($googleData['GOOGLE_CLIENT_ID']);
$client->setClientSecret($googleData['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($googleData['GOOGLE_REDIRECT_URL']);
$client->addScope("email");
$client->addScope("profile");
 
// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($token['access_token']);
  
  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $email =  $google_account_info->email;
  $name =  $google_account_info->name;
 
  // now you can use this profile info to create account in your website and make user logged in.
} else {
  $gmail = $client->createAuthUrl();
}