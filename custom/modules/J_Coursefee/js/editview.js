$(document).ready(function(){
      toggleCourseFee();
      $('select#type').on('change',function(){
          $('#type_of_course_fee').val('');
          toggleCourseFee();
      });

});
function toggleCourseFee(){
    var type = $('select#type').val();
    $("#type_of_course_fee option:not(:first)").each(function(){
        if(type == 'Days'){
            if($(this).val().indexOf('days') != -1)
                $(this).show();
            else $(this).hide(); 
        }else{
            if($(this).val().indexOf('days') != -1)
                $(this).hide();
            else $(this).show(); 
        }
    });
    //Hide Some row
    if(type == 'Hours' || type == '')
    $('#number_of_practice, #number_of_skill, #number_of_connect').closest('tr').hide();
    else $('#number_of_practice, #number_of_skill, #number_of_connect').closest('tr').show();
}