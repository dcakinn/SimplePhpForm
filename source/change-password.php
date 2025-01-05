<?PHP
require_once("./include/membersite_config.php");

if(!$membersite->CheckLogin())
{
    $membersite->RedirectToURL("login.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($membersite->ChangePassword())
   {
        $membersite->RedirectToURL("changed-pass.html");
   }
}

?>
<!DOCTYPE html>
<html xmlns="http://abcd/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Change password</title>
      <link rel="STYLESHEET" type="text/css" href="style/membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <link rel="STYLESHEET" type="text/css" href="style/passwidget.css" />
      <script src="scripts/passwidget.js" type="text/javascript"></script>       
</head>
<body>

<!-- Form -->
<div id='membersite'>
<form id='changepass' action='<?php echo $membersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Change Password</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='oldpass' >Old Password:</label><br/>
    <div class='passwidgetdiv' id='oldpassdiv' ></div><br/>
    <noscript>
    <input type='password' name='oldpass' id='oldpass' maxlength="50" />
    </noscript>    
    <span id='changepass_oldpass_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='newpass' >New Password:</label><br/>
    <div class='passwidgetdiv' id='newpassdiv' ></div>
    <noscript>
    <input type='password' name='newpass' id='newpwd' maxlength="50" /><br/>
    </noscript>
    <span id='changepwd_newpass_errorloc' class='error'></span>
</div>

<br/><br/><br/>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</fieldset>
</form>


<script type='text/javascript'>

    var passwidget = new PasswordWidget('oldpassdiv','oldpass');
    passwidget.enableGenerate = false;
    passwidget.enableShowStrength=false;
    passwidget.enableShowStrengthStr =false;
    passwidget.MakePassWidget();
    
    var passwidget = new PasswordWidget('newpassdiv','newpass');
    passwidget.MakePassWidget();
    
    
    var formvalidator  = new Validator("changepwd");
    formvalidator.EnableOnPageErrorDisplay();
    formvalidator.EnableMsgsTogether();

    formvalidator.addValidation("oldpwd","req","Please provide your old password");
    
    formvalidator.addValidation("newpwd","req","Please provide your new password");


</script>

<p>
<a href='home.php'>Home</a>
</p>

</div>


</body>
</html>
