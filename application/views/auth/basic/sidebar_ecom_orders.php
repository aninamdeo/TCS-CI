<div class="cus-sidebar-sticky sidebar-detached sidebar-left sidebar-sticky">
    <div class="sidebar">
        <div class="sidebar-content card d-none d-lg-block">
            <div class="card-body main-menu menu-light menu-shadow ">
                <h4 class="card-title">E-Commerce Order Modules</h4>
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item <?= $p1 ?>"><a href="<?= base_url('Auth/Ecom/Orders') ?>"><i class="la la-hand-o-right"></i><span class="menu-title">All Orders</span></a></li>
                    <li class="nav-item <?= $p11 ?>"><a href="<?= base_url('Auth/Ecom/Orders/search/?shipping=!Delivered&payment=Paid&m=1') ?>"><i class="la la-hand-o-right"></i><span class="menu-title">Undelivered Orders</span></a></li>
                    <li class="nav-item <?= $p12 ?>"><a href="<?= base_url('Auth/Ecom/Orders/search/?payment=!Paid&m=2') ?>"><i class="la la-hand-o-right"></i><span class="menu-title">Unpaid Orders</span></a></li>
                    <li class="nav-item <?= $p13 ?>"><a href="<?= base_url('Auth/Ecom/Orders/search/?status=Pending&m=3') ?>"><i class="la la-hand-o-right"></i><span class="menu-title">Pending Orders</span></a></li>
                    <li class="nav-item <?= $p14 ?>"><a href="<?= base_url('Auth/Ecom/Orders/search/?payment=Paid&m=4') ?>"><i class="la la-hand-o-right"></i><span class="menu-title">Paid Orders</span></a></li>
                    <li class="nav-item <?= $p15 ?>"><a href="<?= base_url('Auth/Ecom/Orders/search/?shipping=Delivered&m=5') ?>"><i class="la la-hand-o-right"></i><span class="menu-title">Delivered Orders</span></a></li>
                     <li class="nav-item <?= $p16 ?>"><a href="<?= base_url('Auth/Ecom/Orders/search/?status=Returned&m=6') ?>"><i class="la la-hand-o-right"></i><span class="menu-title">Returned Orders</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
