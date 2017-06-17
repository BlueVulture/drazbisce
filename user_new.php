<?php
    require 'database.php';
    include_once 'session.php';

    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];


    if (!empty($username) && !empty($email) && !empty($pass1))
    {
      $query = sprintf("SELECT id FROM uporabniki WHERE email=%s OR upor_ime=%s",
                        mysqli_real_escape_string($conn, $email),
                        mysqli_real_escape_string($conn, $username));

      $result = mysqli_query($conn, $query);

      if($result==false)
      {
        if ($pass1 == $pass2)
        {
            $pass1 = sha1($pass1);

            $query = sprintf("INSERT INTO uporabniki(upor_ime, geslo, ime, priimek, email)
                              VALUES ('%s','%s','%s','%s','%s')",
                              mysqli_real_escape_string($conn, $username),
                              mysqli_real_escape_string($conn, $pass1),
                              mysqli_real_escape_string($conn, $first_name),
                              mysqli_real_escape_string($conn, $last_name),
                              mysqli_real_escape_string($conn, $email));

            if(!mysqli_query($conn, $query))
            {
              $_SESSION['notice'] = "Neuspešna registracija";
              header("Location: registration.php");
            }
            else
            {
              $query = sprintf("SELECT id, upor_ime FROM uporabniki WHERE email=%s AND upor_ime=%s",
                                mysqli_real_escape_string($conn, $email),
                                mysqli_real_escape_string($conn, $username));

              $result = mysqli_query($conn, $query);

              $user = mysqli_fetch_array($result);
              $_SESSION['user_id'] = $user['id'];
              $_SESSION['username'] = $user['username'];
              header("Location: index.php");
            }
        }
        else
        {
            $_SESSION['notice'] = "Gesli se ne ujemata";
            header("Location: registration.php");
        }
      }
      else
      {
        $_SESSION['notice'] = "Uporabnik s tem uporabniškem imenu ali emailu že obstaja";
        header("Location: registration.php");
      }
    }
    else
    {
        $_SESSION['notice'] = "Prosim izpolnite vsa polja";
        header("Location: registration.php");
    }
?>
