<?php
class PicturesController extends AppController {

	var $name = 'Pictures';

	function admin_index() {
		$this->Picture->recursive = 0;
		$this->set('pictures', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Foto inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('picture', $this->Picture->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Picture->create();
			if ($this->Picture->save($this->data)) {
				$this->Session->setFlash(__('La foto ha sido guardada con éxito.', true));
				$this->redirect(array('controller' => 'products', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Picture->Product->find('list');
		$this->set(compact('products'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid picture', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Picture->save($this->data)) {
				$this->Session->setFlash(__('The picture has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Picture->read(null, $id);
		}
		$products = $this->Picture->Product->find('list');
		$this->set(compact('products'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for picture', true));
			
			$this->redirect(
				array(
					'controller' => 'products',
					'action' => 'index'
				)
			);
		}
		
		if ($this->Picture->delete($id)) {
			$this->Session->setFlash(__('Picture deleted', true));
			
			$this->redirect(
				array(
					'controller' => 'products',
					'action' => 'index'
				)
			);
		}
		$this->Session->setFlash(__('Picture was not deleted', true));
		
		$this->redirect(
			array(
				'controller' => 'products',
				'action' => 'index'
			)
		);
	}
}
?>
