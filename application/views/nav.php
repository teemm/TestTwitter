 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url('/main/site/');?>">Main</a>
                    </li>
                </ul>
                  <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo site_url('/main/setLanguage/english'); ?>"><img style="with:20px; height:20px;" src="<?php echo base_url('./uploads/english.png'); ?> "></a>
                </li>
                <li>
                    <a href="<?php echo site_url('/main/setLanguage/georgian'); ?>"><img style="with:20px; height:20px;"src="<?php echo base_url('./uploads/georgia.png'); ?> "></a>
                </li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-circle" src="<?php echo base_url('./uploads/1.jpg'); ?>" alt="" width="30" height="20"></a>
                  <ul class="dropdown-menu">
                 
                    <li><a href="<?php echo site_url('Main/settings');?>"><i class="fa fa-cog"></i> Settings </a></li>
                    <li><a href="<?php echo site_url('/Main/logOut'); ?>"><i class="fa fa-sign-out"></i> Log Out </a></li>
                   
                  </ul>
                </li>

                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        <div class="container">

        <div class="row">