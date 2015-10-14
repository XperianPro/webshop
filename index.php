<html>
<head>
</head>
<body>
<?php
include( 'login.php' );
include( 'shop.php' );
if( login_check() )
{
item_list();
kupi();
}
else {
login();
}


 ?>


</body>

</html>
