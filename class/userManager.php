<?PHP

class	UserManager
{
	private		$_db;

	public	function	__construct()
	{
		include_once "config/database.php";

		$newdb = new PDO($DB_DSN.";dbname=".$DB_NAME, $DB_USER, $DB_PASSWORD);
		$newdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		setDb($newdb);
	}

	public	function	addUser($user)
	{
		$q = $this->_db->prepare("INSERT INTO
									users(login, mail, password, token)
									VALUES(:login, :mail, :password, :token)");
		$q->execute(array(':login' => $user->name(), ':mail' => $user->email(),
							':password' => $user->pwd(), ':token' => $user->token()));

		$user->setId($this->_db->lastInsertId());
	}

	public	function	connectUser($user)
	{
		$q = $this->_db->prepare('SELECT id, password, valid_mail FROM users WHERE login = :login');
		$q->bindValue(':login', $user->name());
		$q->execute();
		$row = $q->fetch(PDO::FETCH_ASSOC);

		if (($user->pwd() == $row->password) && ($row->valid_mail == 1))
		{
			$user->setId($row->id);
			return TRUE;
		}
		else
			return FALSE;
	}

	// SETTER

	public	function	setDb($newdb)
	{
		$this->_db = $newdb;
	}
}
?>
