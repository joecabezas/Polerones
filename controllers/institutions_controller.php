<?php
class InstitutionsController extends AppController {

	var $name = 'Institutions';

	function admin_index() {
		$this->Institution->recursive = 0;
		$this->set('institutions', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid institution', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('institution', $this->Institution->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Institution->create();
			if ($this->Institution->save($this->data)) {
				$this->Session->setFlash(__('The institution has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid institution', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Institution->save($this->data)) {
				$this->Session->setFlash(__('The institution has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Institution->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for institution', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Institution->delete($id)) {
			$this->Session->setFlash(__('Institution deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Institution was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>