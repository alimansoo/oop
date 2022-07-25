<?php
use App\Classes\Authentication;
use App\models\User;
$user = new User($_SESSION['email']);
?>
<header class="navbar bg-light text-dark p-sticky  z-index-1000 d-flex justify-center" id="mainHeader">
    <div class="d-flex justify-spacebetween container w-100vw">
        <div class="navbar_side d-flex align-content-center">
            <a href="http://localhost/ElectronicShop/" class="link ajaxmainContent">
                <div class="navbar_brand text-primary txt-2x txt-bold">کالاچیو</div>
            </a>
        </div>
        <div class="navbar_side">
            <form action="" method="get">
                <input type="text" placeholder="جستجو..." name="q" class="search-box" id="SearchProduct-desktop">
            </form>
        </div>
        <div class="navbar_side">
            <div class="navbar_actions d-inline-flex">
                <div class="dropdown" id="headerDropdown">
                    <?php
                    if (Authentication::Logedin()) {
                        ?>
                        <div class="dropdown">
                            <a
                                    class=""
                                    href="#"
                                    role="button"
                                    id="dropdownMenuLink"
                                    data-mdb-toggle="dropdown"
                                    aria-expanded="false"
                            >
                                <i class="fas fa-user-circle fa-2x brd-left pl-1"></i>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#"><strong><?php
                                            echo $user->FullName();
                                            ?></strong></a></li>
                                <li><a class="dropdown-item" href="http://localhost/ElectronicShop/userpanel">حساب کاربری</a></li>
                                <li><a class="dropdown-item" href="http://localhost/ElectronicShop/logout">خروج</a></li>
                            </ul>
                        </div>
                        <?php
                    }else{
                        ?>
                        <a href="http://localhost/ElectronicShop/login">
                            <i class="fas fa-user-circle fa-2x brd-left pl-1"></i>
                        </a>
                        <?php
                    }
                    ?>


                </div>
                <a href="http://localhost/ElectronicShop/cart">
                    <div class="link modal-item" data-bind="modalcart">
                        <i class="fas fas fa-shopping-cart fa-2x pr-1 pos-rel">
                            <span class="badge small-badge badge-top-right badge-pill badge-danger pos-abs" id="cartnumber">0</span>
                        </i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>