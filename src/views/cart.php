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
    <script>
        function updateQuantity(id, inputQty) {
            let quantity = inputQty.value;
            if (quantity > 0) {
                window.location.href = '/customer/cart/updateQuantity/'+id+'/'+quantity;
            }   
        }

        function choiceProduct(){
            let checkboxList =  document.querySelectorAll('input[type=checkbox]');
            let priceList = document.querySelectorAll('.price');
            let quantityList = document.querySelectorAll('input.input-qty');
            let total = 0;
            checkboxList.forEach((element,index)=>{
                if(element.checked){
                    let price = parseInt(priceList[index].innerText.replaceAll("đ",""));
                    let quantity = parseInt(quantityList[index].value);
                    total += price*quantity;
                }
            });
            document.querySelector(".total").innerText = total.toString() + "đ";
        }
        
    </script>
</head>
<body>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/header.php';
    ?>
    <form action="" method="post">
        <div class="container">
            <h4><a href="/customer/index" class="text-violet"> < </a> </h4>
            <div class="row detail justify-content-center m-3">
                <?php
                foreach ($cartDetail as $detail) {
                ?> 
                    <div class="col col-md-1">
                        <input type="checkbox" name="choice[]" id="<?=$detail['product']->id?>" onchange="choiceProduct()" class="mt-4 ml-4" value="<?=$detail['product']->id?>">
                    </div>
                    <div class="col col-md-3 col-sm-12">
                        <a href="" ><img src="<?=$detail['product']->hinhAnh?>" style="width: 8rem;"class="m-2"></a>
                        </div>
                    <div class="col col-md-8 col-sm-12">
                        <div class="row">
                        <div class="col col-md-5">
                            <h3 class="title"><?=$detail['product']->tenSanPham?></h3>
                                <div>
                                    <span class="price font-weight-bold"><?=$detail['product']->gia?>đ</span>
                                </div>
                                <div class="row d-flex text-left my-2">
                                    <label for="" class="ml-3">Số lượng: </label>
                                    <div class="buttons_added pl-2">
                                        <input aria-label="quantity" class="input-qty" max="100" min="1" name="soLuong" type="number" value=<?=$detail['quantity']?>
                                        onchange="updateQuantity(<?=$detail['product']->id?>, this)">    
                                    </div>    
                                </div> 
                        </div>
                        <div class="col col-md-1">
                            <a class="delete text-violet" href="/customer/cart/delete/<?=$detail['product']->id?>">Xóa</a>
                        </div>  
                        </div>
                            
                    </div> 
                    
                <?php
                }           
                ?>
            </div>  
            <div class="row detail justify-content-center m-3">
                <div class="col col-md-1"></div>
                <div class="col col-md-3"></div>
                <div class="col col-md-8">
                    <div class="row">
                    <div class="col col-md-5 row"> 
                        <div class="col col-md-5"> <h6>Tổng tiền </h6></div>
                        <div class="total col col-md-5">0đ</div>
                    </div>
                    
                    <div class="col col-md-3">
                        <input type="text" name="diaChi" required placeholder="Địa chỉ" class="m-1">
                        <input type="text" length="10" name="sdt" placeholder="số điện thoại" class="m-1">
                        <button type="submit" class="btn btn-outline-violet text-white backgound-violet m-2 d-flex justify-content-end">Đặt hàng</button>
                        
                    </div>
                    </div>
                </div> 
            </div>     
        </div>
    </form>
    <?php
    require_once ROOT_DIR . '/src/views/blocks/footer.php';
    ?>
    

</body>
</html>
