<?php /* Smarty version 2.6.11, created on 2017-02-08 14:11:41
         compiled from include/SearchForm/tpls/SugarSpot.tpl */ ?>

<div id='SpotResults'>
<?php if (! empty ( $this->_tpl_vars['displayResults'] )): ?>
    <?php $_from = $this->_tpl_vars['displayResults']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module'] => $this->_tpl_vars['data']):
?>
    <section>
        <div class="resultTitle">
            <?php if (isset ( $this->_tpl_vars['appListStrings']['moduleList'][$this->_tpl_vars['module']] )): ?>
                <?php echo $this->_tpl_vars['appListStrings']['moduleList'][$this->_tpl_vars['module']]; ?>

            <?php else: ?>
                <?php echo $this->_tpl_vars['module']; ?>

            <?php endif; ?>
            <?php if (! empty ( $this->_tpl_vars['displayMoreForModule'][$this->_tpl_vars['module']] )): ?>
                <?php $this->assign('more', $this->_tpl_vars['displayMoreForModule'][$this->_tpl_vars['module']]); ?>
                <br>
                <small class='more' onclick="DCMenu.spotZoom('<?php echo $this->_tpl_vars['more']['query']; ?>
', '<?php echo $this->_tpl_vars['module']; ?>
', '<?php echo $this->_tpl_vars['more']['offset']; ?>
');">(<?php echo $this->_tpl_vars['more']['countRemaining']; ?>
 <?php echo $this->_tpl_vars['appStrings']['LBL_SEARCH_MORE']; ?>
)</small>
            <?php endif; ?>
        </div>
            <ul>
                <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['name']):
?>
                        <div onmouseover="DCMenu.showQuickViewIcon('<?php echo $this->_tpl_vars['id']; ?>
')" onmouseout="DCMenu.hideQuickViewIcon('<?php echo $this->_tpl_vars['id']; ?>
')" class="gs_div" style="position: relative" >
                            <div id="gs_div_<?php echo $this->_tpl_vars['id']; ?>
" style="position: absolute;left: 0" class="SpanQuickView">
                                    <img id="gs_img_<?php echo $this->_tpl_vars['id']; ?>
" class="QuickView" src="themes/default/images/Search.gif" alt="quick_view_<?php echo $this->_tpl_vars['id']; ?>
" onclick="DCMenu.showQuickView('<?php echo $this->_tpl_vars['module']; ?>
', '<?php echo $this->_tpl_vars['id']; ?>
');return false;">

                            </div>

                        <div class="gsLinkWrapper" >
                            <a href="index.php?module=<?php echo $this->_tpl_vars['module']; ?>
&action=DetailView&record=<?php echo $this->_tpl_vars['id']; ?>
" class="gs_link"><?php echo $this->_tpl_vars['name']; ?>
</a>
                        </div>
                        </div>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        <div class="clear"></div>
    </section>
    <?php endforeach; endif; unset($_from); ?>
    <a href='index.php?module=Home&action=UnifiedSearch&search_form=false&advanced=false&query_string=<?php echo $this->_tpl_vars['queryEncoded']; ?>
' class="resultAll">
        <?php echo $this->_tpl_vars['appStrings']['LNK_SEARCH_NONFTS_VIEW_ALL']; ?>

    </a>
<?php else: ?>
    <section class="resultNull">
        <h1><?php echo $this->_tpl_vars['appStrings']['LBL_EMAIL_SEARCH_NO_RESULTS']; ?>
</h1>
        <div style="float:right;">
            <a href="index.php?module=Home&action=UnifiedSearch&search_form=false&advanced=false&query_string=<?php echo $this->_tpl_vars['queryEncoded']; ?>
"><?php echo $this->_tpl_vars['appStrings']['LNK_ADVANCED_SEARCH']; ?>
</a>
        </div>
    </section>
<?php endif; ?>
</div>