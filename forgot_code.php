<!DOCTYPE HTML>
<html>
   <head>
      <title>Forgot Password</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
   </script>
    <!--  <link rel="stylesheet" type="text/css" href="style.css">-->
   </head>
   <body id="body-color">
  <div id="Sign-In">
         <fieldset style="width:30%"><legend>Forgot Password Code</legend>
               code <br><input type="text" id="code"  name="code" size="40"><br>
               
               <input id="submit" type="submit" name="submit" value="Submit">
         </fieldset>
      </div>
<!--

   <div id="Sign-In">
         <fieldset style="width:30%"><legend>LOG-IN HERE</legend>
            <form>
               Username <br><input id="username" type="text" name="username" size="40"><br>
               Password <br><input id="password" type="password" name="password" size="40"><br>
               <input id="button" type="submit" name="submit" value="Log-In">
            </form>
         </fieldset>
      </div>
-->
<?php 
include_once 'functions.php';
sec_session_start(); // Our custom secure way of starting a PHP session.
if( isset($_SESSION['Error']) )
{
   echo $_SESSION['Error'];
   unset($_SESSION['Error']);

}
?>
<script>
$(document).on('click', '#submit', function() { // catch the form's submit event
      $userID=$_GET['ID'];
   
   if($('#code').val().length > 0 ){
      // Send data to server through ajax call
      // action is functionality we want to call and outputJSON is our data
      $.ajax({url: 'checkCode.php',
         data: {action : 'resetPassword', code: $("#code").val(),id: $userID,submit:true
         }, //send username and password and submit to check.php
         type: 'post',                   
            async: true,
            beforeSend: function() {
               //Not sure what to do here..
               // This callback function will trigger before data is sent
             // $.mobile.showPageLoadingMsg(true); // This will show ajax spinner
            },
               complete: function() {
               //Not sure what to do here..
                  // This callback function will trigger on data sent/received complete
                 //$.mobile.hidePageLoadingMsg(); // This will hide ajax spinner
               },
                  success: function (result) {

                     if (result === "Yes")
                     {
                        alert('Success!');
                        //send to page to change password
                        //echo "Password has been reset";
                     // echo "Sent";
                        //window.location = "protected_page.php";
                     }
                     else if(result === "No")
                     {
                        alert('error!');
                        // window.location = "https://google.com";
                        //window.location = "index.php";
                     }
                     else
                     {
                        window.location = "error.php";
                     }
                  },
                     error: function (request,error) {
                        // This callback function will trigger on unsuccessful action                
                        alert('Network error has occurred please try again!');
                     }
      });                   
   } else {
      alert('Please fill all nececery fields');
   }           
   return false; // cancel original event to prevent form submitting
});         
</script>
   </body>
</html>

