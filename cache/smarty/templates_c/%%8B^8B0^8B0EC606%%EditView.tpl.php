<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:38
         compiled from include/SugarFields/Fields/Address/EditView.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'include/SugarFields/Fields/Address/EditView.tpl', 19, false),array('modifier', 'cat', 'include/SugarFields/Fields/Address/EditView.tpl', 20, false),array('modifier', 'lower', 'include/SugarFields/Fields/Address/EditView.tpl', 34, false),array('modifier', 'in_array', 'include/SugarFields/Fields/Address/EditView.tpl', 34, false),array('modifier', 'default', 'include/SugarFields/Fields/Address/EditView.tpl', 57, false),)), $this); ?>
{*
/*********************************************************************************
* By installing or using this file, you are confirming on behalf of the entity
* subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
* the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
* http://www.sugarcrm.com/master-subscription-agreement
*
* If Company is not bound by the MSA, then by installing or using this file
* you are agreeing unconditionally that Company will be bound by the MSA and
* certifying that you have authority to bind Company accordingly.
*
* Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
********************************************************************************/

*}
 <!--Include Google Maps API: Add by Tung Bui: 13/10/2015-->
    <script type="text/javascript" src='https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places'></script>
{sugar_getscript file='include/SugarFields/Fields/Address/SugarFieldAddress.js'}
<?php $this->assign('key', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp))); ?>
<?php $this->assign('street', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_address_street') : smarty_modifier_cat($_tmp, '_address_street'))); ?>
<?php $this->assign('city', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_address_city') : smarty_modifier_cat($_tmp, '_address_city'))); ?>
<?php $this->assign('state', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_address_state') : smarty_modifier_cat($_tmp, '_address_state'))); ?>
<?php $this->assign('country', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_address_country') : smarty_modifier_cat($_tmp, '_address_country'))); ?>
<?php $this->assign('postalcode', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_address_postalcode') : smarty_modifier_cat($_tmp, '_address_postalcode'))); ?>
<?php $this->assign('latitude', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_address_latitude') : smarty_modifier_cat($_tmp, '_address_latitude'))); ?>
<?php $this->assign('longitude', ((is_array($_tmp=$this->_tpl_vars['displayParams']['key'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_address_longitude') : smarty_modifier_cat($_tmp, '_address_longitude'))); ?>

<fieldset id='<?php echo $this->_tpl_vars['key']; ?>
_address_fieldset'>
    <legend>{sugar_translate label='LBL_<?php echo $this->_tpl_vars['key']; ?>
_ADDRESS' module='<?php echo $this->_tpl_vars['module']; ?>
'}</legend>
    <table border="0" cellspacing="1" cellpadding="0" class="edit" width="100%">
        <tr>
            <td valign="top" id="<?php echo $this->_tpl_vars['street']; ?>
_label" width='25%' scope='row' >
                <label for='<?php echo $this->_tpl_vars['street']; ?>
'>{sugar_translate label='LBL_STREET' module='<?php echo $this->_tpl_vars['module']; ?>
'}:</label>
                {if $fields.<?php echo $this->_tpl_vars['street']; ?>
.required || <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['street'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['displayParams']['required']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['displayParams']['required']))): ?>true<?php else: ?>false<?php endif; ?>}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td width="*">
                <?php if ($this->_tpl_vars['displayParams']['maxlength']): ?>
                <input type="text" id="<?php echo $this->_tpl_vars['street']; ?>
" class="address_autocomplete" name="<?php echo $this->_tpl_vars['street']; ?>
" maxlength="<?php echo $this->_tpl_vars['displayParams']['maxlength']; ?>
" size="30" <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?> <?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?> value='{$fields.<?php echo $this->_tpl_vars['street']; ?>
.value}' />
                <?php else: ?>
                <input type="text" id="<?php echo $this->_tpl_vars['street']; ?>
" class="address_autocomplete" name="<?php echo $this->_tpl_vars['street']; ?>
" size="30"  <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?> <?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?>  value='{$fields.<?php echo $this->_tpl_vars['street']; ?>
.value}' />
                <?php endif; ?>
                <input type="hidden" class="longitude" name="<?php echo $this->_tpl_vars['longitude']; ?>
" id="<?php echo $this->_tpl_vars['longitude']; ?>
" value="{$fields.<?php echo $this->_tpl_vars['longitude']; ?>
.value}">
                <input type="hidden" class="latitude" name="<?php echo $this->_tpl_vars['latitude']; ?>
" id="<?php echo $this->_tpl_vars['latitude']; ?>
" value="{$fields.<?php echo $this->_tpl_vars['latitude']; ?>
.value}">
            </td>
        </tr>

        <tr>
            <td id="<?php echo $this->_tpl_vars['city']; ?>
_label" width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['label']; ?>
%' scope='row' >
                <label for='<?php echo $this->_tpl_vars['city']; ?>
'>{sugar_translate label='LBL_CITY' module='<?php echo $this->_tpl_vars['module']; ?>
'}:</label>
                {if $fields.<?php echo $this->_tpl_vars['city']; ?>
.required || <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['city'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['displayParams']['required']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['displayParams']['required']))): ?>true<?php else: ?>false<?php endif; ?>}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                <input type="text" name="<?php echo $this->_tpl_vars['city']; ?>
" id="<?php echo $this->_tpl_vars['city']; ?>
" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 30) : smarty_modifier_default($_tmp, 30)); ?>
" <?php if (! empty ( $this->_tpl_vars['vardef']['len'] )): ?>maxlength='<?php echo $this->_tpl_vars['vardef']['len']; ?>
'<?php endif; ?> value='{$fields.<?php echo $this->_tpl_vars['city']; ?>
.value}'  <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>>
            </td>
        </tr>

        <tr>
            <td id="<?php echo $this->_tpl_vars['state']; ?>
_label" width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['label']; ?>
%' scope='row' >
                <label for='<?php echo $this->_tpl_vars['state']; ?>
'>{sugar_translate label='LBL_STATE' module='<?php echo $this->_tpl_vars['module']; ?>
'}:</label>
                {if $fields.<?php echo $this->_tpl_vars['state']; ?>
.required || <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['state'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['displayParams']['required']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['displayParams']['required']))): ?>true<?php else: ?>false<?php endif; ?>}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                <input type="text" name="<?php echo $this->_tpl_vars['state']; ?>
" id="<?php echo $this->_tpl_vars['state']; ?>
" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 30) : smarty_modifier_default($_tmp, 30)); ?>
" <?php if (! empty ( $this->_tpl_vars['vardef']['len'] )): ?>maxlength='<?php echo $this->_tpl_vars['vardef']['len']; ?>
'<?php endif; ?> value='{$fields.<?php echo $this->_tpl_vars['state']; ?>
.value}'  <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>>
            </td>
        </tr>

        <tr>
            <td id="<?php echo $this->_tpl_vars['country']; ?>
_label" width='<?php echo $this->_tpl_vars['def']['templateMeta']['widths'][($this->_foreach['colIteration']['iteration']-1)]['label']; ?>
%' scope='row' >

                <label for='<?php echo $this->_tpl_vars['country']; ?>
'>{sugar_translate label='LBL_COUNTRY' module='<?php echo $this->_tpl_vars['module']; ?>
'}:</label>
                {if $fields.<?php echo $this->_tpl_vars['country']; ?>
.required || <?php if (((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['displayParams']['required']) : smarty_modifier_in_array($_tmp, $this->_tpl_vars['displayParams']['required']))): ?>true<?php else: ?>false<?php endif; ?>}
                <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span>
                {/if}
            </td>
            <td>
                <input type="text" name="<?php echo $this->_tpl_vars['country']; ?>
" id="<?php echo $this->_tpl_vars['country']; ?>
" size="<?php echo ((is_array($_tmp=@$this->_tpl_vars['displayParams']['size'])) ? $this->_run_mod_handler('default', true, $_tmp, 30) : smarty_modifier_default($_tmp, 30)); ?>
" <?php if (! empty ( $this->_tpl_vars['vardef']['len'] )): ?>maxlength='<?php echo $this->_tpl_vars['vardef']['len']; ?>
'<?php endif; ?> value='{$fields.<?php echo $this->_tpl_vars['country']; ?>
.value}'  <?php if (! empty ( $this->_tpl_vars['tabindex'] )): ?> tabindex="<?php echo $this->_tpl_vars['tabindex']; ?>
" <?php endif; ?>>
            </td>
        </tr>

        <?php if ($this->_tpl_vars['displayParams']['copy']): ?>
            <tr>
                <td scope='row' NOWRAP>
                    {sugar_translate label='LBL_COPY_ADDRESS_FROM_LEFT' module=''}:
                </td>
                <td>
                    <input id="<?php echo $this->_tpl_vars['displayParams']['key']; ?>
_checkbox" name="<?php echo $this->_tpl_vars['displayParams']['key']; ?>
_checkbox" type="checkbox" onclick="<?php echo $this->_tpl_vars['displayParams']['key']; ?>
_address.syncFields();">
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td colspan='2' NOWRAP>&nbsp;</td>
            </tr>
        <?php endif; ?>
    </table>
</fieldset>   
  
<script type="text/javascript">
    SUGAR.util.doWhen("typeof(SUGAR.AddressField) != 'undefined'", function(){ldelim}
    <?php echo $this->_tpl_vars['displayParams']['key']; ?>
_address = new SUGAR.AddressField("<?php echo $this->_tpl_vars['displayParams']['key']; ?>
_checkbox",'<?php echo $this->_tpl_vars['displayParams']['copy']; ?>
', '<?php echo $this->_tpl_vars['displayParams']['key']; ?>
');
    {rdelim});
</script>