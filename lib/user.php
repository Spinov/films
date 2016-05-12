<?php
include_once PATH_LIB.'/db.php';

class User {
	private static $user = false;

	private $id;
	private $login;
	private $email;
	private $isAdmin;

	public function id() { return $this->id; }
	public function login() { return $this->login; }
	public function email() { return $this->email; }
	public function isAdmin() { return $this->isAdmin; }
	
	public function __construct($id, $login, $email, $isAdmin) {
		$this->id = $id;
		$this->login = $login;
		$this->email = $email;
		$this->isAdmin = $isAdmin;
	}
	
	public static function getByLogin($login, $password) {
		global $db;
		$query = "SELECT * FROM users WHERE login = '".$db->escape($login)."' AND password = '".$db->escape(md5($password))."'";
		$userArr = $db->query($query);
		if (is_array($userArr) && (count($userArr) > 0))
			return new User($userArr[0]['id'], $userArr[0]['login'], $userArr[0]['email'], $userArr[0]['is_admin']);
		return FALSE;
	}
	
	public static function getById($id) {
		global $db;
		$query = "SELECT * FROM users WHERE id = '".intval($id)."'";
		$userArr = $db->query($query);
		if (is_array($userArr) && (count($userArr) > 0))
			return new User($userArr[0]['id'], $userArr[0]['login'], $userArr[0]['email'], $userArr[0]['is_admin']);
		return FALSE;
	}
	
	public static function auth($login, $password) {
		$user = User::getByLogin($login, $password);
		if ($user !== FALSE) {
			$_SESSION['uid'] = $user->id();
			User::$user = $user;
		}
		return User::$user;
	}
	
	public static function get() {
		if ((User::$user === false) && (@$_SESSION['uid'] > 0)) {
			User::$user = User::getById($_SESSION['uid']);
		}
		return User::$user;
	}
	
	public static function logout() {
		if (@$_SESSION['uid'] > 0) {
			User::$user = false;
			unset($_SESSION['uid']);
		}
	}
	
	public function addUser($login, $email, $password_1, $password_2) {
		global $db;
		$login = htmlspecialchars($_POST['login']);
		$password_1 = htmlspecialchars(md5($_POST['password_1']));
		$password_2 = htmlspecialchars(md5($_POST['password_2']));
		$email = htmlspecialchars($_POST['email']);
		$checkUser = "SELECT * FROM users WHERE login = '$login'";
		if (!empty($_POST["button_reg"])){
        if ($login == $checkUser) {
			exit ('Такой имя уже существует!');
        } if (strlen($login) > 16) {
            exit ('Длинна имени не должна превышать 16 символов!');
        } if (strlen($login) < 4) {
			exit('Длинна имени не должна быть меньше чем 4 символа!');
        } if (strlen($password_1) < 4) {
            exit ('Длинна пароля не должна быть меньше 4 символов!');
        } if ($password_1 != $password_2) {
            exit ('Пароли не совпадают!');
        } if (preg_match('#[а-яА-Я]#', $password_1)) {
            exit ('Нельзя использовать русский алфавит для пароля!');
		}if(!preg_match("/^[\._a-zA-Z0-9-]+@[\.a-zA-Z0-9-]+\.[a-z]{2,6}$/i", $email)) {
		exit ('Введите правильный e-mail! "user@example.com" ');
		}else {
            $query = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password_1')";
            $db->query($query, FALSE);
			exit ('Регистрация прошла успешно!');
			}
		}
    }
}