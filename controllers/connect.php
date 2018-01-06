<?PHP

if (isset($session->login))
	header("Refresh:0; url=index.php");

$badlogin = FALSE;

if (isset($_POST['login']) && isset($_POST['pwd']))
{
	require_once("class/user.php");

	$user = new User(['name' => $_POST['login']], ['pwd' => $_POST['pwd']]);

	require("models/connect.php");

	if (connect($user) == TRUE)
	{
		$session->login = $_POST['login'];
		header("Refresh:0; url=index.php?page=home");
	}
	else
		$badlogin = TRUE;
}

include "views/header.php";
include "views/connect.php";
include "views/footer.php";

?>
