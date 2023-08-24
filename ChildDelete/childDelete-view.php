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
    <link rel="stylesheet" href="CreareCont.css">
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
<h1 class="textlogin">Delete Child</h1>
<div class="ServerRespose">
    <?php
    if (isset($response) && $response != 0)
        echo $response;
    ?>
</div>
    <form class="FormularInput" action = "childDelete.php" method = "post">
        
        <div class = "input">
            <input placeholder="  FirstName" class="inputField" type="text" id="fname" name="fname" />
        </div>
        <div class = "input">
            <input placeholder="  LastName" class="inputField" type="text" id="lname" name="lname" />
        </div>
        <div class = "input">
            <input placeholder="  Password" class="inputField" type="password" id="password" name="password" />
        </div>
        <div class="buttons">
            <button class="hero-buttons" name="delete" type = "submit" id = "sub" >Delete Child</button>
            
        </div>
        <button class="hero-buttons CenterInfo" formaction="../AfisareDetaliiCopil/Afisare.php" name="" type = "submit" id = "sub" >Back to Child Menu</button>
    </form>
</body>