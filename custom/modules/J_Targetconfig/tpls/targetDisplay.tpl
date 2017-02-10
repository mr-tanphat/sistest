{sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
{sugar_getscript file="custom/include/javascripts/MultipleSelect/jquery.multiple.select.js"}
{sugar_getscript file="custom/modules/J_Targetconfig/js/targetConfig.js"}

<link rel="stylesheet" href='{sugar_getjspath file="custom/include/javascripts/MultipleSelect/multiple-select.css"}'/>
<link rel="stylesheet" href='{sugar_getjspath file="custom/include/javascripts/Select2/select2.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/modules/J_Targetconfig/tpls/css/style.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/modules/J_Targetconfig/tpls/css/setNewSale.css"}'/>

{literal}
<style>
    .ms-choice {
    width: 300px !important; 
    height: 30px !important;
    }
    .ms-parent .ms-drop{
    width: 300px !important; 
    }
    .yui-skin-sam{
     background-color: white;
    }
</style>
{/literal}

<form action="" method="POST" name="TargetConfig" id="TargetConfig">
    <div class="container">
        <div class="page-header">
            <h1 style="margin-left: 5%;">{$LBL_CONFIG_TITLE}</h1>
        </div>  
        <table class="table_config">
            <tbody>
                <tr>
                    <td width="15%" nowrap align="right"><label><b>{$MOD.LBL_CHOOSE_TEAM}</b></label><span class="required">*</span></td>
                    <td nowrap style="width: 300px;" align="left">{$html}</td>
                    <td align="right"><label><b>{$MOD.LBL_YEAR_TARGETCONFIG_LIST}</b></label></td>
                    <td align="left">
                    <select name="year_targetconfig_list" id="year_targetconfig_list" style="width: 180px;margin-left: 10px;">
                    {$year_list_options}
                    </select>
                    <input type=hidden name="years_choose" id="years_choose" value=""/>
                    <input type=hidden name="target_type" id="target_type" value="{$target_type}"/></td>
                </tr>
                <tr>
                    <td nowrap="" colspan="2" align="right">
                        <input class="button primary" type="button" name="ns_filter" value="{$MOD.LBL_FILTER}" id="ns_filter" style="padding: 6px 10px 6px 10px;">             
                        <span class = "loading"></span> 
                    </td>
                    <td nowrap="" colspan="2" align="left">
                        <input class="button" type="button" name="ns_clear" value="{$MOD.LBL_CLEAR}" id="ns_clear" style="padding: 6px 10px 6px 10px;">
                    </td>
                </tr>
            </tbody>
        </table> 
    </div>
    <div id="result"  style="  margin-left: 10%;"> </div>  
</form>