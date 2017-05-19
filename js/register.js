$(document).ready(function() {
    var regState = 0;

        $('form').submit(function() {
            event.preventDefault();
            if (regState == 0) {
                var user = $('#user').val();
                var pw = $('#pw').val();
                var pw2 = $('#pw2').val();

                if (user != '' && pw != '' && pw2 != '') {
                    $.ajax({
                        url: "register_finish_1.php",
                        type: "POST",
                        data: {user:user, pw:pw, pw2:pw2},
                        cache: false,
                        success: function(data) {
                            if (data == 'correct') {
                                $('#part1').fadeOut();
                                setTimeout(function() {
                                    $('#part2').fadeIn();
                                }, 250);
                                $('#error').html('');
                                $('#1').html('Submit');
                                regState = 1;
                            } else if (data == 'exists') {
                                $('#error').html('<span class="red">That username already exists</span>');
                                $('#').trigger("reset");
                            } else if (data == 'diffpw') {
                                $('#part1').css('display:none');
                                $('#error').html('<span class="red">Passwords are different</span>');
                            }
                        }

                    });
                } else {
                    $('#error').html('<span class="red">Please do not leave fields blank</span>');
                }
            } else {
                    var name = $('#name').val();
                    var bio = $('#bio').val();
                    var likes = $('#likes').val();
                    var dislikes = $('#dislikes').val();
                    var allergies = $('#allergies').val();

                    if (name != '' && bio != '' && likes != '' && dislikes != '' && allergies != '') {
                        $.ajax({
                            url: "register_finish_2.php",
                            type: "POST",
                            data: {name:name, bio:bio, likes:likes, dislikes:dislikes, allergies:allergies},
                            cache: false,
                            success: function(data) {
                                if (data == 'correct') {
                                    $('#part2').hide();
                                    $('#error').html('');
                                    $('#success').hide();
                                    $('button').hide();
                                    $('#success').html('<img src="images/checkmark.png" height="128" width="128"/>');
                                    $('#success').append('<span style="display:block; font-weight:bold; font-size:250%;" class="green">Registration Complete!</span>');
                                    $('#success').fadeIn();
                                    regState = 0;
                                    setTimeout(function() {
                                        window.location.href = "profile.php";
                                    }, 1000);
                                }
                            }
                        });
                    } else {
                        $('#error').html('<span class="red">Please do not leave fields blank</span>');
                    }
            }
        });
});
