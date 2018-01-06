<?PHP

include "views/header.php";

if (isset($_POST['login']) && isset($_POST['pwd']) && isset($_POST['mail']))
{
	require_once("class/user.php");

	$user = new User(['name' => $_POST['login']], ['mail' => $_POST['mail']], ['pwd' => $_POST['pwd']]);

	require("models/register.php");
	include "views/afterRegister.php";
}
else
{
	include "views/start.php";
}
include "views/footer.php";
?>
