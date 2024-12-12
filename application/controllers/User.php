<?php
class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		
	}

	public function index()
	{
		$data = array(
			'title' => 'Data User',
			'user' => $this->m_user->tampil(),
			'isi' => 'v_datauser'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function input()
	{
		$this->user_login->cek_login();
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' =>'%s harus diisi !!!'
		));

		if ($this->form_validation->run() == false) {
					$data = array(
						'title' => 'Input Data User',
						'isi' => 'v_input_datauser'
					);
					$this->load->view('layout/v_wrapper', $data, FALSE);
				}else{
					$data = array(
						'nama_user'	 => $this->input->post('nama_user'),
						'username' 	 => $this->input->post('username'),
						'password' 	 => $this->input->post('password'),
						);
						$this->m_user->simpan($data);
						$this->session->set_flashdata('pesan', 'Data berhasil disimpan !!');
						redirect('user');
				}	
		}
		public function edit($id_user)
		{
			$this->user_login->cek_login();
			$this->form_validation->set_rules('nama_user', 'Nama User', 'required', array(
				'required' =>'%s harus diisi !!!'
			));
			$this->form_validation->set_rules('username', 'Username', 'required', array(
				'required' =>'%s harus diisi !!!'
			));
			$this->form_validation->set_rules('password', 'Password', 'required', array(
				'required' =>'%s harus diisi !!!'
			));
	
			if ($this->form_validation->run() == false) {
						$data = array(
							'title' => 'Edit Data User',
							'user' => $this->m_user->detail($id_user),
							'isi' => 'v_edit_datauser'
						);
						$this->load->view('layout/v_wrapper', $data, FALSE);
					}else{
						$data = array(
							'id_user'	=> $id_user,
							'nama_user'	 => $this->input->post('nama_user'),
							'username' 	 => $this->input->post('username'),
							'password' 	 => $this->input->post('password'),
							);
							$this->m_user->edit($data);
							$this->session->set_flashdata('pesan', 'Data berhasil disimpan !!');
							redirect('user');
					}	
			}
	public function hapus($id_user)
	{
		$this->user_login->cek_login();
		$data = array('id_user' => $id_user);
		$this->m_user->hapus($data);
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus !!');
				redirect('user');
		}

}

/* End of file User.php */