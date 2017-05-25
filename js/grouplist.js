
// show more animation for likes
$(function () {
    $('.showMoreLike').click(function () {    

        // show some
        $('#likesList li:hidden').slice(0, 5).css({'visibility':'visible', 'display':'block'});

        // check if theres any more list items
        if ($('#likesList li').length <= $('#likesList li:visible').length) {
            $('.showMoreLike').hide();
        }
    });
});

// show more animation for dislikes
$(function () {
    $('.showMoreDislike').click(function () {    

        // show some
        $('#dislikesList li:hidden').slice(0, 5).css({'visibility':'visible', 'display':'block'});

        // check if theres any more list items
        if ($('#dislikesList li').length <= $('#dislikesList li:visible').length) {
            $('.showMoreDislike').hide();
        }
    });
});

// show more animation for allergies
$(function () {
    $('.showMoreAller').click(function () {    

        // show some
        $('#allergiesList li:hidden').slice(0, 5).css({'visibility':'visible', 'display':'block'});

        // check if theres any more list items
        if ($('#allergiesList li').length <= $('#allergiesList li:visible').length) {
            $('.showMoreAller').hide();
        }
    });
});

// hide the list that are too short
$(document).ready(function(){

    // for likes
    if ($('#likesList li').length <= 6) {
            $('.showMoreLike').hide();
    }

    // for dislikes
    if ($('#dislikesList li').length <= 6) {
            $('.showMoreDislike').hide();
    }

    // for allergies
    if ($('#allergiesList li').length <= 6) {
            $('.showMoreAller').hide();
    }
});

