<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toutes les catégories de colotte </title>
    <link rel="stylesheet" href="../css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

<?php
require("connexionbd.php");

try
{
   $options=
   [
	  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	  PDO::ATTR_EMULATE_PREPARES=>false //ne pas émuler les requetes préparées
   ];
   
	$PDO= new PDO($DB_DSN,$DB_USER,$DB_PASS, $options);
    
	
  
	/*$sql1='SELECT * FROM image';
  $request = $PDO->prepare($sql1);
	$request->execute();
	
	$categories=$request->fetchAll(PDO::FETCH_ASSOC);
	foreach($categories as $infoimages) {
    echo '<img src="../'. $infoimages['chemin_image'] .'" />';
    echo  '<p>'. $infoimages['id_article']. '</p>';
  }*/

  /** 
   * requête pour afficher les images de toutes les categories avec
   * nom + prix + couleur
   */ 
 /* $sql1='SELECT * FROM image, article WHERE image.id_article=article.id_article';
  $request1 = $PDO->prepare($sql1);
	$request1->execute();
	
	$categories=$request1->fetchAll(PDO::FETCH_ASSOC);
	foreach($categories as $infoimages) {
    echo '<img src="../'. $infoimages['chemin_image'] .'" />';
    echo  '<p>'. $infoimages['nom']. '</p>';
    echo  '<p>'. $infoimages['prix']. '€ </p>';
    echo '<p>'. $infoimages['couleur']. '</p>';
  }*/


/**
 * requête pour afficher le nombre d'images au total
 */

 
  // $sql2='SELECT COUNT(image.id_image) FROM image WHERE (image.id_article % 2)= ?';
  // $request2= $PDO->prepare($sql2);
  // $request2->bindValue(1,1);
  // $request2->execute();

  // echo '<pre>';
  //    print_r($request2->fetch(PDO::FETCH_ASSOC));
  // echo '</pre>';

  /**
   * requête pour afficher les categories pour la page 1 de categorie.php 
   */
  
  $sql3='SELECT * FROM image,article WHERE  image.id_article=article.id_article and article.id_article % 2 =? and image.num_rv=?';
  $request3 = $PDO->prepare($sql3);

  $request3->bindValue(1,1);
  $request3->bindValue(2,1);

  $request3->execute();

  echo '<div id="global" width=100% text-align="center">';
  echo '<table bordure="1" >';
      for ($j=0; $j<2;$j++) {
         echo '<tr>';

         for($i=0; $i<3; $i++) {
            $categories=$request3->fetch(PDO::FETCH_ASSOC);
     
             echo '<td align="center" valign="middle">';
                echo '<img src="../'. $categories['chemin_image'] .'" alt= "'.$categories['nom'].'" title="'.$categories['nom'].' Cliquez pour en savoir plus! "  height="250" width="250" />';
                echo  '<p> <B>'. $categories['nom']. ' </B> </p>';
                echo  '<p> <B>'. $categories['prix']. '€ </B> </p>';
                echo '<p>'. $categories['couleur']. '</p>';
            echo '</td>';
  
          }
            
        echo '</tr>';
      }
  
  
  echo '</table>';
  echo '</div>';


   


      



}
catch (PDOException $pe)
{
	echo 'ERREUR:' .$pe->getMessage();
}

?>









  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>  
</body>
</html>