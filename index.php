<?PHP

require("./class/session.php");

$session = Session::getInstance();

if (!empty($_GET['page']) && is_file("controllers/".$_GET['page'].".php"))
{
	include "controllers/".$_GET['page'].".php";
}
else
{
	include "controllers/start.php";
}

?>
