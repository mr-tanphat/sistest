$(document).ready(function(){

});
function ajax_save_to_crm(){
    data = $("#form-contact").serialize();
    $.ajax({
        url:'http://crm.apollo.edu.vn/index.php?entryPoint=lead_import_portal',
        type: "POST",
        data : data,
        dataType: "json",
        success: function(response){
            if(response.success == "1"){
               alert('Success !!'); 
            }else{
              alert('Fail !!');  
            }
        },
    });
}