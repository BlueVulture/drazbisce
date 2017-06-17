<?php
include_once 'session.php';
include_once 'database.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

if (!empty($user) && !empty($pass))
{
    $pass = sha1($pass);
    $query = sprintf("SELECT * FROM uporabniki
                      WHERE upor_ime='%s' AND pass ='%s'",
                      mysqli_real_escape_string($conn, $user),
                      mysqli_real_escape_string($conn, $pass));

    $result = mysqli_query($conn, $query);
    var_dump($user);
    var_dump($pass);
    var_dump($result);
    if (mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("location: index.php");
        die();
    }
    else
    {
        $_SESSION['notice'] = "Napačno uporabniško ime ali geslo";
        //header("location: login.php");
        die();
    }
}
else
{
    header("location: login.php");
    die();
}

?>
