<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Friendships</title>
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
<h1 class="textlogin">Friend List</h1>
<form class="FormularInput" method = "post">
<?php
  
       echo "<table>";
       
      
       echo "<tr>";
       echo "<th>First Name</th>";
       echo "<th>Last Name</th>";
       echo "<th>Relatie de prietenie</th>";
       echo "</tr>";
       
 
       foreach ($childDetails as $row) {
           echo "<tr>";
           echo "<td>" . $row['firstName'] . "</td>";
           echo "<td>" . $row['lastName'] . "</td>";
           echo "<td>" . $row['relatie'] . "</td>";
           echo "</tr>";
       }
       
     
       echo "</table>";
	
?>
    <div class="buttons">
            <button class="hero-buttons" formaction="../AddFriend/Add.php">Add New Friend</button>
    </div>
    <button class="hero-buttons CenterInfo" formaction="../AfisareDetaliiCopil/Afisare.php" name="" type = "submit" id = "sub" >Back to Child Menu</button>
    </form>


</body>
</html>