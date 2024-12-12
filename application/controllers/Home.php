<?php

class Home extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_hotel');
		
	}

	public function index()
	{
		$this->user_login->cek_login();
		$data = array(
						'title' => 'Pemetaan',
						'hotel' => $this->m_hotel->tampil(),
						'isi' => 'v_pemetaan'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

}
