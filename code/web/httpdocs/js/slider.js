var startSlide = 1;
var currentSlide;
var destinationSlide;
var numberToSlide;
var slider;
var timeToWait;
var initial = true;
var stopDuration = 5000;
var slideSpeed = 1000;
var activeBullet;
var running = false;
var sliderTimer;
var disable = false;

function StartTimer() {
    if (initial) {
        setTimeout(function(){
            PermissionToSlide();
            sliderTimer = setTimeout(function(){StartTimer()}, stopDuration);
        }, (stopDuration / 2));
        initial = false;
    } else {
        PermissionToSlide();
        sliderTimer = setTimeout(function(){StartTimer()}, stopDuration);
    }     
}

function PermissionToSlide() {
    if (running == false && disable != true) {
        running = true;
        
        if (startSlide == 3) {
            destinationSlide = 1;
        } else {
            destinationSlide = startSlide + 1;
        }
        
        SlideNext();
    }
}

function SlideNext() {
    slider = $('#slider');
   
    numberToSlide = destinationSlide - startSlide;
    
    if (numberToSlide > 0) {
        parameter = 100 * startSlide;
        slider.animate({left: "-" + parameter + "vw"}, slideSpeed, "swing");
        startSlide = startSlide + 1;
        timeToWait = slideSpeed * numberToSlide;

    } else {
        slider.animate({left: "0px"}, slideSpeed, "swing");
        startSlide = 1;
        timeToWait = slideSpeed;
        disable = true;
        setTimeout(function(){disable = false}, timeToWait);
    }
    running = false;
    
    UpdateBullets(timeToWait);
}

function UpdateBullets(timeout) {
    if (activeBullet != null) {
        activeBullet.removeClass("active");
    } else {
        activeBullet = $("#bullet1");
        activeBullet.removeClass("active");
    }
    activeBullet = $('#bullet' + startSlide);
    setTimeout(function(){activeBullet.addClass("active")}, timeout);
    
}

function PermissionToSlideTo(location) {
    if (running == false) {
        running = true;
        disable = true;
        
        SlideTo(location);
    }
}

function SlideTo(location) { 
    slider = $('#slider');

    location = location.slice(6, 7);
    parseInt(location, location);
    numberToSlide = location - startSlide;

    if (numberToSlide > 0) {
        for (i = 0; i < numberToSlide; i++) {
            parameter = 100 * (startSlide + i);
            slider.animate({left: "-" + parameter + "vw"}, (slideSpeed / 4), "swing");
        }
        startSlide = startSlide + numberToSlide;
    } else {
        for (i = 0; i > numberToSlide; i--) {
            parameter = 100 * (startSlide - Math.abs(i) - 2);
            slider.animate({left: "-" + parameter + "vw"}, (slideSpeed / 4), "swing");
        }
        startSlide = startSlide - Math.abs(numberToSlide);
    }
    timeToWait = (slideSpeed / 4) * Math.abs(numberToSlide);
    UpdateBullets(timeToWait);
    running = false;
        
    setTimeout(function(){disable = false}, timeToWait + stopDuration);
    
}