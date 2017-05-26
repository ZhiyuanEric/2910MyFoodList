$(document).ready(function(){
    $('form').submit(function (event) {
        event.preventDefault();
        var user = $('#user').val();
        var pw = $('#pw').val();

        if (user !== '' && pw !== '') {
            $.ajax({
                url: "connect.php?reg=1",
                type: "POST",
                data: {user : user, pw : pw},
                cache: false,
                async: false,
                beforeSend : function () {
                    $('#submit').html("Connecting...");
                },
                success: function (data) {
                    if (data === user) {
                        window.location.href = 'profile.php'
                    } else {
                        $('#submit').html("Login");
                        $('#error').html('<span class="red">Username or Password is incorrect</span>');
                    }
                }

            });
        } else {
            $('#error').html('<span class="red">Please do not leave fields blank</span>');
        }
    });
});