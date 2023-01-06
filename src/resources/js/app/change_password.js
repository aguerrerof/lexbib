$("#show_password").on('click', function() {
    $(".password" ).each(function(index, element ) {
        if (element.type === "password") {
            element.type = "text";
        } else {
            element.type = "password";
        }
    });
});
