<?php
require_once ('connect.php');

	class Auth
	{
		private $db;
		
		function __construct()
		{
			$database = new Database();
			$db = $database -> db_connect();
			$this->con = $db;
		}

		public function runQuery($sql)
		{
			$stmt = $this->con->prepare($sql);
			return $stmt;
		}

		public function redirect($url) {
			header("Location:$url");
		}

		/*** public function to checked if user is logged in already **/
		public function is_loggedin()
		{
			if (isset($_SESSION['mentee_session']) && $_SESSION['mentee_session'] == true){
				return true;
			}
			
		}

		/*** public function to checked if user is logged in already **/
		public function is_loggedin2()
		{
			
			if (isset($_SESSION['mentor_session']) && $_SESSION['mentor_session'] == true){
					return true;
				
			}
		}
		
	}
?>