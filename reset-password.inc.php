<?php 

if (isset($_POST["reset-password-submit"])) {
   
    $selector= $_POST["selector"];
    $validator= $_POST["validator"];
    $password= $_POST["pwd"];
    $passwordRepeat= $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("location: project/user_accounts/create-new-password.php?newpwd=empty");
        exit();
    } elseif ($password != $passwordRepeat) {
        header("location: project/user_accounts/create-new-password.php?newpwd=emptypwdnotsame");
        exit();
    }
    //check for the token whe expired or not.
    $currentDate= date("U");

    require 'project/user_accounts/includes/logic/userSignup.php';

    $sql = "SELECT *FROM pwdReset WHERE pwdResetSelector=? AND pwdResetEpires>=?";
    $stmt= mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
    echo "There was an error!";
    exit();
    }else{
    mysqli_stmt_bind_param($stmt,"s",$selector);
    mysqli_stmt_execute($stmt);// execute the statement

    // grab the result
    $result= mysqli_stmt-get_result($stmt);

    // fetch every single row that is in the result
    if (!$row=mysqli_fetch_assoc($result)) {
        echo "You need to re-submit your reset request."
        exit();
    } else {

        //convert the validator token into a binary
        $tokenbin = hex2bin($validator);

        // matching the token with one inside the database
        $tokenCheck = password_verify($tokenbin, $row["pwdResetToken"]);

        if ($tokenCheck ===false) {
            echo "You need to re-submit your reset request."
        exit();
        } elseif ($tokenCheck ===true) {
            $tokenEmail = $row['pwdResetEmail'];

            //select user from database
            $sql= "SELECT *FROM users WHERE emailUsers=?;";
            $stmt= mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "There was an error!";
                exit();
            }else{
                // grab the user from the users table
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                //run the statement
                mysqli_stmt_execute($stmt);

                $result= mysqli_stmt-get_result($stmt);
                if (!$row=mysqli_fetch_assoc($result)) {
                    echo "There was an error!"
                    exit();
                } else {
                    //update the password from the users table.
                    $sql= "UPDATE users SET pwdUsers=? WHERE email=?";
                    $stmt= mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "There was an error!";
                        exit();
                    }else{
                        $newpwdHash = password_hash($password, PASSWORD_DEFAULT);
                        // grab the user from the users table
                        mysqli_stmt_bind_param($stmt, "ss", $newpwdHash, $tokenEmail);
                        //run the statement
                        mysqli_stmt_execute($stmt);

                        $sql= "DELETE FROM pwdReset where pwdResetEmail=?;";
                        $stmt= mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "There was an error!";
                            exit();
                        }else{
                            mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header("Location: project/user_accounts/signup.php?newpwd=passwordupdate");
                        }
                    }
                }
            }
        


        }
    

    }
}

} else {
    header("location: project/user_accounts/index.php")
}


?>