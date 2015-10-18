<?php
function db_execute( $sql )
{
  try {
    $baza = new PDO( "mysql:host=eu-cdbr-azure-west-c.cloudapp.net;dbname=acsm_d911235063031c3", "b01917dcc7cc15", "9d201e27");
  } catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
  }
  $lista = $baza->prepare( $sql );
  $lista->execute();
  return $lista->fetchAll();
}
function db_query( $sql )
{
  try {
    $baza = new PDO( "mysql:host=eu-cdbr-azure-west-c.cloudapp.net;dbname=acsm_d911235063031c3", "b01917dcc7cc15", "9d201e27");
  } catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
  }
  $baza->query( $sql );
}

 ?>
