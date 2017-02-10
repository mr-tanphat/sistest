<?php /* Smarty version 2.6.11, created on 2017-02-07 11:09:51
         compiled from custom/modules/Users/tpls/AvatarEdit.tpl */ ?>
<div id="pictureDialog" class="pictureDialog">
    <input style="margin-bottom:10px" type="file" class="image" id="<?php echo $this->_tpl_vars['fields']['picture']['name']; ?>
" name="<?php echo $this->_tpl_vars['fields']['picture']['name']; ?>
">
    <br>
    <div class="pictureContainer">
        <?php if ($this->_tpl_vars['fields']['picture']['value'] == ""): ?>
            <img src="index.php?entryPoint=getImage&themeName=default&imageName=default-picture.png" class="editorPreview" alt="">
        <?php else: ?>
            <img src="index.php?entryPoint=download&id=<?php echo $this->_tpl_vars['fields']['picture']['value']; ?>
&type=SugarFieldImage&isTempFile=1" class="editorPreview" alt="" />
        <?php endif; ?>
    </div>
    <div class="inputs">
        <input type="hidden" class="picture" name="picture">
        <input type="hidden" class="viewPortW" name="viewPortW">
        <input type="hidden" class="viewPortH" name="viewPortH">
        <input type="hidden" class="selectorX" name="selectorX">
        <input type="hidden" class="selectorY" name="selectorY">
        <input type="hidden" class="selectorW" name="selectorW">
        <input type="hidden" class="selectorH" name="selectorH">
        <input type="hidden" class="imageRotate" name="imageRotate">
        <input type="hidden" class="imageX" name="imageX">
        <input type="hidden" class="imageY" name="imageY">
        <input type="hidden" class="imageW" name="imageW">
        <input type="hidden" class="imageH" name="imageH">
    </div>
    <div class="buttons" style="margin-top:10px">
        <button type="button" class="btnRestore button"><?php echo $this->_tpl_vars['MOD']['LBL_RESTORE']; ?>
</button>
        <button type="button" class="btnCancelImage button"><?php echo $this->_tpl_vars['MOD']['LBL_CANCEL_GO_BACK']; ?>
</button>
        <button type="button" class="btnSaveImage button primary"><?php echo $this->_tpl_vars['MOD']['LBL_SAVE_PICTURE']; ?>
</button>
    </div>
</div>
<div class="imagePreview">
    <?php if ($this->_tpl_vars['fields']['picture']['value'] == ""): ?>
        <img src="index.php?entryPoint=getImage&themeName=default&imageName=default-picture.png" />
    <?php else: ?>
        <img src="index.php?entryPoint=download&id=<?php echo $this->_tpl_vars['fields']['picture']['value']; ?>
&type=SugarFieldImage&isTempFile=1" />
    <?php endif; ?>
</div>
<input id="remove_imagefile_<?php echo $this->_tpl_vars['fields']['picture']['name']; ?>
" name="remove_imagefile_<?php echo $this->_tpl_vars['fields']['picture']['name']; ?>
" type="hidden" db-data="">
<button class="button primary" type="button" id="btnUploadPicture" style="margin-top:10px"><?php echo $this->_tpl_vars['MOD']['LBL_UPLOAD_PICTURE']; ?>
</button>
<?php if ($this->_tpl_vars['fields']['picture']['value'] != ""): ?><button class="button" type="button" id="btnRemove" style="margin-top:10px"><?php echo $this->_tpl_vars['MOD']['LBL_REMOVE']; ?>
</button><?php endif; ?>