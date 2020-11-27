 <div id="top-nav" class="fixed">

     <a href="<?php echo url("company/banner");?>" class="brand">
                <span>GMT</span>
                <span class="text-toggle"> Admin</span>
            </a>    <!-- END : brand -->

            <button type="button" class="navbar-toggle pull-left" id="sidebarToggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> <!-- END : Mobile toggle -->

            <ul class="nav-notification clearfix"><li class="profile dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <strong>Admin</strong>
                        <span><i class="fa fa-chevron-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="clearfix" href="javascript:void(0);">
                                <img src="<?php echo LIBS?>assets/images/demo/gmt-avatar.jpg" alt="User Avatar">
                                <div class="detail">
                                    <strong>Admin</strong>
                                    <p class="grey"><?php echo viewbag("email")?></p> 
                                </div>
                            </a>
                        </li>
                        <li><a tabindex="-1" href="<?php echo url("account/password"); ?>" class="main-link"><i class="fs fs-locked fa-lg"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="<?php echo url("account/logout"); ?>" class="main-link"><i class="fa fa-key fa-lg"></i> Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>  <!-- END : top-nav-->

        <aside>	
            <div class="sidebar-inner">

                <div class="size-toggle">
                    <a class="btn btn-sm" id="sizeToggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="btn btn-sm pull-right" href="<?php echo url("account/logout"); ?>">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div><!-- /size-toggle -->	

<div class="main-menu">
                    <ul>
                        <?php 
                            # active the highlight dynamically
                            global $page;
                            $active = 'class="active"';
                        ?>
                        <li <?php echo ($page == 'banner')?$active:'' ?> >
                            <a href="<?php echo url("company/banner"); ?>">
                                <span class="menu-icon"><i class="di di-format-gallery fa-lg"></i></span>
                                <span class="text">Banner Slider</span>
                            </a>
                        </li>

                        <li <?php echo ($page == 'about')?$active:'' ?>>
                            <a href="<?php echo url("company/about"); ?>">
                                <span class="menu-icon"><i class="di di-editor-alignleft fa-lg"></i></span>
                                <span class="text">About Us</span>
                                
                            </a>
                        </li>

                        <li <?php echo ($page == 'plist' || $page == 'add')?$active:'' ?>>
                            <a href="<?php echo url("product/plist"); ?>">
                                <span class="menu-icon"><i class="fs  fs-hanger fa-lg"></i></span>
                                <span class="text">Products Item</span>
                            </a>
                        </li>

                    </ul>

                </div><!-- END : main-menu -->
            </div><!-- END : sidebar-inner -->
        </aside>