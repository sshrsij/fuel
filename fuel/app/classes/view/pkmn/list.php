<?php

class View_Pkmn_list extends \Fuel\Core\ViewModel {

    protected $per_page = 50;
    protected $num_link = 3;
    protected $rootURL = "/public/pkmn";

    public function view() {
	echo \Fuel\Core\Asset::js('jquery-1.9.1.js');
	echo \Fuel\Core\Asset::js('jquery.mobile-1.3.1.js');
	echo \Fuel\Core\Asset::css('jquery.mobile-1.3.1.css');
	$list = Model_Pkmn::listed($this->data["params"]);
	/*	 * CSS */
	$this->css = '
	    @media (min-width: 35em) { .ui-table-reflow.ui-responsive { display: table; } }
	    td a{    text-decoration: none;}
	    td a:hover{text-decoration: none;}';
	/** call at  $(funtion(){}); */
	$this->js = '';
	/* Pagination */
	$config = array(
	    'name' => 'default',
	    'total_items' => count($list),
	    'per_page' => $this->per_page,
	    'uri_segment' => 5,
	    'num_links' => $this->num_link,
	    'uri_segment' => 'p',
	);
	$offset = max(($this->data["pagenum"] - 1), 0) * $this->per_page;
	/*	 * slice list */
	$this->pklist = array_splice($list, $offset, $this->per_page);
	$this->config = $config;
	$this->head = "list";
	$this->rowfunc = function($data, $column) {   return  $this->rowElement($data, $column);};
    }

    protected function rowElement($data, $column) {
	if ($column === "no" || $column === "name") {
	    return $this->linktoOne($data[$column], $data["pid"]);
	} else if ($column === 'type1') {
	    return $this->linktoType($data[$column], $data['t1id']);
	} else if ($column === 'type2') {
	    return $this->linktoType($data[$column], $data['t2id']);
	} else if ($column === 'egg1') {
	    return $this->linktoEgg($data[$column], $data['e1id']);
	} else if ($column === 'egg2') {
	    return $this->linktoEgg($data[$column], $data['e2id']);
	} else if ($column === 'ability1') {
	    return $this->linktoAbility($data[$column], $data['a1id']);
	} else if ($column === 'ability2') {
	    return $this->linktoAbility($data[$column], $data['a2id']);
	} else if ($column === 'ability3') {
	    return $this->linktoAbility($data[$column], $data['a3id']);
	}
	return '<td>' . $data[$column] . '</td>';
    }

    protected function linktoType($value, $no) {
	return sprintf('<td><a href="%s/list?type=%d">%s</a></td>', $this->rootURL, $no, $value);
    }

    protected function linktoEgg($value, $no) {
	return sprintf('<td><a href="%s/list?egg=%d">%s</a></td>', $this->rootURL, $no, $value);
    }

    protected function linktoAbility($value, $no) {
	return sprintf('<td><a href="%s/list?ability=%d">%s</a></td>', $this->rootURL, $no, $value);
    }

    /**
     * 個体へのステータスページへ遷移
     * @param type $value
     * @param type $no
     * @return type
     */
    protected function linktoOne($value, $no) {
	return sprintf('<td><a href="%s/status/%d">%s</a></td>', $this->rootURL, $no, $value);
    }

}