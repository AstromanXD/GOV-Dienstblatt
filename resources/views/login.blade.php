<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){


    $user_email = $_POST["user_email"];
    $site = "Dashboard";
    $user_password = $_POST["user_password"];

    $sql = "SELECT * FROM user WHERE user_email = '$user_email' LIMIT 1";
    $result = $connection->query($sql);

    $newhashedpass = password_hash($user_password, PASSWORD_DEFAULT);

    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        $hashedPassword = $user["user_password"];
        if(
            hash('sha256', $user_password) === $hashedPassword){
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["user_name"] = $user["user_name"];
            $_SESSION["user_email"] = $user["user_email"];
            $_SESSION["user_password"] = $user["user_password"];
            $_SESSION["user_rank"] = $user["user_rank"];
            $_SESSION["user_rank_name"] = $user["user_rank_name"];
            $_SESSION["user_job"] = $user["user_job"];
            $_SESSION["user_image"] = $user["user_image"];
            $_SESSION["current_webseite"] = $site;
            $user_id = $_SESSION["user_id"];
            $newsql = "UPDATE user " .
                "SET logged_in = 'yes' " . // Hinzugefügtes Leerzeichen
                "WHERE user_id = $user_id";
            $result = $connection->query($newsql);
            header("Location: index.php");
            exit();
        } else {
            $error = "Ungültiges Passwort!";
        }
    } else {
        $error = "Account nicht gefunden!";
    }

}



?>

    <!DOCTYPE html>
<html lang="en">
<link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
<link type="text/css" rel="stylesheet" id="dark-mode-general-link">
<style lang="en" type="text/css" id="dark-mode-custom-style"></style>
<style lang="en" type="text/css" id="dark-mode-native-style"></style>
<style lang="en" type="text/css" id="dark-mode-native-sheet"></style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="usings/css/index.css">
    <title>GOV Login</title>
</head>
<body style="background-color: rgb(58, 63, 72)">


<div class="wrapper_eklogin">
    <div class="login-page">
        <div class="form">
            <?php if(isset($error)){
                echo "<p class='cmstitel' style=color: red;>$error</p>";
            } ?>
            <div class="cmstitel">Government</div>
            <div class="cmssubtitle">Login</div>
            <form method="POST" class="login-form">
                <input type="email" id="user_email" name="user_email" placeholder="E-Mail">
                <input type="password" id="user_password" name="user_password" placeholder="Passwort">
                <input class="login-submit" type="submit" value="Einloggen">
                <div class="form-check" style="margin-top:1vh;">
                    <input class="form-check-input" style="margin-top: 0.5vh;" type="checkbox" value="" id="flexCheckChecked" name="angemeldet_bleiben" checked="">
                    <label class="form-check-label" style="float:left; font-size:12px;margin-top: 0.6vh; margin-left:0.5vh;" for="flexCheckChecked"> Angemeldet bleiben</label>
                </div>
                <div class="clear">	</div>

            </form>
            <div class="errormsg">
            </div>
        </div>
    </div>
</div>

</body>
</html>
