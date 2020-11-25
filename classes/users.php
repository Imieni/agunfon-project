<?php
	/**
	 * Class for users
	 */
	require_once ('connect.php');
	require_once 'auth.php';

	class Users extends Auth
	{
				/***** Function to add mentee ***/
		public function add_mentee($fname, $email, $sex, $mentor, $pwd, $country, $date_add){
			try{
				$newpwd = password_hash($pwd, PASSWORD_DEFAULT);
				$stmt = $this->con->prepare("INSERT INTO mentee_tbl(fullname, email, sex, mentor_kind, country, password, date_added ) VALUES (:fname, :email, :sex, :mentor, :country, :pwd, :date_add) ");
				$stmt->bindparam(":fname", $fname);
				$stmt->bindparam(":email", $email);
				$stmt->bindparam(":sex", $sex);
				$stmt->bindparam(":mentor", $mentor);
				//$stmt->bindparam(":uname", $uname);
				$stmt->bindparam(":pwd", $newpwd);
				$stmt->bindparam(":country", $country);
				$stmt->bindparam(":date_add", $date_add);
				$stmt->execute();
				return $stmt;

			}
			catch (Exception $e) {
				echo $e-> getMessage();
			}

		}

				/***** Function to add mentee ***/
		public function add_mentor($fname, $email, $sex, $pwd, $mentor, $country, $fone, $date_add){
			try{
				$newpwd = password_hash($pwd, PASSWORD_DEFAULT);
				$stmt = $this->con->prepare("INSERT INTO mentor_tbl(fullname, email, sex, country, password, phone, mentor_kind, date_added ) VALUES (:fname, :email, :sex, :country, :pwd, :fone, :mentor, :date_add) ");
				$stmt->bindparam(":fname", $fname);
				$stmt->bindparam(":email", $email);
				$stmt->bindparam(":sex", $sex);
				$stmt->bindparam(":mentor", $mentor);
				$stmt->bindparam(":pwd", $newpwd);
				$stmt->bindparam(":fone", $fone);
				$stmt->bindparam(":country", $country);
				$stmt->bindparam(":date_add", $date_add);
				$stmt->execute();
				return $stmt;

			}
			catch (Exception $e) {
				echo $e-> getMessage();
			}

		}

		
		
		/*** function to login mentee **/
		public function login_mentee($email, $pwd)
		{
			try {
				$stmt = $this->con->prepare("SELECT * FROM mentee_tbl WHERE email = :email");
				$stmt->execute(array(':email'=> $email));
				$row = $stmt->fetch(PDO:: FETCH_ASSOC);	
				
				if ($stmt->rowCount() == 1){
					if (password_verify($pwd, $row['password']))
					{
						$_SESSION['mentee_session'] = $row['mentee_id'];

					}
					return true;
				}
				else 
				{
					return false; 	
				}
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		/*** function to login mentor **/
		public function login_mentor($email, $pwd)
		{
			try {
				$stmt = $this->con->prepare("SELECT * FROM mentor_tbl WHERE email = :email");
				$stmt->execute(array(':email'=> $email));
				$row = $stmt->fetch(PDO:: FETCH_ASSOC);	
				
				if ($stmt->rowCount() == 1){
					if (password_verify($pwd, $row['password']))
					{
						$_SESSION['mentor_session'] = $row['mentor_id'];

					}
					return true;
				}
				else 
				{
					return false; 	
				}
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}


		

		/*** public function to log out user **/
		public function logout()
		{
			if (isset($_SESSION['mentee_session'])) {
				session_destroy();
				
				unset($_SESSION['mentee_session']);
				return true;
			}
			elseif (isset($_SESSION['mentor_session'])) {
				# code...
				session_destroy();
				
				unset($_SESSION['mentor_session']);
				return true;
			}
		}

		
	}