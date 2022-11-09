<?php

namespace App\Models;

class Product
{	
	public int $id = -1;
	public string $tenSanPham;
	public int $maLoai;
	public string $hinhAnh;
	public int $gia;
	public string $moTa;

	public function __construct(array $data = [])
	{
		$this->fill($data);
	}

    public static function all(): array
	{
		$products = [];

		$query = PDO()->prepare('select * from sanpham');
		$query->execute();
		while ($row = $query->fetch()) {
			$product = new Product();
			$product->fillFromDb($row);
			$products[] = $product;
		}

		return $products;
	}

	public static function findById(int $id)
	{
		$query = PDO()->prepare('select * from sanpham where id = :id');
		$query->execute(['id' => $id]);
		if ($row = $query->fetch()) {
			$product = new Product();
			$product->fillFromDb($row);
			return $product;
		}
		return null;
	}

	public function save()
	{
		$result = false;

		if ($this->id >= 0) {
			$query = PDO()->prepare('update sanpham set tenSanPham = :tenSanPham, maLoai = :maLoai,
                            hinhAnh = :hinhAnh, gia = :gia, moTa = :moTa where id = :id');
			$result = $query->execute([
				'id' => $this->id,
				'tenSanPham' => $this->tenSanPham,
				'maLoai' => $this->maLoai,
				'hinhAnh' => $this->hinhAnh,
				'gia' => $this->gia,
				'moTa' => $this->moTa
			]);
		} else {
			$query = PDO()->prepare('INSERT INTO sanpham VALUES (NULL, :tenSanPham, :maLoai, :hinhAnh, :gia, :moTa)');
			$result = $query->execute([
				'tenSanPham' => $this->tenSanPham,
				'maLoai' => $this->maLoai,
				'hinhAnh' => $this->hinhAnh,
				'gia' => $this->gia,
				'moTa' => $this->moTa
			]);
			if ($result) {
				$this->id = PDO()->lastInsertId();
			}
		}

		return $result;
	}

	protected function fillFromDb(array $row)
	{
		$this->id = $row['id'];
		$this->tenSanPham = $row['tenSanPham'];
		$this->maLoai = $row['maLoai'];
		$this->hinhAnh = $row['hinhAnh'];
		$this->gia = $row['gia'];
		$this->moTa = $row['moTa'];
		return $this;
	}

	public function fill(array $data)
	{
		$this->tenSanPham = $data['tenSanPham'] ?? '';
		$this->maLoai = $data['maLoai'] ?? 0;
		$this->hinhAnh = $data['hinhAnh'] ?? '';
		$this->gia = $data['gia'] ?? 0;
		$this->moTa = $data['moTa'] ?? '';
		return $this;
	}
	public function delete()
	{
		$query = PDO()->prepare('delete from sanpham where id = :id');
		return $query->execute(['id' => $this->id]);
	}
}
