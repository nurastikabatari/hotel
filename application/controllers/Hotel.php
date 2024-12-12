<?php
class hotel extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_hotel');
		
	}
	
	public function index()
	{
		$data = array(
			'title' => 'Data hotel',
			'hotel'=> $this->m_hotel->tampil(),
			'isi' => 'v_datahotel'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function input()
	{
		$this->user_login->cek_login();
		$this->form_validation->set_rules('nama_hotel', 'Nama hotel', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('tarif', 'Tarif ', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('kontak', 'kontak', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
			'required' =>'%s harus diisi !!!'
		));

		if ($this->form_validation->run() == true) {
				$config['upload_path'] = './gambar/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
				$config['max_size']  = '10000';
				
				$this->upload->initialize($config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$data = array(
						'title' => 'Input Data hotel',
						'error_upload' => $this->upload->display_errors(),
						'isi' => 'v_input_datahotel'
					);
					$this->load->view('layout/v_wrapper', $data, FALSE);
				}
				else{
					$upload_data = array( 'uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './gambar/' .$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
					$data = array(
						'nama_hotel'	 => $this->input->post('nama_hotel'),
						'alamat' 		  	 => $this->input->post('alamat'),
						'jumlah_kamar' => $this->input->post('jumlah_kamar'),
						'fasilitas' => $this->input->post('fasilitas'),
						'tarif' 		 => $this->input->post('tarif'),
						'kontak' 		 => $this->input->post('kontak'),
						'latitude' 		 => $this->input->post('latitude'),
						'longitude' 	 => $this->input->post('longitude'),
						'gambar'		 => $upload_data['uploads']['file_name'],
						);
						$this->m_hotel->simpan($data);
						$this->session->set_flashdata('pesan', 'Data berhasil disimpan !!');
						redirect('hotel');
				}	
			}
			$data = array(
				'title' => 'Input Data hotel',
				'isi' => 'v_input_datahotel'
			);
			$this->load->view('layout/v_wrapper', $data, FALSE);
		}
	public function edit($id_hotel)
	{
		$this->user_login->cek_login();
		$this->form_validation->set_rules('nama_hotel', 'Nama hotel', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('tarif', 'Tarif ', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('kontak', 'kontak', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('latitude', 'Latitude', 'required', array(
			'required' =>'%s harus diisi !!!'
		));
		$this->form_validation->set_rules('longitude', 'Longitude', 'required', array(
			'required' =>'%s harus diisi !!!'
		));

		if ($this->form_validation->run() == true) {
			$config['upload_path'] = './gambar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size']  = '2000';
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$data = array(
					'title' => 'Edit Data hotel',
					'error_upload' => $this->upload->display_errors(),
					'hotel' => $this->m_hotel->detail($id_hotel),
					'isi' => 'v_edit_datahotel'
				);
				$this->load->view('layout/v_wrapper', $data, FALSE);
			}
			else{
				$upload_data = array( 'uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './gambar/' .$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_hotel' 	 => $id_hotel,
					'nama_hotel'	 => $this->input->post('nama_hotel'),
						'alamat' 		  	 => $this->input->post('alamat'),
						'jumlah_kamar' => $this->input->post('jumlah_kamar'),
						'fasilitas' => $this->input->post('fasilitas'),
						'tarif' 		 => $this->input->post('tarif'),
						'kontak' 		 => $this->input->post('kontak'),
						'latitude' 		 => $this->input->post('latitude'),
						'longitude' 	 => $this->input->post('longitude'),
						'gambar'		 => $upload_data['uploads']['file_name'],
						);
					$this->m_hotel->edit($data);
					$this->session->set_flashdata('pesan', 'Data berhasil diedit !!');
					redirect('hotel');
			}	
				$data = array(
					'id_hotel' 	 => $id_hotel,
					'nama_hotel'	 => $this->input->post('nama_hotel'),
						'alamat' 		  	 => $this->input->post('alamat'),
						'jumlah_kamar' => $this->input->post('jumlah_kamar'),
						'fasilitas' => $this->input->post('fasilitas'),
						'tarif' 		 => $this->input->post('tarif'),
						'kontak' 		 => $this->input->post('kontak'),
						'latitude' 		 => $this->input->post('latitude'),
						'longitude' 	 => $this->input->post('longitude'),
						'gambar'		 => $upload_data['uploads']['file_name'],
						);
					$this->m_hotel->edit($data);
					$this->session->set_flashdata('pesan', 'Data berhasil diedit !!');
					redirect('hotel');
		}
		$data = array(
			'title' => 'Edit Data hotel',
			'hotel' => $this->m_hotel->detail($id_hotel),
			'isi' => 'v_edit_datahotel'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function hapus($id_hotel)
	{
		$this->user_login->cek_login();
		$data = array('id_hotel' => $id_hotel);
		$this->m_hotel->hapus($data);
		$this->session->set_flashdata('pesan', 'Data berhasil dihapus !!');
				redirect('hotel');
		}
}


/* End of file Controllername.php */
