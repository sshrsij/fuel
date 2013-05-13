<?php

class Controller_Pkmn extends Controller_Template
{

	public function action_list()
	{
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('jquery.mobile-1.3.1.js');
		echo Asset::css('jquery.mobile-1.3.1.css');
		$this->template->title = '';
		$data=array('list' => Model_Pkmn::listed());
		$this->template->content = View::forge('pkmn/list',$data);		
	}
	
	public function action_stat($id)
	{
		$data=array();
		$data['content']=Model_Mnst::find($id);

		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('highchart/highcharts.js');
		echo Asset::js('highchart/highcharts-more.js');
		echo Asset::js('guid.js');
		$this->template->title = 'Pkmn &raquo; stat Test';
		$this->template->content = View::forge('pkmn/stat',$data);		
	}

	
	public function action_adjust()
	{
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('highchart/highcharts.js');
		echo Asset::js('highchart/highcharts-more.js');
		echo Asset::js('guid.js');		
		$data=array();
		$data["ix"]="";
			
		$this->template->title = '';
		$this->template->content = View::forge('pkmn/adjust',$data);
	}
	public function action_detail($id)
	{
		$this->template->title = 'Pkmn &raquo; Detail';
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('jquery-ui-1.10.3.custom.min.js');
		echo Asset::css('jquery-ui-1.10.3.custom.min.css');
		
		$this->template->content = View::forge('pkmn/detail');
	}

}
