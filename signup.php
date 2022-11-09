<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$password = $_POST["password"];
	$_POST["password"] = sha1($password)."AbEn3XX900m";

	$conf_password = $_POST["conpassword"];
	$_POST["conpassword"] = sha1($conf_password)."AbEn3XX900m";


	class Writing_to_file
	{
		private $post;
		private $filename = "file.json";

		public function __construct($post)
		{
			$this->post = $post;
		}

		private function writing_to_file()
		{
			$content = @fopen('./secret_data/'.$this->filename, 'r+');
			if ($content == null)
			{
				$content = fopen('./secret_data/'.$this->filename, 'w+');
			}
			if ($content)
			{
				fseek($content, 0, SEEK_END);
				if (ftell($content) > 0)
				{
					// move back a byte
					fseek($content, -1, SEEK_END);
			
					// add the trailing comma
					fwrite($content, ',', 1);

					fwrite($content, json_encode($this->post) . ']');
				}
				else
				{
					fwrite($content, json_encode(array($this->post)));
				}
					fclose($content);
			}
		}

		private function identity_check()
		{
			$json=file_get_contents('./secret_data/'.$this->filename);
			$returnee=json_decode($json, true);
			foreach($returnee as $ret)
			{
				if(trim($ret["login"]) == trim($this->post["login"]) && trim($ret["email"]) == trim($this->post["email"]))
				{
					$_SESSION["message"] = "This user already exists";
					header("Location: authorization.php");
				} else {
					return $this->writing_to_file();
				}	
			}
		}

		function final_record()
		{
			if(file_exists('./secret_data/'.$this->filename) == true)
			{
				return $this->identity_check();
			} else {
				return $this->writing_to_file();
			}
		}
	}
	
	if ($_POST["password"] == $_POST["conpassword"]) {
		$obj = new Writing_to_file($_POST);
		$obj->final_record();
		$_SESSION["okey"] = "Registration was successful !";
		header("Location: authorization.php");
	} else {
		$_SESSION["message"] = "Parole don't Match";
		header("Location: index0.php");
	}
	
?>