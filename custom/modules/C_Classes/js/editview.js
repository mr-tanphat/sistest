function toggleFee(){
    var seleted = $('select#type').val();
    if(seleted == 'Practice'){
        $('select#stage').show();
        $('select#stage_2').hide();
        $('select#stage_2').val($('select#stage').val());    
    }else{
        $('select#stage_2').show();
        $('select#stage').hide();
        $('select#level').val('-none-');   
    }
}
$(document).ready(function(){
    toggleFee();
    $('select#type').change(toggleFee);
    $('select#stage').change(function(){
        $('select#stage_2').val($(this).val());  
    });
    $("select[name=kind_of_course]").select2({placeholder: "--Select one--",allowClear: true});
});