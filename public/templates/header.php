<header class="navbar bg-light text-dark p-sticky  z-index-1000 d-flex justify-center" id="mainHeader">
    <div class="d-flex justify-spacebetween container w-100vw">
        <div class="navbar_side d-flex align-content-center">
            <a href="http://localhost/KalaChio/home" class="link ajaxmainContent">
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
                    if (isset($_SESSION['id'])) {
                        echo "login";
                        ?>
                        <!-- <i class="dropdown_item fas fa-user-circle fa-2x brd-left pl-1"></i>
                        <ul class="dropdown_menu left">
                            <li><a href="https://faradars.org"><i class="fas fa-user-circle"></i>علی منصوری</a></li>
                            <li class="dropdown_menu_seprator"></li>
                            <li><i class="fas fa-box"></i>سفارش های من</li>
                            <li><i class="fas fa-sign-out-alt"></i>خروج</li>
                        </ul> -->
                        <?php
                    }else{
                        ?>
                        <a href="http://localhost/ElectronicShop/login" class="link ajaxmainContent">
                            <i class="fas fa-user-circle fa-2x brd-left pl-1"></i>
                        </a>
                        <?php
                    }
                    ?>


                </div>

                <div class="link modal-item" data-bind="modalcart">
                    <i class="fas fas fa-shopping-cart fa-2x pr-1 pos-rel">
                        <span class="badge small-badge badge-top-right badge-pill badge-danger pos-abs" id="cartnumber">0</span>
                    </i>
                </div>
            </div>
        </div>
    </div>
</header>