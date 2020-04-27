<link rel="stylesheet" type="text/css" href="home.css">
<?php  
	class user{
		private $user_id, $user_name, $user_email, $user_password;

		public function getUserId(){
			return $this->user_id;
		}
		public function setUserId($user_id){
			$this->user_id = $user_id;
		}

		public function getUserName(){
			return $this->user_name;
		}
		public function setUserName($user_name){
			$this->user_name = $user_name;
		}

		public function getUserEmail(){
			return $this->user_email;
		}
		public function setUserEmail($user_email){
			$this->user_email = $user_email;
		}

		public function getUserPassword(){
			return $this->user_password;
		}
		public function setUserPassword($user_password){
			$this->user_password = $user_password;
		}

		public function InsertUser(){
			include "conn.php";
			$req = $dbc->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (:user_name, :user_email, :user_password)");
			$req->execute(array(
				"user_name"=>$this->getUserName(),
				"user_email"=>$this->getUserEmail(),
				"user_password"=>$this->getUserPassword()
			));
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

	class chat{
		private $chat_id, $chat_user_id, $chat_text;

		public function getChatId(){
			return $this->chat_id;
		}
		public function setChatId($chat_id){
			$this->chat_id = $chat_id;
		}

		public function getChatUserId(){
			return $this->chat_user_id;
		}
		public function setChatUserId($chat_user_id){
			$this->chat_user_id = $chat_user_id;
		}

		public function getChatText(){
			return $this->chat_text;
		}
		public function setChatText($chat_text){
			$this->chat_text = $chat_text;
		}

		public function InsertChatMessage(){
			include "conn.php";
			$req = $dbc->prepare("INSERT INTO chats (chat_user_id, chat_text) VALUES (:chat_user_id, :chat_text)");
			$req->execute(array(
				"chat_user_id"=>$this->getChatUserId(),
				"chat_text"=>$this->getChatText()
			));
		}

		public function DisplayMessage(){
			include "conn.php";
			$ChatReq = $dbc->prepare("SELECT * FROM chats ORDER BY chat_id");
			$ChatReq->execute();

			while ($DataChat = $ChatReq->fetch()) {
				$UserReq = $dbc->prepare("SELECT * FROM users WHERE user_id = :user_id");
				$UserReq->execute(array(
					"user_id"=>$DataChat['chat_user_id']
				));
				$DataUser = $UserReq->fetch();
				?>
				<span class="UserNames"><?php echo $DataUser['user_name']; ?></span><strong style="color: yellow;"> Diz...</strong><br>
				<span class="UserMessages" style="color: red; background-color: #f1f1f1; border-radius: 5px; padding: 1.5px; margin: 10px; border: 2px solid #dedede;"><?php echo htmlspecialchars($DataChat['chat_text']); ?></span><br><br>
				<?php
			}
		}
	}
?>