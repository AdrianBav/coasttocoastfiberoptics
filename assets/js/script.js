
$(function(){

    var currentYear = (new Date).getFullYear();

    var andrewYears = currentYear - 1999;
    var daveYears = currentYear - 2002;
    var garyYears = currentYear - 2004;
    var totalYears = andrewYears + daveYears + garyYears;

    $(document).ready(function() {
        $("#copyright-year").text(currentYear);

        $(".andrew-years").text(andrewYears);
        $(".dave-years").text(daveYears);
        $(".gary-years").text(garyYears);
        $(".total-years").text(totalYears);
    });

    $(".sf-menu > li").append("<div class='li-bord'></div>");

    // IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
    ua = navigator.userAgent,

    gestureStart = function () {viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";},

    scaleFix = function () {
        if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
            viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
            document.addEventListener("gesturestart", gestureStart, false);
        }
    };

    scaleFix();

    // Menu Android
    if(window.orientation!=undefined){
        var regM = /ipod|ipad|iphone/gi,
        result = ua.match(regM)
        if(!result) {
            $('.sf-menu li').each(function(){
                if($(">ul", this)[0]){
                    $(">a", this).toggle(
                        function(){
                            return false;
                        },
                        function(){
                            window.location.href = $(this).attr("href");
                        }
                    );
                }
            })
        }
    }

});

var ua=navigator.userAgent.toLocaleLowerCase(),
regV = /ipod|ipad|iphone/gi,
result = ua.match(regV),
userScale="";

if(!result){
    userScale=",user-scalable=0"
}

document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+userScale+'">');
