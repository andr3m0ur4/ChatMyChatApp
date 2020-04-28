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

		public function userLogin()
		{
			$query = 'SELECT * FROM users WHERE user_email = :user_email AND user_password = :user_password';
			$req = $this->dbc->prepare($query);
			$req->execute([
				"user_email" => $this->__get('user_email'),
				"user_password" => $this->__get('user_password')
			]);

			if ($req->rowCount() == 0) {
				header("Location: ../index.php?error=1");
				return false;
			} else {
				$data = $req->fetch(PDO::FETCH_OBJ);

				$this->__set('user_id', $data->user_id);
				$this->__set('user_name', $data->user_name);
				$this->__set('user_password', $data->user_password);
				$this->__set('user_email', $data->user_email);
					
				return true;
			}
		}
	}
