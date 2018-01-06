<?PHP

class User
{
	protected	$_id,			//id database
				$_name,			//nom utilisateur
				$_email,			//mail utilisateur
				$_pwd,			//mot de passe utilisateur
				$_token			//token
				$_image,		//image upload par l'utilisateur
				$_filter,		//filtre selectionner par l'utilisateur
				$_lastImages;	//liste des dernieres imgs par l'utilisateur

	const		FILTER_1 = "~/http/MyWebSite/Camagru/images/filters/filter1.png",
				FILTER_2 = "../filters/filter2.png",
				FILTER_3 = "../filters/filter3.png";

	// CONSTRUCT

	public	function	__construct(array $data)
	{
		if (!empty($data))
			$this->hydrate($data);
	}

	// HYDRA

	public	function	hydrate(array $data)
	{
		foreach ($data as $key => $value)
		{
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method))
				$this->$method($value);
		}
	}

	// METHODS

	public	function	generateToken()
	{
		setToken(bin2hex(openssl_random_pseudo_bytes(16)));
	}

	public	function	sendRegisterMail()
	{
		$url = "http://127.0.0.1:8080/Camagru/verify.php?token=".token()."&name=".name();
		$link = '<a href="'.$url.'">'.$url.'</a>';

		mail(email(), "Camagru Mail Validation", $link);
	}

	// GET

	public	function	id()
	{
		return $this->_id;
	}

	public	function	name()
	{
		return $this->_name;
	}

	public	function	email()
	{
		return $this->_email;
	}

	public	function	pwd()
	{
		return $this->_pwd;
	}

	public	function	token()
	{
		return $this->_token;
	}

	public	function	image()
	{
		return $this->_image;
	}

	public	function	filter()
	{
		return $this->_filter;
	}

	public	function	lastImages()
	{
		return $this->_lastImages;
	}

	// SET
	
	public	function	setId($id)
	{
		if (is_int($id))
			if ($id > 0)
				$this->_id = $id;
	}

	public	function	setName($name)
	{
		if (is_string($name))
			$this->_name = $name;
	}

	public	function	setEmail($mail)
	{
		if (filter_var($mail, FILTER_VALIDATE_EMAIL))
			$this->_email = $mail;
	}

	public	function	setPwd($password)
	{
		if (is_string($password))
			$this->_pwd = password_hash($password);
	}

	public	function	setToken($token)
	{
		if (is_string($token))
			$this->_token = $token;
	}

	public	function	setImage($image)
	{
		if (is_object($image))
			$this->_image = $image;
	}

	public	function	setFilter($filter)
	{
		if (is_object($filter))
			$this->_filter = $filter;
	}

	public	function	setLastImages(array $lastImages)
	{
		$this->_lastImages = array();
		foreach ($donnees as $key => $value)
		{
			if (!is_object($value))
				return ;
		}
		$this->_lastImages = $lastImages;
	}
}
?>
