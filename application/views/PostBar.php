<div class="container">
<div class="row">
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
                    <div class="media borderTweet" data-id="">
                        <a class="pull-left" href="<?php echo site_url('Main/info/' . $row['user_id']); ?>">
                            <div class="media-object" style="background:url(<?php echo base_url('./uploads/1.jpg'); ?>) no-repeat center center /cover;" alt=""></div>
                        </a>
                            <h4 class="media-heading">

                            <a href="<?php echo site_url('Main/info/' . $row['user_id']); ?>">
                            <label class="posted_by"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </label></a>
                                

                            <label class="posted_date"><?php echo 'Posted ' .$row['add_date']; ?></label>
                            </h4></br>
                            <?php if ($row['user_id'] == $myinfo):?>


  
                                <div class="settingsPosts">
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                      <ul class="dropdown-menu">
                                     
                                        <li><a href="<?php echo site_url('/Main/settings');?>"><i class="fa fa-cog"></i> Edit </a></li>
                                        <li><a href="<?php echo site_url('/Main/delete/' .$row['id']); ?>"><i class="fa fa-sign-out"></i> Delete </a></li>
                                       
                                      </ul>
                                    </li>
                                </div>

                            <?php endif ?>

                            <small><?php echo $row['content']; ?></small></br></br>
                            <img class="TweetsImage img-thumbnail" src="<?php echo base_url('./uploads/' .$row['tweet_image_name']); ?>" alt="..." class="img-rounded"></br> 
                            
                                <div class="likeshare">

                                    <span><a href="#"><i class="fa fa-heart fa-2x"></i></a></span>
                                    <span><a href="#"><i class="fa fa-comments-o fa-2x"></i></a></span>
                                    
                                </div>

                            <div class="TweetComent">
                                <div>
                                    <form action="<?php echo site_url('main/insertComent');?>" method="POST">
                                        <input class="comminput" name="coment" type="text" placeholder="კომენტარის დამატება">
                                        <input type="hidden" name="hiddenComent" value="<?php echo $row['id']; ?>">
                                        <button class="btn btn-primary">გაგზავნა</button>
                                    </form>
                                </div>



                            <section class="comments">
                                <?php foreach ($row['comments'] as $comment):?>
                                  <article class="comment">
                                  <a class="comment-img" href="<?php echo site_url('Main/info/' . $row['user_id']); ?>">
                                    <img src="<?php echo base_url('./uploads/1.jpg'); ?>" alt="" width="50" height="50">
                                  </a>
                                  <div class="comment-body">
                                    <div class="text">
                                      <p><?php echo $comment['content']; ?></p>
                                    </div>
                                    <p class="attribution">by <a href="<?php echo site_url('Main/info/' . $row['user_id']); ?>"><?php echo $comment['fname']; ?> <?php echo $comment['lname']; ?></a> <?php echo 'Comented At ' .$comment['add_date']; ?></p>
                                  </div>
                                </article>
                                <?php endforeach; ?>
                            </section>​
                           
                                


                        </div>

                    
                    </div>
                  <?php endforeach; ?> 
                    <hr>
                    
                </div>    
                <nav> <ul class="pagination"><?php echo $this->pagination->create_links(); ?></ul> </nav>
                <!-- Blog Post -->
            </div> 