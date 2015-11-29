<html>
<head>
</head>
<body>
<?php
include( 'login.php' );
include( 'shop.php' );

if ( $_POST['logout'] )
{
  setcookie( "login","",time()-60*60 );
  setcookie( "username","",time()-60*60 );  
}

if( login_check() )
{
html_mod();
item_list();
kupi();
}
else {
login();
}


 ?>


</body>

</html>
