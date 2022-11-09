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
        <h3 class="mt-2"> Các Hóa Đơn </h3>
        <table class="table">
            <thead class="backgound-violet">
                <tr >
                    <th>Mã hóa đơn</th>
                    <th>Tên khách hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>số lượng</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1;
                foreach ($customers as $customer) : 
                    foreach ($bills as $bill) :
                        if ($bill->id_kh == $customer->id) {
                            foreach ($billDetails as $billDetail) :
                                if ($billDetail->id_hd == $bill->id_hd) {
                                    foreach ($products as $product) :
                                        if ($billDetail->id_sp == $product->id) { ?>
                                            <tr>
                                                <td><?=$bill->id_hd?></td>
                                                <td><?=$customer->name?></td>
                                                <td><?=$product->tenSanPham?></td>
                                                <td><?=$billDetail->soLuong?></td>
                                                <td><?=$product->gia?></td>
                                                <td><?=$product->gia*$billDetail->soLuong?></td>
                                                <td><?=$bill->diaChi?></td>
                                                <td><?=$bill->sdt?></td>
                                            </tr>
                                      <?php  
                                      }
                                    endforeach;   
                                }
                            endforeach;
                        }
                    endforeach?> 
                <?php $stt++;
                endforeach ?>
            </tbody>
        </table>
    </div>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/footer.php';
    ?>


</body>
</html>