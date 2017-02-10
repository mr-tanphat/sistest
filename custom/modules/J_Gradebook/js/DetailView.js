$(document).ready(function(){
    $("body").append("<div id='displayConfig' style = 'display:none'></div>"); 
    if(Number($('#lock_update').val()))  {
        $("#edit_button").remove();
    }
});
function viewConfig(gradebook_id) {
    var _this = $(this);
    ajaxStatus.showStatus('Proccessing...');           
    jQuery.ajax({ 
        url: "index.php?module=J_Gradebook&sugar_body_only=true&action=ajaxGradebook", 
        type: "POST", 
        async: true,
        data:{   
            process_type: "showConfig",                                                     
            gradebook_id: gradebook_id,
        }, 
        success: function(data){   
            data = JSON.parse(data);
            ajaxStatus.hideStatus(); 
            $("#displayConfig").html(data.html);
            $("#displayConfig").dialog({ 
                title: "Gradebook Config",
                width: "800px",
                resizable: false,
                modal: true,
                buttons: [
                    {
                        text: "Close",
                        class    : 'button primary',
                        click: function() {
                            $(this).dialog("close");                      
                        }
                    },  
                ]
                }
            );
        },
        error: function(){                    
            ajaxStatus.hideStatus();
            alertify.error("There are errors. Please try again!");
        },
    });
}