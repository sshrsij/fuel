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
		
		//ƒNƒGƒŠˆ—
		$querystring=Input::get('q');
		if(! isset($querystring))
		{
			$querystring='Œ§';
		}
		mb_convert_variables($internal,"ASCII,UTF-8,SJIS-win",$querystring);		
		
		$ary=array('–kŠC“¹','ÂXŒ§','ŠâèŒ§','‹{éŒ§','H“cŒ§','RŒ`Œ§','•Ÿ“‡Œ§',
				'“Œ‹“s','_“ŞìŒ§','é‹ÊŒ§','ç—tŒ§','ˆïéŒ§','“È–ØŒ§','ŒQ”nŒ§','R—œŒ§',
				'VŠƒŒ§','’·–ìŒ§','•xRŒ§','ÎìŒ§','•ŸˆäŒ§','ˆ¤’mŒ§','Šò•ŒŒ§','Ã‰ªŒ§',
				'OdŒ§','‘åã•{','•ºŒÉŒ§','‹“s•{',' ‰êŒ§','“Ş—ÇŒ§','˜a‰ÌRŒ§',
				'’¹æŒ§','“‡ªŒ§','‰ªRŒ§','L“‡Œ§','RŒûŒ§',
				'“¿“‡Œ§','ìŒ§','ˆ¤•QŒ§','‚’mŒ§',
				'•Ÿ‰ªŒ§','²‰êŒ§','’·èŒ§','ŒF–{Œ§','‘å•ªŒ§','‹{èŒ§','­™“‡Œ§','‰«“êŒ§');		

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