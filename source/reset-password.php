<?PHP
require_once("./include/membersite_config.php");

$success = false;
if($membersite->ResetPassword())
{
    $success=true;
}

?>
<!DOCTYPE html>
<html xmlns="http://abcd/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Reset Password</title>
      <link rel="STYLESHEET" type="text/css" href="style/membersite.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
</head>
<body>
<div id='membersite_content'>
<?php
if($success){
?>
<h2>Your password is reset successfully.</h2>
Your new password is sent to your email address.
<?php
}else{
?>
<h2>Error</h2>
<span class='error'><?php echo $membersite->GetErrorMessage(); ?></span>
<?php
}
?>
</div>

</body>
</html>
