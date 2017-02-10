<?php /* Smarty version 2.6.11, created on 2017-02-08 09:58:10
         compiled from cache/modules/AOW_WorkFlow/LeadsEditViewconverted.tpl */ ?>

<?php if (strval ( $this->_tpl_vars['fields']['converted']['value'] ) == '1' || strval ( $this->_tpl_vars['fields']['converted']['value'] ) == 'yes' || strval ( $this->_tpl_vars['fields']['converted']['value'] ) == 'on'): ?> 
<?php $this->assign('checked', 'CHECKED'); ?>
<?php else: ?>
<?php $this->assign('checked', ""); ?>
<?php endif; ?>
<input type="hidden" name="<?php echo $this->_tpl_vars['fields']['converted']['name']; ?>
" value="0"> 
<input type="checkbox" id="<?php echo $this->_tpl_vars['fields']['converted']['name']; ?>
" 
name="<?php echo $this->_tpl_vars['fields']['converted']['name']; ?>
" 
value="1" title='' tabindex="1" <?php echo $this->_tpl_vars['checked']; ?>
 >