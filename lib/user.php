<?php
include_once PATH_LIB.'/db.php';

class User {
	private static $user = false;

	private $id;
	private $login;
	private $email;
	private $isAdmin;
	private $avatar;
	

	public function id() { return $this->id; }
	public function login() { return $this->login; }
	public function email() { return $this->email; }
	public function isAdmin() { return $this->isAdmin; }
	public function avatar() { return $this->avatar; }
	
	public function __construct($id, $login, $email, $isAdmin, $avatar) {
		$this->id = $id;
		$this->login = $login;
		$this->email = $email;
		$this->isAdmin = $isAdmin;
		$this->avatar = $avatar;
	}
	
	public static function getByLogin($login, $password) {
		global $db;
		$query = "SELECT * FROM users WHERE login = '".$db->escape($login)."' AND password = '".$db->escape(md5($password))."'";
		$userArr = $db->query($query);
		if (is_array($userArr) && (count($userArr) > 0))
			return new User($userArr[0]['id'], $userArr[0]['login'], $userArr[0]['email'], $userArr[0]['is_admin'], $userArr[0]['avatar']);
		return FALSE;
	}
	
	public static function getById($id) {
		global $db;
		$query = "SELECT * FROM users WHERE id = '".intval($id)."'";
		$userArr = $db->query($query);
		if (is_array($userArr) && (count($userArr) > 0))
			return new User($userArr[0]['id'], $userArr[0]['login'], $userArr[0]['email'], $userArr[0]['is_admin'], $userArr[0]['avatar']);
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
	
	public function addUser($login, $email, $password_1, $password_2, $vopros, $otvet) {
		global $db;
		$login = htmlspecialchars($_POST['login']);
		$password_1 = htmlspecialchars(md5($_POST['password_1']));
		$password_2 = htmlspecialchars(md5($_POST['password_2']));
		$email = htmlspecialchars($_POST['email']);
		$vopros = htmlspecialchars($_POST['vopros']);
		$otvet = htmlspecialchars($_POST['otvet']);
		$checkUser = "SELECT * FROM users WHERE login = '$login'";
		if (!empty($_POST["button_reg"])){
        if ($login == $checkUser) {
			exit ('Такой имя уже существует!');
        } if (strlen($login) > 16) {
            exit ('Длинна имени не должна превышать 16 символов!');
        } if (strlen($login) < 4) {
			exit('Длинна имени не должна быть меньше чем 4 символов!');
        } if (strlen($password_1) < 4) {
            exit ('Длинна пароля не должна быть меньше 4 символов!');
        } if ($password_1 != $password_2) {
            exit ('Пароли не совпадают!');
        } if (preg_match('#[а-яА-Я]#', $password_1)) {
            exit ('Нельзя использовать русский алфавит для пароля!');
		}if(!preg_match("/^[\._a-zA-Z0-9-]+@[\.a-zA-Z0-9-]+\.[a-z]{2,6}$/i", $email)) {
		exit ('Введите правильный e-mail! "user@example.com" ');
		}else {
            $query = "INSERT INTO users (login, email, password, vopros, otvet, avatar) VALUES "
				. "('$login', '$email', '$password_1', '$vopros', '$otvet')";
            $db->query($query, FALSE);
			exit ('Регистрация прошла успешно!');
			}
		}
    }
	
	public function lostPass() {
		global $db;
		$login = htmlspecialchars($_POST['login']);
		$email = htmlspecialchars($_POST['email']);
	
		$query = "SELECT * FROM users WHERE login = '$login' AND email = '$email";
		$db->query($query, FALSE);
		
		$simvols = array ("0","1","2","3","4","5","6","7","8","9",
                        "a","b","c","d","e","f","g","h","i","j","k",
						"l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
                        "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O",
						"P","Q","R","S","T","U","V","W","X","Y","Z");
		for ($key = 0; $key < 6; $key++){
			shuffle($simvols);
			$string = $string.$simvols[1];
        }
		$pass = md5(md5($string));
			
		$title = 'Востановления пароля пользователю '.$login.' для сайта 13films.ru!';
        $letter = 'Вы запросили восстановление пароля для аккаунта '.$login.' на сайте 13films.ru '
				. '\r\nВаш новый пароль: '.$string.'\r\nС уважением админестрация сайта 13films.ru';
		if (mail($email, $title, $letter, "Content-type:text/plain; Charset=windows-1251\r\n")) {
			
		$query = "UPDATE users SET password = '$pass' WHERE login = '$login'";
		$db->query($query, FALSE);
		echo '<h2>Новый пароль отправлен на ваш e-mail!</h2><br><a href="index.php">Главная страница</a>';
		exit();
		}
		else			echo 'Возникла непредвиденная ошибка !';
	}
}