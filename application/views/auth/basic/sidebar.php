<div class="cus-sidebar-sticky sidebar-detached sidebar-left sidebar-sticky hidden-xs">
    <div class="sidebar">
        <div class="sidebar-content card d-none d-lg-block">
            <div class="card-body main-menu menu-light menu-shadow ">
                <?php
                foreach ($side_menus as $side_menuName => $side_menuValues) {
                    ?>
                    <h4 class="card-title"><?= $side_menuName ?></h4>
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <?php foreach ($side_menuValues as $side_menuValue) { ?>
                            <li class="nav-item <?= $side_menuValue['active'] ?>"><a href="<?= base_url($side_menuValue['link']) ?>"><i class="la la-hand-o-right"></i><span class="menu-title"><?= $side_menuValue['name'] ?></span></a></li>
                                    <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
