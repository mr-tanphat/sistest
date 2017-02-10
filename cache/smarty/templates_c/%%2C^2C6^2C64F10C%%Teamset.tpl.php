<?php /* Smarty version 2.6.11, created on 2017-02-07 09:34:20
         compiled from include/SugarFields/Fields/Teamset/Teamset.tpl */ ?>
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
{sugarvar_teamset parentFieldArray=<?php echo $this->_tpl_vars['parentFieldArray']; ?>
 vardef=$fields.team_name tabindex='<?php echo $this->_tpl_vars['tabindex']; ?>
' display='<?php echo $this->_tpl_vars['displayParams']['display']; ?>
' labelSpan='<?php echo $this->_tpl_vars['displayParams']['labelSpan']; ?>
' fieldSpan='<?php echo $this->_tpl_vars['displayParams']['fieldSpan']; ?>
' formName='<?php echo $this->_tpl_vars['displayParams']['formName']; ?>
' tabindex=1 displayType='<?php echo $this->_tpl_vars['renderView']; ?>
' <?php if (! empty ( $this->_tpl_vars['displayParams']['idName'] )): ?> idName='<?php echo $this->_tpl_vars['displayParams']['idName']; ?>
'<?php endif; ?> 	<?php if (! empty ( $this->_tpl_vars['displayParams']['accesskey'] )): ?> accesskey='<?php echo $this->_tpl_vars['displayParams']['accesskey']; ?>
' <?php endif; ?> }