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

</head>
<body>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/header.php';
    ?>
    <div class="container">
        <h4><a href="/customer/index" class="text-violet"> < </a> </h4>
        
        <form action="" method="POST">
        <div class="row detail justify-content-center m-3">
            <div class="col col-md-5 col-sm-12 detail-img justify-content-center">
                <a href=""><img style="width: 20rem;" src="<?= $product->hinhAnh ?>" alt="" srcset=""></a>
            </div>
            <div class="col col-md-7 col-sm-12 detail-att">
                <h1 class="title"><?= $product->tenSanPham ?></h1>
                <div>
                    <span class="price font-weight-bold"><?= $product->gia ?>đ</span>
                </div>
                <div class="row d-flex text-left my-2">
                    <label for="" class="ml-3">Số lượng: </label>
                    <div class="buttons_added pl-2">
                        <input aria-label="quantity" class="input-qty" max="100" min="1" name="soLuong" type="number" value="1">    
                    </div>
                   
                </div>
                <div class="row d-flex text-left">
                    <button class="btn btn-outline-violet text-white backgound-violet m-2" type="submit">Thêm vào giỏ hàng</button>
                   
                </div>
                <div>
                    <h6 class="pt-2">Mô Tả Sản Phẩm </h6>
                    <p ><?= $product->moTa ?></p>
                </div>
            </div> 
        </div>
        </form>
        
    </div>
    
    <?php
    require_once ROOT_DIR . '/src/views/blocks/footer.php';
    ?>
    <style>
        a:hover img{
            transform: scale(1.1);
        }
    </style> 


</body>
</html>