<?php

namespace App\Models;

class ProductType
{	
	public int $maLoai = -1;
	public string $tenLoai;

	public function __construct(array $data = [])
	{
		$this->fill($data);
	}

	public static function showLoai()
	{
		$productTypes=[];
		$query = PDO()->prepare('select * from loaisanpham ');
		$query->execute();
		while ($row = $query->fetch()) {
			$productType = new ProductType();
			$productType->fillFromDb($row);
			$productTypes[] = $productType;
			
		}
		return $productTypes;
	}

	public static function findTypeById(int $maLoai)
	{
		$query = PDO()->prepare('select * from loaisanpham where maLoai = :maLoai');
		$query->execute(['maLoai' => $maLoai]);
		if ($row = $query->fetch()) {
			$productType = new ProductType();
			$productType->fillFromDb($row);
			return $productType;
		}
		return null;
	}


	protected function fillFromDb(array $row)
	{
		$this->maLoai = $row['maLoai'];
		$this->tenLoai = $row['tenLoai'];
		return $this;
	}

	public function fill(array $data)
	{
        $this->maLoai = $data['maLoai'] ?? 0;
		$this->tenLoai = $data['tenLoai'] ?? '';
		return $this;
	}

}
