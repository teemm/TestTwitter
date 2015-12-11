<div class="col-lg-8">
                <div class="well">
                    <form id="addTweetForm" action="" method="POST" role="form">
                        <div class="form-group">
                            <textarea id="tweetTextarea" test="test123" class="form-control" rows="3" name="content" placeholder="What's happening?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('add_tweet'); ?></button>
                        <div id="counter" style="float: right">
                            დარჩენილი სიმბოლოები: <span id="charactersLeft">140</span>
                        </div>
                    </form>
                </div>
               
                <div id="newTweets">


                   <?php foreach ($tweets as $row) : ?>
                    <div class="media" data-id="">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="<?php echo base_url('./uploads/1.jpg'); ?>" alt="" style="with:62px; height:62px;">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">

                            <a href="<?php echo site_url('Main/info/' . $row['user_id']); ?>">
                            <label><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </label></a>
                            <small><?php echo $row['add_date']; ?></small> 
                              
                            </h4>
                            <small><?php echo $row['content']; ?></small> 
                        </div>

                    
                    </div>
                  <?php endforeach; ?> 
                    <hr>
                    
                </div>    
                <nav> <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul> </nav>
                <!-- Blog Post -->
            </div> 