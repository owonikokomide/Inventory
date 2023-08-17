<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

include('config.php');

if(isset($_POST['submit'])){

  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'testmemail2003@gmail.com';
  $mail->Password = 'hsxwmbptncvzqmhf';
  $mail-> SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('testmemail2003@gmail.com');

  $mail->addAddress($_POST["email"]);
  $mail->isHTML(true);

  $mail->Subject = "Account Creation";
$mail->Body = "Dear ".$_POST['fullname']." kindly know that an account has been created for you as ".$_POST['role']." kindly click the link below to activate and create a password for your account! Thanks.. ";
$mail->Body .= "<br/><a href='http://localhost/lafresh/activate.php?email=".$_POST['email']."'> Active & Create Password</a>";



  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $role = $_POST['role'];
  $date = date('Y-m-d');
  $uniqid = $role.rand(1111,9999);
  $status = 0;
  $pwd = "";
  $img = "";
  $checkexist = mysqli_query($connection,"SELECT * FROM user where email='$email'");
  if(mysqli_num_rows($checkexist)==1){
    echo
    "
    <script>
    alert('staff already exist');
    document.location.href = '../newuser.php';
    </script>
    ";
    // header('location:../newuser.php');
  } else{
  

  $insert = "INSERT INTO user
   (name, email, phone, pwd, img, date_created, status, role,uniqid)
  VALUES('$fullname', '$email', '$mobile', '$pwd', '$img', '$date', '$status', '$role','$uniqid')";
  $insert_query = mysqli_query($connection, $insert);
  if($insert_query){
  $mail->send();

    echo 
    "
    <script>
    alert('staff added successfully');
    document.location.href = '../newuser.php';
    </script>
    ";
    // header('location:../newuser.php');
  }
  }


}
?>