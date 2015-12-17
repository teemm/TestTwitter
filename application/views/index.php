<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



    <!-- Navigation -->

    <!-- Page Content -->


            <!-- Blog Post Content Column -->

                <?php 
                	$data['tweets']=$tweets;
                	$data['myinfo']=$myinfo;
                	$this->load->view('PostBar', $data); ?>
            <!-- Blog Sidebar Widgets Column -->

                <!-- Blog Search Well -->
                <?php $this->load->view('Search'); ?>
            

       
    <!-- /.container -->

    <!-- jQuery -->
 