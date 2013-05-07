<?php
class Controller_Sample extends Controller_Template 
{

	public function action_index()
	{
		$data['samples'] = Model_Sample::find('all');
		$this->template->title = "Samples";
		$this->template->content = View::forge('sample/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('Sample');

		if ( ! $data['sample'] = Model_Sample::find($id))
		{
			Session::set_flash('error', 'Could not find sample #'.$id);
			Response::redirect('Sample');
		}

		$this->template->title = "Sample";
		$this->template->content = View::forge('sample/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Sample::validate('create');
			
			if ($val->run())
			{
				$sample = Model_Sample::forge(array(
					'title' => Input::post('title'),
					'content' => Input::post('content'),
				));

				if ($sample and $sample->save())
				{
					Session::set_flash('success', 'Added sample #'.$sample->id.'.');

					Response::redirect('sample');
				}

				else
				{
					Session::set_flash('error', 'Could not save sample.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Samples";
		$this->template->content = View::forge('sample/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Sample');

		if ( ! $sample = Model_Sample::find($id))
		{
			Session::set_flash('error', 'Could not find sample #'.$id);
			Response::redirect('Sample');
		}

		$val = Model_Sample::validate('edit');

		if ($val->run())
		{
			$sample->title = Input::post('title');
			$sample->content = Input::post('content');

			if ($sample->save())
			{
				Session::set_flash('success', 'Updated sample #' . $id);

				Response::redirect('sample');
			}

			else
			{
				Session::set_flash('error', 'Could not update sample #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$sample->title = $val->validated('title');
				$sample->content = $val->validated('content');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('sample', $sample, false);
		}

		$this->template->title = "Samples";
		$this->template->content = View::forge('sample/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('Sample');

		if ($sample = Model_Sample::find($id))
		{
			$sample->delete();

			Session::set_flash('success', 'Deleted sample #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete sample #'.$id);
		}

		Response::redirect('sample');

	}


}