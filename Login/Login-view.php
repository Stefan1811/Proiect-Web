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

    <h1 class="textlogin">Login</h1>
    <form class="FormularInput" method = "post">
        <div class = "input">
            <input placeholder="  E-mail" class="inputField" type="text" id="name" name="user_name" />
        </div>
        <div class = "input">
            <input placeholder="  Password" class="inputField" type="password" id="password" name="pass" />
        </div>
        <div class="buttons">
            <button class="hero-buttons" name = "login" type = "submit" id = "sub" value = "login" >Log in</button>
            <button class="hero-buttons" formaction="../CreareCont/CreareCont.php">Create account</button>
        </div>
    </form>

        <div class = "Error message">
        <?php
        $matchFound = (isset($_GET["error"]) && trim($_GET["error"]) == 'yes');
        if ($matchFound):?>
            <p>Account Name or password does not match</p>
        <?php endif ?>
        </div>

</body>
</html>