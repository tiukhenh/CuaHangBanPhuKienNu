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
    <div class="container">
        <h1 class="mt-2">Danh mục sản phẩm</h1>
        <a href="/customer/add" class="text-violet">Thêm mới</a>
        <table class="table">
            <thead class="backgound-violet">
                <tr >
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Mô tả</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1;
                foreach ($products as $product) : ?>
                    <tr id="<?= $product->id ?>">
                        <td><?= $stt ?></td>
                        <td><?= $product->tenSanPham ?></td>
                        <td><?= $product->maLoai ?></td>
                        <td><img src="<?= $product->hinhAnh ?>" alt=""width="80rem"></td>
                        <td><?= $product->gia ?></td>
                        <td><?= $product->moTa ?></td>
                        <td>
                            <a class="text-violet" href="/customer/edit/<?= $product->id ?>">Sửa</a>
                            <a class="delete text-violet" href="#">Xóa</a>
                        </td>
                    </tr>
                <?php $stt++;
                endforeach ?>
            </tbody>
        </table>
    </div>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/footer.php';
    ?>
    <script>
		$(() => {
			$('.delete').click((event) => {
				const trBook = $(event.target).parents('tr');
				const id = trBook.prop('id');
				const title = trBook.children('td:eq(1)').html();
				const question = `Bạn muốn xóa sản phẩm "${title}"?`;
				const ok = confirm(question);
				if (ok) {
					location.href = `delete/${id}`;

				}
				return ok;
			});
		});
    </script>

</body>
</html>