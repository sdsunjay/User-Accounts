<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta https-equiv="content-type" content="text/html; charset=utf-8" />
<title>Accounts</title>
<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../gui/style.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
<script type="text/javascript" src="../../gui/jquery.formerize-0.1.js"></script>
<script language="javascript" type="text/JavaScript" src="../accounts/js/login.js"></script>
      <link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript">
	$(function() {
		$('#search').formerize();
	});
</script>


<style>
.uinput {
	width:50px;
	background-color:blue;
	background:white;
}
#output, #output1 {
	text-align:center;
}
#text {
	display:none;
}
#plane {
	width:630px;
	height:300px;
}

</style>

</head>
<body>
<div id="wrapper">
<div id="header">
  <div id="logo">
    <h1><strong>Sunjay's Homepage</strong></h1>
  </div>
  <div id="search">
    <form action="" method="post">
      <div>
        <input class="form-text" name="search" size="44" maxlength="100" title="Search my website" />
      </div>
    </form>
  </div>
 	<div id="menu">
                        <ul>
                             <li class="https://sunjaydhama.com"><a href="../../gui/index.html">Home</a></li>
                             <li><a href="../../gui/about.html">About</a></li>
                             <li><a href="../../gui/images.html">Images</a></li>
                             <li><a href="../../blog">Blog</a></li>
                             <li><a href="../../gui/projects.html">Projects</a></li>
                             <li><a href="../../gui/contact.html">Contact Me</a></li>
                        </ul>
			<br class="clearfix" />
		</div>
	</div>
	<div id="page">
		<div id="sidebar">
			<h3>Sidebar</h3>
			<ul class="list">
                         <li class="first"><a href="https://sunjaydhama.com">Terminal</a></li>
                         <li><a href="#" onClick="window.open('https://github.com/sdsunjay?tab=repositories', 'external');">Github</a></li>
                      
      <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/sdsunjay" data-widget-id="459207762094735360">Tweets by @sdsunjay</a>
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^https:/.test(d.location)?'https':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  </ul>
</div>
<div id="content">
<div id="post1">

  <div id="Sign-In">
         <fieldset style="width:30%"><legend>LOG-IN HERE</legend>
            <!--<form method="POST" action="check.php">-->
               Username <br><input type="text" id="username"  name="username" size="40"><br>
               Password <br><input type="password" id="password" name="password" size="40"><br>
               <input id="submit" type="submit" name="submit" value="Log-In">
           <!-- </form>-->
         </fieldset>
      </div>
      <p>If you don't have a login, please <a href="register.html">Register</a>.</p>
      <p>If you are done, please <a href="logout.php">Log Out</a>.</p>
      <p><a href="forgot.php">Forgot your password</a>.</p>
<?php 
include_once("../../config/db_config.php");
include("../accounts/functions.php");
sec_session_start(); // Our custom secure way of starting a PHP session.
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
if( isset($_SESSION['Error']) )
{
   echo $_SESSION['Error'];
   unset($_SESSION['Error']);
}


$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
/* check connection */
if (mysqli_connect_errno()) 
{
   printf("Connect failed: %s\n", mysqli_connect_error());
   echo "Connect: failed";
   exit();
}
/*
      if(updatePassword($mysqli,"sdsunjay","new_password"))
      {
         echo "<h4> Successfully changed your password</h4>";
      } 
      else
      {
         echo "<h4> Unsuccessful in changing your password </h4>";
      }
 */
/*check to make sure we are logged in*/
if(login_check($mysqli))
{
   
   Redirect('https://www.sunjaydhama.com/projects/accounts/protected_page.php', true);

}
?>
</div>
</div>
                  <div id="footer"> Copyright (c) 2014 <a href="https://www.sunjaydhama.com/">Sunjay Dhama</a>. All rights reserved. Template by <a href="https://www.freecsstemplates.org/">CSS Templates</a><br>
<a class='facebook' href='#' onclick="window.open('https://www.linkedin.com/in/sdsunjay','external');" >
                        <img alt='' src='../../gui/images/li.png' width="30" height="30" /></a>
                     <a class='twitter' href='#' onclick="window.open('https://www.twitter.com/sdsunjay','external');" >
                        <br>
                        <img alt='' src='../../gui/images/twitt.jpg' width="30" height="30"/></a>
                     <br>
                     <a href="https://bitcoin.org" target="_NEW">BitCoin</a>: <b><a href="bitcoin:1Shn9NDCuHeAeDDaHtCb9RFMV1kQr6uZx">1Shn9NDCuHeAeDDaHtCb9RFMV1kQr6uZx</a></b><br />
                  </div>
               </body>
            </html>
<!--
<div id="footer"> Copyright (c) 2012 www.sunjaydhama.com. All rights reserved. Template by <a href="https://www.freecsstemplates.org/">CSS Templates</a>. </div>

</div>
</div>
</body>
</html></div>


</body>
</html>-->
