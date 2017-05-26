function editing() {
    $('#editButton').attr("onclick", "");
    var hid = document.getElementsByClassName("hiddens");
    for (var i = 0; i < hid.length; i++) {
        hid[i].style = "";
		$(hid[i]).fadeIn();
    }
    $('.list-group-item').each(function() {
        $(this).addClass('col-xs-10');
    });
    $('.likesDiv').each(function() {
        if ($('.likesDiv .btn').length < $('.likesDiv').length) {
            $(this).append('<button type="button" id="likesDelete" class="btn btn-danger col-xs-2">-</button>')
        }
    });
    $('.dislikesDiv').each(function() {
        if ($('.dislikesDiv .btn').length < $('.dislikesDiv').length) {
            $(this).append('<button type="button" id="dislikesDelete" class="btn btn-danger col-xs-2">-</button>')
        }
    });
    $('.allergiesDiv').each(function() {
        if ($('.allergiesDiv .btn').length < $('.allergiesDiv').length) {
            $(this).append('<button type="button" id="allergiesDelete" class="btn btn-danger col-xs-2">-</button>')
        }
    });

    //profile name editing
    var curName = $('#profileName').text();
    curName = curName.trim(); //remove whitespace
    $('#profileName').html('<form name="form" method="post"><input type="text" class="col-xs-12 list-group-item" id="newName" name="newName" placeholder="Change name"></form>');
    $('#newName').val(curName);

    //profile description editing
    var curDesc = $('.profileDesc').text();
    curDesc = curDesc.trim();
    $('.profileDesc').html('<textarea class="form-control" style="width:100%; resize:none;" rows="5" id="newDesc" placeholder="Change description"></textarea>');
    $('#newDesc').val(curDesc);

    //change edit button state
    $('#editButton').html('<span class="glyphicon glyphicon-floppy-disk"><\span>');
    $('#editButton').attr("id","editingButton");
    $('#editingButton').attr("onclick","document.forms['ListForm'].submit()");

    //Reduce image opacity
    $('.profileImg').css("opacity", "0.5");

    //add listener to edit button so it will run this function when clicked
    $('#editingButton').click(function() {
        event.preventDefault();

        //likes added
        var likes = [];
        var likesArray = document.getElementsByClassName("newLikes");

        for (var i = 0; i < likesArray.length; i++) {
            likes[i] = likesArray[i].innerHTML;
        }
        var likes = JSON.stringify(likes);


        //dislikes added
        var dislikes = [];
        var dislikesArray = document.getElementsByClassName("newDislikes");

        for (var i = 0; i < dislikesArray.length; i++) {
            dislikes[i] = dislikesArray[i].innerHTML;
        }
        var dislikes = JSON.stringify(dislikes);

        //allergies added
        var allergies = [];
        var allergiesArray = document.getElementsByClassName("newAllergies");

        for (var i = 0; i < allergiesArray.length; i++) {
            allergies[i] = allergiesArray[i].innerHTML;
        }
        var allergies = JSON.stringify(allergies);

        //deleted likes
        var deletedLikes = [];
        var deletedLikesArray = document.getElementsByClassName("deletedLikes");

        for (var i = 0; i < deletedLikesArray.length; i++) {
            deletedLikes[i] = deletedLikesArray[i].childNodes[0].innerHTML;
        }
        var deletedLikes = JSON.stringify(deletedLikes);

        //deleted likes
        var deletedDislikes = [];
        var deletedDislikesArray = document.getElementsByClassName("deletedDislikes");

        for (var i = 0; i < deletedDislikesArray.length; i++) {
            deletedDislikes[i] = deletedDislikesArray[i].childNodes[0].innerHTML;
        }
        var deletedDislikes = JSON.stringify(deletedDislikes);

        //deleted likes
        var deletedAllergies = [];
        var deletedAllergiesArray = document.getElementsByClassName("deletedAllergies");

        for (var i = 0; i < deletedAllergiesArray.length; i++) {
            deletedAllergies[i] = deletedAllergiesArray[i].childNodes[0].innerHTML;
        }
        var deletedAllergies = JSON.stringify(deletedAllergies);

        //new name
        var newName = $('#newName').val();

        //new description
        var newDesc = $('#newDesc').val();

        var imgRegex = /(https?:\/\/.*\.(?:png|jpg))/i;

        var tempImg = $('#newImage').val();

        //image validation
        if (tempImg != '' && imgRegex.test(tempImg) == true && getSize(tempImg) == true) {
            var newImage = $('#newImage').val();
        }

        $.ajax({
            url: "profile_edit.php",
            type: "POST",
            data: {likes:likes, dislikes:dislikes, allergies:allergies, deletedLikes:deletedLikes, deletedDislikes:deletedDislikes, deletedAllergies:deletedAllergies, newName:newName, newDesc:newDesc, newImage:newImage},
            cache: false,
            async: false, //possibly does nothing
            success: function(data) {
                if (data == 'success') {
                    if (jQuery.browser.safari) {
                        setTimeout("window.location.href= '"+this.href+"'",500);
                        return false;
                    } else {
        				setTimeout(function() {
        					location.reload();
        				}, 1000);
                    }
                }
            }
        });
    });

    //Listener for add buttons
    $('#moreLikes, #moreDislikes, #moreAllergies').on('click', function() {
        if (this.id == 'moreLikes') {
            if ($('#likes').val() == '') {
                $('#likesError').html('<span class="red">Field is empty</span>');
            } else {
                $('#likesError').html('');
                $('<div class="likesDiv"><li class="list-group-item col-xs-10 newLikes">' + $('#likes').val() +
                '</li><button type="button" id="likesDelete" class="btn btn-danger col-xs-2">-</button></div>').insertBefore('#likesHidden');
                $('#likes').val('');
            }
        } else if (this.id == 'moreDislikes') {
            if ($('#dislikes').val() == '') {
                $('#dislikesError').html('<span class="red">Field is empty</span>');
            } else {
                $('#dislikesError').html('');
                $('<div class="dislikesDiv"><li class="list-group-item col-xs-10 newDislikes">' + $('#dislikes').val() +
                '</li><button type="button" id="dislikesDelete" class="btn btn-danger col-xs-2">-</button></div>').insertBefore('#dislikesHidden');
                $('#dislikes').val('');
            }
        } else if (this.id == 'moreAllergies') {
            if ($('#allergies').val() == '') {
                $('#allergiesError').html('<span class="red">Field is empty</span>');
            } else {
                $('#allergiesError').html('');
                $('<div class="allergiesDiv"><li class="list-group-item col-xs-10 newAllergies">' + $('#allergies').val() +
                '</li><button type="button" id="allergiesDelete" class="btn btn-danger col-xs-2">-</button></div>').insertBefore('#allergiesHidden');
                $('#allergies').val('');
            }
        }
    });

    //Listener for delete buttons
    $(document).on('click', '#likesDelete, #dislikesDelete, #allergiesDelete', function(){
            if (this.id == 'likesDelete') {
                $(this).parent().addClass('deletedLikes');
                $(this).parent().fadeOut();
            } else if (this.id == 'dislikesDelete') {
                $(this).parent().addClass('deletedDislikes');
                $(this).parent().fadeOut();
            } else if (this.id == 'allergiesDelete') {
                $(this).parent().addClass('deletedAllergies');
                $(this).parent().fadeOut();
            }
    });

    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the image, open the modal
    $('.profileImg').click(function() {
        modal.style.display = "block";
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //When the img url is entered while editing
    $("#newImage").on('keyup', function (e) {
    if (e.keyCode == 13) {
        var newImage = $('#newImage').val(); //store image link in variable
        if (newImage != '' && getSize(newImage) == true) { //possibly redundant
            $('.profileImg').attr("src", newImage); //change image
        }
        modal.style.display = "none"; //hide modal
    }
});
}

//get image size
function getSize(url){
    var img = new Image();
    img.addEventListener("load", function(){
        if (this.naturalWidth >= 2048 || this.naturalHeight >= 2048 || this.naturalWidth < 64 || this.naturalHeight < 64) {
            return false;
        }
    });
    img.src = url;
    return true;
}

$(document).ready(function(){ 

    //If the screen is 380px or smaller, reduce image size to 96x96
    var mq = window.matchMedia( "(max-width: 380px)" );
    if (mq.matches) {
        $('.profileImg').width(96);
        $('.profileImg').height(96);
    } else {
        $('.profileImg').width(128);
        $('.profileImg').height(128);
    }

    //friend stuff
    $('#deleteFriend, #addFriend').click(function(){
        event.preventDefault();
        var $userNo = $('#userNo').val();
        var $button = $(this);

        $.ajax({
            url: "friendFunctions.php",
            type: "POST",
            data: {userNo:$userNo},
            cache: false,
            async: false,
            success: function(data) {
                location.reload();
            }
        });
    });
});
