<?PHP

require_once("class/user.php");
require_once("class/userManager.php");

function	connect($user)
{
	$manager = new UserManager();

	return $manager->connectUser($user);
}
?>
