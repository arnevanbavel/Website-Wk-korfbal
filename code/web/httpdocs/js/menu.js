var menuOpened;
var menuOpenedId;
var menuOpenedIcon;
var menuOpenedClose;
var inProgress = false;

$(window).scroll(
    {
        previousTop: 0,
    }, 
    function () {
    	if ($(window).scrollTop() > 50) {
		    var currentTop = $(window).scrollTop();
		    var header = $('#header');

		    if (currentTop < this.previousTop) {
		    	if (header.hasClass("menuHidden")) {
		    		header.removeClass("hide");
		    		header.removeClass("menuHidden");
		    	};
		    } else {
		    	header.addClass("menuHidden");
		    	header.addClass("hide");
		    }
		    this.previousTop = currentTop;
		};
});

function ShowMenu(id) {
	if (!inProgress) {
		inProgress = true;
		if (menuOpenedId === id) {
			CloseMenu(id);
		} else {
			if (menuOpened != null) {
				CloseMenu(menuOpenedId);
			}
			menuOpened = $('#' + id + "Content");
			menuOpened.removeClass("hidden");
			menuOpened.addClass("show");

			menuOpenedId = id;
			menuOpenedIcon = $('#' + id + "Icon");
			menuOpenedIcon = $('#' + id + "Icon");
			menuOpenedIcon.animate({opacity: 0}, 200);
			menuOpenedClose = $('#' + id + "Close");
			var header = $('#header').addClass("activeMenu");
			setTimeout(function (){
				menuOpenedClose.animate({opacity: 1}, 300);
			}, 300);
			setTimeout(function (){
				inProgress = false;
			}, 300);
		}
	};
}

function CloseMenu(id) {
	menuOpenedClose = $('#' + id + "Close");
	menuOpenedIcon = $('#' + id + "Icon");
	menuOpened.removeClass("show");
	menuOpenedClose.animate({opacity: 0}, 200);
	var header = $('#header').removeClass("activeMenu");
	var oldMenuItem = menuOpenedIcon;
	var menuToHide = menuOpened;

	setTimeout(function (){
		oldMenuItem.animate({opacity: 1}, 200);
		menuToHide.addClass("hidden");
	}, 200);

	setTimeout(function (){
		inProgress = false;
	}, 200);
	menuOpened = null;
	menuOpenedClose = null;	
	menuOpenedId = null;
}











