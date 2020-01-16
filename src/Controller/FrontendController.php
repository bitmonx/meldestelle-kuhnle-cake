<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use App\Form\ContactForm;


class FrontendController extends AppController
{

    public function initialize() {
      parent::initialize();
      $this->Auth->allow(['index', 'impressum', 'datenschutz', 'contactform']);
    }

    public function index() {
        $ttable = $this->getTableLocator()->get('Tournaments');
        $usersTable = $this->getTableLocator()->get('Users');
        $contact = new ContactForm();

        $actual = $ttable->find('all')
            ->contain(['Files', 'Hosts', 'Hosts.Files'])
            ->where([
                'end >= DATE(NOW()) - interval 6 WEEK'
            ])
            ->orderAsc('start')
            ->all();

        $past = $ttable->find('all')
            ->contain(['Files', 'Hosts', 'Hosts.Files'])
            ->where([
                'end < DATE(NOW()) - interval 6 WEEK',
                'end >= DATE(NOW()) - interval 78 WEEK'
            ])
            ->orderDesc('start')
            ->all();

        $user = $usersTable->find('all')
            ->where([
                'username' => 'm.kuhnle'
            ])
            ->first();

        if (empty($user)){
            $user = [
                'name' => 'Markus Kuhnle',
                'email' => 'kontakt@meldestelle-kuhnle.de',
                'street' => 'Friedhofstraße',
                'house_number' => 7,
                'plz' => 74391,
                'city' => 'Erligheim',
                'prefix' => '177',
                'mobile' => '60 20 275'
            ];
        }

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if (!empty($data) AND $this->Recaptcha->verify()) {
                if ($contact->execute($data)) {
                    $this->Flash->success('success+Vielen Dank!+Ihre Nachricht wurde verschickt.');
                } else {
                    $this->Flash->error('error+Ihre Nachricht konnte nicht übermittelt werden!+Versuchen Sie es zu einem späteren Zeitpunkt nochmal oder versuchen Sie es gerne telefonisch.');
                }
            } else {
                $this->Flash->error('error+Fehler!+Bitte überprüfen Sie Ihre Eingaben.');
            }
            $this->redirect('#kontakt');
        }

        $this->set(compact('contact'));
        $this->set(compact('user'));
        $this->set(compact('actual'));
        $this->set(compact('past'));
    }

    public function impressum() {
        $usersTable = $this->getTableLocator()->get('Users');
        $user = $usersTable->find('all')
            ->where([
                'username' => 'm.kuhnle'
            ])
            ->first();

        if (empty($user)){
            $user = [
                'name' => 'Markus Kuhnle',
                'email' => 'kontakt@meldestelle-kuhnle.de',
                'street' => 'Friedhofstraße',
                'house_number' => 7,
                'plz' => 74391,
                'city' => 'Erligheim',
                'prefix' => '177',
                'mobile' => '60 20 275'
            ];
        }
        $this->viewBuilder()->setLayout('imprints');
        $this->set(compact('user'));
        $this->set('title', 'Impressum');
    }

    public function datenschutz(){
        $usersTable = $this->getTableLocator()->get('Users');
        $user = $usersTable->find('all')
            ->where([
                'username' => 'm.kuhnle'
            ])
            ->first();

        if (empty($user)){
            $user = [
                'name' => 'Markus Kuhnle',
                'email' => 'kontakt@meldestelle-kuhnle.de',
                'street' => 'Friedhofstraße',
                'house_number' => 7,
                'plz' => 74391,
                'city' => 'Erligheim',
                'prefix' => '177',
                'mobile' => '60 20 275'
            ];
        }
        $this->viewBuilder()->setLayout('imprints');
        $this->set(compact('user'));
        $this->set('title', 'Datenschutzerklärung');
    }


//    public function contactform() {
//        $this->disableAutoRender();
//        $validator = new Validator();
//        $validator
//            ->requirePresence('name')
//            ->notEmpty('name', 'Das Feld darf nicht leer sein.')
//            ->minLength('name', 5, 'Der Name muss mind. 5 Zeichen lang sein.');
//        $validator
//            ->requirePresence('email')
//            ->notEmpty('email', 'Das Feld darf nicht leer sein.')
//            ->add('email', 'validEmail', [
//                'rule' => 'email',
//                'message' => 'Bitte geben Sie eine gültige E-Mail Adresse ein.'
//            ]);
//        $validator
//            ->requirePresence('message')
//            ->notEmpty('message', 'Das Feld darf nicht leer sein.');
//
//        if ($this->Recaptcha->verify()) {
//                if(!empty($this->request->getData())) {
//                    $errors = $validator->errors($this->request->getData());
//                    if(empty($errors)) {
//                        $this->_sendMail($this->request->getData());
//                        $this->redirect('/#kontakt');
//                    } else {
//                        $this->Flash->error('Bitte überprüfen Sie Ihre Eingabe.');
//                        $this->redirect('/#kontakt');
//                    }
//                }
//            }
//        }

//    protected function _sendMail($data) {
//        $this->disableAutoRender();
//        $email = new Email();
//        $email
//            ->setFrom('kontaktformular@meldestelle-kuhnle.de')
//            ->setTo('kontakt@meldestelle-kuhnle.de')
//            ->setReplyTo($data['email'])
//            ->setSubject($data['subject'] . " - " . "Gesendet von: " . $data['email'])
//            ->send($data['message']);
//    }
}
