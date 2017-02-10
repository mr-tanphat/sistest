<?php /* Smarty version 2.6.11, created on 2017-02-07 04:12:25
         compiled from modules/bc_survey/tpl/report.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'modules/bc_survey/tpl/report.tpl', 299, false),array('modifier', 'count', 'modules/bc_survey/tpl/report.tpl', 343, false),array('modifier', 'string_format', 'modules/bc_survey/tpl/report.tpl', 517, false),)), $this); ?>
<?php $this->assign('active', "");  if ($this->_tpl_vars['type'] == 'status'): ?>
    <?php $this->assign('status_active', 'active');  endif;  if ($this->_tpl_vars['type'] == 'question'): ?>   
    <?php $this->assign('que_active', 'active');  endif;  if ($this->_tpl_vars['type'] == 'individual'): ?>  
    <?php $this->assign('ind_active', 'active');  endif; ?> 

<link rel="stylesheet" type="text/css" href="custom/include/css/font-awesome/css/font-awesome.min.css"/>

<div class="survey-report-title"><div class="f-left"><label class="report_title">SURVEY REPORTS</label></div>

    <div class="f-right"> <a class="button back-to-survey" title="Back To Survey" id="analyse_survey" href="index.php?module=bc_survey&action=DetailView&record=<?php echo $this->_tpl_vars['survey_id']; ?>
">Back to Survey</a>
    </div>

</div>


<div class="survey-form-body" style="min-height: 651px;"> 
    <div class="report_table_title">  
        <a href="index.php?module=bc_survey&action=viewreport&survey_id=<?php echo $this->_tpl_vars['survey_id']; ?>
&type=status" id="status_report" class="report_title <?php echo $this->_tpl_vars['status_active']; ?>
">Status Report</a>   
        <a href="index.php?module=bc_survey&action=viewreport&survey_id=<?php echo $this->_tpl_vars['survey_id']; ?>
&type=question" class="report_title <?php echo $this->_tpl_vars['que_active']; ?>
">Question Wise Report</a>
        <a href="index.php?module=bc_survey&action=viewreport&survey_id=<?php echo $this->_tpl_vars['survey_id']; ?>
&type=individual" class="report_title <?php echo $this->_tpl_vars['ind_active']; ?>
">Individual Report</a>
    </div>
    <div class="report-tab-content">
        <?php if ($this->_tpl_vars['type'] == 'status'): ?>
            <div class="report_header"><?php echo $this->_tpl_vars['survey_name']; ?>
 Status</div>
            <?php if (is_array ( $this->_tpl_vars['survey_status'] )): ?>
                                <?php echo '          
                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                    <script type="text/javascript">
                        //for Pie chart
                        $.ajax({
                            url: \'https://www.google.com/jsapi?callback\',
                            cache: true,
                            dataType: \'script\',
                            success: function () {
                                google.load(\'visualization\', \'1\', {packages: [\'corechart\'], \'callback\': function () {
                                        var data = google.visualization.arrayToDataTable([
                                            [\'Task\', \'Survey Status\'],
                                            [\'Not viewed\', ';  if ($this->_tpl_vars['survey_status']['email_not_opened']):  echo $this->_tpl_vars['survey_status']['email_not_opened'];  else: ?>0<?php endif;  echo '],
                                                                    [\'Viewed\', ';  if ($this->_tpl_vars['survey_status']['Pending']):  echo $this->_tpl_vars['survey_status']['Pending'];  else: ?>0<?php endif;  echo '],
                                                                                            [\'Submitted\', ';  if ($this->_tpl_vars['survey_status']['Submitted']):  echo $this->_tpl_vars['survey_status']['Submitted'];  else: ?>0<?php endif;  echo '],
                                                                                                                ]);
                                                                                                                var options = {
                                                                                                                    title: \'\',
                                                                                                                    is3D: true,
                                                                                                                };
                                                                                                                var chart = new google.visualization.PieChart(document.getElementById(\'piechart_3d\'));
                                                                                                                chart.draw(data, options);
                                                                                                            }
                                                                                                        });

                                                                                                        //For linear chart ///////////////////////////////////////

                                                                                                        var start_date = \'';  echo $this->_tpl_vars['survey_start_date'];  echo '\';
                                                                                                        var end_date = \'';  echo $this->_tpl_vars['survey_end_date'];  echo '\';
                                                                                                        var lineChart_data = ';  echo $this->_tpl_vars['line_chart'];  echo ';
                                                                                                        var max_count = ';  echo $this->_tpl_vars['linechart_max_count'];  echo ';
                                                                                                        google.load(\'visualization\', \'1\', {\'packages\': [\'line\'], \'callback\': function () {
                                                                                                                var data = google.visualization.arrayToDataTable(lineChart_data);
                                                                                                                var options = {
                                                                                                                    title: \'\',
                                                                                                                    legend: {position: \'bottom\'},
                                                                                                                    hAxis: {viewWindowMode: "explicit", viewWindow: {min: start_date, max: end_date}},
                                                                                                                    vAxis: {format: \'0\', viewWindowMode: "explicit", viewWindow: {min: 0, max: max_count}},
                                                                                                                    is3D: true,
                                                                                                                };
                                                                                                                data.sort([{column: 0}]);
                                                                                                                var chart = new google.visualization.LineChart(document.getElementById(\'line_chart\'));
                                                                                                                chart.draw(data, options);
                                                                                                            }
                                                                                                        });
                                                                                                    }
                                                                                                });

                    </script>
                '; ?>

                <div id="piechart_3d" style="width: 50%; height: 500px; float: left;"></div>
                <div id="line_chart" style="width: 50%; height: 500px; float: right;"></div>
            <?php else: ?>
                <div id="question">  <?php echo $this->_tpl_vars['survey_status']; ?>
 </div> 
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['type'] == 'question'): ?>
            <img src="themes/Sugar5/images/loading.gif" id="loading-image"  class="ajax-loader" style="display:none; left: 30%; top: 70%; position: absolute;"/>
                        <?php echo '

                <script>
                    // bar chart for multiple choice questions
                    var datadisplay = ';  echo $this->_tpl_vars['data_display'];  echo ';// data of bar chart


                    $(\'#loading-image\').show();
                    $(".survey-form-body").css("opacity", 0.4);
                    $.ajax({
                        url: \'https://www.gstatic.com/charts/loader.js\',
                        cache: true,
                        dataType: \'script\',
                        success: function () {

                            google.charts.load(\'current\', {packages: [\'corechart\', \'bar\'], \'callback\': function ()
                                {
                                    if (';  echo $this->_tpl_vars['chart_id'];  echo ') { // if chart id exists to generate bar chart
                                        $.each(';  echo $this->_tpl_vars['chart_id'];  echo ', function (key, value) {
                                            var chart_id = value;
                                            if (datadisplay[chart_id]) {
                                                
                                                var chart_data = datadisplay[chart_id][\'chart_values\'];
                                                var chart_title = datadisplay[chart_id][\'chart_title\'];
                                                if (chart_data != null) {
                                                    var rows = chart_data;
                                                    var data = google.visualization.arrayToDataTable(rows);
                                                    var options = {
                                                        width: 500,
                                                        height: 300,
                                                        legend: {position: \'none\'},
                                                        title: chart_title,
                                                        bars: \'horizontal\', // Required for Material Bar Charts.
                                                        axes: {
                                                            x: {
                                                                0: {side: \'top\', label: \'Percentage\'} // Top x-axis.
                                                            },
                                                            y: {
                                                                0: {label: \'Submitted Data\'}
                                                            }
                                                        },
                                                        bar: {groupWidth: "50%"},
                                                        hAxis: {format: "#\\\'%\\\'", viewWindowMode: "explicit", viewWindow: {min: 0, max: 100}}
                                                    };
                                                    var chart = new google.visualization.BarChart(document.getElementById(chart_id));
                                                    chart.draw(data, options);
                                                }
                                            }
                                        });
                                    }
                                    //matrix chart
                                    if (';  echo $this->_tpl_vars['matrix_chart_ids'];  echo ') {

                                        $.each(';  echo $this->_tpl_vars['matrix_chart_ids'];  echo ', function (key, value) {
                                            
                                            var chart_id = value;
                                            var chart_data = datadisplay[chart_id][\'chart_values\'];
                                            var chart_title = datadisplay[chart_id][\'chart_title\'];
                                            if (chart_data != null) {
                                                var rows = chart_data;
                                                var data = google.visualization.arrayToDataTable(rows);
                                                var options = {
                                                    title: chart_title,
                                                    isStacked: \'percent\',
                                                    is3D: true,
                                                    height: 400,
                                                    bars: \'horizontal\', // Required for Material Bar Charts.
                                                    legendTextStyle: {color: \'#000\'},
                                                    titleTextStyle: {color: \'#000\'},
                                                    colorAxis: {colors: [\'#990033\', \'#330066\']},
                                                    vAxis: {viewWindowMode: "explicit", viewWindow: {min: 0}},
                                                    hAxis: {viewWindowMode: "explicit", viewWindow: {min: 0}},
                                                    // colors: [\'#1b9e77\', \'#7570b3\'],
                                                };
                                                var chart = new google.visualization.BarChart(document.getElementById(chart_id));
                                                chart.draw(data, options);
                                            }
                                        });
                                    }

                                    //scale type of question coulmn chart
                                    if (';  echo $this->_tpl_vars['scale_chart_ids'];  echo ') {
                                        
                                        $.each(';  echo $this->_tpl_vars['scale_chart_ids'];  echo ', function (key, value) {
                                            var chart_id = value;
                                            var chart_data = datadisplay[chart_id][\'chart_values\'];
                                            var chart_title = datadisplay[chart_id][\'chart_title\'];
                                            if (chart_data != null) {
                                                var rows = chart_data;
                                                var data = google.visualization.arrayToDataTable(rows);
                                                var options = {
                                                    width: 500,
                                                    legend: {position: \'none\'},
                                                    title: chart_title,
                                                    bars: \'horizontal\', // Required for Material Bar Charts.
                                                    axes: {
                                                        x: {
                                                            0: {side: \'top\', label: \'Percentage\'} // Top x-axis.
                                                        },
                                                        y: {
                                                            0: {label: \'Submitted Data\'}
                                                        }
                                                    },
                                                    bar: {groupWidth: "90%"},
                                                    vAxis: {viewWindowMode: "explicit", viewWindow: {min: 0}},
                                                    hAxis: {viewWindowMode: "explicit", viewWindow: {min: 0}}
                                                };

                                                var chart = new google.visualization.ColumnChart(document.getElementById(chart_id));
                                                chart.draw(data, options);
                                            }
                                        });
                                    }
                                }
                            });
                        },
                        complete: function (jqXHR, textStatus) {
                            $(\'#loading-image\').hide();
                            $(".survey-form-body").css("opacity", 1);
                        }
                    });
                    //matrix type of question coulmn chart with more options of rows & colmuns

                </script>                
            '; ?>

            <div class="report_header">Question Summary Report for <?php echo $this->_tpl_vars['survey_name']; ?>
 <span>(Total Responses :   <?php echo $this->_tpl_vars['total_responses']; ?>
)</span></div>
            <?php if (is_array ( $this->_tpl_vars['survey'] )): ?>

                <?php $_from = $this->_tpl_vars['survey']['page']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['queReportdata']):
?>
                                        <?php if ($this->_tpl_vars['key'] != 'page_title'): ?>
                        <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'DrodownList' || $this->_tpl_vars['queReportdata']['que_type'] == 'MultiSelectList' || $this->_tpl_vars['queReportdata']['que_type'] == 'Checkbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'RadioButton' || $this->_tpl_vars['queReportdata']['que_type'] == 'Matrix' || $this->_tpl_vars['queReportdata']['que_type'] == 'Scale'): ?>
                            <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'Matrix'): ?>
                                <?php if (! $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]): ?>
                                    <label class="answer_skipp"><b>Answered Person : 0&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['total_responses']; ?>
</b></label>
                                <?php else: ?>
                                    <label class="answer_skipp"><b>Answered Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['answered']; ?>
&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['skipped']; ?>
</b></label>
                                <?php endif; ?>
                                <div id="<?php echo $this->_tpl_vars['key']; ?>
" style="margin-top: 30px;"></div>                               
                            <?php else: ?>

                                <div class="report_answer_table">
                                    <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'Checkbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'MultiSelectList' || $this->_tpl_vars['queReportdata']['que_type'] == 'DrodownList' || $this->_tpl_vars['queReportdata']['que_type'] == 'RadioButton'): ?>
                                        <?php if (! $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]): ?>
                                            <label class="answer_skipp"><b>Answered Person : 0&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['total_responses']; ?>
</b></label>
                                        <?php else: ?>
                                            <label class="answer_skipp"><b>Answered Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['answered']; ?>
&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['skipped']; ?>
</b></label>
                                        <?php endif; ?>
                                    <?php elseif ($this->_tpl_vars['queReportdata']['que_type'] == 'ContactInformation' || $this->_tpl_vars['queReportdata']['que_type'] == 'Rating' || $this->_tpl_vars['queReportdata']['que_type'] == 'Matrix' || $this->_tpl_vars['queReportdata']['que_type'] == 'Scale'): ?>
                                        <?php if (! $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]): ?>
                                            <label class="answer_skipp"><b>Answered Person : 0&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['total_responses']; ?>
</b></label>
                                        <?php else: ?>
                                            <label class="answer_skipp"><b>Answered Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['answered']; ?>
&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['skipped']; ?>
</b></label>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <div id="<?php echo $this->_tpl_vars['key']; ?>
" style="width: 50%; height: 300px; float: left;margin-top: 30px;"></div>
                                    <div style="width: 50%; height: 300px; float: right; margin-top: 70px;">
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'ContactInformation' || $this->_tpl_vars['queReportdata']['que_type'] == 'Rating'): ?>
                                    <?php if (! $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]): ?>
                                        <label class="answer_skipp"><b>Answered Person : 0&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['total_responses']; ?>
</b></label>
                                    <?php else: ?>
                                        <label class="answer_skipp"><b>Answered Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['answered']; ?>
&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['ans_skipp'][$this->_tpl_vars['key']]['skipped']; ?>
</b></label>
                                    <?php endif; ?>
                                <?php endif; ?>
                                 <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'CommentTextbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Rating' || $this->_tpl_vars['queReportdata']['que_type'] == 'ContactInformation' || $this->_tpl_vars['queReportdata']['que_type'] == 'Textbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Matrix' || $this->_tpl_vars['queReportdata']['que_type'] == 'Date'): ?>
                                <div class="report_question_table report_answer_table">
                                    <?php endif; ?>
                                    <table class="report_question_table">
                                        <?php if ($this->_tpl_vars['queReportdata']['que_type'] != 'Image' && $this->_tpl_vars['queReportdata']['que_type'] != 'Video' && $this->_tpl_vars['queReportdata']['que_type'] != 'Matrix'): ?>

                                            <tr class="question"><td colspan="6"><?php echo $this->_tpl_vars['queReportdata']['name']; ?>
</td></tr>
                                            <?php endif; ?>

                                                                                <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'ContactInformation' || $this->_tpl_vars['queReportdata']['que_type'] == 'Rating'): ?>
                                            <tr class="thead">
                                                <th width="80%" colspan="3">Submitted Data</th>
                                            </tr>

                                        <?php elseif ($this->_tpl_vars['queReportdata']['que_type'] == 'CommentTextbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Textbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Date'): ?>
                                                                                        <?php $this->assign('submitted', 0); ?>
                                            <?php $this->assign('skipped', 0); ?>
                                            <?php $_from = $this->_tpl_vars['queReportdata']['answers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['answers']):
?>
                                                <?php if ($this->_tpl_vars['answers']['ans_name'] != ''): ?>
                                                <?php ob_start();  echo $this->_tpl_vars['submitted']+1;  $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('submitted', ob_get_contents());ob_end_clean(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>

                                    <?php ob_start();  echo smarty_function_math(array('equation' => "x - y",'x' => $this->_tpl_vars['total_responses'],'y' => $this->_tpl_vars['submitted']), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('skipped', ob_get_contents());ob_end_clean(); ?>
                                                                        <tr>
                                        <th width="80%" style="text-align: center !important;">Answered Person : <?php echo $this->_tpl_vars['submitted']; ?>
&nbsp;&nbsp;&nbsp; Skipped Person : <?php echo $this->_tpl_vars['skipped']; ?>
</th>
                                    </tr>
                                    <tr class="thead">
                                        <th width="80%">Submitted Data</th>
                                    </tr> 

                                <?php elseif ($this->_tpl_vars['queReportdata']['que_type'] != 'Image' && $this->_tpl_vars['queReportdata']['que_type'] != 'Video'): ?>
                                    <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'Matrix'): ?>

                                        <center><div id="matrix<?php echo $this->_tpl_vars['key']; ?>
" name="matrix<?php echo $this->_tpl_vars['key']; ?>
" style="margin-top:50px;  margin-bottom:50px;"></div></center>
                                        <?php else: ?>
                                            <?php if ($this->_tpl_vars['queReportdata']['enable_scoring'] == 1): ?>
                                            <tr class="thead">
                                                <th width="80%" colspan="3">Submitted Data</th>
                                                <th width="10%">Weight</th>
                                                <th width="10%">Percentage</th>
                                                <th width="10%">Count</th>
                                            </tr> 
                                        <?php else: ?>
                                            <tr class="thead">
                                                <th width="80%" colspan="3">Submitted Data</th>
                                                <th width="10%">Percentage</th>
                                                <th width="10%">Count</th>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <tr><td class="two-col-table">
                                        <?php $this->assign('rating_div', 0); ?>
                                        <?php if (! $this->_tpl_vars['queReportdata']['answers']): ?> 
                                            <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'Scale'): ?>
                                        <tr>
                                            <td colspan="3">N/A</td>
                                            <td>N/A</td>
                                            <td>0</td>
                                        </tr> 
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php $_from = $this->_tpl_vars['queReportdata']['answers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ansid'] => $this->_tpl_vars['answers']):
?>
                                        <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'ContactInformation'): ?>
                                            <table>
                                                <?php if (count($this->_tpl_vars['answers']['ans_name']) > 0): ?> 
                                                    <?php $_from = $this->_tpl_vars['answers']['ans_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['answer_text']):
?>                                                   
                                                        <?php $_from = $this->_tpl_vars['answer_text']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub_answer_text']):
?>
                                                            <tr  class="respond_con">
                                                                <th><?php echo $this->_tpl_vars['title']; ?>
 :</th>
                                                                <td><?php if ($this->_tpl_vars['sub_answer_text']):  echo $this->_tpl_vars['sub_answer_text'];  else: ?>N/A<?php endif; ?></td>
                                                            </tr>
                                                        <?php endforeach; endif; unset($_from); ?> 
                                                    <?php endforeach; endif; unset($_from); ?>
                                                <?php endif; ?>
                                            </table>

                                        <?php elseif ($this->_tpl_vars['queReportdata']['que_type'] == 'CommentTextbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Textbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Date'): ?>

                                                                                                                                    <?php $_from = $this->_tpl_vars['answers']['ans_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['title'] => $this->_tpl_vars['answer_text']):
?>  
                                                <?php if ($this->_tpl_vars['answer_text'] != ''): ?>
                                                    <tr>
                                                        <td>
                                                            <p class="respond_con"><?php echo $this->_tpl_vars['answer_text']; ?>
</p>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endforeach; endif; unset($_from); ?>       
                                                                                    <?php elseif ($this->_tpl_vars['queReportdata']['que_type'] == 'Rating'): ?> 
                                                                                        <tr>
                                                <?php if ($this->_tpl_vars['rating_div'] == 0): ?>                                                                        
                                                    <td colspan="3">
                                                        <div class="rating<?php echo $this->_tpl_vars['key']; ?>
"></div>

                                                        <?php echo '
                                                            <script>
                                                                var rating_final_count = new Array();
                                                                rating_final_count = ';  echo $this->_tpl_vars['rating_count'];  echo ';

                                                                if (';  echo $this->_tpl_vars['queReportdata']['max_size'];  echo ' != null) {
                                                                    var starCount = ';  echo $this->_tpl_vars['queReportdata']['max_size'];  echo ';
                                                                } else {
                                                                    var starCount = 5;
                                                                }
                                                                var star = new Array();
                                                                for (var counter = starCount; counter >= 0; counter--)
                                                                {
                                                                    var stars = \'\';
                                                                    for (var star_loop = 0; star_loop < counter; star_loop++) {
                                                                        stars += \'<i class="fa fa-star fa-2x" style="font-size:18px;color:#F4B30A; display: inline !important; margin-right:3px;">&nbsp;</i>\';
                                                                    }
                                                                    if (stars == null || stars == \'\') {
                                                                        stars = \'<i class="fa fa-star fa-2x" style="font-size:18px; display: inline !important; margin-right:3px;">&nbsp; </i>\';
                                                                    }

                                                                    star[counter] = stars;
                                                                }
                                                                var question_report_html = \'\';
                                                                for (var counter = starCount; counter >= 0; counter--)
                                                                {
                                                                    question_report_html += \'     <div class= "rating-block"><div class = "rating" style="width:16%"> \' + star[counter] + \'</div>  <div style="width: 750px;margin-top: -22px; margin-left: 50px;" id="progressbar-\' + counter + \'_';  echo $this->_tpl_vars['key'];  echo '" class="rating-bar"></div><div style="margin-left: 10px; margin-top: -30px;" class="rating-count">\' + rating_final_count[\'';  echo $this->_tpl_vars['key'];  echo '\'][counter] + \'</div></div>\';
                                                                }
                                                                $(".rating';  echo $this->_tpl_vars['key'];  echo '").html(question_report_html);
                                                            </script>
                                                        '; ?>

                                                        <?php echo $this->_tpl_vars['rating'][$this->_tpl_vars['key']]; ?>

                                                    <?php endif; ?>
                                                    <?php $this->assign('rating_div', $this->_tpl_vars['rating_div']+1); ?>
                                            </tr>
                                        <?php else: ?>
                                            <?php if ($this->_tpl_vars['queReportdata']['que_type'] != 'Matrix'): ?>
                                                                                                <?php if ($this->_tpl_vars['queReportdata']['enable_scoring'] == 1): ?>
                                                    <tr>
                                                        <td colspan="3"><?php echo $this->_tpl_vars['answers']['ans_name']; ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['answers']['weight']; ?>
</td>
                                                        <td><?php if ($this->_tpl_vars['answers']['percent']):  echo $this->_tpl_vars['answers']['percent']; ?>
%<?php else: ?>N/A<?php endif; ?></td>
                                                        <td><?php echo $this->_tpl_vars['answers']['sub_ans']; ?>
</td>
                                                    </tr>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="3"><?php echo $this->_tpl_vars['answers']['ans_name']; ?>
</td>
                                                        <td><?php if ($this->_tpl_vars['answers']['percent']):  echo $this->_tpl_vars['answers']['percent']; ?>
%<?php else: ?>N/A<?php endif; ?></td>
                                                        <td><?php echo $this->_tpl_vars['answers']['sub_ans']; ?>
</td>
                                                    </tr> 
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?> 
                                    <?php endforeach; endif; unset($_from); ?>
                                <?php endif; ?>
                                <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'Matrix'): ?>
                                    <?php echo '
                                        <script>
                                        var data = ';  echo $this->_tpl_vars['displaymatrix'];  echo ';
                                        var rowcount = 0;
                                        var colcount = 0;
                                        var html = \'\';
                                        $.each(data, function (page_id, page_data) {
                                            $.each(page_data, function (que_id, que_title) {
                                                if (que_id != "page_title") {
                                                    var question_report_html = \'\';
                                                    question_report_html += "<div class=\'middle-content\'><table>";

                                                    var rows = que_title.matrix_row;
                                                    var cols = que_title.matrix_col;
                                                    //count number of rows & columns
                                                    try {
                                                        var row_count = Object.keys(rows).length + 1;
                                                        var col_count = Object.keys(cols).length;
                                                    } catch (e) {
                                                    }
                                                    // adjusting td width as per column
                                                    var width = Math.round(70 / (col_count + 1)) - 1;
                                                    for (var i = 1; i <= row_count; i++) {
                                                        question_report_html += \'<tr>\';
                                                        for (var j = 1; j <= col_count + 1; j++) {
                                                            //First row & first column as blank
                                                            if (j == 1 && i == 1) {
                                                                question_report_html += "<td class=\'matrix-span\' style=\'width:" + width + "%;text-align:left;border: 1px solid #D4CECE; padding:10px; margin:0px;\'>&nbsp;</td>";
                                                            }
                                                            // Rows Label
                                                            if (j == 1 && i != 1) {
                                                                question_report_html += "<td class=\'matrix-span\' style=\'font-weight:bold; width:" + width + "%;;text-align:left;border: 1px solid #D4CECE;padding:10px; margin:0px;\'>" + rows[i - 1] + "</td>";
                                                            } else {
                                                                //Columns label
                                                                if (j <= col_count + 1 && cols[j - 1] != null && !(j == 1 && i == 1) && (i == 1 || j == 1))
                                                                {
                                                                    question_report_html += "<td class=\'matrix-span\' style=\'font-weight:bold; width:" + width + "%;border: 1px solid #D4CECE;padding:10px; margin:0px;\'>" + cols[j - 1] + "</td>";

                                                                }
                                                                //Display answer input (RadioButton or Checkbox)
                                                                else if (j != 1 && i != 1 && cols[j - 1] != null) {
                                                                    var row = i - 1;
                                                                    var col = j - 1;
                                                                    question_report_html += "<td class=\'matrix-span\' style=\'width:" + width + "%;border: 1px solid #D4CECE;padding:10px; margin:0px; \'  id=\'" + row + "_" + col + "\' name=\'matrix" + row + "\'>0&nbsp;(0%)</td>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    question_report_html += "</tr></table>";
                                                    question_report_html += \'</div>\';
                                                }

                                                $("#matrix" + que_id).html(question_report_html);

                                                $.each(';  echo $this->_tpl_vars['matrix_data'];  echo ', function (queid, values) {
                                                    if (queid != \'page_title\') {
                                                        $.each(values, function (row, row_values) {
                                                            $.each(row_values, function (col, value) {
                                                                $(\'#matrix\' + queid).find("#" + row + "_" + col + "").html(value);
                                                            });
                                                        });
                                                    }
                                                });
                                            });
                                        });</script>
                                        '; ?>

                                    <?php endif; ?>
                            </table>
                            <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'CommentTextbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Rating' || $this->_tpl_vars['queReportdata']['que_type'] == 'ContactInformation' || $this->_tpl_vars['queReportdata']['que_type'] == 'Textbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'Matrix' || $this->_tpl_vars['queReportdata']['que_type'] == 'Scale'): ?>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'DrodownList' || $this->_tpl_vars['queReportdata']['que_type'] == 'MultiSelectList' || $this->_tpl_vars['queReportdata']['que_type'] == 'Checkbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'RadioButton' || $this->_tpl_vars['queReportdata']['que_type'] == 'Matrix' || $this->_tpl_vars['queReportdata']['que_type'] == 'Scale'): ?>

                        </div>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['queReportdata']['enable_scoring'] == 1): ?>
                        <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'DrodownList' || $this->_tpl_vars['queReportdata']['que_type'] == 'MultiSelectList' || $this->_tpl_vars['queReportdata']['que_type'] == 'Checkbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'RadioButton'): ?>                
                        <?php ob_start();  echo smarty_function_math(array('equation' => "avg / total",'avg' => $this->_tpl_vars['queReportdata']['average'],'total' => $this->_tpl_vars['total_responses']), $this); $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('average', ob_get_contents());ob_end_clean(); ?>
                        <b class="btm-answer-label"><label style='font-size: 14px;'> Average : <font color='green'><?php echo ((is_array($_tmp=$this->_tpl_vars['average'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</font> Out of <?php echo $this->_tpl_vars['queReportdata']['sum_score']; ?>
</label></b> 

                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['queReportdata']['que_type'] == 'DrodownList' || $this->_tpl_vars['queReportdata']['que_type'] == 'MultiSelectList' || $this->_tpl_vars['queReportdata']['que_type'] == 'Checkbox' || $this->_tpl_vars['queReportdata']['que_type'] == 'RadioButton'): ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php echo $this->_tpl_vars['Que_pageNumbers']; ?>

<?php else: ?>
    <div id="question">There is no submission for this Survey.</div>
<?php endif;  endif;  if ($this->_tpl_vars['type'] == 'individual'): ?>
    <div class="report_header">Individual Report for <?php echo $this->_tpl_vars['survey_name']; ?>
</div>
    <?php if ($this->_tpl_vars['name'] == ''): ?>
        <div id="question">There is no submission for this Survey.</div>
    <?php else: ?>
        <div>
            <div class="search-block">
                <input type="text" name="name" id="name"  onKeydown="Javascript: if (event.keyCode == 13)
                            getSearchResult('<?php echo $this->_tpl_vars['type']; ?>
', '<?php echo $this->_tpl_vars['survey_id']; ?>
',<?php echo $this->_tpl_vars['page']; ?>
, 'search');" placeholder=" Search By Name">
                <select name="module_names" id="module_names" onKeydown="Javascript: if (event.keyCode == 13)
                            getSearchResult('<?php echo $this->_tpl_vars['type']; ?>
', '<?php echo $this->_tpl_vars['survey_id']; ?>
',<?php echo $this->_tpl_vars['page']; ?>
, 'search');">
                    <option value=''>Select Module Type</option>
                    <option value="Accounts">Accounts</option>
                    <option value="Contacts">Contacts</option>
                    <option value="Users">Users</option>
                    <option value="Leads">Leads</option>
                    <option value="Prospects">Prospects</option>
                </select>
                <select name="survey_status" id="survey_status" onKeydown="Javascript: if (event.keyCode == 13)
                            getSearchResult('<?php echo $this->_tpl_vars['type']; ?>
', '<?php echo $this->_tpl_vars['survey_id']; ?>
',<?php echo $this->_tpl_vars['page']; ?>
, 'search');">
                    <option value=''>Select Survey Status</option>
                    <option value="Pending">Not viewed</option>
                    <option value="Pending_open">Viewed</option>
                    <option value="Submitted">Submitted</option>
                </select>
                <input type="button" name="Search" id="Search" value="SEARCH" onclick="getSearchResult('<?php echo $this->_tpl_vars['type']; ?>
', '<?php echo $this->_tpl_vars['survey_id']; ?>
', 1, 'search');">
                <input type="button" name="Clear" id="Clear" value="CLEAR" onclick="getSearchResult('<?php echo $this->_tpl_vars['type']; ?>
', '<?php echo $this->_tpl_vars['survey_id']; ?>
', 1, 'clear');">
                <input type="button" name="Export" id="Export" value="Export Result" onclick="ExportData('<?php echo $this->_tpl_vars['type']; ?>
', '<?php echo $this->_tpl_vars['survey_id']; ?>
', 1, 'clear');">
            </div>
            <div id="validate_search"></div>
            <div class="select-que">
                <table class="individual_report_table" id="search_result">
                    <tr class="thead">
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Survey Send Date</th>
                        <th>Survey Receive Date</th>
                        <th>Change Request</th>
                        <th style="width:80px;">Resend</th>
                    </tr>
                    <?php $_from = $this->_tpl_vars['name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module_id'] => $this->_tpl_vars['module_detail']):
?>
                        <tr>
                            <td><a href="javascript:void(0);" onclick="getReports('<?php echo $this->_tpl_vars['survey_id']; ?>
',<?php echo $this->_tpl_vars['page']; ?>
, '<?php echo $this->_tpl_vars['module_detail']['module_id']; ?>
');"><?php echo $this->_tpl_vars['module_detail']['name']; ?>
</a>
                            </td>
                            <td><?php echo $this->_tpl_vars['module_detail']['module_type']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['module_detail']['survey_status']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['module_detail']['send_date']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['module_detail']['receive_date']; ?>
</td>
                            <td id="request_status">
                                <?php if ($this->_tpl_vars['module_detail']['change_request'] == 'N/A' || $this->_tpl_vars['module_detail']['change_request'] == 'Approved'): ?>
                                    <?php echo $this->_tpl_vars['module_detail']['change_request']; ?>

                                <?php else: ?>
                                    <a href="javascript:void(0);" onclick="ApproveChRequest(this, '<?php echo $this->_tpl_vars['survey_id']; ?>
', '<?php echo $this->_tpl_vars['module_detail']['module_id']; ?>
', '<?php echo $this->_tpl_vars['module_detail']['module_type']; ?>
');"><?php echo $this->_tpl_vars['module_detail']['change_request']; ?>
</a>
                                <?php endif; ?>
                            </td>
                            <td id="re-send">
                                <?php if ($this->_tpl_vars['module_detail']['survey_status'] == 'Submitted' || $this->_tpl_vars['module_detail']['survey_status'] == 'Viewed'): ?>
                                    <a title="Re-send" onclick="reSendSurvey(this, '<?php echo $this->_tpl_vars['survey_id']; ?>
', '<?php echo $this->_tpl_vars['module_detail']['module_id']; ?>
', '<?php echo $this->_tpl_vars['module_detail']['module_type']; ?>
');" href="javascript:void(0);"><img src="custom/include/images/re-send.png" style="height: 22px;"></a>
                                    <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; endif; unset($_from); ?>
                </table>
            </div>
        </div>        
    <?php endif; ?>
    <?php echo $this->_tpl_vars['Individual_pageNumbers']; ?>

<?php endif;  echo '
    <script type="text/javascript">

        function close_survey_div() {
            $(\'#backgroundpopup\').fadeOut(function () {
                $(\'#backgroundpopup\').remove();
            });
            $(\'#indivisual_report_main_div\').fadeOut(function () {
                $(\'#indivisual_report_main_div\').remove();
            });
        }
        function getReports(survey_id, page, module_id) {
            // var module_id = $(\'#\'+survey_id+"_"+page).val();
            $(\'<input>\').attr({
                type: \'hidden\',
                id: \'selectedRecord\',
                name: \'selectedRecord\'
            }).appendTo(\'head\');
            $("#selectedRecord").val(module_id);
            $.ajax({
                url: "index.php",
                type: "POST",
                data: {\'module\': \'bc_survey\', \'action\': \'getReports\', survey_id: survey_id, module_id: module_id, page: page},
                success: function (result) {
                    $(\'body\').append(\'<div id="backgroundpopup">&nbsp;</div>\');
                    if ($("#indivisual_report_main_div").length == 0) {
                        $(\'body\').append(\'<div id="indivisual_report_main_div"> <a onclick="close_survey_div();" href="javascript:void(0);" class="close_link"></a></div>\');
                    }
                    $(\'#backgroundpopup\').fadeIn();
                    $(\'#indivisual_report_main_div\').fadeIn();
                    $(\'#indivisual_report_main_div\').html(\'<div id="indivisual_report">\'
                            + result +
                            \' <a onclick="close_survey_div();" href="javascript:void(0);" class="close_link"></a>\' +
                            \'</div>\');
                }
            });
        }
        function getSearchResult(report_type, survey_id, page, button_clicked) {
            if (button_clicked == \'clear\') {
                $("#name").val(\'\');
                $("#module_names").val(\'\');
                $("#survey_status").val(\'\');
            }
            var name_value = trim($("#name").val());
            var name = (name_value) ? name_value : \'\';
            var type = ($("#module_names").val()) ? $("#module_names").val() : \'\';
            var status = ($("#survey_status").val()) ? $("#survey_status").val() : \'\';
            var dataArray = {\'report_type\': report_type,
                \'survey_id\': survey_id,
                \'name\': name,
                \'search_value\': name,
                \'module_type\': type,
                \'survey_status\': status,
                \'page\': page};
            var Data = JSON.stringify(dataArray);
            $.ajax({
                url: "index.php?module=bc_survey&action=getSearchResult",
                type: "POST",
                data: {newData: Data},
                success: function (result) {
                    var html_data = result.split(\'||\');
                    $("#search_result").html(html_data[0]);
                    $(\'.numbers\').html(html_data[1]);
                }
            });
        }
        function ExportData(report_type, survey_id, page) {
            var name_value = $("#name").val().replace(/([;&,\\.\\+\\*\\~\':"\\!\\^#$%@?/{}\\\\[\\]\\(\\)=>\\|])/g, \'\');
            var name = (name_value) ? name_value : \'\';
            var type = ($("#module_names").val()) ? $("#module_names").val() : \'\';
            var status = ($("#survey_status").val()) ? $("#survey_status").val() : \'\';
            window.location.assign("index.php?module=bc_survey&action=exportToExcel&report_type=" + report_type + "&survey_id=" + survey_id + "&module_name=" + name + "&module_type=" + type + "&survey_status=" + status + "&page=" + page);
        }
        function ApproveChRequest(element, survey_id, module_id, module_type) {
            var el_td = $(element).parent(\'td\');
            var status = $(element).text();
            var parent = $(element).parent(\'td\');
            var dropDown = \'<select id="status" style="width:100px;"><option value="N/A">Select</option><option value="Approved">Approved</option></select>\';
            var dropDownFn = $(dropDown).change(function () {
                $.ajax({
                    url: "index.php",
                    type: "POST",
                    data: {module: \'bc_survey\', action: \'approveRequest\', survey_id: survey_id, module_name: module_type, module_id: module_id, status: $(this).val()},
                    beforeSend: function () {
                        $(el_td).append("<img style=\'color:red;padding-left: 10px;vertical-align: middle;\' id=\'survey_loader\' src= " + SUGAR.themes.loading_image + ">");
                    },
                    complete: function () {
                        $("#survey_loader").remove();
                    }, success: function (result) {
                        var response = JSON.parse(result);
                        if (response[\'status\'] == "sucess") {
                            parent.html(response[\'request_status\']);
                            alert(\'Email has sent successfully.\');
                        } else {
                            alert(\'It seems there is some error!\');
                        }
                    }
                });
            });
            parent.html(dropDownFn);
        }
        function reSendSurvey(el, survey_id, module_id, module_type) {
            $.ajax({
                url: "index.php",
                type: "POST",
                data: {module: \'bc_survey\', action: \'approveRequest\', survey_id: survey_id, module_name: module_type, module_id: module_id, resubmit: 1},
                beforeSend: function () {
                    if ($("#survey_loader").length == 0) {
                        $(el).parent(\'td\').append("<img style=\'color:red;padding-left: 10px;vertical-align: middle;padding-bottom: 5px;\' id=\'survey_loader\' src= " + SUGAR.themes.loading_image + ">");
                    }
                },
                complete: function () {
                    $("#survey_loader").remove();
                }, success: function (result) {
                    var response = JSON.parse(result);
                    if (response[\'status\'] == "sucess") {
                        $("#survey_loader").remove();
                        alert(\'Email for resubmission survey has sent successfully.\');
                    } else {
                        alert(\'It seems there is some error!\');
                    }
                }
            });
        }
    </script>
'; ?>

</div>    </div>