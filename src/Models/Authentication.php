<?php

namespace App\Models;

class Authentication
{	
	public int $id = -1;
	public string $username;
	public string $name;
	public string $diaChi;
	public string $sdt;
	public string $password;


	public function __construct(array $data = [])
	{
		$this->fill($data);
	}

	public function fill(array $data)
	{
		$this->username = $data['username'] ?? '';
		$this->name = $data['name'] ?? '';
		$this->diaChi = $data['diaChi'] ?? '';
		$this->sdt = $data['sdt'] ?? '';
		$this->password = $data['password'] ?? '';
		return $this;
	}

	public static function checkClient(string $username, string $password)
	{
		$query = PDO()->prepare('select * from khachhang where userName = :username and password = :password;');
		$query->execute(['username' => $username, 
                        'password' => $password,]);
		if ($row = $query->fetch()) {
			$count = $row['id'];
			return $count;
		}
		return 0;
	}
	public static function getClient(int $id)
	{
		$userInfo = null;
		$query = PDO()->prepare('select * from khachhang where id =:id;');
		$query->execute(['id' => $id,]);
		while ($row = $query->fetch()) {
			$user = new Authetication();
			$user->fillFromDb($row);
			$userInfo = $user;
		}
		return $userInfo;
	}

	public static function all(): array
	{
		$cutomers = [];
		$query = PDO()->prepare('select * from khachhang');
		$query->execute();
		while ($row = $query->fetch()) {
			$cutomer = new Authentication();
			$cutomer->fillFromDb($row);
			$cutomers[] = $cutomer;
		}

		return $cutomers;
	}

	protected function fillFromDb(array $row)
	{
		$this->id = $row['id'];
		$this->username = $row['userName'];
		$this->name = $row['name'];
		$this->diachi = $row['diaChi'];
		$this->sdt = $row['sdt'];
		$this->password = md5($row['password']);
		return $this;
	}
	public static function addClient(string $username, string $name, string $diaChi, string $sdt, string $password)
	{
		
		$query = PDO()->prepare('INSERT INTO khachhang VALUES (NULL, :username, :name, :diaChi, :sdt, :password);');
		$query->execute(['username' => $username,
						'name' => $name,
						'diaChi' => $diaChi,
						'sdt' => $sdt,
						'password' => $password,]);

	}
}
