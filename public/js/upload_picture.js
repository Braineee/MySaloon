$('document').ready(function(){
    // save the picture temporarily
    $('#house_picture').on('change', function(){
        var house_picture = $("#house_picture").prop("files")[0];
        $('img#display_').fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    });
});