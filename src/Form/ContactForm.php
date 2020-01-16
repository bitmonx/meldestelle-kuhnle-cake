<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;

class ContactForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('name', [
                'type' => 'string'
            ])
            ->addField('email', [
                'type' => 'string'
            ])
            ->addField('subject', [
                'type' => 'string'
            ])
            ->addField('message', [
                'type' => 'text'
            ]);
    }

    public function validationDefault(Validator $validator)
    {

        $validator
            ->requirePresence('name')
            ->notEmpty('name', 'Das Feld darf nicht leer sein.')
            ->minLength('name', 5, 'Der Name muss mind. 5 Zeichen lang sein.');

        $validator
            ->requirePresence('email')
            ->notEmpty('email', 'Das Feld darf nicht leer sein.')
            ->add('email', 'validEmail', [
                'rule' => 'email',
                'message' => 'Bitte geben Sie eine gültige E-Mail Adresse ein.'
            ]);

        $validator
            ->requirePresence('message')
            ->notEmpty('message', 'Das Feld darf nicht leer sein.');

        return $validator;
    }

    protected function _execute(array $data)
    {
        $email = new Email();
        $email
            ->setSender($data['email'], $data['name'])
            ->setFrom('kontaktformular@meldestelle-kuhnle.de')
            ->setTo('kontakt@meldestelle-kuhnle.de')
            //->setBcc('ssr@mk.de')
            ->setReplyTo($data['email'])
            ->setSubject($data['subject']);
        $result = $email->send($data['message']);
        return (!empty($result));
    }
}
