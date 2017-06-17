<?php
include_once 'session.php';
include_once 'database.php';

$username = $_POST['user'];
$pass = $_POST['pass'];

if (!empty($username) && !empty($pass))
{
    $pass = sha1($pass);
    $query = sprintf("SELECT id, upor_ime FROM uporabniki
                      WHERE upor_ime='%s' AND geslo ='%s'",
                      mysqli_real_escape_string($conn, $username),
                      mysqli_real_escape_string($conn, $pass));

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1)
    {
        $user = mysqli_fetch_array($result);
        // var_dump($user['id']);
        $_SESSION['user_id'] = $user['id'];
        //var_dump($_SESSION['user_id']);
        $_SESSION['username'] = $user['upor_ime'];
        header("location: index.php");
        die();
    }
    else
    {
        $_SESSION['notice'] = "Napačno uporabniško ime ali geslo";
        header("location: login.php");
        die();
    }
}
else
{
    header("location: login.php");
    die();
}

?>
