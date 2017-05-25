$(document).ready(function(){
    //If the screen is 500px or smaller, reduce image size to 64x64
    var mq = window.matchMedia( "(max-width: 600px)" );
    var mq2 = window.matchMedia( "(max-width: 900px)" );
    if (mq.matches) {
        $('.friendImg').width(56);
        $('.friendImg').height(56);
    } else if (mq2.matches) {
        $('.friendImg').width(96);
        $('.friendImg').height(96);
    }

    $('.friendName, .friendImg').click(function() {
        var $id = $(this).attr('id');
        window.location.href = 'profile.php?user=' + $id;
    });
});
