<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Add Sleep</title>
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Formular.css">
    <link rel="stylesheet" href="../Css/HranireSomn.css">
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
    <form class="FormularInput" action = "AddSomn-require.php" method = "post">
        
        <div class = "input">
            <input placeholder="Number of hours slept" class="inputField" type="text" id="somn" name="somn" />
        </div>
        <div class="buttons">
            <button class="hero-buttons" name="addSomn" type = "submit" id = "sub" >Add Sleep</button>
    </form>
    <button class="hero-buttons" formaction="../Somn/Somn-require.php" name="" type = "submit" id = "sub" >Back to Sleep History</button>
</body>