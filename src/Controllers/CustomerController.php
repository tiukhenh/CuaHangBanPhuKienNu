<?php

namespace App\Controllers;
use App\Models\Authentication;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Bill;
use App\Models\BillDetail;
class CustomerController
{	
	public function index()
	{
		$data =  [
			'products' => Product::all()
		];
		render_view('index',$data);
	}
	public function detail($id)
	{	$product = Product::findById($id);
		$data = [
			'product' =>$product
		];
		render_view('detail',$data);
	}
	public function admin() {
		$data =  [
			'products' => Product::all()
		];
		render_view('admin',$data);
	}
	public function showEditPage($id)
	{
		$product = Product::findById($id);
		if (!$product) {
			redirect('/errors/404');
		}
		$data = [
			'title' => 'Cập nhật sản phẩm',
			'error' => session_get_flash('error'),
			'post_url' => '/customer/' . $id, //route cua update
			'product' => $product,
			'productTypes' => ProductType::showLoai()
		];

		render_view('edit', $data);
	}
	public function update($id)
	{
		$product = Product::findById($id);
		if ($product && $product->fill($_POST)->save()) {
			redirect('/customer/admin');
		}

		$_SESSION['error'] = 'Đã có lỗi xảy ra.';
		redirect('/customer/edit/' . $id);
	}

	public function showAddPage()
	{
		$data = [
			'title' => 'Thêm sản phẩm mới',
			'error' => session_get_flash('error'),
			'post_url' => '/customer/create', //route cua create
			'product' => new Product(),
			'productTypes' => ProductType::showLoai()
		];

		render_view('edit', $data);
	}
	public function create()
	{
		$product = new Product();
		if ($product->fill($_POST)->save()) {
			redirect('/customer/admin');
		}

		$_SESSION['error'] = 'Đã có lỗi xảy ra.';
		redirect('/customer/edit');
	}
	public function productType() {
		$data1 =  [
			'productTypes' => ProductType::showLoai()
		];
		render_view('edit',$data1);
	} 
	public function delete($id)
	{
		$product = Product::findById($id);
		if ($product) {
			$product->delete();
		}

		redirect('/customer/admin');
	}

	public function cart()
	{
		$cartDetail = [];
		if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $detail){
				$cartDetail[] =	[
					"product"=>Product::findById($detail[0]),
					"quantity"=>$detail[1]
				];
            }
        }
		$data =  [
			'cartDetail'=>$cartDetail
		];
		render_view('cart',$data);
	}
	public function order($id) {
		if(isset($_POST['soLuong']) && isset($_SESSION['username']) ) {
			$soLuong = $_POST['soLuong'];
			$maSP = $id;
			if (isset($_SESSION['cart'])) {
				$DSmaSP = array_column($_SESSION['cart'], 0); //all masp trong cart
				if (!in_array($maSP, $DSmaSP)) {
					$_SESSION['cart'][] = [
						$maSP,
						$soLuong 	
					];
				}
			}
			else {
				$_SESSION['cart'][] = [
					$maSP,
					$soLuong	
				];
			}
		}
		redirect('/customer/index');
	}
	public function deleteProductInCart($id) {
		$DSmaSP = array_column($_SESSION['cart'], 0);
		$maSP = $id;
		array_splice($_SESSION['cart'], array_search($maSP, $DSmaSP), 1);//mảng, chỉ số, 1 phần tử
		redirect('/customer/cart');
		
	}
	public function updateQuantity($id, $quantity) {
		$DSmaSP = array_column($_SESSION['cart'], 0);
		$maSP = $id;
		$_SESSION['cart'][array_search($maSP, $DSmaSP)][1] = $quantity;
		redirect('/customer/cart');
	}
	public function createBill()
	{
		$data = $_POST;
		// echo "<pre>";
		// print_r($data);
		if (isset($data['choice'])){
			$sdt = $data['sdt'];
			$diaChi = $data['diaChi'];
			$id_kh = $_SESSION['SessionId'];
			$billData = [
				'id_kh' => $id_kh,
				'diaChi' => $diaChi,
				'sdt' => $sdt
			];
			$bill = new Bill();
			if ($bill->fill($billData)->save()) {
				$billId = $bill->id_hd;
				foreach($data['choice'] as $choice) {
					$DSmaSP = array_column($_SESSION['cart'], 0);
					$maSP = $choice;
					$quantity = $_SESSION['cart'][array_search($maSP, $DSmaSP)][1];
					$billDetailData =[
						'id_hd' => $billId,
						'id_sp' => $maSP,
						'soLuong' => $quantity,
					];
					$billDetail = new BillDetail();
					if ($billDetail->fill($billDetailData)->save()) {
						array_splice($_SESSION['cart'], array_search($maSP, $DSmaSP), 1); //đã thêm vào chitietHD=>đã đặt thì xóa trong giỏ
					}
				}
			}
		}
		redirect('/customer/cart');
	}
	public function bill() {
		$data =  [
			'bills' => Bill::all(),
			'customers'=> Authentication::all(),
			'billDetails' => BillDetail::all(),
			'products' => Product::all()
		];
		render_view('bill',$data);
	}
}
