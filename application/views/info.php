<div class="col-md-6">
	<div class="info">
		<img src="<?php echo base_url('./uploads/1.jpg'); ?>" alt="..." class="img-thumbnail"\>
		</br>
    <?php if (($this->session->hidden) == ($info['hiddenEmail'])) : ?>
      <div class="browse">
        <button type="button" class="btn btn-primary" onclick="document.getElementById('photo').click()">Upload Photo</button>
        <input type="file" id="photo" style="display:none;">
    </div>
  <?php else :  ?>
    <?php echo $this->session->hidden; ?>
    <?php echo $info['hiddenEmail']; ?>
    <?php endif ?>
		
	</div>
</div>
<div class="col-md-6">
	<div class="info">
	<table class="table">
       <tbody><tr>
         <td class="infoo">Name</td>
         <td class="infoo"><?php echo $info['fname'];?> <?php echo $info['lname'];?></td>
       </tr>
       <tr>
         <td class="infoo">Email</td>
         <td class="infoo"><?php echo $info['email']; ?></td>
       </tr>
       <tr>
         <td class="infoo">Age</td>
         <td class="infoo">20 years old</td>
       </tr>
       <tr>
         <td class="infoo">Gender</td>
         <td class="infoo"><?php echo $info['gender']; ?></td>
       </tr>
       <tr>
         <td class="infoo">Phone</td>
         <td class="infoo"><?php echo $info['phone']; ?></td>
       </tr>
       </tbody></table>
		<?php print_r($info) ?>
			<p>
				

			</p>
	</div>
</div>
