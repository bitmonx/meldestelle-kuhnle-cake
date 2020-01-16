<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;


class AppController extends Controller{

    public function initialize(){
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
          'authenticate' => [
            'Form' => [
              'finder' => 'auth',
              'fields' => [
                'username' => 'username',
                'password' => 'password'
              ]
            ]
          ],
          'loginAction' => [
            'controller' => 'Users',
            'action' => 'login'
          ],
          'authorize' => ['Controller'],
          'unauthorizedRedirect' => $this->referer(),
          'loginRedirect' => ['controller' => 'Tournaments', 'action' => 'index']
        ]);

        $this->Auth->allow(['login', 'logout', 'Files.download']);

        $this->loadComponent('Recaptcha.Recaptcha', [
            'enable' => true,     // true/false
            'sitekey' => '6Lcb13YUAAAAAJA26s4R6X5NzDZTI5bMMwBlEsEG', //if you don't have, get one: https://www.google.com/recaptcha/intro/index.html
            'secret' => '6Lcb13YUAAAAAENztjwBvuI1M9bWPy4itFM4pnpQ',
            'type' => 'image',  // image/audio
            'theme' => 'light', // light/dark
            'lang' => 'vi',      // default en
            'size' => 'normal'  // normal/compact
        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized($user = null){
      // Any registered user can access public functions

        if (!$this->request->getParam('prefix') OR $user['userrole']['role'] === 'superadmin') {
            return true;
        }
        if($this->request->getParam('prefix') === 'admin') {
          return (bool)($user['userrole']['role'] === 'admin');
        }
        // Only admins can access admin functions
        if ($this->request->getParam('prefix') === 'superadmin') {
            return (bool)($user['userrole']['role'] === 'superadmin');
        }
        // Default deny
        return false;
    }
}
