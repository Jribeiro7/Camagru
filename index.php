<?PHP

session_start();

include "views/header.php";

if (!empty($_GET['page']) && is_file("controllers/".$_GET['page'].".php"))
{
	include "controllers/".$_GET['page'].".php";
}
else
{
	include "controllers/start.php";
}

include "views/footer.php";

?>
