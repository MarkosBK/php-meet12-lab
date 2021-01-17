<?php
include_once("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="mx-auto" style="max-width: 400px;">
        <?php
        if (!isset($_POST["regBtn"])) {
        ?>
        <form action="lab.php" method="POST" class="mt-5">
            <h2 align='center'>Registration</h2>
            <div class="form-group">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" placeholder="Enter login">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" placeholder="Enter password">
            </div>
            <div class="form-group">
                <label for="passConf">Confirm password</label>
                <input type="password" name="passConf" class="form-control" placeholder="Enter password again">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <input type="submit" class="btn btn-primary container-fluid" name="regBtn" value="Register">
        </form>
        <?php
        } else {
            $newUser = new User($_POST["login"], $_POST["pass"], $_POST["email"]);
            if ($newUser->register()) {
            }
            echo "<script>";
            echo "window.location=document.URL;";
            echo "</script>";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>