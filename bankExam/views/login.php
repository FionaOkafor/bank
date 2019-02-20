


<?php
require_once 'top.php'
?>



<div id="loginPage" class="page">
    <h1>Login</h1>

  <form ID="frmLogin"action="login.php" method="POST">
    <input name="txtLoginPhone" type="text" placeholder="email" 
       data-validate="yes" data-min="8" data-max="8" data-type="integer">
    <input name="txtLoginPassword" type="password" placeholder="password"
      data-validate="yes" data-min="4" data-max="30" data-type="string">
    <button>Login</button>
  </form>

<div>




<?php

$sLinkToScript = '<script src="../js/login.js"></script>';
require_once 'bottom.php';
?>
