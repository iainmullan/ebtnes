<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo Configure::read('site.title'); ?></title>
	<?php
		echo $this->Html->css('reset');
		echo $this->Html->css('ebtnes');
		echo $scripts_for_layout;
	?>
</head>
<body>
<?php
	if (Configure::read('github-badge')) {
		?>
		<a href="http://github.com/ebotunes/ebtnes"><img style="position: absolute; top: 0; right: 0; border: 0;" src="http://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub" /></a> 
		<?php
	}
?>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link('ebtn.es', '/'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<p class="nb">This is a URL shortener created for my own personal use. No guarantees are offered about the stability of any URLs generated with it.</p>
		<div id="footer">
			<p>an <a href="http://www.ebotunes.com">ebotunes</a> production - 
			powered by <a href="http://github.com/ebotunes/ebtnes" target="_blank">ebtn.es</a></p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>