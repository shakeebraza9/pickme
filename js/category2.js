$( document ).ready(function() {
    //alert("asad");
    $('#categoryMenu2 > ul > li > a').click(function() {
        $(this).closest('ul').children("li").removeClass('active');
        $(this).closest('li').addClass('active');
        //console.log(this);

        //check is a ~ ul
        var checkElement = $(this).next();
        if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            //hide first li ul, and all inner ul and remove all active inside first li
            //console.log('1');
            $(this).closest('li').removeClass('active');
            $('#categoryMenu2 ul ul ul:visible').slideUp('normal');
            checkElement.slideUp('normal');
        }

        if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            //if inner li ul not visible, show it and hide all other ul in complete menu
            //then again show current ul
            //console.log('2');
            $('#categoryMenu2 ul ul:visible').slideUp('normal');
            $(this).closest('ul').find("li").removeClass('active');
            checkElement.slideDown('normal');
            $(this).closest('li').addClass('active');
        }

        if($(this).closest('li').find('ul').children().length == 0) {
            //console.log('T');
            return true;
        }else{
            //console.log('F');
            return false;
        }
    });

    //Inner Click
    $('#categoryMenu2 > ul > li li > a').click(function() {
        $(this).closest('ul').children("li").removeClass('active');
        $(this).closest('li').addClass('active');
        var checkElement = $(this).next();
        if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $(this).closest('li').removeClass('active');
            checkElement.slideUp('normal');
        }
        if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#categoryMenu2 ul ul ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            $(this).closest('li').addClass('active');
        }
        if($(this).closest('li').find('ul').children().length == 0) {
            return true;
        } else {
            return false;
        }
    });
});// JavaScript Document