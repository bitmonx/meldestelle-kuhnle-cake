<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

/**
 * Hosts Controller
 *
 *
 * @method \App\Model\Entity\Host[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController{

  public function initialize() {
    parent::initialize();
    $this->Auth->allow(['uploadFile', 'download']);
  }

    public function uploadFile() {
        $this->disableAutoRender();
        if(isset($_FILES['uploadFile']) AND !empty($_FILES['uploadFile'])){
            $uploadFile = $_FILES['uploadFile'];

            $uploadPath = '';
            if(strpos($uploadFile['type'], 'pdf') !== false) {
                $uploadPath = APP . 'files' . DS . 'ausschreibungen' . DS;
            } elseif (strpos($uploadFile['type'], 'image') !== false) {
                $uploadPath = WWW_ROOT .  'img' . DS . 'hosts' . DS;
            } else {
                return;
            }
            $this->checkPath($uploadPath);
            if(!file_exists($uploadPath . $uploadFile['name'])){
                if(move_uploaded_file($uploadFile['tmp_name'], $uploadPath . $uploadFile['name'])){
                    $fileTable = $this->getTableLocator()->get('Files');
                    $file = $fileTable->newEntity();
                    $file->type = $uploadFile['type'];
                    $file->name = $uploadFile['name'];
                    $file->dir = $uploadPath;
                    $file->size = $uploadFile['size'];
                    if($fileTable->save($file)){
                        $this->Flash->success('Die Datei wurde erfolgreich hochgeladen');
                        echo json_encode($file);
                    }else{
                        $this->Flash->error('Ein Fehler ist aufgetreten. Die Datei konnte nicht hochgeladen werden');
                    }
                 } else{
                    $this->Flash->error('Ein Fehler ist aufgetreten. Die Datei konnte nicht hochgeladen werden');
                }
            } else{
                $this->Flash->error('Eine gleichnamige Datei existiert bereits.');
            }
        }
    }

    public function checkPath($path){
        if(file_exists($path)){
            if(is_dir($path)){
                $dir = new Folder($path, false);
            }
        }else {
            $dir = new Folder($path, true, 0766);
        }
        return $dir;
    }

    public function download($id) {
        $file = $this->Files->get($id);
        $path = $file->dir . DS . $file->name;
        $response = $this->response->withFile($path);
        return $response;
    }
}
