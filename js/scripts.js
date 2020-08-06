$(function(){
    $('#profileDisplay').on('click',function(){
        $('#profileSelect').click();
    });
    $('#profileSelect').on('change',function(){
        var file = $("input[type=file]").get(0).files[0];

 

        if(file){

            var reader = new FileReader();

 

            reader.onload = function(){

                $("#profileDisplay").attr("src", reader.result);

            }

 

            reader.readAsDataURL(file);

        }
    });


});
