<?php

class Controller_api extends Controller_Rest
{
	protected $format='json';
	
	public function get_personalityall()
	{
		$this->response(
				array(
						'val' => Model_Peronality::find('all')
				));
	}
	public function get_pkmnall()
	{
		$this->response(
				array(
						'val' => Model_Pkmn::find('all')
				));
	}
	public function get_pkmnbyid($id)
	{
		$this->response(
				array(
						'val' => Model_Pkmn::find($id)
				));
	}
	public function get_text()
	{
		$internal=mb_internal_encoding();		
		
		//�N�G������
		$querystring=Input::get('q');
		if(! isset($querystring))
		{
			$querystring='��';
		}
		mb_convert_variables($internal,"ASCII,UTF-8,SJIS-win",$querystring);		
		
		$ary=array('�k�C��','�X��','��茧','�{�錧','�H�c��','�R�`��','������',
				'�����s','�_�ސ쌧','��ʌ�','��t��','��錧','�Ȗ،�','�Q�n��','�R����',
				'�V����','���쌧','�x�R��','�ΐ쌧','���䌧','���m��','�򕌌�','�É���',
				'�O�d��','���{','���Ɍ�','���s�{','���ꌧ','�ޗǌ�','�a�̎R��',
				'���挧','������','���R��','�L����','�R����',
				'������','���쌧','���Q��','���m��',
				'������','���ꌧ','���茧','�F�{��','�啪��','�{�茧','��������','���ꌧ');		

		mb_convert_variables($internal,"ASCII,UTF-8,SJIS-win",$ary);
		
		$result=array();
		foreach($ary as $itr)
		{
			if( strlen(strstr($itr,$querystring)) >0 ){
				$result[]=$itr;
			}
		}		
		mb_convert_variables($internal,"ASCII,UTF-8,SJIS-win",$result);		
		$this->response($result);
	}

}