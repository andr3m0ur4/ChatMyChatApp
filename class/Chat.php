<?php 

	class chat
	{
		private $chat_id;
		private $chat_user_id;
		private $chat_text;

		public function __construct($conn)
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

		public function insertChatMessage()
		{
			$query = 'INSERT INTO chats (chat_user_id, chat_text) VALUES (:chat_user_id, :chat_text)';
			$req = $this->dbc->prepare($query);
			$req->execute([
				"chat_user_id" => $this->__get('chat_user_id'),
				"chat_text" => $this->__get('chat_text')
			]);
		}

		public function displayMessage()
		{
			$query = 'SELECT * FROM chats ORDER BY chat_id';
			$chat_req = $this->dbc->prepare($query);
			$chat_req->execute();
			
			$chats = [];

			while ($data_chat = $chat_req->fetch(PDO::FETCH_OBJ)) {

				$query = 'SELECT * FROM users WHERE user_id = :user_id';
				$user_req = $this->dbc->prepare($query);
				$user_req->execute([
					"user_id" => $data_chat->chat_user_id
				]);

				$data_user = $user_req->fetch(PDO::FETCH_OBJ);

				$data = [];

				array_push($data, $data_chat);
				array_push($data, $data_user);
				array_push($chats, $data);
				/*?>
				<span class="UserNames"><?php echo $DataUser['user_name']; ?></span><strong style="color: yellow;"> Diz...</strong><br>
				<span class="UserMessages" style="color: red; background-color: #f1f1f1; border-radius: 5px; padding: 1.5px; margin: 10px; border: 2px solid #dedede;"><?php echo htmlspecialchars($DataChat['chat_text']); ?></span><br><br>
				<?php*/
			}

			return $chats;
		}
	}