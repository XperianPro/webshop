<?php
include_once( 'functions.php' );
function html_mod() //estetika
{
  echo "<h1>Banana shop</h1>";
}

function item_list()
{
  $list = db_execute( "SELECT * FROM items" );
  echo '<table><tr><td>Stvar</td><td>Kolicina</td><td>Cijena</td><td>Prodano</td></tr>'; //pocetak tablice
  foreach( $list as $row )
  {
    echo '<tr><td>'.$row['name'].'</td><td>'.$row['number'].'</td><td>'.$row['price'].'</td><td>'.$row['prodano'].'</td>'; //stvari
    echo '<td><form method="post"><button type="submit" value="'.$row['name'].'" name="kupi">Kupi!</button></form></td></tr>'; // gumb
  }
  echo '</table>'; //kraj tablice
  echo '<br/><br/>
  <form method="POST">
  <input type="submit" name="logout" value="Odjava"/>
  </form>';
}

function kupi()
{
  if ( isset( $_POST['kupi']) )
  {
    $kol = db_execute( "SELECT prodano,number FROM items WHERE name LIKE '".$_POST['kupi']."'");
    $kol = $kol[0];
    db_query( "UPDATE items SET prodano=".($kol['prodano']+1)." WHERE name LIKE '".$_POST['kupi']."'" );
    db_query( "UPDATE items SET number=".($kol['number']-1)." WHERE name LIKE '".$_POST['kupi']."'" );
    header( "Refresh: 0" );
  }

}

 ?>
