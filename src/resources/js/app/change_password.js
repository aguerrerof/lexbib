$("#show_password").on('click', function() {
    $(".form-control" ).each(function(index, element ) {
        if (element.type === "password") {
            element.type = "text";
        } else {
            element.type = "password";
        }
    });
});
