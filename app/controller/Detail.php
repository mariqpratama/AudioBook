<?php 

class Detail extends Controller {
	public function index($ID)
	{
		$data['judul'] = 'ABC - Detail Story';
		$data['details'] = $this->model('Story_model')->getAllDetailsSpecific($ID);
		$this->view('layout/header', $data);
		$this->view('detail', $data);
		$this->view('layout/footer');
	}

	
}