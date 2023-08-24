<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Account</title>
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
<div class="ServerRespose">
    <?php
    if (isset($response) && $response != 0)
        echo $response; 
    ?>
</div>
    <h1 class="textlogin">Change Password</h1>
    <form class="FormularInput" action = "ChangePasswordParent.php" method = "post">
        
        <div class = "input">
            <input placeholder="  E-mail" class="inputField" type="text" id="email" name="email" />
        </div>
        <div class = "input">
            <input placeholder="  Password" class="inputField" type="password" id="password" name="password" />
        </div>
        <div class = "input">
            <input placeholder="  New Password" class="inputField" type="password" id="passwordNew" name="passwordNew" />
        </div>
        <div class = "input">
            <input placeholder="  Repeat New Password"class="inputField" type="password" id="passwordNew1" name="passwordNew1" />
        </div>
            <button class="hero-buttons" name="change" type = "submit" id = "sub" value = "change">Change Pasword</button>
        </div>
        <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../ParentMain/ParentMain.php"  >Back to Parent Menu</button>
    </div>
    </form>
</body>