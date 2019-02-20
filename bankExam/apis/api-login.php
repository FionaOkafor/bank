
<?php

//phone validation
$sPhone = $_POST['txtLoginPhone'];
if(empty($sPhone)){sendResponse(0,__LINE__,"you must enter a phone number");}
if(strlen($sPhone) !=8 ){sendResponse(0,__LINE__,"phone number must be 8 digits");}
if(!ctype_digit($sPhone)){sendResponse(0,__LINE__,"phone numbercan only be digits");}
if( intval($sPhone) < 10000000 ){ sendResponse(0, __LINE__); }
if( intval($sPhone) > 99999999 ){ sendResponse(0, __LINE__); }

$sPassword = $_POST['txtLoginPassword'];
if(empty($sPassword)){sendResponse(0,__LINE__,"you must enter a password");}
if(strlen($sPassword) < 4){sendResponse(0,__LINE__,"password must be minimum 4 characters");}
if(strlen($sPassword) > 30){sendResponse(0,__LINE__,"password must be maximum 10 characters");}


$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
if($jData == null){sendResponse(0,__LINE__, "invalid json");}
$jInnerData = $jData->data;

if( !password_verify( $sPassword, $jInnerData->$sPhone->password )){ sendResponse(0, __LINE__,'incorrect password'); }

//TODO CHECK IF THE PHONE IS CORRECT

session_start();
$_SESSION['sUserId'] =$sPhone;
sendResponse(1, __LINE__, 'successfully signed in');



// **************************************************

function sendResponse ($bStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$bStatus.', "code": '.$iLineNumber.',"message":'.$sMessage.'}';
    exit;
}