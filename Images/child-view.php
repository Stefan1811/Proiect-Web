<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Webpage">
    <title>Login page</title>
    <link rel="stylesheet" href="../Css/Navbar.css">
    <link rel="stylesheet" href="../Css/Formular.css">
    <link rel="stylesheet" href="Image.css">
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
<h1 class="textlogin">Child's Pictures</h1>
<br><br><br><br><br><br>
<div class="FilePicker">
<form action="Images.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input class="FPB" type="file" accept="image/png" name="fileToUpload" id="fileToUpload">
  <input class="FPB" type="submit" value="Upload Image" name="submit">
  <?php
  echo '<form method = "post">';
  if ($favs == 0)
    echo '<input class = \'FPB\'type="submit" value="Timeline" name="favs">';
  if ($notfavs == 0)
    echo '<input class = \'FPB\'type="submit" value="Not Timeline" name="notfavs">';
  echo'</form>';
  ?>
 
</form>
</div>
<form class="FormularInput" method = "post">
    <button class="hero-buttons " formaction="../AfisareDetaliiCopil/Afisare.php" name="" type = "submit" id = "sub" >Back to Child Menu</button>
    </form>

<?php
foreach($imgs as $image) {

  $location = "../UserData/".$image['imagePath'];
  echo '<div class="itemsDiv">';
  echo '<img class="UserImage" src='.$location.' /><br />';
  echo '<p>'.$image['imageName'].'</p>';
 
  $withoutExt = preg_replace('/\.\w+$/', '', $image['imageName']);
  if ($favs == 0){
  echo '<div class= "buttons">';
  echo '<form method = "post">';
  if ($image['timeline'] == 0)
      echo '<button class=\'buttonThing\' name=b'.$withoutExt.' value =b'.$withoutExt.'> Timeline </button>'; 
    else
      echo '<button class=\'buttonThingFav\' name=b'.$withoutExt.' value =b'.$withoutExt.'> Timeline </button>';
  echo '</form>';
  echo '<form method = "post">';
  echo '<button class=\'buttonThing\' name=delete'.$withoutExt.' value =delete'.$withoutExt.'"> Delete </button>'; 
  echo '</form>';
  echo '</div>';
  }
  echo '</div>';
}
?>


</body>
</html>
