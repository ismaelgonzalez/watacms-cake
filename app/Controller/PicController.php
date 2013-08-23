<?php
class PicController extends AppController {
    public $uses = array('Pic');

    public $components = array('Session');

    public $helpers = array('Paginator', 'Js');

    public $paginate = array(
        'limit' => '10',
        'order' => array(
            'Pic.id' => 'ASC'
        ),
    );

    public function index() {
        $pics = $this->paginate('Pic');

        $this->set('title_for_layout', 'Lista de Ultimas fotos');
        $this->set('pics', $pics);

        return $this->render();
    }
}