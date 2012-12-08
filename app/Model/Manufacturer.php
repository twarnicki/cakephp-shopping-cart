<?php
App::uses('AppModel', 'Model');
class Manufacturer extends AppModel {

////////////////////////////////////////////////////////////

	public $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'manufacturer_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

////////////////////////////////////////////////////////////

	public function findList() {
		return $this->find('list', array(
			'order' => array(
				'Manufacturer.name' => 'ASC'
			)
		));
	}

////////////////////////////////////////////////////////////

}
