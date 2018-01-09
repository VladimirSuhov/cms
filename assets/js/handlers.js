$(document).ready(function () {

    function registerUser(e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            type : 'post',
            url: '/includes/handlers/register.php',
            data : data,
            dataType : 'json',
            success : function (res) {
                console.log(res.success);
            },
            error : function(res) {
                console.log(res.error);
            }
        })
    }
    $('#register_form').on('submit', registerUser);

});