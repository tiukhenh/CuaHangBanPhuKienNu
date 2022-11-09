<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phụ kiện nữ</title>
    <link rel="icon" href="/img/icon.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/header.php';
    ?>
    <div class="container user-wrapper justify-content-center">
		<div class="row">
			<h2 class="user-nav text-center mb-3 col-sm-11"><?= $title ?></h2>
			<a href="/customer/admin" class="text-dark col-sm-1 mt-2"><i class="fas fa-times "></i></a>
		</div>
		
		<?php
		if (!empty($error)) {
			echo "<h6 class='error-message'>$error</h6>";
		}
		?>
		<form action="<?= $post_url ?>" method="post" >
			<input class="m-2" type="hidden" name="id" value="<?= $product->id ?>">
			<div class="form-group">
				<label for="" class="col-sm-3">Tên sản phẩm:</label>
				<input class="col-sm-8" type="text" name="tenSanPham" value="<?= $product->tenSanPham ?>">
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3">Loại sản phẩm:</label>
				<select name="maLoai" id="">
								<?php
								foreach ($productTypes as $productType) : 
									if($productType->maLoai == $product->maLoai) {
								?> 
									<option value="<?= $productType->maLoai?>" selected><?php echo $productType->tenLoai ?></option>
								<?php
									}
									else {
									?>
									<option value="<?= $productType->maLoai?>" ><?php echo $productType->tenLoai ?></option>
								<?php
									}			
								endforeach ?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="" class="col-sm-3">Hình ảnh:</label>
				<input class="col-sm-8" type="text" name="hinhAnh" value="<?= $product->hinhAnh ?>">
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3">Giá:</label>
				<input class="col-sm-8" type="number" name="gia" value="<?= ($product->gia > 0 ? $product->gia : '') ?>">
			</div>
			<div class="form-group">
				<label for="" class="col-sm-3">Mô tả:</label>
				<input class="col-sm-8" type="text" name="moTa" value="<?= $product->moTa ?>">
			</div>
			<button class="btn btn-outline-violet backgound-violet text-white btn-block">Lưu</button>
		</form>
		
    </div>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/footer.php';
    ?>

    <script>
        
    </script>

</body>
</html>
