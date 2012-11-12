$(document).ready(function(){
	
	$('.cur-lang').click(function(e){

		var toLoad = $(this).attr('href');  
		e.preventDefault();

		if ($(this).attr('href') != '#') {
			if ($(this).attr('id') == 'lang-de' ) {
				$('#lang-ptr').animate({right: '25px'}, 150, 
						function(){ window.location = toLoad; });
			} else {
				$('#lang-ptr').animate({right: '70px'}, 150, 
						function(){ window.location = toLoad; });
			}
		}
	});

	$('.menu-button').hover(
			function() {
				$(this).css('background-color', '#262626'); 
			},
			function(){	
				$(this).css('background-color', 'black');
			}
	);	


	// slide toggle function
	$('.sl_box_title').click(function(){
		$content = $(this).next('.sl_box_content');//.parent().next();
		$content.slideToggle(400);
		//$(this).children('.sl_close_ptr').toggle().fadeToggle();
		$('.sl_box_content:visible').not($content).slideUp(200);
	});
	
	// comment toggling
	$('#toggle-comment').click(function(){
		var currentID = "#" + $('#comment-box .navi-comments:visible').attr('id');
		var split = currentID.split('-');
		var nextID = split[0] + '-' + (parseInt(split[1]) + 1);
		if ($(nextID).length <= 0) {
			nextID = split[0] + '-' + '1';
		}
		$(currentID).hide();
		$(nextID).show();
	});
	
	// remove this later
	$('.wf_field').attr('disabled', 'disabled');

});

