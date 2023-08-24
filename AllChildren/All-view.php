<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Copii</title>
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
<h1 class="textlogin">Children Managemnt</h1>
<form class="FormularInput" method = "post">
    <?php
    
	foreach($allKids as $kid) {
		echo (
            '<div class="buttons">
                <button class="hero-buttons" " name ='.$kid['uuid'].'>'.$kid['firstName']." ".$kid['lastName']  .'</button>
            </div>'

        );
	}
	
?>
     <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../ParentMain/parentMain.php"  >Back to Parent Menu</button>
    </div>
    </form>


</body>
</html>