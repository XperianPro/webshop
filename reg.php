<html>
<head>
</head>
<body>
<form method="post">
Email:<input type="text" name="mail"/><br/>
Username:<input type="text" name="usern"/><br/>
Lozinka:<input type="password" name="lozinka"/><br/>
<input type='submit'/>
</form>
<?php
if( isset( $_POST['mail'] ) and isset( $_POST['usern'] ) and isset( $_POST['lozinka'] ) )
{
  include_once( 'functions.php' );
  $md5 = md5( $_POST['mail'] );
  db_execute( "INSERT INTO users (email,md,username,password)  VALUES ('".$_POST['mail']."','".$md5."','".$_POST['usern']."','".$_POST['lozinka']."');" );
  header("Location: index.php");
  die();
}
 ?>
</body>
</html>
