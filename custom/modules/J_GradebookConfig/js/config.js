var formname = "GradeConfig";
$(document).ready(function(){

    addToValidate(formname,'team_id','text',true, SUGAR.language.languages.J_GradebookConfig.LBL_CENTER);
    addToValidate(formname,'koc_id','text',true, SUGAR.language.languages.J_GradebookConfig.LBL_KOC_NAME);
    addToValidate(formname,'level','text',true, SUGAR.language.languages.J_GradebookConfig.LBL_LEVEL);
    addToValidate(formname,'type','text',true, SUGAR.language.languages.J_GradebookConfig.LBL_TYPE);
    addToValidate(formname,'weight','int',true, SUGAR.language.languages.J_GradebookConfig.LBL_WEIGHT);

    $(".max_mark, .weight").live('keydown',function (e) {  
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||   // Allow: backspace, delete, tab, escape, enter and .            
            (e.keyCode == 65 && e.ctrlKey === true) ||  // Allow: Ctrl+A                       
            (e.keyCode == 67 && e.ctrlKey === true) ||  // Allow: Ctrl+C                    
            (e.keyCode == 88 && e.ctrlKey === true) ||   // Allow: Ctrl+X                  
            (e.keyCode >= 35 && e.keyCode <= 39)) {  // Allow: home, end, left, right               
            return;     // let it happen, don't do anything
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $(".max_mark, .weight, .formula").live("blur", function(){
        $(".visible:checked").each(function(){
            var _thisvisible = $(this);
            var alias = _thisvisible.attr('alias');
            if($('.cf_readonly[alias="'+alias+'"]').is(":checked")) {
                var _thisformula = $('.formula[alias="'+alias+'"]');
                var _thismaxmark = $('.max_mark[alias="'+alias+'"]');
                var formula = _thisformula.val().toUpperCase();

                formula = formula.replace("=",'');
                var formula_list = [];
                for(var i = 0; i < formula.length; i++) {
                    if(formula[i].charCodeAt() >= 65 && formula[i].charCodeAt() <=90) { //form A->Z
                        var val = Number($('input.max_mark[alias="'+formula[i]+'"]').val());
                        var weight = Number($('input.weight[alias="'+formula[i]+'"]').val());
                        formula_list.push(Number((val * weight/100).toFixed(2)) + 0);
                    } else {
                        formula_list.push(formula[i]);
                    }
                }
                _thismaxmark.val(eval(formula_list.join('')));
            }    
        });
    });

    $('#team_id').live('change',function(){
        ajaxStatus.showStatus('Proccessing...'); 
        $("select#koc_id").parent().append('<span id = "config_loading" ><img src="custom/include/images/loader.gif" align="absmiddle" width="16"></span>');
        jQuery.ajax({ 
            url: "index.php?module=J_GradebookConfig&sugar_body_only=true&action=ajaxGradebookConfig", 
            type: "POST", 
            async: true,
            data:{   
                process_type: "getKOCOfCenter",                                                     
                center_id:  $('#team_id').val(),                              
            }, 
            success: function(data){                         
                ajaxStatus.hideStatus();  
                alertify.success("Completed!"); 
                $("select#koc_id").html(data);
                $("#config_loading").remove();
                $("select#koc_id").trigger("change");
            },
            error: function(){                    
                ajaxStatus.hideStatus();
                alertify.error("There are errors. Please try again!"); 
                $("#config_loading").remove();
                $("select#koc_id").html('');
                $("select#koc_id").trigger("change");
            },
        });
    });
    //
    $("select#koc_id").live('change',function(){
        ajaxStatus.showStatus('Proccessing...'); 
        $("select#level").parent().append('<span id = "config_loading" ><img src="custom/include/images/loader.gif" align="absmiddle" width="16"></span>');
        var content =  $("select#koc_id option:selected").attr('json');
        $("select#level").html('')
        if(content) {
            var content_array = JSON.parse(content);
            if(typeof content_array == 'object') {
                $.each( content_array, function( key, koc ) {
                    $('select#level').append('<option label="'+koc.levels+'" value="'+koc.levels+'">'+koc.levels+'</option>');
                });                  
            }
        } 
        $("#config_loading").remove();
        ajaxStatus.hideStatus();
        $("select#level").trigger("change");
    });
    $('select#level').live('change',function(){ 
        ajaxStatus.showStatus('Proccessing...'); 
        $("select#type").parent().append('<span id = "config_loading" ><img src="custom/include/images/loader.gif" align="absmiddle" width="16"></span>');
        debugger;
        jQuery.ajax({ 
            url: "index.php?module=J_GradebookConfig&sugar_body_only=true&action=ajaxGradebookConfig", 
            type: "POST", 
            async: true,
            data:{   
                process_type: "getTypeOfKOC",                                                     
                koc_id:  $('#koc_id').val(),                              
                level:  $('#level').val(),                              
            }, 
            success: function(data){ 
            debugger; 
                data = JSON.parse(data);                       
                ajaxStatus.hideStatus();  
                alertify.success("Completed!"); 
                $("select#type").html(data.html);
               // console.log(data.html);
                if(data.isAdult) {
                    $('#weight').val(100);                    
                }
                $("#config_loading").remove();                 
            },
            error: function(){                    
                ajaxStatus.hideStatus();
                alertify.error("There are errors. Please try again!"); 
                $("#config_loading").remove();
                $("select#type").html('');
            },
        });  
    });
    $('#find').live('click',function(){
        ajaxStatus.showStatus('Proccessing...'); 
        $("#find").parent().append('<span id = "config_loading" ><img src="custom/include/images/loader.gif" align="absmiddle" width="16"></span>');
        jQuery.ajax({ 
            url: "index.php?module=J_GradebookConfig&sugar_body_only=true&action=ajaxGradebookConfig", 
            type: "POST", 
            async: true,
            data:{   
                process_type: "getConfigContent",                                                     
                center_id:  $('#team_id').val(),
                koc_id:  $('#koc_id').val(),
                level:  $('#level').val(),
                config_type:  $('#type').val(),                                                 
            }, 
            success: function(data){  
                $('.content select').addClass('readonly');
                $('.content select option:not(:selected)').hide();
                data = JSON.parse(data);
                ajaxStatus.hideStatus(); 
                $('input[name=record]').val(data.record) ;
                $('input[name=weight]').val(data.weight);
                alertify.success("Completed!"); 
                $(".config").html(data.html);                  
                $("#config_loading").remove();                 
            },
            error: function(){                    
                ajaxStatus.hideStatus();
                alertify.error("There are errors. Please try again!"); 
                $('input[name=record]').val("") ;
                $(".config").html("");
                $("#config_loading").remove();
            },
        });
    });

    $('.visible').live("click", function() {
        var show = $(this).is(':checked');
        var this_id = $(this).attr('name');
        var param = this_id.split('_');
        var alias = param[0];
        if(show) {
            $("input[name=" + alias + "_max_mark]").removeClass("readonly");
            $("input[name=" + alias + "_weight]").removeClass("readonly");
            $("input[name=" + alias + "_max_mark]").removeAttr("readonly");
            $("input[name=" + alias + "_weight]").removeAttr("readonly");
            $("input[name=" + alias + "_readonly]").removeAttr("disabled");

        } else {
            $("input[name=" + alias + "_max_mark]").addClass("readonly");
            $("input[name=" + alias + "_weight]").addClass("readonly");
            $("input[name=" + alias + "_max_mark]").attr("readonly","readonly");
            $("input[name=" + alias + "_weight]").attr("readonly","readonly");
            $("input[name=" + alias + "_readonly]").prop('checked', false);
            $("input[name=" + alias + "_readonly]").attr("disabled","disabled");
            showhideFormula(alias, false);
            //$("input[name=" + alias + "_readonly]").trigger("click");
        }
    });
    $(".cf_readonly").live("click",function(){
        var show = $(this).is(':checked');
        var this_id = $(this).attr('name');
        var param = this_id.split('_');
        var alias = param[0];
        showhideFormula(alias, show);        
    });
    $("#save").live('click', function() {
        var form = jQuery("#"+formname);
        if(check_form(formname) && confirm("Are you sure to save change?")) {                                  
            jQuery("#save").html('<img src="custom/include/images/loading.gif" align="absmiddle">&nbsp;Saving data...');
            jQuery.ajax({  //Make the Ajax Request
                url: "index.php?module=J_GradebookConfig&sugar_body_only=true&action=ajaxGradebookConfig",
                type: "POST", 
                async: false, 
                data: form.serialize(),
                error: function(){
                    alert( "AJAX - error()" ); 
                    $('.timecard-popup').remove();
                },  
                success: function(data){                   
                    if(data){    
                        $('.content select option:not(:selected)').show();
                        $('.content select').removeClass('readonly');
                        alertify.success("Saved successfully! ");   
                        $('input[name=record]').val(data)  
                        window.onbeforeunload = null;       
                        //  location.href = "index.php?module=J_GradebookConfig&action=DetailView&record=" +data;                 
                    } else {
                        jQuery("#result").html(data.msg);
                        alertify.error("Error! Please try again!"); 
                    }                       
                } 
            });
        } else {

        }   
    });

    $('#clear').live('click',function(){   
        $('.content select option:not(:selected)').show();
        $('.content select').removeClass('readonly');
    });

    function showhideFormula(alias, show){
        if(show) {
            $("input[name=" + alias + "_formula]").show();
            $("input[name=" + alias + "_max_mark]").attr("readonly","readonly");
            $("input[name=" + alias + "_max_mark]").addClass("readonly");
        } else {
            $("input[name=" + alias + "_formula]").hide();
            if($("input[name=" + alias + "_visible]").is(':checked')) {                
                $("input[name=" + alias + "_max_mark]").removeClass("readonly");
                $("input[name=" + alias + "_max_mark]").removeAttr("readonly");
            }
        }
    }



});