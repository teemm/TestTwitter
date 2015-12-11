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
                        <a href="<?php echo base_url('/main/index/'); ?>">Main</a>
                    </li>
				
                </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form id="logout" action="" method="POST">
                        <a href="<?php echo site_url('/main/setLanguage/english'); ?>">english</a>
                        <a href="<?php echo site_url('/main/setLanguage/georgian'); ?>">ქართული</a>
                        <a href=" <?php echo  base_url('/Main/logOut'); ?> "><span class="glyphicon glyphicon-log-in"></span>LogOut</a>
                        </form>
                    </li>
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
        <div class="container">

        <div class="row">