<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Sleep History</title>
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
<h1 class="textlogin">Sleep History</h1>
<form class="FormularInput CenterInfo" method = "post">
<?php
  
       echo "<table>";
       
       // Table header
       echo "<tr>";
       echo "<th>Number of hours slept</th>";
       echo "<th>Data</th>";
       echo "</tr>";
       
       // Table rows
       foreach ($childDetails as $row) {
           echo "<tr>";
           echo "<td>" . $row['numarOreSomn'] . "</td>";
           echo "<td>" . $row['dataSomn'] . "</td>";
           echo "</tr>";
       }
       
       // End the table
       echo "</table>";
	
?>
    <div class="buttons">
            <button class="hero-buttons" formaction="../AddSomn/AddSomn-require.php">Add sleep</button>
    </div>
    <button class="hero-buttons CenterInfo" formaction="../AfisareDetaliiCopil/Afisare.php" name="" type = "submit" id = "sub" >Back to Child Menu</button>
    </form>


</body>
</html>