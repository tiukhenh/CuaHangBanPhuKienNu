<?php

namespace App\Controllers;
use App\Models\Authentication;

class AuthenticationController
{	
	public function login()
	{
		render_view('login');
	}
	public function handleLogin()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($username=='admin' && $password =='admin') {
			$_SESSION['username'] = $_POST['username'];
			redirect('/customer/admin');
		}else
		if (Authentication::checkClient($username, $password) > 0) {
			$_SESSION['SessionId'] = Authentication::checkClient($username, $password);
			$_SESSION['username'] = $_POST['username'];
			redirect('/customer/index');
		}
		else {
			$messageDraw = 'Người dùng không tồn tại.';
			$data = [
				'message' => $messageDraw ,
			];
			render_view('login', $data);
		}
		
	}
	public function register()
	{
		render_view('register');
	}
	public function createUser() {

		$username = $_POST['username'];
		$name = $_POST['name'];
		$diaChi = $_POST['diaChi'];
		$sdt = $_POST['sdt'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		if ($password == $repassword) {
			Authentication::addClient($username, $name, $diaChi, $sdt, $password);

			redirect('/customer/index');
		} 
		else {
			$messageDraw = 'Mật khẩu không khớp';
			$data = [
				'message' => $messageDraw ,
			];
			render_view('register', $data);
		}

	}
	public function logout() {
		unset($_SESSION['username']);
		redirect('/customer/index');
	}

}
