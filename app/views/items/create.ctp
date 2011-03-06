<div id="shorten-form">
<?php
	echo $this->Form->create('Item');

	echo $this->Form->error('url');

	echo $this->Form->input('url', array('error'=>false, 'type'=>'text', 'class'=>'title', 'label'=>'Enter URL'));

	echo $this->Form->end('Shorten');

?>
</div>
<?php
if (isset($item)) {
	?>
<input class="title created" value="<?php echo Router::url('/',true).$item['Item']['shortcode']; ?>" />
<?php
}
?>

