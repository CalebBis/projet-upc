<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "immo_web";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $conn->real_escape_string($_POST["email"]);
        $password = $conn->real_escape_string($_POST["password"]);

        $sql = "SELECT * FROM inscription WHERE email='$email' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            echo "Connexion réussie";
        } else {
            echo "Email ou mot de passe incorrect";
        }
    } else {
        echo "Champs manquants dans le formulaire.";
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Projet upc | 🍔</title>

   <!-- Internal Links -->
   <link rel="stylesheet" href="style.css">
   

   <!-- External Links -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous" />
</head>

<body id="home">
   <header class="hero">
      <nav class="navbar">
         <h1 class="logo">
            <a href="#">Ndaku Immo</a>
         </h1>
         <div>
            <!-- --------------------------------------
            -------- Hamburger Links ------------
            --------------------------------------- -->
            <ul class="nav-menu">
               <li class="nav-item"><a href="#home" class="nav-link">Acceuil</a></li>
               <li class="nav-item"><a href="#about" class="nav-link">Apropos</a></li>
               <li class="nav-item"><a href="#contact" class="nav-link">A louer</a></li>
               <li class="nav-item"><a href="#services" class="nav-link">A vendre</a></li>
               <li class="nav-item"><a href="#services" class="nav-link">connexion</a></li>
            </ul>

            <!-- --------------------------------------
            ---------- Hamburger button ---------------
            --------------------------------------- -->
            <div class="hamburger">
               <span class="bar"></span>
               <span class="bar"></span>
               <span class="bar"></span>
            </div>
         </div>
      </nav>
   </header>
    
  <section class="contact-section">
    <div class="form-container">
      <h1><strong>Connexion</strong><span></span></h1>
      <form action="" method="post">
        <div class="form-group">
          <input type="email" name="email" placeholder="Entrer votre email..." required>
        </div>
        <div class="form-group">
          <input type="password" name="password" placeholder="Entrer le mot de passe" required>
        </div>
        <button type="submit">Envoyer</button>
      </form>
      <p>Pas de Compte?<a href="inscription.php" class="inscr">Inscrivez-vous </a></p>
    </div>
  </section>

   <script>
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach((n) => n.addEventListener("click", closeMenu));

function closeMenu() {
  hamburger.classList.remove("active");
  navMenu.classList.remove("active");
}


   </script>
</body>

</html>