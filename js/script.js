$(document).ready(function(){
    $('#mycarousel').carousel({interval:2500});
    $('#carouselButton').click(function(){
        if($('#carouselButton').children('span').hasClass('fa-pause')){
         $('#mycarousel').carousel('pause');
         $('#carouselButton').children('span').removeClass('fa-pause');
         $('#carouselButton').children('span').addClass('fa-play');
        }
        else if($('#carouselButton').children('span').hasClass('fa-play')){
         $('#mycarousel').carousel('cycle');
         $('#carouselButton').children('span').removeClass('fa-play');
         $('#carouselButton').children('span').addClass('fa-pause');
        }
    });
   /*if u don't want want two buttons
   $('#carousel-play').click(function(){
        $('#mycarousel').carousel('cycle');
    });*/
});
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#modalShow").modal();
    });
    $("#myBtn1").click(function(){
        $("#modalShow1").modal();
    });
});