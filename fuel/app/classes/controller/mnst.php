<?php

class Controller_Mnst extends Controller_Template {

    public function action_editability() {
	$this->template->title = 'Mnst &raquo; Editability';
	$this->template->content = View::forge('mnst/editability');
    }

    public function action_status() {
	$this->template->title = 'Mnst &raquo; Status';
	$this->template->content = View::forge('mnst/status');
    }

    public function action_list() {
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
	$pagenum = ( is_null(Fuel\Core\Input::get("p")) ) ? 1 : Fuel\Core\Input::get("p");
	$this->template->title = '';
	$this->template->content = \Fuel\Core\ViewModel::forge('mnst/list');	
	$this->template->content->set('data',
		array( 'pagenum' => $pagenum, 'params'=> $param)
	);
    }

    public function action_search() {
	$this->template->title = 'Mnst &raquo; Search';
	$this->template->content = View::forge('mnst/search');
    }

}
