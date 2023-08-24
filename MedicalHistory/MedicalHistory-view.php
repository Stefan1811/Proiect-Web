<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Medical History</title>
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
<h1 class="textlogin">Medical History</h1>
<form class="FormularInput CentralInfo" method = "post">
<?php
  
       echo "<table>";
       
       // Table header
       echo "<tr>";
       echo "<th>Visit summary</th>";
       echo "<th>Data of visit</th>";
       echo "</tr>";
       
       // Table rows
       foreach ($childDetails as $row) {
           echo "<tr>";
           echo "<td>" . $row['visitDescription'] . "</td>";
           echo "<td>" . $row['dataInsert'] . "</td>";
           echo "</tr>";
       }
       
       // End the table
       echo "</table>";
	
?>
    <div class="buttons">
            <button class="hero-buttons" formaction="../AddMedicalVisit/AddMedicalVisit-require.php">Add medical visit</button>
    </div>
    <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../AfisareDetaliiCopil/Afisare.php"  >Back to Child Menu</button>
    </div>
    </form>


</body>
</html>