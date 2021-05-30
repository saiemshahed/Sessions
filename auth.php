<?php
session_start([
    'cookie_lifetime'=>300

]);
$error=false;
//session_destroy();
if(isset($_POST['username']) && isset($_post['password'])){
    if('admin'==$_POST['username'] && 'rabbit'==$_POST['password']){
        $_SESSION['loggedin']=true;
    }else{
        $_SESSION['loggedin']=false;
    }
}
if(isset($_post['logout'])){
 $error=true;
    session_destroy();

}

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Form Example</title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
    <style>
        body {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="column column-60 column-offset-20">
            <h2>Sample Auth Example</h2>
        </div>
    </div>
    <div class="row"
    <div class="column column-60 column-offset-20">
        <?php if(true==$_SESSION['loggedin']){
            echo "Hello users, Welcome!";
        }else{
            echo " Hello Stranger ,Login below";
        }
        ?>
    </div>

<div class="row">
    <div class="column column-60 column-offset-20">
        <?php
        if($error){
            echo "<blockquote>UserName and Password didn't match</blockquote>";
        }
        ?>

        <?php
        if(false==$_SESSION['loggedin']):

            ?>

        <form  method="post">
            <label for="username">UserName</label>
            <input type="text" name='username' id="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type="submit" class="button-primary" name="submit">Log In</button>
        </form>
        <?php
        else:
        ?>
            <form  method="post" action="auth.php">
                <input type="hidden" name="logout" value="1">

            <button type="submit" class="button-primary" name="submit">Log out</button>
        </form>

        <?php
        endif;
        ?>
    </div>
</div>
</div>
</body>



