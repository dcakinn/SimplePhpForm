<?PHP
require_once("./include/membersite_config.php");

if(isset($_GET['code']))
{
   if($membersite->ConfirmUser())
   {
        $membersite->RedirectToURL("thank-you.html");
   }
}

?>
<!DOCTYPE html>
<html xmlns="http://abcdconfirmreg/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Confirm registration:</title>
      <link rel="STYLESHEET" type="text/css" href="style/membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>

<h2>Confirm registration:</h2>
<p>
Please enter the confirmation code.
</p>

<!-- Form -->
<div id='membersite'>
<form id='confirm' action='<?php echo $membersite->GetSelfScript(); ?>' method='get' accept-charset='UTF-8'>
<div class='short_explanation'>* required fields</div>
<div><span class='error'><?php echo $membersite->GetErrorMessage(); ?></span></div>
<div class='container'>
    <label for='code' >Confirmation Code: </label><br/>
    <input type='text' name='code' id='code' maxlength="50" /><br/>
    <span id='register_code_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</form>

<script type='text/javascript'>

    var formvalidator  = new Validator("confirm");
    formvalidator.EnableOnPageErrorDisplay();
    formvalidator.EnableMsgsTogether();
    formvalidator.addValidation("code","req","Please enter the confirmation code");

</script>
</div>


</body>
</html>
