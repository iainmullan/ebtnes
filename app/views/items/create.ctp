<?php

	if (isset($item)) {
		echo $this->Form->text('shortened', array('value'=>Router::url('/',true).$item['Item']['shortcode'], 'class'=>'title created'));
	}

	echo $this->Form->create('Item');

	echo $this->Form->input('url', array('type'=>'text', 'class'=>'title', 'label'=>'Enter URL'));

	echo $this->Form->end();

?>

<p class="nb">This is a URL shortener created for my own personal use. No guarantees are offered about the stability of any URLs generated with it.</p>
