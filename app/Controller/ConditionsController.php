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
        $query = $this->Condition->find('all');
        if($query )
        $this->autoRender = false;

        $this->response->charset('UTF-8');
        $this->response->type('json');
        echo json_encode($query);
    }

}
