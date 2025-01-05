<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($membersite->RegisterUser())
   {
        $membersite->RedirectToURL("thank-you.html");
   }
}

?>
<!DOCTYPE html>
<html xmlns="http://abcdregister/xhtml" xml:lang="en-US" lang="en-US">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Register</title>
    <link rel="STYLESHEET" type="text/css" href="style/membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>      
</head>
<body>

<!-- Form Code Start -->
<div id='membersite'>
<form id='register' action='<?php echo $membersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<input type='text'  class='spmhidip' name='<?php echo $membersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $membersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='name' >Name: </label><br/>
    <input type='text' name='name' id='name' value='<?php echo $membersite->SafeDisplay('name') ?>' maxlength="30" /><br/>
    <span id='register_name_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='email' >Email Address:</label><br/>
    <input type='text' name='email' id='email' value='<?php echo $membersite->SafeDisplay('email') ?>' maxlength="30" /><br/>
    <span id='register_email_errorloc' class='error'></span>
</div>
<div class='container'>
    <label for='username' >Username:</label><br/>
    <input type='text' name='username' id='username' value='<?php echo $membersite->SafeDisplay('username') ?>' maxlength="30" /><br/>
    <span id='register_username_errorloc' class='error'></span>
</div>
<div class='container' style='height:80px;'>
    <label for='password' >Password:</label><br/>
    <div class='passwidgetdiv' id='thepassdiv' ></div>
    <noscript>
    <input type='password' name='password' id='password' maxlength="30" />
    </noscript>    
    <div id='register_password_errorloc' class='error' style='clear:both'></div>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>

<script type='text/javascript'>
// 
    var passwidget = new PasswordWidget('thepassdiv','password');
    passwidget.MakePassWidget();
    
    var formvalidator  = new Validator("register");
    formvalidator.EnableOnPageErrorDisplay();
    formvalidator.EnableMsgsTogether();
    formvalidator.addValidation("name","req","Please enter your name.");

    formvalidator.addValidation("email","req","Please enter your email address.");

    formvalidator.addValidation("email","email","Please enter a valid email address.");

    formvalidator.addValidation("username","req","Please enter a username.");
    
    formvalidator.addValidation("password","req","Please enter a password.");

</script>


</body>
</html>
