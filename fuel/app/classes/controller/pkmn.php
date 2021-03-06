<?php

class Controller_Pkmn extends Controller_Template {

    public function action_index() {
	echo Asset::js('jquery-1.9.1.js');
	echo Asset::js('jquery.mobile-1.3.1.js');
	echo Asset::css('jquery.mobile-1.3.1.css');
	$this->template->title = '';
	$data = array();
	$data['val'] = Model_Pkmn::listed();
	$this->template->content = View::forge('pkmn/index', $data);
    }

    public function action_list() {

	echo Asset::js('jquery-1.9.1.js');
	echo Asset::js('jquery.mobile-1.3.1.js');
	echo Asset::css('jquery.mobile-1.3.1.css');

	$param = array();
	if (!is_null(Fuel\Core\Input::get("type"))) {
	    $param["type"] = Fuel\Core\Input::get("type");
	}
	if (!is_null(Fuel\Core\Input::get("egg"))) {
	    $param["egg"] = Fuel\Core\Input::get("egg");
	}
	if (!is_null(Fuel\Core\Input::get("ability"))) {
	    $param["ability"] = Fuel\Core\Input::get("ability");
	}

	///0以上に修正
	$pagenum = ( is_null(Fuel\Core\Input::get("p")) ) ? 1 : Fuel\Core\Input::get("p");

	$this->template->title = '';
	$this->template->content = \Fuel\Core\ViewModel::forge('pkmn/list');
	$this->template->content->set('data', array('pagenum' => $pagenum, 'params' => $param));
    }

    public function action_status($no) {
	$this->template->title = '';
	echo Asset::js('jquery-1.9.1.js');
	echo Asset::js('jquery.mobile-1.3.1.js');
	echo Asset::js('highchart/highcharts.js');
	echo Asset::js('highchart/highcharts-more.js');
	echo Asset::js('polarchart.js');

	echo Asset::css('jquery.mobile-1.3.1.css');
	$data = array();



	$pkmn = Model_Pkmn::oneByNo($no);
	var_dump($pkmn);
	$data['pkmn'] = $pkmn;
//		$data['head']='Detail::'.($pkmn['name']);
	$data['head'] = ($pkmn['name']);
	$this->template->content = View::forge('pkmn/status', $data);
    }

    public function action_stat($no = 1) {
	$this->template->content = \Fuel\Core\ViewModel::forge('pkmn/stat');
    }

}
