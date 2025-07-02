<?php 

$username = "root";
$servername ="127.0.0.1";
$password = "";
$dbname = "immo_web" ;

$conn = new mysqli($servername , $username , $password , $dbname);

if($conn->connect_error){
    die("erreur de connexion :" . $conn->connect_error);

} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO inscription (nom, prenom, date, telephone , email, password) VALUES ('$nom','$prenom','$date','$telephone','$email','$password')";
    if($conn->query($sql) === TRUE) {
        header("Location: index.html?message=yes");
        exit();
    } else {
       header("Location: index.html?message=no");
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
      
      <h1><strong>Inscription</strong></h1>
      <form action="" method="post">
        <div class="form-group">
          <input type="text" name="prenom" placeholder="Entrer votre Prénom..." required>
          <input type="text" name="nom" placeholder="Entrer votre nom..." required>
        </div>
        <div class="form-group">
          <input type="date" name="date" placeholder="Entrer votre date de naissance" required>
           <input type="tel" name="telephone" placeholder="Entrer votre numero de téléphone" required>
         
        </div>
         <div class="form-group">
         <input type="email" name="email" placeholder="Entrer votre email..." required>
         <input type="password" name="password" placeholder="Entrer votre numero mot de passe" required>
         </div>
        
        <button type="submit">Envoyer</button>
        </form>
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