<?php

namespace App\Models;

class BillDetail
{	
	public int $id_hd = -1;
    public int $id_sp = -1;
    public int $soLuong;

    public function __construct(array $data = [])
	{
		$this->fill($data);
	}

    public function save()
	{
			$query = PDO()->prepare('INSERT INTO chitiethoadon VALUES (:id_hd, :id_sp, :soLuong)');
			$result = $query->execute([
				'id_hd' => $this->id_hd,
				'id_sp' => $this->id_sp,
				'soLuong' => $this->soLuong,
			]);
		return true;
	}

	public static function all(): array
	{
		$billDetails = [];
		$query = PDO()->prepare('select * from chitiethoadon');
		$query->execute();
		while ($row = $query->fetch()) {
			$billDetail = new BillDetail();
			$billDetail->fillFromDb($row);
			$billDetails[] = $billDetail;
		}

		return $billDetails;
	}

	protected function fillFromDb(array $row)
	{
		$this->id_hd = $row['id_hd'];
		$this->id_sp = $row['id_sp'];
		$this->soLuong = $row['soLuong'];
		return $this;
	}

    public function fill(array $data)
	{
		$this->id_hd = $data['id_hd'] ?? 0;
		$this->id_sp = $data['id_sp'] ?? 0;
		$this->soLuong = $data['soLuong'] ?? 0;
		return $this;
	}

}
