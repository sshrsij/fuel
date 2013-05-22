<?php

class Controller_Pkmn extends Controller_Template
{

	public function action_index()
	{
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('jquery.mobile-1.3.1.js');
		echo Asset::css('jquery.mobile-1.3.1.css');		
		$this->template->title = '';
		$data=array();
		$data['val'] = Model_Pkmn::listed();
		$this->template->content = View::forge('pkmn/index',$data);
	}
	
	public function action_list()
	{
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('jquery.mobile-1.3.1.js');
		echo Asset::css('jquery.mobile-1.3.1.css');
		$this->template->title = '';
		$this->template->content = View::forge('pkmn/list');
	}
	
	public function action_status($no)
	{
		$this->template->title = '';
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('jquery.mobile-1.3.1.js');
		echo Asset::js('highchart/highcharts.js');
		echo Asset::js('highchart/highcharts-more.js');
		//echo Asset::js('jquery.tmpl.min.js');
		echo Asset::js('polarchart.js');
		
		echo Asset::css('jquery.mobile-1.3.1.css');
		
		$data=array();		
		$pkmn=  Model_Pkmn::oneByNo($no);
		$data['pkmn']=$pkmn;
		$data['head']='Detail::'.  urlencode($pkmn['name']);
		$this->template->content = View::forge('pkmn/status',$data);
	}

}
