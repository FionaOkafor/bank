<?php
require_once 'top.php'
?>

<div id="signupPage" class="page">
    <h1>Signup Form</h1>
    <form id="frmSignup">
        <input name="txtSignupFirstName" id="txtSignupFirstName" type="text" placeholder="First Name" 
        data-validate="yes" data-min="3" data-max="10" data-type="string">
        <input name="txtSignupLasttName" id="txtSignupLastName" type="text" placeholder="Last Name"
        data-validate="yes" data-min="3" data-max="15" data-type="string">
        <input name="txtSignupPhone" id="txtSignupPhone" type="text" placeholder="Phone"
        data-validate="yes" data-min="8" data-max="8" data-type="integer">
        <input name="txtSignupCpr" id="txtSignupCpr" type="text" placeholder="CPR Number"
        data-validate="yes" data-min="10" data-max="10" data-type="integer">
        <input name="txtSignupEmail" id="txtSignupEmail" type="text" placeholder="Email"
        data-validate="yes" data-type="email" data-min="6" data-max="50">
        <input name="txtSignupPassword" id="txtSignupPassword" type="password" placeholder="Password"
        data-validate="yes" data-min="4" data-max="30" data-type="string">
        <input name="txtSignupConfirmPassword" id="txtSignupConfirmPassword" type="password" placeholder="Confirm Password"
        data-validate="yes" data-min="4" data-max="30" data-type="string">
        <button>Signup</button>
    </form>
<div>

<?php
$sLinkToScript = '<script src="../js/signup.js"></script>';
require_once 'bottom.php';
?>
