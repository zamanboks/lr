<?php 
	include_once 'Session.php';
	include 'Database.php';
class User 
{
	private $db;
	
	public function __construct()
	{
		$this->db = new Database();
	}

//User Registration process and checking field & validation

	public function userRegistration($data)
	{
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email']; 
		$password = md5($data['password']);

		$chk_email = $this->emailCheck($email);

		if ($name == '' OR $username =='' OR $email == '' OR $password == '') {
				$msg = "<div class='alert alert-danger'><strong>Error | </strong>Field must not be Empty</div>";
			return $msg;
		}
		if (strlen($username) < 3) {
				$msg = "<div class='alert alert-danger'><strong>Error | </strong>User name is too Short</div>";
			return $msg;
		}elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {
			$msg = "<div class='alert alert-danger'><strong>Error | </strong>User name must only contain alphanumerical, deshes and underscores! </div>";
			return $msg;
		}

		if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
			$msg = "<div class='alert alert-danger'><strong>Error | </strong>Email address is not valid!</div>";
			return $msg;
		}

		if ($chk_email == true) {
			$msg = "<div class='alert alert-danger'><strong>Error | </strong>Email address already exist!</div>";
			return $msg;
		} 

		$sql = "INSERT INTO tbl_user (name,username,email,password) VALUES (:name,:username,:email,:password)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$result = $query->execute();
		if ($result) {
			$msg = "<div class='alert alert-success'><strong>Success | </strong>Thank you, Your have been register.</div>";
			return $msg;
		}else {
			$msg = "<div class='alert alert-success'><strong>Error | </strong>Sorry, there has been problem inserting your details.</div>";
			return $msg;
		}
	} 

	public function emailCheck($email)
	{
		$sql = "SELECT email FROM tbl_user WHERE email = :email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();

		if ($query->rowCount() > 0) {
			return true;
		}else{
			return false;
		}
	}

//User Login Process panel

	public function getLoginUser($email,$password)
	{
		$sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1 ";

		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);

		return $result;
	}

	public function userLogin($data)
	{

		$email = $data['email']; 
		$password = md5($data['password']);

		$chk_email = $this->emailCheck($email);

		if ($email == '' OR $password == '') {
				$msg = "<div class='alert alert-danger'><strong>Error | </strong>Field must not be Empty</div>";
			return $msg;
		}

		if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
			$msg = "<div class='alert alert-danger'><strong>Error | </strong>Email address is not valid!</div>";
			return $msg;
		}

		if ($chk_email == false) {
			$msg = "<div class='alert alert-danger'><strong>Error | </strong>Email address not Exist!</div>";
			return $msg;
		}

		$result = $this->getLoginUser($email,$password);
		if ($result) {
			Session::init();
			Session::set("login", true);
			Session::set("id", $result->id);
			Session::set("name", $result->name);
			Session::set("username", $result->username);
			Session::set("loginmsg", "<div class='alert alert-success'><strong>Success | </strong>You are LoggedIn</div>");
			header("Location: index.php");
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error | </strong>Value not found!</div>";
			return $msg;
		}
	}
}
?>

