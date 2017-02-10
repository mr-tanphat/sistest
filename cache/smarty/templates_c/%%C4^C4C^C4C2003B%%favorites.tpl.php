<?php /* Smarty version 2.6.11, created on 2017-02-07 09:33:59
         compiled from include/MVC/View/tpls/favorites.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlentities', 'include/MVC/View/tpls/favorites.tpl', 20, false),array('function', 'sugar_link', 'include/MVC/View/tpls/favorites.tpl', 20, false),)), $this); ?>
[<?php $_from = $this->_tpl_vars['FAVORITES']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['favorites'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['favorites']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['favorites']['iteration']++;
?>{"text":"<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['label'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp, @ENT_QUOTES, 'utf-8') : htmlentities($_tmp, @ENT_QUOTES, 'utf-8')); ?>
","url": "<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['record_id'],'link_only' => 1), $this);?>
"}<?php if (! ($this->_foreach['favorites']['iteration'] == $this->_foreach['favorites']['total'])): ?>,<?php endif;  endforeach; else: ?>{ "text": "<?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>
"}<?php endif; unset($_from); ?>]