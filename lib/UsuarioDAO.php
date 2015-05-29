<?php

namespace amixsi;

class UsuarioDAO
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}
	public function valida(array $params)
	{
		$login = $params['usuario'];
		$senha = md5($params['senha'].".AMIX");
		$stmt  = $this->pdo->prepare("select login from usuario where login = :login and senha = :senha");
		$stmt->execute(array(':login' => $login, ':senha' => $senha));
		$nlinha = $stmt->rowCount();
		if ($nlinha > 0) {
				$usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
				//trigger_error(print_r(array($nlinha, $usuario), true));
				//trigger_error(var_export(array($nlinha, $usuario), true));
				$_SESSION['usuario'] = $usuario['login'];
				header("Location: index.php");
		} else {
				echo "<script>alert ('Usuario ou senha não existe.')</script>";
		}
	}
	public function logado()
	{
		if (array_key_exists('usuario', $_SESSION) && $_SESSION['usuario'] != "") {
				return true;
		} else {
				return false;
		}
	}
	public function verifica(array $params)
	{
		$login = $params['usuario'];
		$stmt = $this->pdo->prepare("select login from usuario where login = :login");
		$stmt->execute(array(':login' => $login));
		$existe = $stmt->rowCount();
		if ($existe == 0) {
				self::cadastra($_POST);
				return header("Location: login.php");
		} else {
				echo "<script>alert ('Este usuário já existe, tente outro.')</script>";
		}
	}
	public function cadastra(array $params)
	{
		$ilogin = $params['usuario'];
		$isenha = md5($params['senha'].".AMIX");
		$stmt = $this->pdo->prepare("INSERT INTO usuario (login, senha) 
														VALUES (:ilogin, :isenha);");
		$stmt->execute(array(':ilogin' => $ilogin, 'isenha' => $isenha));
	}
}