<?php 

	class User{
		private $db		= "";

		private $cookieDelimiter	= 
		private $email 	= '';
		private $salt 	= '';

		public function __construct($db)
		{
			$this->db = $db;
		}

		public function register($email,$password)
		{
			if(!$this->checkIfUserExists($email))
			{
				$salt	= $this->generateSalt();

				$hashedPassword = $this->hash($password,$salt);

				$registrationQuery = 'INSERT INTO users (email, salt, password, lastlogin)
											VALUES (:email,' . $salt . ' , :password, NOW())';
				$registerPlaceholders = array(':email' => $email,
												':password' => $hashedPassword);
				$this->db->query($registrationQuery,$registerPlaceholders);

				$this->email 	= $email;
				$this->salt 	= $salt;

				$this->createCookie();

			}
		}
		public function checkIfUserExists($email)
		{
			$checkQuery	= 'SELECT *
							FROM users 
							WHERE email = :email';

			$placeholders = array(':email' => $email);

			$result		= $this->db->query($checkQuery, $placeholders);

			if($result){
				$userExists = true;
			}
			return $userExists;
		}
		public function generateSalt(){
			$salt = uniqid(mt_rand(), true);
			return $salt;
		}
		public function hash($text, $salt){
			$saltedText = $salt . $text;
			$hash 	= hash('sha512', $saltedText);
			return $hash;
		}
		public function createCookie(){
			$timeToLive = 60*60*24*30;
			$email = $this->email;
			$salt 	= $this->salt;

			
		}
	}

 ?>