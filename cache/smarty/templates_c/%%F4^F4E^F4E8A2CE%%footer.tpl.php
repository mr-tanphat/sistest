<?php /* Smarty version 2.6.11, created on 2017-02-07 11:00:17
         compiled from themes/RacerX/tpls/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'addslashes', 'themes/RacerX/tpls/footer.tpl', 56, false),)), $this); ?>
<!--end body panes-->
<?php if ($this->_tpl_vars['use_table_container']): ?>
</td>
</tr>
</table>
<?php endif; ?>
</div>
<div class="clear"></div>
</div>
<div id="bottomLinks">
    <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
    <?php echo $this->_tpl_vars['BOTTOMLINKS']; ?>

    <?php endif; ?>
</div>

<div class="clear"></div>
<div id="arrow" title="Show" class="up"><i class="icon-chevron-down"></i></div>
<div id="footer">
    <?php if ($this->_tpl_vars['COMPANY_LOGO_URL']): ?>
    <img src="<?php echo $this->_tpl_vars['COMPANY_LOGO_URL']; ?>
" class="logo" id="logo" title="<?php echo $this->_tpl_vars['STATISTICS']; ?>
" border="0"/>
    <?php endif; ?>
    <div id="buffer"></div>
    <?php if ($this->_tpl_vars['HELP_LINK']): ?>
    <div id="help" class="help"><?php echo $this->_tpl_vars['HELP_LINK']; ?>
</div>
    <?php endif; ?>
    <div id="partner">
        <div id="integrations">
            <?php $_from = $this->_tpl_vars['DYNAMICDCACTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
            <?php echo $this->_tpl_vars['action']['script']; ?>
 <?php echo $this->_tpl_vars['action']['image']; ?>

            <?php endforeach; endif; unset($_from); ?>
        </div>
    </div>
    <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
    <div id="productTour">
        <?php echo $this->_tpl_vars['TOUR_LINK']; ?>

    </div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/default/tpls/GlobalLanguage.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <a href="http://www.sugarcrm.com" target="_blank" class="copyright">&#169; 2013 SugarCRM Inc.</a>
    <script>
        var logoStats = "&#169; 2004-2013 SugarCRM Inc. All Rights Reserved. <?php echo ((is_array($_tmp=$this->_tpl_vars['STATISTICS'])) ? $this->_run_mod_handler('addslashes', true, $_tmp) : addslashes($_tmp)); ?>
";
    </script>

    <?php echo '


    <div class="clear"></div>
</div>
<script>

    $("#productTour").click(function(){

    if($(\'#tour\').length > 0){
    $(\'#tour\').modal("show");
    }  else {
    SUGAR.tour.init({
    id: \'tour\',
    modals: modals,
    modalUrl: "index.php?module=Home&action=tour&to_pdf=1",
    prefUrl: "index.php?module=Users&action=UpdateTourStatus&to_pdf=true&viewed=true",
    className: \'whatsnew\',
    onTourFinish: function() {}
    });
    }
    });
    //qe_init function sets listeners to click event on elements of \'quickEdit\' class
    if(typeof(DCMenu) !=\'undefined\'){
    DCMenu.qe_refresh = false;
    DCMenu.qe_handle;
    }
    function qe_init(){

    //do not process if YUI is undefined
    if(typeof(YUI)==\'undefined\' || typeof(DCMenu) == \'undefined\'){
    return;
    }


    //remove all existing listeners.  This will prevent adding multiple listeners per element and firing multiple events per click
    if(typeof(DCMenu.qe_handle) !=\'undefined\'){
    DCMenu.qe_handle.detach();
    }

    //set listeners on click event, and define function to call
    YUI().use(\'node\', function(Y) {
    var qe = Y.all(\'.quickEdit\');
    var refreshDashletID;
    var refreshListID;

    //store event listener handle for future use, and define function to call on click event
    DCMenu.qe_handle = qe.on(\'click\', function(e) {
    //function will flash message, and retrieve data from element to pass on to DC.miniEditView function
    ajaxStatus.flashStatus(SUGAR.language.get(\'app_strings\', \'LBL_LOADING\'),800);
    e.preventDefault();
    if(typeof(e.currentTarget.getAttribute(\'data-dashlet-id\'))!=\'undefined\'){
    refreshDashletID = e.currentTarget.getAttribute(\'data-dashlet-id\');
    }
    if(typeof(e.currentTarget.getAttribute(\'data-list\'))!=\'undefined\'){
    refreshListID = e.currentTarget.getAttribute(\'data-list\');
    }
    DCMenu.miniEditView(e.currentTarget.getAttribute(\'data-module\'), e.currentTarget.getAttribute(\'data-record\'),refreshListID,refreshDashletID);
    });

    });
    }

    qe_init();


    SUGAR_callsInProgress++;
    SUGAR._ajax_hist_loaded = true;
    if(SUGAR.ajaxUI)
    YAHOO.util.Event.onContentReady(\'ajaxUI-history-field\', SUGAR.ajaxUI.firstLoad);
</script>
'; ?>

</body>
</html>
