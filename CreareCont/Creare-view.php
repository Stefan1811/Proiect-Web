<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Login page</title>
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Formular.css">
    <link rel="stylesheet" href="CreareCont.css">
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
<div class="ServerRespose">
    <?php
    if (isset($response) && $response != 0)
        echo $response;
    ?>
</div>
<h1 class="textlogin">Create Account</h1>
<form class="FormularInput" action = "CreareCont.php" method = "post">
        
        <div class = "input">
            <input placeholder="  E-mail" class="inputField" type="text" id="email" name="email" />
        </div>
        <div class = "input">
            <input placeholder="  Password" class="inputField" type="password" id="password" name="password" />
        </div>
        <div class = "input">
            <input placeholder="  Repeat Password" class="inputField" type="password" id="password1" name="password1" />
        </div>
        <div class = "input">
            <input placeholder="  First Name"class="inputField" type="text" id="name" name="firstName" />
        </div>
        <div class = "input">
            <input placeholder="  Last Name" class="inputField" type="text" id="surname" name="lastName" />
        </div>
        <div class="buttons">
            <button class="hero-buttons" name="create" type = "submit" id = "sub" >Create account</button>
            <button class="hero-buttons" type = "submit" id = "reset" >Problems</button>
        </div>
        <?php
            if ($error != "All fields are empty")
                echo $error ;
            ?>
    
    </form>
    
</body>