<?php
App::uses('AppController', 'Controller');
class ProductsController extends AppController {

////////////////////////////////////////////////////////////

	public $components = array('RequestHandler');

////////////////////////////////////////////////////////////

	public function beforeFilter() {
		parent::beforeFilter();
	}

////////////////////////////////////////////////////////////

	public function index() {

		$this->paginate = array(
			'recursive' => -1,
			'contain' => array(
				'Manufacturer'
			),
			'limit' => 20,
			'conditions' => array(
				'Product.active' => 1,
				'Manufacturer.active' => 1
			),
			'order' => array(
				'Product.name' => 'ASC'
			),
			'paramType' => 'querystring',
		);
		$products = $this->paginate('Product');

		$this->set(compact('products'));

		$this->set('title_for_layout', Configure::read('Settings.SHOP_TITLE'));

	}

////////////////////////////////////////////////////////////

	public function view($id = null) {

		$product = $this->Product->find('first', array(
			'recursive' => -1,
			'contain' => array(
				'Category',
				'Manufacturer'
			),
			'conditions' => array(
				'Manufacturer.active' => 1,
				'Product.active' => 1,
				'Product.slug' => $id
			)
		));
		if (empty($product)) {
			$this->redirect(array('action' => 'index'), 301);
		}

		$this->Product->updateAll(
			array(
				'Product.views' => 'Product.views + 1',
			),
			array('Product.id' => $product['Product']['id'])
		);

		$this->set(compact('product'));

		$this->set('title_for_layout', $product['Product']['name'] . ' ' . Configure::read('Settings.SHOP_TITLE'));

	}

////////////////////////////////////////////////////////////

	public function search() {

		$search = null;
		if(!empty($this->request->query['search']) || !empty($this->request->data['name'])) {
			$search = empty($this->request->query['search']) ? $this->request->data['name'] : $this->request->query['search'];
			$search = preg_replace('/[^a-zA-Z0-9 ]/', '', $search);
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			$conditions = array(
				'Manufacturer.active' => 1,
				'Product.active' => 1,
			);
			foreach($terms as $term) {
				$terms1[] = preg_replace('/[^a-zA-Z0-9]/', '', $term);
				$conditions[] = array('Product.name LIKE' => '%' . $term . '%');
			}
			$products = $this->Product->find('all', array(
				'recursive' => -1,
				'contain' => array(
					'Manufacturer'
				),
				'conditions' => $conditions,
				'limit' => 200,
			));
			if(count($products) == 1) {
				$this->redirect(array('controller' => 'products', 'action' => 'view', 'slug' => $products[0]['Product']['slug']));
			}
			$terms1 = array_diff($terms1, array(''));
			$this->set(compact('products', 'terms1'));
		}
		$this->set(compact('search'));

		if ($this->request->is('ajax')) {
			$this->layout = false;
			$this->set('ajax', 1);
		} else {
			$this->set('ajax', 0);
		}

		$this->set('title_for_layout', 'Search');

		$description = 'Search';
		$this->set(compact('description'));

		$keywords = 'search';
		$this->set(compact('keywords'));
	}

////////////////////////////////////////////////////////////

	public function searchjson() {

		$search = null;
		if(!empty($this->request->query['search'])) {
			$search = $this->request->query['search'];
			$terms = explode(' ', trim($search));
			$terms = array_diff($terms, array(''));
			$conditions = array(
				'Manufacturer.active' => 1,
				'Product.active' => 1
			);
			foreach($terms as $term) {
				$conditions[] = array('Product.name LIKE' => '%' . $term . '%');
			}
			$products = $this->Product->find('all', array(
				'recursive' => -1,
				'contain' => array(
					'Manufacturer'
				),
				'fields' => array(
					'Product.name',
					'Product.image'
				),
				'conditions' => $conditions,
				'limit' => 200,
			));
		}
		echo json_encode($products);
		$this->autoRender = false;

	}

////////////////////////////////////////////////////////////

	public function sitemap() {
		$products = $this->Product->find('all', array(
			'recursive' => -1,
			'contain' => array(
				'Manufacturer'
			),
			'fields' => array(
				'Product.slug'
			),
			'conditions' => array(
				'Manufacturer.active' => 1,
				'Product.active' => 1
			),
			'order' => array(
				'Product.created' => 'DESC'
			),
		));
		$this->set(compact('products'));

		$website = Configure::read('Settings.WEBSITE');
		$this->set(compact('website'));

		$this->layout = 'xml';
		$this->response->type('xml');
	}

////////////////////////////////////////////////////////////

