// $("#add_cat").on("click",function() {
//     let cat_text = $("#category_text").val().trim();
//     if(text == "") {
//         $("#errorMessCat").text("Введите категорию");
//         return false;
//     }
//     $("#errorMessCat").text("");
//     $.ajax({
//         url:'ajax/fromdb.php',
//         type: 'POST',
//         cache: false,
//         data: {'category': cat_text},
//         dataType: 'html',
//         beforeSend: function() { 
//             $("#add_cat").prop("disabled",true);
//         },
//         success: function (data) {
//             if(!data) 
//             alert("Были ошибки сообщения не отправлено!");
//             else 
//             $("#cat_num").trigger("reset");
//             $("#add_cat").prop("disabled",false);
//         }
//     });
// });