function getDateString(){
    var re = new RegExp('%', 'g');
    $('span#date_string').text('['+cal_date_format.replace(re,'')+']')
}


//create by leduytan 23/7/2014

function ajaxCheckRoom(){
    //Run Ajax
    $("#ct_check").parent().append("<span id='loadding'></span>");   
    $("#loadding").html('<img src="custom/include/images/loader.gif" align="absmiddle" width="16">');
    //prepare
    var weekday = [];
    $("input[name='week_date']").each(function(){
        if($(this).is(':checked'))  
            weekday.push($(this).val());
    }); 
    var start_time = $("#start_time").val();
    var end_time = $("#end_time").val();
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    $.ajax({
        url: "index.php?module=C_Classes&action=ajaxCheckRoom&sugar_body_only=true",
        type: "POST",
        async: true,
        data:  
        {
            start_date: start_date,
            end_date: end_date,
            start_time: start_time,
            end_time: end_time,
            weekday: weekday,
        },
        dataType: "json",
        success: function(data){           
            if(data.success == "1"){
                $("#loadding").remove();  
                $('div#result_table').html(data.html); 

            }  
        },        
    });
}

function validateElements(){
    if(validate['CheckRoomForm']!='undefined'){delete validate['CheckRoomForm']};

    addToValidate('CheckRoomForm', 'start_time', 'time', true, SUGAR.language.get('C_Classes','LBL_START_TIME') );
    addToValidate('CheckRoomForm', 'end_time', 'time', true, SUGAR.language.get('C_Classes','LBL_END_TIME') ); 

    addToValidate('CheckRoomForm', 'end_date', 'date', true, SUGAR.language.get('C_Classes','LBL_END_DATE') );
    addToValidateDateBefore('CheckRoomForm','start_date','date',true,SUGAR.language.get('C_Classes','LBL_START_DATE'),'end_date');

    var weekday = [];
    $("input[name='week_date']").each(function(){
        if($(this).is(':checked'))  
            weekday.push($(this).val());
    });

    if(weekday.length == 0){
        addToValidate('CheckRoomForm', 'validate_weekday', 'varchar', true, SUGAR.language.get('C_Classes','LBL_DAY') ); 
    }
    return check_form('CheckRoomForm');
}

$(document).ready(function(){
    $('#ct_check').click(function(){
        if(validateElements())
            ajaxCheckRoom();
    })

    getDateString();
    // check ready for option chose
    $('input[name=check_ready_for]').click(function(){
        if($(this).val() != 'optional'){
            var numOfDate = parseInt($(this).val());

            var today = new Date();//today
            YAHOO.widget.DateMath._addDays(today,7);
            var from = YAHOO.widget.DateMath.getFirstDayOfWeek(today,1);
            $("#start_date, #end_date").effect("highlight", {color: '#4BADF5'}, 1000);

            $('#start_date').val(SUGAR.util.DateUtils.formatDate(from));

            YAHOO.widget.DateMath._addDays(from,numOfDate);
            $('#end_date').val(SUGAR.util.DateUtils.formatDate(from));

        }
    });
    $('#start_date_trigger, #end_date_trigger').click(function(){
        $('input[name=check_ready_for]').filter('[value=optional]').prop('checked', true);
    });

    $('#start_time').timepicker({'timeFormat': SUGAR.expressions.userPrefs.timef,'minTime': '7:00am','maxTime': '9:30pm','step': 15});
    $('#end_time').timepicker({'timeFormat': SUGAR.expressions.userPrefs.timef,'minTime': '7:00am','maxTime': '9:30pm','step': 15});

    //button clear click event
    $('#ct_clear').live('click',function(){
        $("input[name='week_date']").prop('checked', false); 
        $('#start_date,#end_date, #start_time, #end_time').val('');
        $('#result_table').html('');
    });
})
