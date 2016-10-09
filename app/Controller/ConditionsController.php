<?php
App::uses('AppController', 'Controller');

class ConditionsController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
    public $name = 'Conditions';

    public function index(){

    }

    public function badgame(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');

        $query = $this->Condition->find('all',
            array(
                'fields' => array('Electricity.flag'),//取得したいフィールドの指定
                'conditions' => array('Condition.id' => $id) //検索条件の配列);
            ));
        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query);
    }

    public function face(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $face = $this->request->data('face');

        $this->Condition->updateAll(
        array ('face' => $face),
        array ('id' => $id));
    }

    public function touch(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $touch = $this->request->data('touch');

        $this->Condition->updateAll(
        array ('touch' => $touch),
        array ('id' => $id));
    }

    public function toe(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $toe = $this->request->data('toe');

        $this->Condition->updateAll(
        array ('toe' => $toe),
        array ('id' => $id));
    }

}
