<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\I18n\Time;

class TournamentsController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'id' => 'desc'
        ]
    ];

    public function index() {
        $tournamentsTable = $this->getTableLocator()->get('Tournaments');
      $tournaments = $tournamentsTable->find('all')
        ->contain( 'Hosts');

        $tournaments = $this->paginate($tournaments);

        $this->set(compact('tournaments'));
    }

    public function view($id = null) {
        $tournament = $this->Tournaments->get($id, [
            'contain' => ['Files', 'Hosts', 'Hosts.Files']
        ]);

        $this->set('tournament', $tournament);
    }

    public function add(){
        $hostsTable = $this->getTableLocator()->get('Hosts');
        $disTable = $this->getTableLocator()->get('Disciplines');
        $filesTable = $this->getTableLocator()->get('Files');
        $files = $filesTable->find()
            ->select(['id', 'name', 'dir'])
            ->where([
                'type' => 'application/pdf'
            ])->all();
        $hosts = $hostsTable->find()
            ->select(['id', 'name'])
            ->all();
        $disciplines = $disTable->find()
            ->select(['id', 'name'])
            ->all();

        $tournament = $this->Tournaments->newEntity();
        if ($this->request->is('post') AND !empty($this->request->getData())) {
            $data = $this->request->getData();
            if(isset($data['file_id']) AND !empty($data['file_id']) AND $data['file_id'] == 'keine'){
                unset($data['file_id']);
            }
            if(!isset($data['end']) OR empty($data['end'])){
                $data['end'] = $data['start'];
            }
            $this->Tournaments->patchEntity($tournament, $data);
            if (isset($data['disciplines']) AND !empty($data['disciplines'])) {
                $tournament->disciplines = implode('/', $data['disciplines']);
                if (isset($data['disciplines']) AND !empty($data['indoor'])) {
                    $tournament->disciplines .= " (Halle)";
                }
            }
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('Der neue Eintrag wurde gespeichert.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Der Eintrag konnte nicht gespeichert werden.'));
            }
        }

        $this->set(compact('tournament'));
        $this->set(compact('disciplines'));
        $this->set(compact('hosts'));
        $this->set(compact('files'));
    }

    public function edit($id = null) {
        $hostsTable = $this->getTableLocator()->get('Hosts');
        $disTable = $this->getTableLocator()->get('Disciplines');
        $filesTable = $this->getTableLocator()->get('Files');
        $files = $filesTable->find()
            ->select(['id', 'name', 'dir'])
            ->where([
                'type' => 'application/pdf'
            ])->all();
        $hosts = $hostsTable->find()
            ->select(['id', 'name'])
            ->all();
        $disciplines = $disTable->find()
            ->select(['id', 'name'])
            ->all();

        $tournament = $this->Tournaments->get($id);
        if ($this->request->is(['patch', 'post', 'put']) AND !empty($this->request->getData())) {
            $data = $this->request->getData();
            if(isset($data['file_id']) AND !empty($data['file_id']) AND $data['file_id'] == 'keine'){
                unset($data['file_id']);
            }
            if(!isset($data['end']) OR empty($data['end'])){
                $data['end'] = $data['start'];
            }
            $tournament = $this->Tournaments->patchEntity($tournament, $data);
            if (isset($data['disciplines']) AND !empty($data['disciplines'])) {
                $tournament->disciplines = implode('/', $data['disciplines']);
                if (isset($data['disciplines']) AND !empty($data['indoor'])) {
                    $tournament->disciplines .= " (Halle)";
                }
            }
            if ($this->Tournaments->save($tournament)) {
                $this->Flash->success(__('Der neue Eintrag wurde gespeichert.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Der Eintrag konnte nicht gespeichert werden.'));
            }
        }

        $this->set(compact('tournament'));
        $this->set(compact('disciplines'));
        $this->set(compact('hosts'));
        $this->set(compact('files'));
    }

    public function delete($id = null) {
        $tournament = $this->Tournaments->get($id);
        if ($this->Tournaments->delete($tournament)) {
            $this->Flash->success(__('Der Eintrag wurde gelöscht.'));
        } else {
            $this->Flash->error(__('Der Eintrag konnte nicht gelöscht werden.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cancel($id = null) {
        $tournament = $this->Tournaments->get($id);
        $tournament->canceled = true;
        $this->Tournaments->save($tournament);

        return $this->redirect(['action' => 'index']);
    }
}
