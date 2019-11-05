<?php

if(isset($_POST["reset-request-submit"])){

$selector= bin2hex(random_bytes(8));
 $token=random_bytes(32);
 $url="/create-new-password.php?selector" . $selector . "&validator=" . bin2hex($token);

 // set expiry date of the token.
 $expires= date("u")+ 1800;

require  '../user_accounts/includes/logic/userSignup.php';

$userEmail= $_POST["email"];

$sql= "DELETE FROM pwdreset where pwdResetEmail=?;";
$stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    echo "There was an error!";
    exit();
}else{
    mysqli_stmt_bind_param($stmt,"s",$userEmail);
    mysqli_stmt_execute($stmt);
}

$sql="INSERT INTO pwdReset(pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) values(?,?,?,?);";
$stmt= mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
    echo "There was an error!";
    exit();
}else{
    $hashedToken= password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$userEmail, $selector, $hashedToken, $expires);
    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);// close the statement
mysqli_close($conn);// close connection

$to= "$userEmail";// send email to...

$subject= "Reset password for the AFODS";// subject of the message

$message= '<p> We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email.</p>';
$message .='<p> Here is your password reset link: <br>';
$message .='<a href="'.$url .'">' .$url .'</a></p>';

$headers="From: AFODS<pharis.ifedha@gmail.com>\r\n";
$headers .= "Reply-To: pharis.ifedha@gmail.com\r\n";
$headers .= "Content-type: text/html\r\n";

mail($to, $subject, $message, $headers); // accessing mail server

header("location: project/user_accounts/reset-password.php? reset=success");

}
else{
    header("location: ../user_accounts/index.php");
}