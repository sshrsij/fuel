<?php

class View_Mnst_status extends \Fuel\Core\ViewModel {

    public function view() {
	echo \Fuel\Core\Asset::js('jquery-1.9.1.js');
	echo \Fuel\Core\Asset::js('jquery.mobile-1.3.1.js');
	echo \Fuel\Core\Asset::css('jquery.mobile-1.3.1.css');
	$this->url=$this->getImageURL("フシギダネ");
    }

    //ajaxapiでゲットするよ
    protected function getImageURL($name) {
	return  urlencode($name);
    }

}