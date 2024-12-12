<?php
class Webgis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_hotel');
		
	}
	public function index()
	{
		$data = array(
			'title' => 'Web Gis hotel',
			'hotel' => $this->m_hotel->tampil(),
			'isi' => 'v_webgis'
		);
		$this->load->view('front-end/v_wrapper', $data, FALSE);
	}

	public function list_hotel()
	{
		$data = array(
			'title' => 'Web Gis hotel',
			'hotel' => $this->m_hotel->tampil(),
			'isi' => 'v_list_hotel'
		);
		$this->load->view('front-end/v_wrapper', $data, FALSE);
	}
	public function about()
	{
		$data = array(
			'title' => 'Web Gis hotel',
			'isi' => 'v_about'
		);
		$this->load->view('front-end/v_wrapper', $data, FALSE);
	}

	public function detail($id_hotel)
	{
		$data = array(
			'title' => 'Detail hotel',
			'hotel' => $this->m_hotel->detail($id_hotel),
			'isi' => 'v_detail'
		);
		$this->load->view('front-end/v_wrapper', $data, FALSE);
	}
		
}

/* End of file Controllername.php */

