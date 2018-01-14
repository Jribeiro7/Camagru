<?PHP

if (!isset($session->login))
	header("Refresh:0; url=index.php");

if (isset($_POST['snap']) && isset($_POST['img']) && isset($_POST['filter']))
{
	echo "caca";
}

include "views/header.php";
include "views/home.php";
include "views/footer.php";

?>
