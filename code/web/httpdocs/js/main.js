var menuIsOpen = 0;

var menuOpened;
var menuOpenedId;
var menuOpenedIcon;
var menuOpenedClose;
var menuFading;
var activeSubMenu;
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
		    		header.removeClass("menuHidden");
		    	};
		    } else {
		    	header.addClass("menuHidden");
		    }
		    this.previousTop = currentTop;
		};
});

function ShowMenu(id) {
	if (!inProgress) {
		inProgress = true;
		console.log("fire");
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
			}, 200);
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

function SlideMenuDeeper(id) {
	var altMenu = $('#altMenu').addClass("slideMenuDeeper");
	var subMenuToShow = $('#' + id + 'SubMenu');
	activeSubMenu = subMenuToShow;
	subMenuToShow.addClass("activeSubMenu");
}

function SlideMenuBack() {
	var altMenu = $('#altMenu').removeClass("slideMenuDeeper");
	setTimeout(function (){
		activeSubMenu.removeClass("activeSubMenu");
	}, 200);
}

function ShowAltMenu() {
	var canvas = $('#canvas').removeClass("menuReverse");
	var header = $('#header').removeClass("menuReverse");
	var canvas = $('#canvas').addClass("menuSlide");
	var header = $('#header').addClass("menuSlide");
	header.addClass("activeMenu");
	var menuIcon = $('#altMenuIcon').addClass("hide");
	var menuIcon = $('#altMenuClose').addClass("show");
}

function CloseAltMenu() {
	var canvas = $('#canvas').removeClass("menuSlide");
	var header = $('#header').removeClass("menuSlide");
	var canvas = $('#canvas').addClass("menuReverse");
	var header = $('#header').addClass("menuReverse");
	header.removeClass("activeMenu");
	var menuIcon = $('#altMenuIcon').removeClass("hide");
	var menuIcon = $('#altMenuClose').removeClass("show");
	if (activeSubMenu) { SlideMenuBack(); };
}

var currentSlide = 2;

function SlideLeft() {

	var slider = $('#slider');
	var arrowLeft = $('#arrowleft');
	var arrowRight = $('#arrowright');
	var slide1 = $('#slide1');
	var slide2 = $('#slide2');
	var slide3 = $('#slide3');

	switch(currentSlide) {
		case 2:
			slider.animate({left: "800px"}, 1200);
			arrowLeft.animate({opacity: 0}, 1000);
			slide1.animate({opacity: 1}, 1200);
			slide2.animate({opacity: 0}, 1200);
			break;
		case 3:
			slider.animate({left: "0%"}, 1200);
			arrowRight.animate({opacity: 1}, 1000);
			slide2.animate({opacity: 1}, 1200);
			slide3.animate({opacity: 0}, 1200);
	}

	currentSlide--;

}

function SlideRight() {

	var slider = $('#slider');
	var arrowLeft = $('#arrowleft');
	var arrowRight = $('#arrowright');
	var slide1 = $('#slide1');
	var slide2 = $('#slide2');
	var slide3 = $('#slide3');
	
	switch(currentSlide) {
		case 2:
			slider.animate({left: "-800px"}, 1200);
			arrowRight.animate({opacity: 0}, 1000);
			slide2.animate({opacity: 0}, 1200);
			slide3.animate({opacity: 1}, 1200);
			break;
		case 1:
			slider.animate({left: "0%"}, 1200);
			arrowLeft.animate({opacity: 1}, 1000);
			slide1.animate({opacity: 0}, 1200);
			slide2.animate({opacity: 1}, 1200);
	}

	currentSlide++;
}









