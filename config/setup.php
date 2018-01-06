<?PHP

require_once("database.php");

try {
		$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->exec('CREATE DATABASE IF NOT EXISTS `'.$DB_NAME.'` DEFAULT
					CHARACTER SET utf8 COLLATE utf8_general_ci');
		$sql = 'USE `'.$DB_NAME.'`;
				CREATE TABLE IF NOT EXISTS `users` (
					`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					`login` varchar(25) NOT NULL,
					`mail` varchar(255) NOT NULL,
					`valid_mail` INT DEFAULT NULL,
					`password` varchar(255),
					`token` varchar(255)
				);
				CREATE TABLE IF NOT EXISTS `images` (
					`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					`id_user` INT DEFAULT NULL,
					`path` varchar(255) DEFAULT NULL,
					`likes` INT DEFAULT NULL
				);
				CREATE TABLE IF NOT EXISTS `comments` (
					`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
					`id_user` INT DEFAULT NULL,
					`id_image` INT DEFAULT NULL,
					`comment` varchar(255) DEFAULT NULL
				);';
		$db->exec($sql);
		echo "Setup finish <br />";
} catch (PDOException $e) {
		echo "Setup error : " . $e->getMessage();
}

?>
