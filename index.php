<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
</head>
<body>
    <h1>Top secret site</h1>
    <h2>Login</h2>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        username: <br>
        <input type="text" name="username"><br>
        password: <br>
        <input type="text" name="password"><br>
        <input type="submit" name="login" value="login">
    </form>
    <a href="register.php">Register</a>
</body>
</html>
<?php
    session_start();
    include("database.php");

    // Login logic
    if($_SERVER["REQUEST_METHOD"] == "POST" && $security_count < 3) {

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        // Access DB and compare if the hash from our password is the same in the DB
        if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($password) && !empty($username)) {
            $sql = "SELECT * 
                    FROM users 
                    WHERE user = '{$username}'";
            try {
                $result = mysqli_query($conn, $sql);
                // If there are results, proceed further
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    if(password_verify($password, $row["password"])) {
                        $_SESSION["username"] = $row["user"];
                        echo "You are logged in!";
                        header("Location: home.php");
                        
                    } else {
                        // If the password is incorrect
                        echo "Thats the wrong password/username.";
                    }

                } else {
                    // if the username is not found in the database
                    echo "Username not found. Please try again.";
                }
            } 
            catch(mysqli_sql_exception) {
                //  if the sql query fails
                echo "Invalid username/password combination. Please try again.";
                
            }
        }
        else {
            // if the user types in an invalid username/password
            echo "Invalid username/password <br>";
        }
    }
    mysqli_close($conn);
?>
<?php
    // Cookies practice
    // if(isset($_POST["login"])) {
        // if(empty($email)) {
        //     echo "That email wasn't valid";
        // }
        // else {
        //     echo "Your email is: {$email}";
        //     setcookie("fav_food", "pizza", time() + (86400 * 2), "/");
        //     setcookie("fav_drink", "coffee", time() + (86400 * 3), "/");
        //     setcookie("fav_dessert", "ice cream", time() + (86400 * 4), "/");

            // foreach($_COOKIE as $key => $value) {
            //     echo "{$key} = {$value} <br>";
            // }
        // }

        // if(isset($_COOKIE["fave_food"])) {
        //     echo "BUY SOME {$_COOKIE["fav_food"]} !!!";
        // } else {
        //     echo "I don't know your favourite food";
        // }
    // }
?>