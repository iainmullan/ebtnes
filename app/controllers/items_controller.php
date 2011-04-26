<?php
class ItemsController extends AppController {

	var $name = 'Items';
	var $components = array('RequestHandler');

	function go($shortcode) {

		$item = $this->Item->find('first', array('conditions'=>array('shortcode'=>$shortcode)));

		if ($item) {
			$url = $item['Item']['url'];

			$this->Item->id = $item['Item']['id'];
			$this->Item->saveField('last_clicked', date('Y-m-d H:i:s'));
			$this->Item->saveField('clicks', $item['Item']['clicks'] + 1);

			$referer = $this->RequestHandler->getReferer();
			CakeLog::write('clicks', $shortcode.' '.$referer);

			header("Referer: ".Router::url('/'));
			// use a 301 redirect to your destination
			header("Location: $url", TRUE, 301);
			exit;

		} else {
			$this->set('shortcode', $shortcode);
		}

	}
	
	function create() {
		
		if (!empty($this->data)) {

			$short = substr(md5($this->data['Item']['url']), 0, 4);
			$item = $this->Item->find('first', array('conditions'=>array('shortcode'=>$short)));
			
			if (!$item) {
				$this->Item->create();
				$this->data['Item']['shortcode'] = $short;
				if ($this->Item->save($this->data)) {
					$item = $this->Item->find('first', array('conditions'=>array('shortcode'=>$short)));					
					$this->set('item', $item);
				}
			} else {
				CakeLog::write('items', 'Item already exists for '.$this->data['Item']['url']);
			}

		}

	}
	
	function get() {
		$long = $this->params['url']['u'];
		$short = substr(md5($long), 0, 4);
		$url = 'http://www.ebtn.es/'.$short;
		echo json_encode(array('data'=>array('url' => $url)));
		exit();

		// $this->Item->create();
		// 
		// $this->data['Item']['shortcode'] = $short;
		// 
		// if ($this->Item->save($this->data)) {
		// 	$item = $this->Item->find('first', array('conditions'=>array('shortcode'=>$short)));					
		// 	$this->set('item', $item);
		// 	echo $short;
		// 	exit();
		// }
		
	}
	
	function bm() {
		$u = $this->params['url']['u'];

		$short = substr(md5($u), 0, 4);
		$item = $this->Item->find('first', array('conditions'=>array('shortcode'=>$short)));
		
		if (!$item) {
			$this->Item->create();
			$this->data['Item']['shortcode'] = $short;
			$this->Item->save($this->data);
			$item = $this->Item->find('first', array('conditions'=>array('shortcode'=>$short)));
		} else {
			CakeLog::write('items', 'Item already exists for '.$this->data['Item']['url']);
		}

		$this->set('item', $item);

	}

}
?>