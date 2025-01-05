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
      <title>Home</title>
      <link rel="STYLESHEET" type="text/css" href="style/membersite.css">
</head>
<body>
<div id='membersite_content'>
<h2>Home Page</h2>
Welcome back <?= $membersite->UserName(); ?>!

<p><a href='change-password.php'>Change password</a></p>

<p><a href='access-controlled.php'>A sample 'members-only' page</a></p>
<br><br><br>
<p><a href='logout.php'>Logout</a></p>
</div>
</body>
</html>
