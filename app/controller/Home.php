<?php 

class Home extends Controller {
	public function index()
	{
		$data['judul'] = 'ABC - Home';
		$data['details'] = $this->model('Story_model')->getAllDetails();
		$data['cari'] = $this->model('SearchEngine')->searchStory();
		$this->view('layout/header', $data);
		$this->view('index', $data);
		$this->view('layout/footer');
	}

	public function filterLanguage($KeyL)
	{
		$data['judul'] = 'ABC - Home';
		$data['details'] = $this->model('Story_model')->filterLanguage($KeyL);
		$this->view('layout/header', $data);
		$this->view('index', $data);
		$this->view('layout/footer');
	}

	public function filterGenre($KeyG)
	{
		$data['judul'] = 'ABC - Home';
		$data['details'] = $this->model('Story_model')->filterGenre($KeyG);
		$this->view('layout/header', $data);
		$this->view('index', $data);
		$this->view('layout/footer');
	}

	public function searchStory()
	{
		$data['judul'] = 'ABC - Home';
		$data['details'] = $this->model('Story_model')->searchStory();
		$this->view('layout/header', $data);
		$this->view('index', $data);
		$this->view('layout/footer');
	}

	public function filter()
	{
		$data['judul'] = 'ABC - Home';
		$data['details'] = $this->model('Story_model')->filter();
		$this->view('layout/header', $data);
		$this->view('index', $data);
		$this->view('layout/footer');
	}

	
}