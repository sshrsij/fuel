<?php

class Controller_Mnst extends Controller_Template
{

	public function action_list()
	{
		$this->template->title = 'Mnst &raquo; List';

		echo Asset::css('jquery.mobile-1.3.1.css');
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('jquery.mobile-1.3.1.js');		
		$data=array( 
				'title' => '664list',
				'content' => Model_Mnst::find('all') );

		return Response::forge(View_Smarty::forge('mnst/list',$data));
	}

	public function action_detail($no)
	{
		$data=array();
		$data['content']=Model_Mnst::find($no);
		$data['title']= 'Mnst &raquo; Detail';
		echo Asset::css('jquery.mobile-1.3.1.css');
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('jquery.mobile-1.3.1.js');		
		echo Asset::js('highchart/highcharts.js');
		echo Asset::js('highchart/highcharts-more.js');
		return Response::forge(View_Smarty::forge('mnst/detail',$data));
	}
	public function action_exam()
	{
		$data=array();
		echo Asset::js('jquery-1.9.1.js');
		echo Asset::js('highchart/highcharts.js');
		echo Asset::js('highchart/highcharts-more.js');
		return Response::forge(View::forge('mnst/exam',$data));		
	}

}
