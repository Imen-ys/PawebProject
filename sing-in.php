<?php
  include ("connexion.php");
  ini_set('display_errors', 'on');
  session_start();
  if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['motdepasse'];

    $sql ="SELECT *  from etudiant where Email = '$email' and password = '$password'" ;
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      if ( $email == "yousriimen@gamil.com" ) {
        header('Location:  ens.html');
      }else
      header('Location:   etudiant.html');

    }else{
      echo '<script>
      window.location.href = "sing-in.html";
      alert("Login faild. Invalid email or password !!!")
      </script>';
    }
  }
?>