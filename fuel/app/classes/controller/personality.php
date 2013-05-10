<?php

class Controller_Personality extends Controller_Rest
{
	protected $format='json';
	
	public function get_all()
	{
		$this->response(
				array(
						'val' => Model_Peronality::find('all')
				));
	}

}