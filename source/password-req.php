<?PHP
require_once("./include/membersite_config.php");

$emailsent = false;
if(isset($_POST['submitted']))
{
   if($membersite->EmailResetPasswordLink())
   {
        $membersite->RedirectToURL("reset-pwd-link-sent.html");
        exit;
   }
}

?>
<!DOCTYPE html>
<html xmlns="http://abcd/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Reset Password Request</title>
      <link rel="STYLESHEET" type="text/css" href="style/membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>
<!-- Form -->
<div id='membersite'>
<form id='resetreq' action='<?php echo $membersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Reset Password</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='username' >Your Email*:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $membersite->SafeDisplay('email') ?>' maxlength="50" /><br/>
    <span id='resetreq_email_errorloc' class='error'></span>
</div>
<div class='short_explanation'>A link to reset your password will be sent to your email address.</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>

<script type='text/javascript'>


    var formvalidator  = new Validator("resetreq");
    formvalidator.EnableOnPageErrorDisplay();
    formvalidator.EnableMsgsTogether();

    formvalidator.addValidation("email","req","Please provide the email address used to sign-up");
    formvalidator.addValidation("email","email","Please provide the email address used to sign-up");


</script>

</div>


</body>
</html>
