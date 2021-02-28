<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>toutes les catégories de colotte </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" /> 
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
   * requête pour afficher la page 1 des articles de categorie.php 
   */
  
   function page1() {
   
    require("connexionbd.php");
    $PDO= new PDO($DB_DSN,$DB_USER,$DB_PASS, $options);
  

  $sql1='SELECT * FROM image,article WHERE  image.id_article=article.id_article and article.id_article % 2 =? and image.num_rv=?';
  $request1 = $PDO->prepare($sql1);

  $request1->bindValue(1,1);
  $request1->bindValue(2,1);

  $request1->execute();
  
   /**
   * requête pour afficher la page 2 des articles de categorie.php 
   */

  // $sql4='SELECT * FROM image,article WHERE  image.id_article=article.id_article and article.id_article % 2 =? and article.id_article > 12 and image.num_rv=?';
  // $request4 = $PDO->prepare($sql4);

  // $request4->bindValue(1,1);
  // $request4->bindValue(2,1);

  // $request4->execute();


  echo '<div style="display: flex; flex-direction: column;align-items: center;"/>';
   echo '<table border="0" style="width:500px;" >';
      for ($j=0; $j<2;$j++) {
         echo '<tr valign="middle">';

         for($i=0; $i<3; $i++) {
            $categories1=$request1->fetch(PDO::FETCH_ASSOC);
     
             echo '<td style="text-align:center;" valign="middle" >';
                  echo '<img src="../'. $categories1['chemin_image'] .'" alt= "'.$categories1['nom'].'" title="'.$categories1['nom'].' Cliquez pour en savoir plus! "  height="250" width="250" />';
                  echo  '<p> <B>'. $categories1['nom']. ' </B> </p>';
                  echo  '<p> <B>'. $categories1['prix']. '€ </B> </p>';
                  echo '<p>'. $categories1['couleur']. '</p>';
             echo '</td>';
  
          }
            
        echo '</tr>';
      }
  
  
   echo '</table>';
  echo '</div>';
    }

  /*
       lien pour aller à la page 2 des categories
  */
      // $nbpages= [1,2,3];
      // for ($i=0; $i<3; $i++){
      //   echo '<a href= "categorie.php?nbpages=' .$nbpages[$i]. '">'   .$nbpages[$i]. '  </a>';

      // }

  
      // // if ($_GET['nbpages'] == 2 ) {
      // //    page2();
      // // }

   function page2(){
    require("connexionbd.php");
 
    $PDO= new PDO($DB_DSN,$DB_USER,$DB_PASS, $options);
  
    $sql2='SELECT * FROM image,article WHERE  image.id_article=article.id_article and article.id_article % 2 =? and article.id_article > 12 and image.num_rv=?';
    $request2 = $PDO->prepare($sql2);

    $request2->bindValue(1,1);
    $request2->bindValue(2,1);

    $request2->execute();


      echo '<div style="display: flex; flex-direction: column;align-items: center;"/>';
      echo '<table border="0" style="width:500px;" >';
         for ($j=0; $j<2;$j++) {
            echo '<tr valign="middle">';
   
            for($i=0; $i<3; $i++) {
               $categories2=$request2->fetch(PDO::FETCH_ASSOC);
        
                echo '<td style="text-align:center;" valign="middle" >';
                     echo '<img src="../'. $categories2['chemin_image'] .'" alt= "'.$categories2['nom'].'" title="'.$categories2['nom'].' Cliquez pour en savoir plus! "  height="250" width="250" />';
                     echo  '<p> <B>'. $categories2['nom']. ' </B> </p>';
                     echo  '<p> <B>'. $categories2['prix']. '€ </B> </p>';
                     echo '<p>'. $categories2['couleur']. '</p>';
                echo '</td>';
     
             }
               
           echo '</tr>';
         }
     
     
      echo '</table>';
     echo '</div>';
   
     
    }

    function page3(){
      require("connexionbd.php");
   
      $PDO= new PDO($DB_DSN,$DB_USER,$DB_PASS, $options);
    
      $sql3='SELECT * FROM image,article WHERE  image.id_article=article.id_article and article.id_article % 2 =? and article.id_article > 23 and article.id_article != 27 and image.num_rv=?';
    $request3 = $PDO->prepare($sql3);
  
    $request3->bindValue(1,1);
    $request3->bindValue(2,1);
  
    $request3->execute();
  
    
      echo '<div style="display: flex; flex-direction: column;align-items: center;"/>';
        echo '<table border="0" style="width:500px;" >';
           for ($j=0; $j<1;$j++) {
              echo '<tr valign="middle">';
     
              for($i=0; $i<3; $i++) {
                 $categories3=$request3->fetch(PDO::FETCH_ASSOC);
          
                  echo '<td style="text-align:center;" valign="middle" >';
                       echo '<img src="../'. $categories3['chemin_image'] .'" alt= "'.$categories3['nom'].'" title="'.$categories3['nom'].' Cliquez pour en savoir plus! "  height="250" width="250"  />';
                       /*echo '<a href= "article.php?article=' .$categories3['nom']. '">'   .$categories3['chemin_image'].  '  </a>';*/
                       echo  '<p> <B>'. $categories3['nom']. ' </B> </p>';
                       echo  '<p> <B>'. $categories3['prix']. '€ </B> </p>';
                       echo '<p>'. $categories3['couleur']. '</p>';
                  echo '</td>';
       
               }
                 
             echo '</tr>';
           }
       
       
        echo '</table>';
      echo '</div>';


    }

    

    // $nbpages= [1,2,3];
    
    // for ($i=0; $i<3; $i++){
      
    //   echo '<a href= "categorie.php?nbpages=' .$nbpages[$i]. '">'   .$nbpages[$i].  '  </a>';
      
    // }
   
    $nbpages= [1,2,3];
?>
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center bg-light" >
         <?php for ($i=0; $i<3; $i++){
              echo '<li class="page-item"><a class="page-link" href= "categorie.php?nbpages=' .$nbpages[$i]. '">'   .$nbpages[$i]. '  </a></li>';
           }
        ?>
     </ul>
    </nav>

<?php
    if ($_GET['nbpages'] == 1) {
          page1();
    }
    else if ($_GET['nbpages'] == 2 ) {
          page2();
    }
    else if ($_GET['nbpages'] == 3) {
         page3();
    }
    else {
         page1();
    } 
        
   /* $nbpages= [1,2,3];*/
    
    // for ($i=0; $i<3; $i++){
      
    //   echo '<a href= "categorie.php?nbpages=' .$nbpages[$i]. '">'   .$nbpages[$i]. '  </a>';
      
    // }
  
 ?>
   
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center bg-light" >
     <?php for ($i=0; $i<3; $i++){
      echo '<li class="page-item"><a class="page-link" href= "categorie.php?nbpages=' .$nbpages[$i]. '">'   .$nbpages[$i]. '  </a></li>';
     }
     ?>
    </ul>
  </nav>


<?php

      
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