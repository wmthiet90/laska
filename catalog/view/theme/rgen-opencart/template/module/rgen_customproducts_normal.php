<?php 
$modprd = $modSettings['prdboxStyle'];
$m = ' m3-col-2 m2-col-2 m1-col-1';

/* Mobile optimize view
******************************/	
if(
	$this->rgen->device == 'm' 
	&& $this->config->get('RGen_optimizemob') == 1 
	&& $this->config->get('RGen_reaponsive_status') == 1
	){
?>
	<div class="box custom-section<?php echo $modSettings['css_class']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>" style="<?php echo $mrgTB; ?>">
		<div class="box-heading header-1"><?php echo $modSettings['title']; ?></div>
		<div class="box-product">
			<?php foreach ($modSettings['products'] as $product) {
				include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_mprd1.tpl');
			} ?>
		</div>
		<div class="clearfix hr"></div>
	</div>

<?php }else {

	/* Product display in content area 
	******************************/	
	if ($position != 'column_left' && $position != 'column_right') { ?>
		

		<?php 
		/* Product block styles - 1 to 4
		******************************/	
		if ($modprd != 'prd_small') {
		?><div class="box custom-section<?php 
			echo $modSettings['class'];
			echo $modSettings['css_class'];
			if ($modprd == 'prd1' || $modprd == '') { echo ' modprd1'; }
			if ($modprd == 'prd4') { echo ' modprd4'; }
			if ($modSettings['arrowPos'] == 'tr' || $modprd == 'prd2' || $modprd == 'prd4') { echo ' arrow-tr'; }
			?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount'] ?>" style="<?php echo $mrgTB; ?>">
			<div class="box-heading header-1"><?php echo $modSettings['title']; ?>
			<?php if ($value['prdTypes'] == 'catPrd') { ?>
			<a href="<?php echo $modSettings['catUrl']; ?>" class="link-bt"><?php echo $this->language->get('text_viewall'); ?></a>	
			<?php } ?>
			</div>
			<div class="box-product">
				<div class="grid-wrp gt-<?php echo isset($gridSettings['gutter']) ? $gridSettings['gutter'] : '20'; ?>">
					<div class="row<?php echo $modSettings['prdStyle'] == 'scroll' ? ' col-5' : $m; ?>" data-n=''>
						<?php echo $modSettings['prdStyle'] == 'scroll' ? '<div class="owl-carousel">' : null; ?>
						<?php foreach ($modSettings['products'] as $product) { ?>
							<div class="col" data-mh="<?php echo $module.'-rgen_customproducts'; ?>-prd">
								<?php
									if ($modprd == 'prd1' || $modprd == '') {
										include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock1.php');
									} elseif ($modprd == 'prd2') {
										include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock2.php');
									} elseif ($modprd == 'prd3') {
										include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock3.php');
									} elseif ($modprd == 'prd4') {
										include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock4.php');
									}
								?>
							</div>
						<?php } ?>
						<?php echo $modSettings['prdStyle'] == 'scroll' ? '</div>' : null; ?>
						<b class="clearfix"></b>
					</div>
				</div>
			</div>
			<div class="clearfix<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? ' hr' : '' ?>" style="<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? 'margin-top:'.$mrgT.'px;' : null; ?>"></div>
		</div>
		<?php if ($modSettings['prdStyle'] == 'scroll') { ?>
		<script type="text/javascript">
		$(document).ready(function() {
			var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
			$(obj+" .box-product .owl-carousel").owlCarousel({
				itemsCustom : [ [0, 1], [420, 2], [600, 3], [768, 4], [980, 5] ],
				navigation : true,
				navigationText : ["",""],
				responsiveBaseWidth: obj
			});
			$(".owl-prev").addClass('prev');
			$(".owl-next").addClass('next');
			$(".owl-controls").addClass('carousel-controls');
		});
		</script>
		<?php } else { ?>
		<script>
		var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>";
		var cls = " .row";
		$(document).ready(function() { var w = $(obj+cls).outerWidth(); setTimeout(function(){ rowChange(obj, w, cls); }, 400); });
		$(window).resize(function() { var w = $(obj+cls).outerWidth(); setTimeout(function(){ rowChange(obj, w, cls); }, 400); });
		</script>
		<?php } ?>


		<?php 
		} else {
		/* Product block styles - small
		******************************/	
		?><div class="box custom-section<?php 
			echo $modSettings['class'];
			echo $modSettings['css_class'];
			?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount'] ?>" style="<?php echo $mrgTB; ?>">
			<div class="box-heading header-1"><?php echo $modSettings['title']; ?>
			<?php if ($value['prdTypes'] == 'catPrd') { ?>
			<a href="<?php echo $modSettings['catUrl']; ?>" class="link-bt"><?php echo $this->language->get('text_viewall'); ?></a>	
			<?php } ?>
			</div>
			<div class="box-product">
				<?php foreach ($modSettings['products'] as $product) {
				include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock_small.php');
				} ?>
			</div>
			<div class="clearfix<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? ' hr' : '' ?>" style="<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? 'margin-top:'.$mrgT.'px;' : null; ?>"></div>
		</div>
		<?php } ?>
		

	<?php }else{ 

		if ($modSettings['prdStyle'] == 'scroll') {

			/* Product display normal in column 
			******************************/	
			?><div class="box col-prd-carousel custom-section<?php echo $modSettings['class'].$modSettings['css_class']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>-col" style="<?php echo $mrgTB; ?>">
				<div class="box-heading"><?php echo $modSettings['title']; ?></div>
				<div class="box-product<?php $modSettings['prdStyle'] == 'scroll' ? ' owl-carousel' : null; ?>">
					<?php foreach ($modSettings['products'] as $product) { ?>
						<div class="item">
							<div class="col-scroll-prd">
								<div class="image">
									<?php if ($product['special']) { ?>
									<span class="offer-tag"></span>
									<?php } ?>
									<a href="<?php echo $product['href']; ?>">
										<?php if ($product['thumb']) { ?>
										<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
										<?php } ?>
									</a>
								</div>
								<a href="<?php echo $product['href']; ?>" class="name"><?php echo $product['name']; ?></a>
								<?php if ($product['price']) { ?>
								<div class="price col-price">
									<?php if (!$product['special']) { ?>
									<?php echo $product['price']; ?>
									<?php } else { ?>
									<span class="price-old"><?php echo $product['price']; ?></span>
									<span class="price-new"><?php echo $product['special']; ?></span>
									<?php } ?>
								</div>
								<?php } ?>
								<a href="<?php echo $product['href']; ?>" class="sml-button dark-bt"><?php echo $this->language->get('button_moreinfo'); ?></a>
							</div>
							<?php //include VQMod::modCheck('catalog/view/theme/rgen-opencart/template/common/RGen_mod_productblock4.php'); ?>
						</div>
					<?php } ?>
				</div>
				<div class="clearfix<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? ' hr' : '' ?>" style="<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? 'margin-top:'.$mrgT.'px;' : null; ?>"></div>
			</div><?php 

			if ($modSettings['prdStyle'] == 'scroll') { 
				?><script type="text/javascript">
				$(document).ready(function() {
					var obj = "#custom-section<?php echo $modSettings['key'].$modSettings['moduleCount']; ?>-col";
					$(obj+" .box-product").owlCarousel({
						itemsCustom : [ [0, 1], [420, 2], [600, 3], [768, 4], [980, 5] ],
						navigation : true,
						navigationText : ["",""],
						responsiveBaseWidth: obj
					});
					$(".owl-prev").addClass('prev');
					$(".owl-next").addClass('next');
					$(".owl-controls").addClass('carousel-controls');
				});
				</script><?php 
			}

		}else{
		/* Product display normal in column 
		******************************/	
		?><div class="box custom-section col-prd-thm1<?php echo $modSettings['css_class']; ?>" id="custom-section<?php echo $modSettings['key'].$modSettings['moduleCount'] ?>-col" style="<?php echo $mrgTB; ?>">
			<div class="box-heading"><?php echo $modSettings['title']; ?></div>
			<div class="box-product">
				<?php foreach ($modSettings['products'] as $product) { ?>
					<div class="col-prd">
						<div class="image">
							<?php if ($product['special']) { ?>
							<span class="offer-tag"></span>
							<?php } ?>
							<a href="<?php echo $product['href']; ?>">
								<?php if ($product['thumb']) { ?>
								<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" />
								<?php } ?>
							</a>
						</div>
						<div class="info-wrp">
							<a href="<?php echo $product['href']; ?>" class="name"><?php echo $product['name']; ?></a>
							<?php if ($product['price']) { ?>
							<div class="price col-price">
								<?php if (!$product['special']) { ?>
								<?php echo $product['price']; ?>
								<?php } else { ?>
								<span class="price-old"><?php echo $product['price']; ?></span>
								<span class="price-new"><?php echo $product['special']; ?></span>
								<?php } ?>
							</div>
							<?php } ?>
							<a href="<?php echo $product['href']; ?>" class="more"><?php echo $this->language->get('button_moreinfo'); ?> <span>&#8250;</span></a>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="clearfix<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? ' hr' : '' ?>" style="<?php echo isset($gridSettings['hr']) && $gridSettings['hr'] == 'y' ? 'margin-top:'.$mrgT.'px;' : null; ?>"></div>
		</div>

	<?php } } ?>

<?php } ?>