<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Friendships</title>
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Formular.css">
    <link rel="stylesheet" href="../Css/Buttons.css">
  </head>
<body>
<nav class = "navbar">
    <div class="containerTop">
        <div class="pageName">BabyMonitor</div>
        <ul class="navButtons">
         <li> <a href="../ParentMain/parentMain.php">Pagina Principala</a></li>   
         <li> <a href="../Login/Login.php">Conectare</a></li> 
         <li> <a href="../CreareCont/CreareCont.php">Creare cont</a></li>
         <li> <a href="../Ajutor/Ajutor.html">Ajutor/Tips</a></li>  
        </ul>
    </div>
</nav>
<div class="ServerRespose">
    <?php
    if (isset($response) && $response != 0)
        echo $response;
    ?>
</div>
<h1 class="textlogin">Add A Friend</h1>
    <form class="FormularInput" action = "Add.php" method = "post">
        
        <div class = "input">
            <input placeholder="  FirstName" class="inputField" type="text" id="fname" name="fname" />
        </div>
        <div class = "input">
            <input placeholder="  LastName" class="inputField" type="text" id="lname" name="lname" />
        </div>
        <div class = "input">
            <p class="inputField">Relatie:</p>
           
            <input type="radio" name="relatie" value="Verisori">Verisori
            <input type="radio" name="relatie" value="Colegi Scoala">Colegi Scoala
            <input type="radio" name="relatie" value="Cunostinte">Cunostinte
        </div>
        </div>
        <div class="buttons">
            <button class="hero-buttons" name="addFriend" type = "submit" id = "sub" >Add Friend</button>
        </div>
        <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../Friends/ShowFriends.php"  >Back to Friend List</button>
    </div>
    </form>
</body>