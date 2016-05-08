<?php

if(!empty($_POST) && !empty($_POST['search']))
{
  extract($_POST);
  $search = strip_tags($search);
  
  try{
  $bdd = new PDO('mysql:host=localhost;dbname=articles_jquery_ajax', 'admin', 'admin') or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8');
  }
  
  catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
  }
  
  $req = $bdd->query("SELECT titre,contenu FROM articles WHERE titre LIKE '%$search%' OR contenu LIKE '%$search%' ORDER BY id");
  
  if($req->rowCount()>0)
  {
    while($data = $req->fetch(PDO::FETCH_OBJ))
    {
      echo '<h2>'.$data->titre.'</h2>';
      echo '<p>'.$data->contenu.'</p>';
      echo '<hr />';
    }
  }
  
  
  // $tableau = explode("&", $_POST('filtres'));
  else
  {
    echo '<h2>Aucun resultat</h2>';
  }
}

else
{
  echo '<h2>Aucun resultat</h2>';
}

?>