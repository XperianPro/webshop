<?php
include_once( 'functions.php' );
function login_check()
{
  if ( isset($_COOKIE['login']) and isset($_COOKIE['username']) )
  {
    $check = db_execute( 'SELECT username,cookie FROM users WHERE username LIKE "'.$_COOKIE['username'].'"' );
    $check = $check[0];
    if( $check['cookie'] == $_COOKIE['login'] )
    {
      return 1;
    }
  }
  else {
    return 0;
  }

}

function login()
{
  echo "<form method='POST'>Email:<input type='text' name='email'/><br/>Lozinka<input type='password' name='password'/><input type='submit'/></form>";
  echo "<br/><br/><a href='reg.php'>Registracija.</a>";
  if ( isset($_POST['password']) )
  {
    $check = db_execute( "SELECT email,username,password FROM users WHERE email LIKE '".$_POST['email']."'" );
    $check = $check[0];
    if( $check['password'] == $_POST['password'] && $check['email'] == $_POST['email']  )
    {
      $hash = sha1( time() );
      setcookie( "login",$hash,time()+60*60 );
      setcookie( "username",$check['username'],time()+60*60 );
      db_query( "UPDATE users SET cookie='".$hash."' WHERE email LIKE '".$_POST['email']."'" );
      header( "Refresh: 0" );
      die();
    }
    else {
      echo "Kriva lozinka ili e-mail!";
      var_dump($check);
    }
  }

}


 ?>
