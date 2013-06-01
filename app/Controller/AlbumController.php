<?php
class AlbumController extends AppController {
    public $uses = array('Album', 'Section');

    public $components = array('Session');

    public $helpers = array('Paginator', 'Js');

    public $paginate = array(
        'limit' => '10',
        'order' => array(
            'Album.id' => 'ASC'
        ),
    );

    public function index() {
        $albums = $this->paginate('Album');

        $this->set('title_for_layout', 'Albums de fotos');
        $this->set('albums', $albums);
    }
}