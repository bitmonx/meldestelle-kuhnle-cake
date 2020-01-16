<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Disciplines Controller
 *
 *
 * @method \App\Model\Entity\Discipline[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisciplinesController extends AppController{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
        $disciplines = $this->paginate($this->Disciplines);

        $this->set(compact('disciplines'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $this->disableAutoRender();
        $discipline = $this->Disciplines->newEntity();
        if ($this->request->is(['patch', 'post', 'put']) AND !empty($this->request->getData())) {
            $discipline = $this->Disciplines->patchEntity($discipline, $this->request->getData());
            if ($this->Disciplines->save($discipline)) {
                $this->Flash->success(__('Der Eintrag wurde erfolgreich gespeichert.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Der Eintrag konnte nicht gespeichert werden.'));
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Discipline id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
//    public function edit($id = null){
//        $discipline = $this->Disciplines->get($id, [
//            'contain' => []
//        ]);
//        if ($this->request->is(['patch', 'post', 'put'])) {
//            $discipline = $this->Disciplines->patchEntity($discipline, $this->request->getData());
//            if ($this->Disciplines->save($discipline)) {
//                $this->Flash->success(__('The discipline has been saved.'));
//
//                return $this->redirect(['action' => 'index']);
//            }
//            $this->Flash->error(__('The discipline could not be saved. Please, try again.'));
//        }
//        $this->set(compact('discipline'));
//    }

    /**
     * Delete method
     *
     * @param string|null $id Discipline id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $discipline = $this->Disciplines->get($id);
        if ($this->Disciplines->delete($discipline)) {
            $this->Flash->success(__('Der Eintrag wurde erfolgreich gelöscht.'));
        } else {
            $this->Flash->error(__('Der Eintrag konnte nicht gelöscht werden.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
