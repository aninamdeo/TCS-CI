<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>

                    <li class="nav-item"><a href="<?= base_url('Webadmin') ?>" class="navbar-brand nav-link"><img alt="branding logo" style="width:100%;" src="<?= base_url($basic_details->logo) ?>" data-expand="<?= base_url($basic_details->logo) ?>" data-collapse="<?= base_url($basic_details->logo) ?>" class="brand-logo"></a></li>

                    <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>

                </ul>
            </div>
            <div class="navbar-container content container-fluid">
                <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
                            
                        <li class="nav-item nav-search"><a href="#" class="nav-link nav-link-search fullscreen-search-btn"><i class="ficon icon-search7"></i></a></li>

                        <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
                    
                    </ul>
                    <ul class="nav navbar-nav float-xs-right">
                        <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="user-name">News World</span></a>
                        
                        <div class="dropdown-menu dropdown-menu-right">
                            <div>
                                <a href="<?= base_url('Webadmin/logout') ?>" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                            </div>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<div class="fullscreen-search-overlay"></div>