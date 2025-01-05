<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($membersite->Login())
   {
        $membersite->RedirectToURL("login-home.php");
   }
}

?>
<!DOCTYPE html>
<html xmlns="http://abcdlogin/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Login</title>    
</head>
<body>

<!-- Login Form -->
<div id='membersite'>
<form id='login' action='<?php echo $membersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Login</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $membersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='username' >UserName:</label><br/>
    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="30" /><br/>
    <span id='login_username_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='password' >Password:</label><br/>
    <input type='password' name='password' id='password' maxlength="30" /><br/>
    <span id='login_password_errorloc' class='error'></span>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>
<div class='short_explanation'><a href='reset-pass-req.php'>Forgot Password?</a></div>
</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var formvalidator  = new Validator("login");
    formvalidator.EnableOnPageErrorDisplay();
    formvalidator.EnableMsgsTogether();

    formvalidator.addValidation("username","req","Please enter your username");
    
    formvalidator.addValidation("password","req","Please enter the password");

// ]]>
</script>
</div>


</body>
</html>
