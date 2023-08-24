<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Add Medical Visit</title>
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/HranireSomn.css">
    <link rel="stylesheet" href="../Css/Buttons.css">
    <link rel="stylesheet" href="../Css/Formular.css">
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
    <form class="FormularInput" action = "AddMedicalVisit-require.php" method = "post">
        
        <div class = "input">
            <input placeholder="Visit summary" class="inputField" type="text" id="med" name="med" />
        </div>
        <div class="buttons">
            <button class="hero-buttons" name="addVisit" type = "submit" id = "sub" >Add Medical Visit</button>
        
    </form>
    <button class="hero-buttons" formaction="../MedicalHistory/MedicalHistory-require.php" name="backToMeal" type = "submit" id = "sub" >Back to Medical History</button>

</body>