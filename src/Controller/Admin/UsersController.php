<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController{
    /**
     * @var \App\Controller\Component\UsersComponent|bool|\Cake\Controller\Component\UsersComponent|object|\Users|\UsersComponent
     */


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
      $users = $this->paginate($this->Users);
        $userrolesTable = TableRegistry::getTableLocator()->get('Userroles');
        $results = $userrolesTable->find('all')->all();
        $userroles = [];
        foreach ($results as $key => $userrole){
            $userroles[$userrole->id] = $userrole->role;
        }

        $this->set(compact('userroles'));
        $this->set(compact('users'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        $userrolesTable = TableRegistry::getTableLocator()->get('Userroles');
        $userroles = $userrolesTable->find('all')->all();
        if($this->Auth->user('userrole.role') === 'superadmin'){
          $user = $this->Users->newEntity();
          if ($this->request->is('post')) {
              $data = $this->request->getData();
              $user->username = $data['username'];
              $user->name = $data['name'];
              $user->password = $data['password'];
              $user->userrole_id = $data['userrole_id'];
              //$user = $this->Users->patchEntity($user, $this->request->getData());
              if ($this->Users->save($user)) {
                  $this->Flash->success(__('The user has been saved.'));

                  return $this->redirect(['action' => 'index']);
              }
              $this->Flash->error(__('The user could not be saved. Please, try again.'));
          }
        }else {
          $this->redirect(['action' => 'index']);
          $this->Flash->error("Du dieser Bereich ist nicht frei.");
        }
        $this->set(compact('user'));
        $this->set(compact('userroles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null){
        $userrolesTable = TableRegistry::getTableLocator()->get('Userroles');
        $userroles = $userrolesTable->find('all')->all();
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('userroles'));
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        if($this->Auth->user('userroles.role') === 'superadmin') {
          $this->request->allowMethod(['post', 'delete']);
          $user = $this->Users->get($id);
          if ($this->Users->delete($user)) {
              $this->Flash->success(__('The user has been deleted.'));
          } else {
              $this->Flash->error(__('The user could not be deleted. Please, try again.'));
          }

          return $this->redirect(['action' => 'index']);
        } else {
          $this->redirect(['action' => 'index']);
          $this->Flash->error("Du bist nicht dazu berechtigt User zu löschen.");
        }

    }

    public function editUserData($userId) {
        $user = $this->Users->get($userId);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Die Daten wurden erfolgreich gespeichert.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Die Daten konnten nicht gespeichert werden.'));
        }
        $this->set(compact('user'));
    }

    public function login(){
      $this->viewBuilder()->setLayout('login');
      //$this->layout = 'login';
      if($this->Auth->user()){
        $this->redirect('/admin/tournaments');
      }
      if ($this->request->is('post')) {
          $user = $this->Auth->identify();
          if ($user) {
              $this->Auth->setUser($user);
              return $this->redirect($this->Auth->redirectUrl());
          }
          $this->Flash->error('Your username or password is incorrect.');
      }
    }

    public function logout(){
        $this->Flash->success('Du wurdest erfolgreich ausgeloggt.');
        return $this->redirect($this->Auth->logout());
    }
}
