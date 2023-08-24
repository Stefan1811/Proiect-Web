<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>CreateChildAccount</title>
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
<h1 class="textlogin">Create Child</h1>
    <form class="FormularInput" action = "childMain.php" method = "post">
        
        <div class = "input">
            <input placeholder="  FirstName" class="inputField" type="text" id="fname" name="fname" />
        </div>
        <div class = "input">
            <input placeholder="  LastName" class="inputField" type="text" id="lname" name="lname" />
        </div>
        <div class = "input">
            <input placeholder="  Password" class="inputField" type="password" id="password" name="password" />
        </div>
        <div class = "input">
            <input placeholder="  Date of Birth" class="inputField" type="date" id="date" name="date" />
        </div>
        <div class = "inputt">
            <p class="para">Sex:</p>
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
        </div>
        <div class = "input">
            <input placeholder="  Weight(kg)" class="inputField" type="text" id="weight" name="weight" />
        </div>
        <div class = "input">
            <input placeholder="  Height(cm)" class="inputField" type="text" id="height" name="height" />
        </div>
        <div class="buttons">
            <button class="hero-buttons" name="create" type = "submit" id = "sub" >Create Child</button>
            <button class="hero-buttons" type = "submit" id = "reset" >Problems</button>
        </div>
        <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../ParentMain/ParentMain.php"  >Back to Parent Menu</button>
    </div>
    </form>
</body>