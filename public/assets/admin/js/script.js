$(document).ready(function () {

    window.setTimeout(function() {
        $("#success-alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 2000);

});

$(document).ready(function () {

    window.setTimeout(function() {
        $("#error-alert").fadeTo(1000, 0).slideUp(1000, function(){
            $(this).remove();
        });
    }, 2000);

});
