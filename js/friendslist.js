$(document).ready(function(){
    //If the screen is 500px or smaller, reduce image size to 64x64
    var mq = window.matchMedia( "(max-width: 600px)" );
    var mq2 = window.matchMedia( "(max-width: 900px)" );
    if (mq.matches) {
        $('.friendImg, .friendReqImg').width(56);
        $('.friendImg, .friendReqImg').height(56);
    } else if (mq2.matches) {
        $('.friendImg, .friendReqImg').width(96);
        $('.friendImg, .friendReqImg').height(96);
    }

    $('.friendName, .friendImg, .friendReqName, friendReqImg').click(function() {
        var $id = $(this).attr('id');
        window.location.href = 'profile.php?user=' + $id;
    });
});
