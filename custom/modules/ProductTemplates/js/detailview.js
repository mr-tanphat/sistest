$(document).ready(function(){
        var a = $('#type_id_span').text();
        var check = a.indexOf("Book");
        if(check==1){
            $('#DEFAULT > tbody > tr:nth-child(5)').show();
        }
        else{
            $('#DEFAULT > tbody > tr:nth-child(5)').hide();
        }
});