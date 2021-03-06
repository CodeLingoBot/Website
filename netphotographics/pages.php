<?php
// force UTF-8 Ø
if (!defined('WEBPATH'))
	die();
if (class_exists('CMS')) {
	$npgHome = strtolower(stripSuffix($_zp_current_page->getTitleLink())) == 'npghome';
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<?php
			zp_apply_filter('theme_head');
			if (class_exists('RSS')) {
				if ($npgHome) {
					printRSSHeaderLink('Gallery', 'netPhotoGraphics');
				} else {
					printRSSHeaderLink("Pages", "Zenpage news", "");
				}
			}
			?>
		</head>

		<body onload="blurAnchors()">
			<?php zp_apply_filter('theme_body_open'); ?>

			<!-- Wrap Header -->
			<div id="header">
				<div id="gallerytitle">

					<!-- Logo -->
					<div id="logo">
						<?php printLogo(); ?>
					</div>
				</div> <!-- gallerytitle -->

				<?php
				if (!$npgHome) {
					?>
					<!-- Crumb Trail Navigation -->
					<div id="wrapnav">
						<div id="navbar">
							<span><?php printHomeLink('', ' | '); ?>
								<?php
								if (getOption('gallery_index')) {
									?>
									<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Main Index'); ?>"><?php printGalleryTitle(); ?></a>
									<?php
								} else {
									?>
									<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php printGalleryTitle(); ?></a>
									<?php
								}
								?></a></span>
							<?php printZenpageItemsBreadcrumb(" | ", ""); ?><?php printPageTitle(" | "); ?>
						</div>
					</div> <!-- wrapnav -->
					<?php
				}
				?>
				<!-- Random Image -->
				<?php printHeadingImage(getRandomImages(getOption('netPhotoGraphics_daily_album_image'))); ?>
			</div> <!-- header -->

			<!-- Wrap Main Body -->
			<div id="content">

				<small>&nbsp;</small>
				<div id="main2">
					<div id="content-left">
						<?php
						if (!$npgHome) {
							?>
							<h2><?php printPageTitle(); ?></h2>
							<?php
						}
						?>
						<div id="pagetext">
							<?php printCodeblock(1); ?>
							<?php printPageContent(); ?>
							<?php printCodeblock(2); ?>
						</div>
						<?php commonComment(); ?>
					</div><!-- content left-->
					<div id="sidebar">
						<?php include("sidebar.php"); ?>
					</div><!-- sidebar -->
					<br style="clear:both" />
				</div> <!-- main2 -->

			</div> <!-- content -->

			<?php
			printFooter();
			zp_apply_filter('theme_body_close');
			?>

		</body>
	</html>
	<?php
} else {
	include(SERVERPATH . '/' . ZENFOLDER . '/404.php');
}
?>