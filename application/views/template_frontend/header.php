<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue brand-primary">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
        <a href="index.html" class="b-brand">
            <div class="b-bg">
                E
            </div>
            <span class="b-title">Explorer</span>

        </a>
    </div>
    <a class="mobile-menu" id="mobile-header" href="#!">
        <i class="feather icon-more-horizontal"></i>
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
            <!-- <li class="nav-item">
                <div class="main-search">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search_text" name="search_text" placeholder="Search . . .">
                        <a href="#!" class="input-group-append search-close">
                            <i class="feather icon-x input-group-text"></i>
                        </a>
                        <button class="input-group-append search-btn btn btn-primary">
                            <i class="feather icon-search input-group-text"></i>
                        </button>
                    </div>
                </div>
            </li> -->
        </ul>
        <ul class="navbar-nav ml-auto">
          
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon feather icon-settings"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <ul class="pro-head">
                            <li><a href="<?php echo site_url('auth/login') ?>" class="dropdown-item"><i class="feather icon-unlock"></i> Login</a></li>
                        </ul>
                        <ul class="pro-body">
                            <li><a href="#!" class="dropdown-item"><i class="feather icon-settings"></i>Info</a></li>
                            <li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i> Tentang Kami</a></li>
                            <!-- <li><a href="message.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li> -->
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>


</header>