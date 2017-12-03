SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- 'users' table creation

CREATE TABLE 'users' (
	'id' int(11) NOT NULL,
	'username' varchar(30) NOT NULL,
	'mail' varchar(255) NOT NULL,
	'password' varchar(255) NOT NULL,
	'confirmation_token' varchar(60) DEFAULT NULL,
	'confirmed_at' datetime DEFAULT NULL,
	'reset_token' varchar(60) DEFAULT NULL,
	'reset_at' datetime DEFAULT NULL,
	'remember_token' varchar(255) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 'images' table creation

CREATE TABLE 'images' (
	'id' int(11) NOT NULL,
	'id_user' int(11) DEFAULT NULL,
	'path' varchar(255) DEFAULT NULL,
	'likes' int(11) DEFAULT NULL,
	'dislikes' int(11) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 'comments' table creation

CREATE TABLE 'comments' (
	'id' int(11) NOT NULL,
	'id_img' int(11) DEFAULT NULL,
	'id_user' int(11) DEFAULT NULL,
	'comment' varchar(255) DEFAULT NULL,
	'comment_username' varchar(30) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
