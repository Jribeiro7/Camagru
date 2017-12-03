<?PHP

require_once('./database.php');

try {
		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$db->exec(file_get_contents('camagru.sql'));
		echo "Setup finish <br />";
} catch (PDOException $e) {
		echo "Setup error : " . $e->getMessage();
}

?>
