<header class="header">
        <div class="backgound-violet ">
            <div class="container">
                <div class="navbar d-flex justify-content-end list-unstyled">
                    <a href="/customer/index" class="nav-item pr-5 text-white">Trang chủ</a>
                    <a href="" class="nav-item text-white">Giới Thiệu</a>
                </div>
            </div>
        </div>
        <div class="headerContent m-3">
            <div class="container">
                <div class="row">
                    <div class="col col-md-3 d-flex justify-content-start">
                        <img src="/img/logo.jpg" alt="" width="150px">
                    </div>
                    <div class="col col-md-6 d-flex justify-content-center align-items-center">
                        <form class="input-group ">
                            <input class="form-control btn-outline-violet" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                            <span>
                                <button class="btn btn-outline-violet backgound-violet rounded-right" type="submit">
                                    <i class="fas fa-search text-white"></i>
                                </button>  
                            </span>
                            
                          </form>
                    </div>
                    <div class="col col-md-3 d-flex justify-content-end align-items-center">
                        <?php
                            if (!isset($_SESSION['username'])) { 
                        ?>
                        <div class="">
                            <a href="/authentication/login" class="text-violet justify-content-start">Đăng nhập | </a>
                            <a href="/authentication/register" class="text-violet justify-content-start">Đăng ký</a>
                        </div>
                        <div class="text-violet pl-3">
                            <a href="/customer/cart"><i class='fas fa-shopping-cart'></i></a>
                        </div>
                        <?php }
                        else 
                            if ($_SESSION['username'] == 'admin') {  ?>
                                <div class="">
                                    <div class="row">
                                        <h5 class="mr-3 text-violet justify-content-start"> <?= $_SESSION['username'] ?></h5>
                                        <a href="/authentication/logout" class="text-violet justify-content-start mr-2">Đăng xuất </a>  
                                    </div>
                                    <div class="row">
                                        <a href="/customer/admin" class="mr-3 text-violet justify-content-start">Quản lý sản phẩm </a>
                                        <a href="/customer/allBill" class="text-violet justify-content-start">Quản lý hóa đơn </a>
                                    </div>
                                </div>
                       
                        <?php } 
                            else {?>
                        <div class="">
                            <h5 class="text-violet justify-content-start"> <?= $_SESSION['username'] ?></h5>
                            <a href="/authentication/logout" class="text-violet justify-content-start">Đăng xuất </a>
                        </div>
                        <div class="text-violet pl-3 position-relative ">
                            <a href="/customer/cart"><i class='fas fa-shopping-cart'></i></a>
                            <span class="badge badge-danger position-absolute top-0 right-0">
                                <?=isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0';?>
                            </span>
                        </div>
                        <?php } ?>
                        
                    </div>
                   
                </div>
                
            </div>
        </div>
        <div class="backgound-violet ">
            <div class="container">
                <div class="row">
                    <div class="dropdown">
                        <a class="dropdown-toggle text-white" href="#" data-toggle="dropdown">
                          Tất cả
                        </a>
                        <div class="dropdown-menu">
                            <a href="" class="dropdown-item text-violet">Phụ kiện tóc</a>
                            <a href="" class="dropdown-item text-violet"> Kính mát</a>
                            <a href="" class="dropdown-item text-violet">Trang sức</a>
                            <a href="" class="dropdown-item text-violet">Tất vớ</a>
                        </div>
                    </div>
                    <div>
                        <a href="" class="text-white pl-3">Phụ kiện tóc</a>
                    </div>
                    <div>
                        <a href="" class="text-white pl-3">Kính mát</a>
                    </div>
                    <div>
                        <a href="" class="text-white pl-3">Trang sức</a>
                    </div>
                    <div>
                        <a href="" class="text-white pl-3">Tất vớ</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
