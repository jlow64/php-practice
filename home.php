<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Homepage</h1>
    <p>Welcome to the home page <?php echo $_SESSION["username"]?>.</p>
    <form action="home.php" method="post">
        <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>

<?php
    // echo $_SESSION["username"] . "<br>";
    // echo $_SESSION["password"] . "<br>";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        session_destroy();
        header("Location: index.php");
    }
?>