<?php

class Controller_Stat extends Controller_Template
{
	public function action_smarty()
	{
 		$data=array('title' => "hello",'body' => "world",'text'=>'aaadfefv');
 		echo Asset::css('jquery.mobile-1.3.1.css');
 		echo Asset::js('jquery-1.9.1.js');
 		echo Asset::js('jquery.mobile-1.3.1.js');
 			
		return Response::forge(View_Smarty::forge('stat/smarty',$data));
	}
	
	public function action_form()
	{
		/*css�˂�����*/
		echo Asset::css('jquery.mobile-1.3.1.css');
		echo Asset::css('jquery-ui-1.10.2.custom.min.css');
		/*js�ǂݍ���*/		
 		echo Asset::js('jquery-1.9.1.js');
 		echo Asset::js('jquery.mobile-1.3.1.js');
 		echo Asset::js('jquery-ui-1.10.2.custom.min.js'); 		 		
 		echo Asset::js('ac.js');//�����⊮�Ăяo��������js
 		
 		$form=Fieldset::forge();
		
		$form->add(	'name', '' , array(	'class'=>'autocomp','id'=>'autocomp'))
			->add_rule('trim')
			->add_rule('required')
			->add_rule('no_controll')
			->add_rule('max_length',10);
		
		$form->add('submit','',
				array(	'class'=>'data-role',
						'type'=>'submit',
						'value'=>'confirm')
				);

		$form->repopulate();
		$this->template->content =View::forge('stat/form');
		$this->template->title ='stat/form';		
		$this->template->content->set_safe(
				'html_form',
				 $form->build('stat/form'));
	}

}

