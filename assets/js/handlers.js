$(document).ready(function () {

    function registerUser(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type : 'post',
            url: '/account',
            data : data,
            dataType : 'json',
            success : function (res) {
                console.log(res);
            },
            error : function(res) {
                console.log(res);
            }
        })
    }
    $('#register_form').on('submit', registerUser);

});