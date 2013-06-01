<?php
class Section extends AppModel {
	public $useTable = 'section';

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'El nombre de la sección es requerido!',
		),
	);

	public function afterFind($data) {
		for ($i = 0; $i < count($data); $i++) {
			$data[$i][$this->alias]['parent_section'] = "";
		}

		return $data;
	}

    public function beforeSave($data) {
        if (!$data[$this->alias]['sub_id']) {
            $data[$this->alias]['sub_id'] = 0;
        }

        return $data;
    }

	public function getParentSection($sub_id){
		$parent_section = $this->find('first', array('fields' => array('name') ,'conditions' => array('id' => $sub_id)));

		return $parent_section['Section']['name'];
	}

	public function getParents() {
		$parents = $this->find('list', array('fields' => array('id', 'name'), 'conditions' => array('sub_id' => 0), 'order' =>array('name')));

		return $parents;
	}

}