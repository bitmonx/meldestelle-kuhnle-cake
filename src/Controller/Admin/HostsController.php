<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Hosts Controller
 *
 *
 * @method \App\Model\Entity\Host[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HostsController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'id' => 'desc'
        ]
    ];

    public function index()
    {
        $hosts = $this->paginate($this->Hosts);

        $this->set(compact('hosts'));
    }

    /**
     * View method
     *
     * @param string|null $id Host id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $host = $this->Hosts->get($id, [
            'contain' => ['Files']
        ]);

        $this->set('host', $host);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $filesTable = $this->getTableLocator()->get('Files');
        $images = $filesTable->find('all')
            ->where([
                'type LIKE' => 'image/%'
            ])->all();
        $host = $this->Hosts->newEntity();
        if ($this->request->is('post') AND !empty($this->request->getData())) {
            $data = $this->request->getData();
            $host = $this->Hosts->patchEntity($host, $data);
            if ($this->Hosts->save($host)) {
                $this->Flash->success(__('Der Eintrag wurde erfolgreich gespeichert.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Der Eintrag konnte nicht gespeichert werden.'));
        }
        $this->set(compact('host'));
        $this->set(compact('images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Host id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id) {
        $filesTable = $this->getTableLocator()->get('Files');
        $images = $filesTable->find('all')
            ->where([
                'type LIKE' => 'image/%'
            ])->all();
        $host = $this->Hosts->get($id, [
            'contain' => 'Files'
        ]);

        if ($this->request->is(['patch', 'post', 'put']) AND !empty($this->request->getData())) {
            $data = $this->request->getData();
            $host = $this->Hosts->patchEntity($host, $data);
            if ($this->Hosts->save($host)) {
                $this->Flash->success(__('Der Eintrag wurde erfolgreich gespeichert.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Der Eintrag konnte nicht gespeichert werden.'));
        }
        $this->set(compact('host'));
        $this->set(compact('images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Host id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $host = $this->Hosts->get($id);
        if ($this->Hosts->delete($host)) {
            $this->Flash->success(__('Der Eintrag wurde erfolgreich gelöscht.'));
        } else {
            $this->Flash->error(__('Der Eintrag konnte nicht gelöscht werden.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
