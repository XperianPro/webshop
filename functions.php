<?php
function db_execute( $sql )
{
  try {
    $baza = new PDO( "mysql:host=localhost;dbname=shop", "root", "");
  } catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
  }
  $lista = $baza->prepare( $sql );
  $lista->execute();
  $result = $lista->fetchAll();
  return $result;
}
function db_query( $sql )
{
  try {
    $baza = new PDO( "mysql:host=localhost;dbname=shop", "root", "");
  } catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
  }
  $lista = $baza->query( $sql );
}

 ?>
