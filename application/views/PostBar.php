
<div class="col-lg-8">
                <div class="well">
                    <?php ($this->session->flashdata('msg_error')) ? $error='1' : $error='';?>
                    <form id="addTweetForm" action="<?php echo base_url('Main/addPosts') ; ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea id="tweetTextarea" class="form-control" rows="3" name="content" placeholder="What's happening?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_tweet'); ?></button>
                        <div id="counter" style="float: right; position:relative;">
                            <input  type="file" name="TweetsUpload" class="PostUpload">
                            დარჩენილი სიმბოლოები: <span id="charactersLeft">140</span>
                        </div>
                        <?php if($error) echo form_error('content'); ?>
                    </form>
                </div>
               
                <div id="newTweets">


                   <?php foreach ($tweets as $row) : ?>
                    <div class="media" data-id="">
                        <a class="pull-left" href="<?php echo site_url('Main/info/' . $row['user_id']); ?>">
                            <img class="media-object" src="<?php echo base_url('./uploads/1.jpg'); ?>" alt="" style="with:62px; height:62px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">

                            <a href="<?php echo site_url('Main/info/' . $row['user_id']); ?>">
                            <label><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </label></a></br> 
                            </h4>
                            <small><?php echo $row['content']; ?></small></br></br>
                            <img class="TweetsImage img-thumbnail" src="<?php echo base_url('./uploads/' .$row['tweet_image_name']); ?>" alt="..." class="img-rounded"></br> 
                            <small><?php echo 'Posted ' .$row['add_date']; ?></small> 
                        </div>

                    
                    </div>
                  <?php endforeach; ?> 
                    <hr>
                    
                </div>    
                <nav> <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul> </nav>
                <!-- Blog Post -->
            </div> 