<?php
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];
$country=$_POST['country'];
$address=$_POST['address'];
$phonenumber=$_POST['phonenumber'];
$gender=$_POST['gender'];

 $conn =new mysqli('localhost','root','','bloodbank');
 if($conn->connect_error){
  die('Connection Failed : ' .$conn->connect_error);
 }else{
  $stmt = $conn->prepare("insert into regbbms(fullname,email,password,confirmpassword,country,address,phonenumber,gender) values(?,?,?,?,?,?,?,?)");
  $stmt->bind_param("ssssssis",$fullname,$email,$password,$confirmpassword,$country,$address,$phonenumber,$gender);
  $stmt->execute();
  echo "Registration Successfull...";
  $stmt->close();
  $conn->close();
 }
?>