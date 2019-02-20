<?php
$sFirstName = $_POST['txtSignupFirstName']?? '';
//first name validation
if(empty($sFirstName)){sendResponse(0,__LINE__,"you must enter a first name");}
if(strlen($sFirstName) < 2){sendResponse(0,__LINE__,"first name must be minimum 2 letters");}
if(strlen($sFirstName) > 10){sendResponse(0,__LINE__,"first name must be maximum 10 letters");}
if(!ctype_alpha($sFirstName)){sendResponse(0,__LINE__,"first name can only be letters");}

$sLastName = $_POST['txtSignupLasttName'];
//last name validation
if(empty($sLastName)){sendResponse(0,__LINE__,"you must enter a last name");}
if(strlen($sLastName) < 2){sendResponse(0,__LINE__,"last name must be minimum 2 letters");}
if(strlen($sLastName) > 15){sendResponse(0,__LINE__,"last name must be maximum 10 letters");}
if(!ctype_alpha($sLastName)){sendResponse(0,__LINE__,"last name can only be letters");}

//phone validation
$sPhone = $_POST['txtSignupPhone'];
if(empty($sPhone)){sendResponse(0,__LINE__,"you must enter a phone number");}
if(strlen($sPhone) !=8 ){sendResponse(0,__LINE__,"phone number must be 8 digits");}
if(!ctype_digit($sPhone)){sendResponse(0,__LINE__,"phone numbercan only be digits");}
if( intval($sPhone) < 10000000 ){ sendResponse(0, __LINE__); }
if( intval($sPhone) > 99999999 ){ sendResponse(0, __LINE__); }

//email validation
$sEmail = $_POST['txtSignupEmail'];
if(empty($sEmail)){sendResponse(0,__LINE__,"you must enter an email address");}
if(!filter_var($sEmail, FILTER_VALIDATE_EMAIL)){sendResponse(0,__LINE__,"you must enter a valid email address");}

//cpr validation
$sCpr = $_POST['txtSignupCpr'];
if(empty($sCpr)){sendResponse(0,__LINE__,"you must enter an CPR");}
if(strlen($sCpr) !=10 ){sendResponse(0,__LINE__,"CPR must be 8 digits");}
if(!ctype_digit($sCpr)){sendResponse(0,__LINE__,"CPR can only be digits");}

$sPassword = $_POST['txtSignupPassword'];
if(empty($sPassword)){sendResponse(0,__LINE__,"you must enter a password");}
if(strlen($sPassword) < 4){sendResponse(0,__LINE__,"password must be minimum 4 characters");}
if(strlen($sPassword) > 30){sendResponse(0,__LINE__,"password must be maximum 10 characters");}

$sConfirmPassword = $_POST['txtSignupConfirmPassword'];
if(empty($sConfirmPassword)){sendResponse(0,__LINE__,"you must enter the same password");}
if(strlen($sConfirmPassword) < 4){sendResponse(0,__LINE__,"confirmation password must be minimum 4 characters");}
if(strlen($sConfirmPassword) > 30){sendResponse(0,__LINE__,"confirmation password must be maximum 10 characters");}
if( $sPassword != $sConfirmPassword){sendResponse(0,__LINE__,"confirmation password must be the same as password");}



$sData = file_get_contents('../data/clients.json');
$jData = json_decode($sData);
echo $jData;
if($jData == null){sendResponse(0,__LINE__, "invalid json");}
$InnerData = $jData->data;

$jClient = new stdClass();



$jClient->name = $sFirstName;
$jClient->lastName = $sLastName;
$jClient->email = $sEmail;
$jClient->cpr = $sCpr;
$jClient->active = 1;
$jClient->inactive = 0;

$jClient->password = password_hash($sPassword, 1);

$jClient->accounts = new stdClass();
$jAccount = new stdClass();
$jAccount->balance = 0;
$sAccountId = uniqid();
$jClient->accounts->$sAccountId = $jAccount;
// $jCLient->transactionsNotRead = new stdClass();
// $jClient->transactions = new stdClass();
// $InnerData->$sPhone = $jClient;



$sData = json_encode($jData);
file_put_contents('../data/clients.json', $sData , JSON_PRETTY_PRINT);

//success
 sendResponse(1,__LINE__,"sucessful sign up");




if($jData  = null) {sendResponse(0,__LINE__,"invalid json data");}

//***********************************//
function sendResponse ($bStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$bStatus.', "code": '.$iLineNumber.',"message":'.$sMessage.'}';
    exit;
}