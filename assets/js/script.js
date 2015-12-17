$(document).ready(function(){
	$('#Signup').on('click', function(e){
		e.preventDefault();

		$('#login').hide('slow');
		$('#reg').show('slow');
	});
	$('#backMain').on('click', function(e){
		e.preventDefault();

		$('#reg').hide('slow');
		$('#login').show('slow');
	});
});

$('#searchIn').on('keyup', function(){
	_html = "";
	$.get('<?php echo base_url("Main/coment"); ?>',{ arg : $(this).val() }, function(resp){
		for (var i = 0; i < resp.length; i++) {
			_html += '<li>' + resp[i].content + '</li>'
		}
		$('#uels').html(_html);
		console.log(_html);
	},'json');
});


// function edit(thiss, content, id){
// 	edit = '<form id="addTweetForm" action="<?php echo base_url();?>" method="POST" enctype="multipart/form-data">' +
//         '<div class=" fainds form-group">'+
//             '<textarea id="tweetTextarea" value="'+content+'" class="form-control" rows="3" name="content" placeholder="What"s happening?"></textarea>'+
//         '</div>'
//         '<button type="submit" class="btn btn-primary"> შეცვლა </button>'+
//     '</form>';
//     $(thiss).next('.media-heading').append(edit);
// }
