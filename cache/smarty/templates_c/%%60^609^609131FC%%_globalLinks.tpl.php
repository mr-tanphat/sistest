<?php /* Smarty version 2.6.11, created on 2017-02-07 09:33:52
         compiled from themes/OnlineCRM-Blue/tpls/_globalLinks.tpl */ ?>
<div class="dcmenuDivider" id="globalLinksDivider"></div>
<div id="globalLinksModule">
    <ul class="clickMenu" id="globalLinks">
        <li>
            <ul class="subnav iefixed">
                <?php $_from = $this->_tpl_vars['GCLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_key'] => $this->_tpl_vars['GCL']):
        $this->_foreach['gcl']['iteration']++;
?>
                <li><a id="<?php echo $this->_tpl_vars['gcl_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL']['URL']; ?>
" <?php if (($this->_foreach['gcl']['iteration'] == $this->_foreach['gcl']['total'])): ?>class="last"<?php endif;  if (! empty ( $this->_tpl_vars['GCL']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL']['LABEL']; ?>
</a></li>

                <?php $_from = $this->_tpl_vars['GCL']['SUBMENU']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl_submenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl_submenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_submenu_key'] => $this->_tpl_vars['GCL_SUBMENU']):
        $this->_foreach['gcl_submenu']['iteration']++;
?>
                <a id="<?php echo $this->_tpl_vars['gcl_submenu_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL_SUBMENU']['URL']; ?>
"<?php if (! empty ( $this->_tpl_vars['GCL_SUBMENU']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL_SUBMENU']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL_SUBMENU']['LABEL']; ?>
</a>
                <?php endforeach; endif; unset($_from); ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php if (! empty ( $this->_tpl_vars['LOGOUT_LINK'] ) && ! empty ( $this->_tpl_vars['LOGOUT_LABEL'] )): ?>
                <li><a id="logout_link" href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'><?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a> </li>
                <?php endif; ?>
            </ul>
            <span> 
                <div id="dcmenuUserIcon" <?php echo $this->_tpl_vars['NOTIFCLASS']; ?>
>
                    <?php echo $this->_tpl_vars['NOTIFICON']; ?>

                </div>
                <a id="welcome_link" href='javascript: void(0);'><?php echo $this->_tpl_vars['CURRENT_USER']; ?>
</a>

            </span>
        </li>
    </ul>
</div>

<?php if ($this->_tpl_vars['NOTIFCODE'] != ""): ?>
<div class="dcmenuDivider" id="notifDivider"></div>
<!--<div id="dcmenuSugarCube" <?php echo $this->_tpl_vars['NOTIFCLASS']; ?>
 <?php if ($this->_tpl_vars['ISADMIN']): ?>onclick="DCMenu.notificationsList();" title="<?php echo $this->_tpl_vars['APP']['LBL_PENDING_NOTIFICATIONS']; ?>
"<?php endif; ?>>
<?php echo $this->_tpl_vars['NOTIFCODE']; ?>

</div>-->
<!--<div id="dcmenuSugarCube" <?php echo $this->_tpl_vars['NOTIFCLASS']; ?>
 <?php if ($this->_tpl_vars['ISADMIN']): ?>onclick="DCMenu.notificationsList();" title="<?php echo $this->_tpl_vars['APP']['LBL_PENDING_NOTIFICATIONS']; ?>
"<?php endif; ?>>-->
<div id="dcmenuSugarCube" <?php echo $this->_tpl_vars['NOTIFCLASS']; ?>
>
    <ul class="nav navbar-nav pull-right">
    <?php if ($this->_tpl_vars['PENDING_NOTIFY_COUNT'] > 0): ?>
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-bell-o fa-2"></i>
            <span class="<?php if ($this->_tpl_vars['PENDING_NOTIFY_COUNT'] > 9): ?>badge-plus<?php else: ?>badge<?php endif; ?> badge-default"> <?php if ($this->_tpl_vars['PENDING_NOTIFY_COUNT'] > 9): ?>9<sup>+</sup> <?php else:  echo $this->_tpl_vars['PENDING_NOTIFY_COUNT'];  endif; ?> </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b><?php echo $this->_tpl_vars['PENDING_NOTIFY_COUNT']; ?>
</b> <?php echo $this->_tpl_vars['APP']['LBL_PENDING_NOTIFY']; ?>
</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            <?php echo $this->_tpl_vars['LIST_PENDING']; ?>

                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['NEW_NOTIFY_COUNT'] > 0): ?>
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-envelope-o fa-2"></i>
            <span class="<?php if ($this->_tpl_vars['NEW_NOTIFY_COUNT'] > 9): ?>badge-plus<?php else: ?>badge<?php endif; ?> badge-default"> <?php if ($this->_tpl_vars['NEW_NOTIFY_COUNT'] > 9): ?>9<sup>+</sup> <?php else:  echo $this->_tpl_vars['NEW_NOTIFY_COUNT'];  endif; ?> </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b><?php echo $this->_tpl_vars['NEW_NOTIFY_COUNT']; ?>
</b> <?php echo $this->_tpl_vars['APP']['LBL_NEW_NOTIFY']; ?>
</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            <?php echo $this->_tpl_vars['LIST_NEW']; ?>

                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['UPCOMMING_BIRTHDAY_COUNT'] > 0): ?>
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-calendar fa-2"></i>
            <span class="<?php if ($this->_tpl_vars['UPCOMMING_BIRTHDAY_COUNT'] > 9): ?>badge-plus<?php else: ?>badge<?php endif; ?> badge-default"> <?php if ($this->_tpl_vars['UPCOMMING_BIRTHDAY_COUNT'] > 9): ?>9<sup>+</sup> <?php else:  echo $this->_tpl_vars['UPCOMMING_BIRTHDAY_COUNT'];  endif; ?> </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b><?php echo $this->_tpl_vars['UPCOMMING_BIRTHDAY_COUNT']; ?>
</b> <?php echo $this->_tpl_vars['APP']['LBL_UPCOMING_BIRTHDAY']; ?>
</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            <?php echo $this->_tpl_vars['LIST_UPCOMING_BIRTHDAY']; ?>
   
                        </ul>
                    </div>
                </li>
            </ul>

        </li>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['TODAY_BIRTHDAY_COUNT'] > 0): ?>
        <li class="dropdown dropdown-extended dropdown-notification">
            <i class="fa fa-gift fa-3"></i>
            <span class="<?php if ($this->_tpl_vars['TODAY_BIRTHDAY_COUNT'] > 9): ?>badge-plus<?php else: ?>badge<?php endif; ?> badge-default"> <?php if ($this->_tpl_vars['TODAY_BIRTHDAY_COUNT'] > 9): ?>9<sup>+</sup> <?php else:  echo $this->_tpl_vars['TODAY_BIRTHDAY_COUNT'];  endif; ?> </span>
            <ul class="dropdown-menu">
                <li class="dropdown-menu-title"><span><b><?php echo $this->_tpl_vars['TODAY_BIRTHDAY_COUNT']; ?>
</b> <?php echo $this->_tpl_vars['APP']['LBL_TODAY_BIRTHDAY']; ?>
</span></li>
                <li>
                    <div class="dropdown-menu-list fancyScrollbar">
                        <ul>
                            <?php echo $this->_tpl_vars['LIST_TODAY_BIRTHDAY']; ?>

                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
	</div>
<?php else: ?>
<div id="dcmenuSugarCubeEmpty"></div>
<?php endif; ?>