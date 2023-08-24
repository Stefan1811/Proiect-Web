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
         <li> <a href="../Utils/rss.xml" target="_blank">Rss</a></li>  
        </ul>
    </div>
</nav>
<div class="textformat">
    <h1>Parent Menu</h1>
    <form class="FormularInput" method = "post">
            <div class="buttons">
                <button class=" hero-buttons"  id = "sub" formaction="../AllChildren/AllChildren.php"> My Children </button>
            </div>
            <div class="buttons">
                <button id= "AddKid" class="hero-buttons" formaction="../childAdaugare/childAdaugare.php"  >Add Child</button>
            </div>
            <div class="buttons">
                <button class="hero-buttons" formaction="../ChildMain/childMain.php"> Create Child Account</button>
            </div>
            <div class="buttons">
               <button class="hero-buttons" name = "changePass" type = "submit" id = "sub" value = "changePass" >Change Password</button>
            </div>
            <div class="buttons">
                <button class="hero-buttons" name = "delete" value = "delete"  type = "submit" id = "sub"  >Delete Account</button>
            </div>
            <div class="buttons">
               <button class="hero-buttons" name = "logOut" type = "submit" id = "sub" value = "logOut" >Log out</button>
            </div>
    </form>
</div>
</body>
</html>