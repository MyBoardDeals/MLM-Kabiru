<?php



App::uses('AppController', 'Controller');



/**



 * Groups Controller



 *



 * @property Group $Group



 */



class GroupsController extends AppController {


	public function beforeFilter() {
    		parent::beforeFilter(); 
	}



	public function admin_index() {

		$this->Group->recursive = 0;
		$this->set('results', $this->paginate('Group'));

	}


	public function admin_add() {



		if ($this->request->is('post')) {



			$this->Group->create();



			if ($this->Group->save($this->request->data)) {



				$this->Session->setFlash('The group has been saved.','default',array('class'=>'alert alert-success'));



				$this->redirect(array('action' => 'index'));



			} else {



				



				 $this->Session->setFlash('The group could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));



			}



		}



	}











	public function admin_edit($id = null) {



		$this->Group->id = $id;



		if (!$this->Group->exists()) {



			throw new NotFoundException(__('Invalid group'));



		}



		if ($this->request->is('post') || $this->request->is('put')) {



			if ($this->Group->save($this->request->data)) {



				



				$this->Session->setFlash('The group has been saved.','default',array('class'=>'alert alert-success'));



				$this->redirect(array('action' => 'index'));



			} else {



				$this->Session->setFlash('The group could not be saved. Please, try again.','default',array('class'=>'alert alert-danger'));



			}



		} else {



			$this->request->data = $this->Group->read(null, $id);



		}



	}











	public function admin_delete($id = null) {



		



		$this->Group->id = $id;



		if (!$this->Group->exists()) {



			throw new NotFoundException(__('Invalid group'));



		}



		if ($this->Group->delete()) {



			$this->Session->setFlash(__('Group deleted'));



			$this->redirect(array('action' => 'index'));



		}



		$this->Session->setFlash(__('Group was not deleted'));



		$this->redirect(array('action' => 'index'));



	}



	



}



