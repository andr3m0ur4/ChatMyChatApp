<?php 

	class User
	{
		private $user_id;
		private $user_name;
		private $user_email;
		private $user_password;

		public function __construct(Conn $conn)
		{
			$this->dbc = $conn->connect();
		}

		public function __get($attr)
		{
			return $this->$attr;
		}

		public function __set($attr, $value)
		{
			$this->$attr = $value;
		}

		public function insertUser()
		{
			$query = '
				INSERT INTO users (user_name, user_email, user_password)
				VALUES (:user_name, :user_email, :user_password)
			';

			$req = $this->dbc->prepare($query);
			$req->execute([
				"user_name" => $this->__get('user_name'),
				"user_email" => $this->__get('user_email'),
				"user_password" => $this->__get('user_password')
			]);
		}

		public function UserLogin(){
			include "conn.php";
			$req = $dbc->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_password = :user_password");
			$req->execute(array(
				"user_email"=>$this->getUserEmail(),
				"user_password"=>$this->getUserPassword()
			));
			if ($req->rowCount() == 0) {
				header("Location:index.php?error=1");
				return false;
			}else{
				while ($data = $req->fetch()) {
					$this->setUserId($data['user_id']);
					$this->setUserName($data['user_name']);
					$this->setUserPassword($data['user_password']);
					$this->setUserEmail($data['user_email']);
					header("Location:Home.php");
					return true;
				}
			}
		}
	}