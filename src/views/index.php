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
        <div class= "row mt-2 justify-content-center">
            <div class="col col-md-3" id="list-show">
                <div class="card">
                    <div class="card-header text-white">
                      Danh mục sản phẩm
                    </div>
                    <ul class="list-group list-group-flush">                           
                      <li class="list-group-item"><a href="" class="text-violet">Phụ kiện tóc</a></li>
                      <li class="list-group-item"><a href="" class="text-violet"> Kính mát</a></li>
                      <li class="list-group-item"><a href="" class="text-violet">Trang sức</a></li>
                      <li class="list-group-item"><a href="" class="text-violet">Tất vớ</a></li>
                    </ul>
                  </div>
            </div>
            <div class="col col-md-9">
                <div><h1 class="text-violet">Sản phẩm</h1></div>
                <hr>
                <div class="row justify-content-center">
                    <?php
                    foreach ($products as $product) : ?>
                        <div class="card col-lg-3 col-md-5 col-6 m-3"style="width: 18rem;" id="<?= $product->id ?>">
                            <div class="">
                                <a href="/customer/product-detail/<?= $product->id ?>"><img class="card-img-top mt-2" src="<?= $product->hinhAnh ?>" alt="" srcset=""></a>                         
                            </div>
                            <div class="card-body ">
                                <a href="/customer/product-detail/<?= $product->id ?>" class="text-dark"><?= $product->tenSanPham ?></a>
                            </div>
                            <div class="card-footer mb-2 text-center text-white font-weight-bold">
                                <span class=""><?= $product->gia ?>đ </span>
                                <a href="/customer/product-detail/<?= $product->id ?>" class="text-white"><i class='fas fa-shopping-cart mx-3'></i></a>
                            </div>
                        </div>
                    <?php 
			        endforeach ?>

    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/footer.php';
    ?>
    <style>
        a:hover img{
            transform: scale(1.1);
        }

    </style>
    <script>
        
    </script>

</body>
</html>