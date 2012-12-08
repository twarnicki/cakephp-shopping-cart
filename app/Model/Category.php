<?php
App::uses('AppModel', 'Model');
class Category extends AppModel {

////////////////////////////////////////////////////////////

	public $actsAs = array(
		'Tree' => array('parent' => 'category_id'),
	);

////////////////////////////////////////////////////////////

	public $belongsTo = array(
		'ParentCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

////////////////////////////////////////////////////////////

	public $hasMany = array(
		'ChildCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'dependent' => false
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'category_id',
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

}
