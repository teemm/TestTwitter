<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



    <!-- Navigation -->

    <!-- Page Content -->


            <!-- Blog Post Content Column -->
                <?php $this->load->view('PostBar', $tweets); ?>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <?php $this->load->view('Search'); ?>
            </div>

       
    <!-- /.container -->

    <!-- jQuery -->
 