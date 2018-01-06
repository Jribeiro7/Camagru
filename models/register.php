<?PHP

require_once("class/user.php");
require_once("class/userManager.php");

$manager = new UserManager();

$user->generateToken();
$manager->addUser($user);
$user->sendRegisterMail();

?>
