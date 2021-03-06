<?php
defined('C5_EXECUTE') or die("Access Denied.");
?>

<script type="text/javascript">
<?php $ci = Loader::helper("concrete/urls"); ?>
<?php $url = $ci->getBlockTypeJavaScriptURL($blockType); 
if ($url != '') { ?>
	ccm_addHeaderItem("<?php echo $url?>", 'JAVASCRIPT');
<?php } 
$identifier = strtoupper('BLOCK_CONTROLLER_' . $btHandle);
if (is_array($headerItems[$identifier])) {
	foreach($headerItems[$identifier] as $item) { 
		if ($item instanceof CSSOutputObject) {
			$type = 'CSS';
		} else {
			$type = 'JAVASCRIPT';
		}
		?>
		ccm_addHeaderItem("<?php echo $item->file?>", '<?php echo $type?>');
	<?php
	}
}
?>
</script>

<?php
$hih = Loader::helper("concrete/ui/help");
$blockTypes = $hih->getBlockTypes();
if (isset($blockTypes[$btHandle])) {
	$help = $blockTypes[$btHandle];
} else {
	if ($blockTypeController->getBlockTypeHelp()) {
		$help = $blockTypeController->getBlockTypeHelp();
	}
}
if (isset($help) && !$blockType->supportsInlineAdd()) { ?>
	<div class="dialog-help" id="ccm-menu-help-content"><?php 
		if (is_array($help)) { 
			print $help[0] . '<br><br><a href="' . $help[1] . '" target="_blank">' . t('Learn More') . '</a>';
		} else {
			print $help;
		}
	?></div>
<?php } ?>

<?php
if ($blockType->supportsInlineAdd()) {
    $pt = $c->getCollectionThemeObject();
    if (
        $pt->supportsGridFramework()
        && $area->isGridContainerEnabled()
        && !$blockType->ignorePageThemeGridFrameworkContainer()
    ) {

        $gf = $pt->getThemeGridFrameworkObject();
        print $gf->getPageThemeGridFrameworkContainerStartHTML();
        print $gf->getPageThemeGridFrameworkRowStartHTML();
        printf('<div class="%s">', $gf->getPageThemeGridFrameworkColumnClassForSpan(
                $gf->getPageThemeGridFrameworkNumColumns()
            ));
    }
}
?>

<div <?php if (!$blockType->supportsInlineAdd()) { ?>class="ccm-ui"<?php } else { ?>data-container="inline-toolbar"<?php } ?>>


<form method="post" action="<?php echo $controller->action('submit')?>" id="ccm-block-form" enctype="multipart/form-data" class="validate">

<input type="hidden" name="btID" value="<?php echo $blockType->getBlockTypeID()?>">
<input type="hidden" name="arHandle" value="<?php echo $area->getAreaHandle()?>">
<input type="hidden" name="cID" value="<?php echo $c->getCollectionID()?>">

<input type="hidden" name="dragAreaBlockID" value="0" />

<?php foreach($blockTypeController->getJavaScriptStrings() as $key => $val) { ?>
	<input type="hidden" name="ccm-string-<?php echo $key?>" value="<?php echo h($val)?>" />
<?php } ?>

<?php if (!$blockType->supportsInlineAdd()) { ?>
<div id="ccm-block-fields">
<?php } else { ?>
<div>
<?php } ?>

<?php $blockView->render('add');?>

</div>

<?php if (!$blockType->supportsInlineAdd()) { ?>	

	<div class="ccm-buttons dialog-buttons">
	<a href="javascript:void(0)" onclick="jQuery.fn.dialog.closeTop()" class="btn btn-hover-danger btn-default pull-left"><?php echo t('Cancel')?></a>
	<a href="javascript:void(0)" onclick="$('#ccm-form-submit-button').get(0).click()" class="pull-right btn btn-primary"><?php echo t('Add')?></a>
	</div>

<?php } ?>

	<!-- we do it this way so we still trip javascript validation. stupid javascript. //-->
	<input type="submit" name="ccm-add-block-submit" value="submit" style="display: none" id="ccm-form-submit-button" />
</form>

</div>

<?php
if ($blockType->supportsInlineAdd()) {
    $pt = $c->getCollectionThemeObject();
    if (
        $pt->supportsGridFramework()
        && $area->isGridContainerEnabled()
        && !$blockType->ignorePageThemeGridFrameworkContainer()
    ) {
        $gf = $pt->getThemeGridFrameworkObject();
        print '</div>';
        print $gf->getPageThemeGridFrameworkRowEndHTML();
        print $gf->getPageThemeGridFrameworkContainerEndHTML();
    }
}


