<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Detalii Copil</title>
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
<h1 class="textlogin">Child Menu</h1>
    <form class="FormularInput" method = "post">
            <div class="buttons">
                <button class="hero-buttons"  id = "sub" formaction="../ChildInfo/ChildInfo.php" >Show Child Details</button>
            </div>
            <div class="buttons">
                <button class="hero-buttons"  id = "sub" formaction="../Friends/ShowFriends.php" >Show Friends</button>
            </div>
            <div class="buttons">
                <button id= "MedHist" class="hero-buttons" formaction="../MedicalHistory/MedicalHistory-require.php" >Medical History</button>
            </div>
            <div class="buttons">
                <button class="hero-buttons" id = "sub" formaction="../Somn/Somn-require.php">Sleeping Hours</button>
            </div>
            <div class="buttons">
               <button class="hero-buttons" id = "sub" formaction="../Hranire/Hranire-require.php"  >Meals Schedule</button>
            </div>
            <div class="buttons">
               <button class="hero-buttons" id = "sub" formaction="../childInfoChange/childInfoChange.php"  >Modify Child Info's</button>
            </div>
            <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../Images/Images.php"  >Pictures</button>
            </div>
            <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../ChildDelete/childDelete.php"  >Delete Child</button>
            </div>
            <div class="buttons">
               <button class="hero-buttons"  id = "sub" formaction="../AllChildren/AllChildren.php"  >Back to Children List</button>
            </div>
    </form>
</body>
</html>