<?php 



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $username = $_POST['signupUsername'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $existUsername = "SELECT * FROM `users` WHERE username = '$username'";

    $result = mysqli_query($conn, $existSql);
    $result2 = mysqli_query($conn, $existUsername);

    $numRows = mysqli_num_rows($result);
    $numRows2 = mysqli_num_rows($result2);

    if($numRows > 0){
        $showError = "Email already in use";

    
    }elseif($numRows2 > 0)
    {
        $showError = "Username already exists";
    }
    else
    {
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `username`, `user_email`, 
            `user_pass`, `timestamp`) VALUES ( '$username', '$user_email', 
            '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }


        }else {
            $showError = "Passwords do not match";
            
        }
    }
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");

}







?>