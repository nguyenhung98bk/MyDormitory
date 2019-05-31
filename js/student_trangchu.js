

var pastWaypoint = false;
$(window).scroll(function(){
    if ($(window).scrollTop() > 920 && !pastWaypoint) {
        $('#logo').show();
        $('#main-nav').css('top','0px');
        console.log('d');
        pastWaypoint = true;
    }
    else if ($(window).scrollTop() <= 920 && pastWaypoint)
    {
         $('#logo').hide();
        console.log('f');
         $('#main-nav').css('top','100px');
        pastWaypoint = false;
    }
});

