<?php
    require 'connection.php';
    session_start();
    $email=$_POST['email'];
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,strtolower($email))){
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    }
    $regex_passwd="#\b(?:or|like|procedure|xml|concat|group|db|where|like|limit|in|0x|extract|by|load|as|binary|join|using|pow|exp|info|insert|to|del|flag|pass|sec|hex|users|regex|password|if|case|and|or|ascii|sleep)\b#";
    $password=$_POST['password'];
    if(preg_match($regex_passwd,strtolower($password))){
        echo '<strong style="font-size: 50px;">Dummmmmmm...</strong>';
        ?>
        <meta http-equiv="refresh" content="2;url=login.php" />
        <?php
    } else {
        $user_authentication_query="select id,email from users where email='$email' and password='$password'";
        $user_authentication_result=mysqli_query($con,$user_authentication_query) or die(mysqli_error($con));
        $rows_fetched=mysqli_num_rows($user_authentication_result);
        if($rows_fetched==0){
            //no user
            //redirecting to same login page
            ?>
            <script>
                window.alert("Wrong username or password");
            </script>
            <meta http-equiv="refresh" content="1;url=login.php" />
            <?php
            //header('location: login');
            //echo "Wrong email or password.";
        }else{
            $row=mysqli_fetch_array($user_authentication_result);
            $_SESSION['email']=$email;
            $_SESSION['id']=$row['id'];  //user id
            header('location: products.php');
        }
    }
 ?>
