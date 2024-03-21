<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="logic.php" method="post">
        <label>username: </label>
        <input type="text" name="username"><br>
        <label>password: </label>
        <input type="text" name="password"><br>
        <input type="submit" name="login" value="Log in">
    </form>
</body>
</html>
<?php
    // $hours = 40;
    // $rate = 15;
    // $weekly_pay = null;

    // if($hours <= 4) {
    //     $weekly_pay = $hours * $rate;
    // } else if ($hours <= 40) {
    //     $weekly_pay = $hours * $rate;
    // } else {
    //     $weekly_pay = ($rate * 40) + (($hours - 40) * ($rate * 1.5));
    // }

    // echo "You made \${$weekly_pay} this week";

    if(isset($_POST["login"])) {
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($username)) {
            echo "Username is missing";
        } else {
            echo "Hello {$username}";
        }
    }


?>