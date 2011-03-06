<?php
class Item extends AppModel {
	var $name = 'Item';
	var $displayField = 'shortcode';
	var $validate = array(
		'url' => array(
			'url' => array(
				'rule' => array('url'),
				'message' => 'Please enter a valid URL',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'self' => array(
				'rule'=>'checkSelfDomain',
				'message' => 'This is already a short url'
			)
		),
		'shortcode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'clicks' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	function __construct() {
		parent::__construct();
		$this->validate['url']['self']['message'] = 'This is already a '.Configure::read('site.name').' short URL!';
	}

	function checkSelfDomain($values) {

		$url = $values['url'];
		
		$thisDomain = Router::url('/', true);
		
		if (strstr($url, $thisDomain) !== false) {
			return false;
		}

		return true;
	}

}
?>