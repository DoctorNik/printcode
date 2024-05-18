$(document).ready(function() {
console.log('privet');
$('#mail_form').submit(function(evt) {
    evt.preventDefault();
    let email = $("#email").val().trim();
    
    let message = $("#message").val().trim();

    if(email == "") {
        $("#errorMess").text("Введите email");
        return false;
    }    
    else if (message.length <= 5) {
        $("#errorMess").text("Введите текст");
        return false;
    }
    
   
    $("#errorMess").text("Наш менеджер свяжется с Вами!");

    $.ajax({
        url:'js/ajax/mail.php',
        type: 'post',
        cache: false,
        contentType: false,
        data: new FormData(this),
        // ,
        processData: false,
        //  
        dataType: 'html',
        success: function(result) {
            console.log(result);
        // } ,
            }
         });




});

});