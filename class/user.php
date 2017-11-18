<?PHP

class User
{
	protected	$_id,			//id database
				$_name,			//nom utilisateur
				$_mail,			//mail utilisateur
				$_password,		//mot de passe utilisateur
				$_image,		//image upload par l'utilisateur
				$_filter,		//filtre selectionner par l'utilisateur
				$_lastImages;	//liste des dernieres imgs par l'utilisateur

	// CONSTRUCT

	public	function	__construct(array $data)
	{
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

	// GET

	public	function	id()
	{
		return $this->_id;
	}

	public	function	name()
	{
		return $this->_name;
	}

	public	function	mail()
	{
		return $this->_mail;
	}

	public	function	password()
	{
		return $this->_password;
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

	public	function	setMail($mail)
	{
		if (is_string($mail))
			$this->_mail = $mail;
	}

	public	function	setPassword($password)
	{
		if (is_string($password))
			$this->_password = $password;
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
