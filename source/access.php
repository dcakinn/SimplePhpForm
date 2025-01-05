<?PHP
require_once("./include/membersite_config.php");

if(!$membersite->CheckLogin())
{
    $membersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://abcd/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <link rel="STYLESHEET" type="text/css" href="style/membersite.css">
</head>
<body>
<div id='membersite_content'>
<h2>Controlling your access.</h2>
This page can be accessed after logging in only. 
<p>
Logged in as: <?= $membersite->UserName() ?>
</p>
<p>
<a href='home.php'>Home</a>
</p>
</div>
</body>
</html>
