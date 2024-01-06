<?php

  include("connextion.php");
  ini_set('display_errors', 'on');
  session_start();
  if (isset($_POST['login'])) {
    setcookie('email',$email,time()+3600,'/');

    $email = $_POST['email'];
    $password = $_POST['motdepasse'];

    $sql = "SELECT * FROM etudiants WHERE Email = '$email' AND password = '$password'";
    $sql2 = "SELECT * FROM enseignant WHERE e_mail = '$email' AND MotDePasse = '$password'";

    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
    $count2 = mysqli_num_rows($result2);

    if ($count == 1) {
      if ($email == "yousriimen@gmail.com") {
        header('Location: admin.html');
        exit();
      }else
      header('Location: etudiant.html ');
      exit();
    }elseif ( $count2 == 1) {
      header('Location: ens.html ');
      exit();
    }
    else {
      echo '<script>
      window.location.href = "sing-in.html";
      alert("Login failed. Invalid email or password !!!");
      </script>';
      exit();
    }
  }

?>