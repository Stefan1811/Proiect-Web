<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Login page</title>
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Formular.css">
    <link rel="stylesheet" href="../Css/Buttons.css">
  </head>
<body>

<nav class = "navbar">
    <div class="containerTop">
        <div class="pageName">BabyMonitor</div>
        <ul class="navButtons">
        <li> <a href="../ParentMain/parentMain.php">Homepage</a></li>   
         <li> <a href="../Login/Login.php">Login</a></li> 
         <li> <a href="../CreareCont/CreareCont.php">Create an account</a></li>
         <li> <a href="../Ajutor/Ajutor.html">Help/Tips</a></li>   
        </ul>
    </div>
</nav>
<h1 class="textlogin">Child Info's</h1>
<form class="FormularInput" method = "post">
<?php
   
	foreach ($childDetails as $row) {
        
        echo (
     
            "<div class=\"buttons\"><p class=\"hero-buttons-again\">Last Name: " .$row['lastName']. "</p></div>"
        
        );
        echo (
     
            "<div class=\"buttons\"><p class=\"hero-buttons-again\">First Name: " .$row['firstName']. "</p></div>"
     
     );
        echo( 
            "<div class=\"buttons\"><p class=\"hero-buttons-again\">Sex: " .$row['sex']. "</p></div>"   
            );
         echo(   
            "<div class=\"buttons\"><p class=\"hero-buttons-again\">Birth Date: " .$row['dateOfBirth']. "</p></div>"   
         );
        echo(
            "<div class=\"buttons\"><p class=\"hero-buttons-again\">Weight(kg): " .$row['weight']. "</p></div>"
            );
        echo(
            "<div class=\"buttons\"><p class=\"hero-buttons-again\">Height(cm): " .$row['height']. "</p></div>"
            );
        
    }
	
?>
    <button class="hero-buttons CenterInfo" formaction="../AfisareDetaliiCopil/Afisare.php" name="" type = "submit" id = "sub" >Back to Child Menu</button>
    </form>


</body>
</html>