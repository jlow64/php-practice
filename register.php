<?php 
    session_start();
    include("database.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        // If the inputs are not empty and if the username/passwords are valid/sanitized
        if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($password) && !empty($username)) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password) VALUES('{$username}', '{$hash_password}')";
            try {
                mysqli_query($conn, $sql);
                echo "You are registered {$username}!";
                header("Location: index.php");   
            }
            catch(mysqli_sql_exception) {
                echo "Could not register user. Maybe try a different username.";
            }      
        } 
        else {
            echo "Invalid username/password. Please try again. <br>";
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label>username:</label><br>
        <input type="text" name="username"><br>
        <label>password:</label><br>
        <input type="text" name="password"><br>
        <input type="submit" value="register" name="register">
    </form>
    <a href="index.php">Back</a>
</body>
</html>