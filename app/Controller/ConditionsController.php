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

    public function update($id){

        $query = $this->Condition->find('all',
            array(
                'conditions' => array('Condition.id' => $id) //検索条件の配列);
            ));

        $flagArray = $query[0]['Condition'];
        
        print_r($query);
        if($flagArray['face'] == 1 || $flagArray['touch'] == 1 || $flagArray['toe'] == 1){
            $this->Condition->updateAll(
                array ('Electricity.flag' => 1),
                array ('Electricity.condition_id' => $id));
        }else{
            $this->Condition->updateAll(
                array ('Electricity.flag' => 0),
                array ('Electricity.condition_id' => $id));
        }
        

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

        $this->update($id);
    }

    public function touch(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $touch = $this->request->data('touch');

        $this->Condition->updateAll(
        array ('touch' => $touch),
        array ('id' => $id));

        $this->update($id);
    }

    public function toe(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $toe = $this->request->data('toe');

        $this->Condition->updateAll(
        array ('toe' => $toe),
        array ('id' => $id));

        $this->update($id);
    }

	public function bef_weight(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $bef_weight = $this->request->data('bef_weight');

        $this->Condition->updateAll(
        array ('bef_weight' => $bef_weight),
        array ('id' => $id));
    }

	public function aft_weight(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');
        $aft_weight = $this->request->data('aft_weight');

        $this->Condition->updateAll(
        array ('aft_weight' => $aft_weight),
        array ('id' => $id));
    }

	public function weight(){
        $this->response->header('Access-Control-Allow-Origin', '*');
        $id = $this->request->data('id');

        $query = $this->Condition->find('all',
            array(
                'fields' => array('Condition.bef_weight', 'Condition.aft_weight'),//取得したいフィールドの指定
                'conditions' => array('Condition.id' => $id) //検索条件の配列);
            ));
        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query);
    }

}
