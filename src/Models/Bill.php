<?php

namespace App\Models;

class Bill
{	
	public int $id_hd = -1;
    public int $id_kh = -1;
	public string $diaChi;
    public int $sdt;
    public string $ngayLap;


    public function createBill() {

        
    }

    public function __construct(array $data = [])
	{
		$this->fill($data);
	}

    public function save()
	{
		$result = false;
			$query = PDO()->prepare('INSERT INTO hoadon VALUES (NULL, :id_kh, :diaChi, :sdt, :ngayLap)');
			$result = $query->execute([
				'id_kh' => $this->id_kh,
				'diaChi' => $this->diaChi,
				'sdt' => $this->sdt,
				'ngayLap' => $this->ngayLap,
			]);
			if ($result) {
				$this->id_hd = PDO()->lastInsertId();
			}
		return $result;
	}

	// public function showBill(): array
	// {
	// 	$bills = [];

	// 	$query = PDO()->prepare('select h.id_hd, k.name, s.tenSanPham, c.soLuong, s.gia, s.gia*c.soLuong as tongtien, h.diaChi, h.sdt
	// 								from hoadon h join khachhang k on h.id_kh=k.id
	// 								join chitiethoadon c on h.id_hd=c.id_hd
	// 								join sanpham s on c.id_sp=s.id;');
	// 	$query->execute();
		

	// 	return $products;
	// }

	public static function all(): array
	{
		$bills = [];
		$query = PDO()->prepare('select * from hoadon');
		$query->execute();
		while ($row = $query->fetch()) {
			$bill = new Bill();
			$bill->fillFromDb($row);
			$bills[] = $bill;
		}

		return $bills;
	}

	protected function fillFromDb(array $row)
	{
		$this->id_hd = $row['id_hd'];
		$this->id_kh = $row['id_kh'];
		$this->diaChi = $row['diaChi'];
		$this->sdt = $row['sdt'];
		$this->ngayLap = $row['ngayLap'];
		return $this;
	}

    public function fill(array $data)
	{
		$this->id_kh = $data['id_kh'] ?? 0;
		$this->diaChi = $data['diaChi'] ?? '';
		$this->sdt = $data['sdt'] ?? 0;
		$this->ngayLap = $data['ngayLap'] ?? date('Y-m-d');
		return $this;
	}

}
