var activeSubMenu;

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










