<!DOCTYPE html>
<html>
<head>
<title>SignIn</title>

<style>
body {
  background-color: #F5EFE8;
  background-image: url('background.png');
  background-repeat:no-repeat;
  background-size:cover;
}
.button { 
height: 25px; 
width: 100px; 
color: #112776 ;
}
form {   
        border: 3px solid #f1f1f1;   
    } 
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 90%;
}

p.ex1{
    padding-left: 50.7%;
    font-weight: bold;
}

</style>
</head>

<body text="#112776 ">

<?php 
$con=mysqli_connect('localhost','munera','1234','robotarm');
if(!$con)
  echo 'Connection error';
else
{
    if(isset($_POST['sign']))
     {
         $id=$_POST['id'];  
         $pass=$_POST['pass'];

         $id=stripcslashes($id);
         $pass=stripcslashes($pass);

        $result = mysqli_query($con, "SELECT * FROM SignIn WHERE ID = '$id' AND PASS = '$pass'");  

        if(!$result||mysqli_num_rows($result) == 0)
        echo'<script>alert(" يوجد خطأ في الرقم التعريفي أو كلمة السر")</script>';
        else
        {echo'<script>alert(" تم تسجيل الدخول بنجاح")</script>';
        header("Location:base control panel.php");
        exit();
        }
        
        }

}
?>

<br><br><br><br><br><br><br><br><br><br><br><br>
<h1><center> صفحة تسجيل دخول </center></h1>
<form method="post">
<div class="container">

<p class="ex1">الرقم التعريفي</p>
<center><input type="text" placeholder="ادخل الرقم التعريفي" name="id" required><br></center>

<p class="ex1">الرقم السري</p>
<center>
    <input type="password" placeholder="ادخل الرقم السري" name="pass" required><br><br>
    <button class="button" name="sign"> تسجيل دخول</button>
</center>
</div>

</form>

<script>

</script>

<noscript>
 Sorry...JavaScript is needed to go ahead.
</noscript>


</body>
</html>