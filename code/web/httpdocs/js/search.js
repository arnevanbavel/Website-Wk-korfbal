var timer;

$('#searchform').submit(function() {
  return false;
});

$( "#search-input" ).keyup(function(){
    console.log('yooo');
	timer = setTimeout(function(){

		var keyword = $('#search-input').val();

		if (keyword) {
			$.ajax({
            	url: 'http://dreamteam.mctantwerpen.kdg.be/search',
            	type: "POST",
            	data: {
            		'_token': $('input[name=_token]').val(),
                	'keyword': keyword
            	},
            		
            	success: function(data){
					$('#search-results').html(data);
            	},
            	error: function(xhr, status, error){
            		console.log(error);
            	},
        	});

		}
		else{
			$('#search-results').html(null);
		}
	},500)
});

$( "#search-input" ).keydown(function(){
	clearTimeout(timer);
});