	public function admin_reset() {
		$this->Session->delete('Product');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {

		if ($this->request->is('post')) {

			if($this->request->data['Product']['active'] == '1' || $this->request->data['Product']['active'] == '0') {
				$conditions[] = array(
					'Product.active' => $this->request->data['Product']['active']
				);
				$this->Session->write('Product.active', $this->request->data['Product']['active']);
			} else {
				$this->Session->write('Product.active', '');
			}

			if(!empty($this->request->data['Product']['manufacturer_id'])) {
				$conditions[] = array(
					'Product.manufacturer_id' => $this->request->data['Product']['manufacturer_id']
				);
				$this->Session->write('Product.manufacturer_id', $this->request->data['Product']['manufacturer_id']);
			} else {
				$this->Session->write('Product.manufacturer_id', '');
			}

			if(!empty($this->request->data['Product']['name'])) {
				$filter = $this->request->data['Product']['filter'];
				$this->Session->write('Product.filter', $filter);
				$name = $this->request->data['Product']['name'];
				$this->Session->write('Product.name', $name);
				$conditions[] = array(
					'Product.' . $filter . ' LIKE' => '%' . $name . '%'
				);
			} else {
				$this->Session->write('Product.filter', '');
				$this->Session->write('Product.name', '');
			}

			$this->Session->write('Product.conditions', $conditions);
			$this->redirect(array('action' => 'index'));

		}

		if($this->Session->check('Product')) {
			$all = $this->Session->read('Product');
		} else {
			$all = array(
				'active' => '',
				'manufacturer_id' => '',
				'name' => '',
				'filter' => '',
				'conditions' => ''
			);
		}
		$this->set(compact('all'));

		$this->paginate = array(
			'contain' => array(
				'Category',
				'Manufacturer',
			),
			'recursive' => -1,
			'limit' => 50,
			'conditions' => $all['conditions'],
			'order' => array(
				'Product.name' => 'ASC'
			),
			'paramType' => 'querystring',
		);
		$products = $this->paginate('Product');

		$manufacturers = $this->Product->Manufacturer->findList();

		$manufacturerseditable = array();
		foreach ($manufacturers as $key => $value) {
			$manufacturerseditable[] = array(
				'value' => $key,
				'text' => $value,
			);
		}

		// $categories= $this->Product->Category->find('list', array(
		// 	'recursive' => -1,
		// 	'order' => array(
		// 		'Category.name' => 'ASC'
		// 	)
		// ));
		$categories = $this->Product->Category->generateTreeList(null, null, null, '--');

		$categorieseditable = array();
		foreach ($categories as $key => $value) {
			$categorieseditable[] = array(
				'value' => $key,
				'text' => $value,
			);
		}

		$this->set(compact('products', 'manufacturers', 'manufacturerseditable', 'categorieseditable'));

	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {

		if (($this->request->is('post') || $this->request->is('put')) && !empty($this->request->data['Product']['image']['name'])) {

			$this->Img = $this->Components->load('Img');

			$newName = $this->request->data['Product']['slug'];

			$ext = $this->Img->ext($this->request->data['Product']['image']['name']);

			$origFile = $newName . '.' . $ext;
			$dst = $newName . '.jpg';

			$targetdir = WWW_ROOT . 'images/original';

			$upload = $this->Img->upload($this->request->data['Product']['image']['tmp_name'], $targetdir, $origFile);

			if($upload == 'Success') {
				$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'images/large/', $dst, 800, 800, 1, 0);
				$this->Img->resampleGD($targetdir . DS . $origFile, WWW_ROOT . 'images/small/', $dst, 180, 180, 1, 0);
				$this->request->data['Product']['image'] = $dst;
			} else {
				$this->request->data['Product']['image'] = '';
			}

			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash($upload);
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash('The Product could not be saved. Please, try again.');
			}
		}

		if (!$this->Product->exists($id)) {
			throw new NotFoundException('Invalid product');
		}
		$product = $this->Product->find('first', array(
			'recursive' => -1,
			'contain' => array(
				'Category',
				'Manufacturer',
			),
			'conditions' => array(
				'Product.id' => $id
			)
		));
		$this->set(compact('product'));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('The product has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The product could not be saved. Please, try again.');
			}
		}
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('manufacturers'));

		$categories = $this->Product->Category->generateTreeList(null, null, null, '--');
		$this->set(compact('categories'));
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException('Invalid product');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('The product has been saved');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The product could not be saved. Please, try again.');
			}
		} else {
			$product = $this->Product->find('first', array(
				'conditions' => array(
					'Product.id' => $id
				)
			));
			$this->request->data = $product;
		}
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('manufacturers'));

		$categories = $this->Product->Category->generateTreeList(null, null, null, '--');
		$this->set(compact('categories'));

	}

////////////////////////////////////////////////////////////

	public function admin_csv() {
		$products = $this->Product->find('all', array(
			'recursive' => -1,
		));
		$this->set(compact('products'));
		$this->layout = false;
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException('Invalid product');
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash('Product deleted');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Product was not deleted');
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
