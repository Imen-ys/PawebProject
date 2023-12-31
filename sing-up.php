<?php
    include 'connexion.php';
    ini_set('display_errors', 'on');
    //pour reserver les variables
    $nom =      $_POST['nom'];
    $prenom =   $_POST['prenom'];
    $matricule = $_POST['matricule'];
    $email	 =     $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    //la condition ida drna onclice 3la submite yafichi
    if(isset($_POST['submit'])){

    $nom       = mysqli_real_escape_string($conn,$_POST['nom']);
    $prenom    = mysqli_real_escape_string($conn,$_POST['prenom']);
    $matricule = mysqli_real_escape_string($conn,$_POST['matricule']);
    $email	   = mysqli_real_escape_string($conn,$_POST['email']);
    $motdepasse= mysqli_real_escape_string($conn,$_POST['motdepasse']);

    $sql = "INSERT INTO `etudiant`(`Nom` , `Prenom` , `Email`, `Password`, `Matricule`, `Commentaire`, `Cour`) VALUES('$nom','$prenom','$email','$motdepasse','$matricule',' ',' ' )";
    if (empty($_POST["nom"])) {
        die("Le nom est vide");
    }
    if (empty($_POST["prenom"])) {
        die("Le prenom est vide");
    }
    if (strlen($_POST["motdepasse"]) < 8) {
        die("Le mot de passe doit contenir au moins 8 caracteres");
    }
    if (! preg_match("/[a-z]/i",$_POST["motdepasse"])) {
        die("Le mot de passe doit contenir au mois un caractere");
    }
    if (! preg_match("/[0-9]/",$_POST["motdepasse"])) {
        die("Le mot de passe doit contenir au mois un nombre");
    }
    if ($_POST["motdepasse"] !== $_POST["password_confirmation"]) {
        die("Le mot de passe doit correspondre");
    }
    if(mysqli_query($conn,$sql)){
        //bach n7adto la page
        header('Location: index.html');
    }else{
    echo 'Error' .  mysqli_error($conn);
    }
    header('Location:  etudiant.html');
    } 
?>

