<?php
class StatusHelper extends AppHelper
{
	/*
	 * This function returns a status badge
	 */
	public function getStatus($status){
		$badge = '';
		switch($status){
			case 'A':
				$badge = "<span class='badge badge-success'>Activo</span>";
				break;
			case 'S':
				$badge = "<span class='badge badge-important'>Desactivado</span>";
				break;
			case 'P':
				$badge = "<span class='badge badge-warning'>Pendiente</span>";
				break;
		}

		return $badge;

	}
}