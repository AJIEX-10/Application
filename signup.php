<?php

	$password = $_POST["password"];
	$_POST["password"] = sha1($password)."AbEn3XX900m";
	$conf_password = $_POST["conpassword"];
	$_POST["conpassword"] = sha1($conf_password)."AbEn3XX900m";

	class WritingToFile
	{
		private $post;
		private $filename = "file.json";

		public function __construct($post)
		{
			$this->post = $post;
		}

		private function writingToFile()
		{
			$content = @fopen('./secret_data/'.$this->filename, 'r+');
			if ($content == null) {
				$content = fopen('./secret_data/'.$this->filename, 'w+');
			} if ($content) {
				fseek($content, 0, SEEK_END);
				if (ftell($content) > 0) {
					// move back a byte
					fseek($content, -1, SEEK_END);
			
					// add the trailing comma
					fwrite($content, ',', 1);

					fwrite($content, json_encode($this->post) . ']');
				} else {
					fwrite($content, json_encode(array($this->post)));
				}
					fclose($content);
					$response = [
						'messages_error' => "Registration was successful",
						'status' => true
					];
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					return true;
			}
		}

		private function identityCheck()
		{
			$json=file_get_contents('./secret_data/'.$this->filename);
			$returnee=json_decode($json, true);
			foreach($returnee as $ret) {
				if($ret["login"] == $this->post["login"] || $ret["email"] == $this->post["email"]) {
					$response = [
						'messages_error' => "A user with this login or email already exists",
						'status' => false
					];
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					return false;
				} elseif($this->post["password"] != $this->post["conpassword"]) {
					$response = [
						'messages_error' => "Passwords don't match",
						'status' => false
					];
					header('Content-Type: application/json; charset=utf-8');
					echo json_encode($response);
					return false;
				} else {
					return $this->writingToFile();
				}	
			}
		}

		function finalRecord()
		{
			if(file_exists('./secret_data/'.$this->filename) == true) {
				return $this->identityCheck();
			} else {
				return $this->writingToFile();
			}
		}
	}
	
	$obj = new WritingToFile($_POST);
	$obj->finalRecord();