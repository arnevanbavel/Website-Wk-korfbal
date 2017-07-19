$(function() {
	$('#changeHeader').waypoint(function(direction) {
	    switch(direction)
	    {
	        case"down":
	            $('#header').addClass("altHeader");
	            break;
	        case"up":
	            $('#header').removeClass("altHeader");
	            break;
	    }
	}, {offset: 80});
})







