<?php 

	 /**
	  * 
	  */
	 class App extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		parent::__construct();

	 		if($this->session->username == null){
	 			redirect('login');
	 		}

	 	}


	 	function index(){
	 		$data['pasien'] = $this->db->get('tbl_pasien')->num_rows();
	 		$data['obat'] = $this->db->get('tbl_obat')->num_rows();
	 		$data['kesehatan'] = $this->db->get('tbl_cek_kesehatan')->num_rows();
	 		$data['doktor'] = $this->db->get('tbl_doktor')->num_rows();
	 		$data['paramedis'] = $this->db->get('tbl_paramedis')->num_rows();
	 		$data['poli'] = $this->db->get('tbl_poli')->num_rows();
	 		$data['pengeluaran_obat'] = $this->db->get('tbl_pengeluaran_obat')->num_rows();
	 		$this->load->view('template/header');
	 		$this->load->view('app/index', $data);
	 		$this->load->view('template/footer');
	 	}

	 	function data_obat(){
	 		$data['kode'] = 'obat-'.rand(0, 10000);
	 		$data['obat'] = $this->db->get('tbl_obat')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/data_obat', $data);
	 		$this->load->view('template/footer');
	 	}

	 	function act_addobat(){

	 		$data = [
	 			'kode' => $this->input->post('kode'),
	 			'nama_obat' => $this->input->post('nama_obat'),
	 			'unit' => $this->input->post('unit'),
	 			'qty' => $this->input->post('qty'),
	 		];

	 		$this->db->insert('tbl_obat', $data);


	 	}

	 	function act_editobat(){

	 		$id = $this->input->post('id');

	 		$data = [
	 			'kode' => $this->input->post('kode'),
	 			'nama_obat' => $this->input->post('nama_obat'),
	 			'unit' => $this->input->post('unit'),
	 			'qty' => $this->input->post('qty'),
	 		];

	 		$this->db->where('id', $id);
	 		$this->db->update('tbl_obat', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubat", "success");');
	 		redirect('app/data_obat');	

	 	}

	 	function act_hapusobat(){

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_obat');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
	 		redirect('app/data_obat');	
	 	}

	 	function data_pengadaan_obat(){

	 		$data['kode'] = 'pgd-'.rand(0,10000);
	 		$data['pengadaan'] = $this->db->get('tbl_pengadaan_obat')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/data_pengadaan_obat', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function add_pengadaan_obat(){

	 		$data = [
	 			'kode' => $this->input->post('kode'),
	 			'nama_obat' => $this->input->post('nama_obat'),
	 			'supplier'  => $this->input->post('supplier'),
	 			'jenis_obat' => $this->input->post('jenis_obat'),
	 			'satuan' => $this->input->post('satuan'),
	 			'jml' => $this->input->post('jml'),
	 			'harga_beli' => $this->input->post('harga_beli'),
	 			'total' => $this->input->post('harga_beli') * $this->input->post('jml')
	 		];

	 		$this->db->insert('tbl_pengadaan_obat', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
	 		redirect('app/data_pengadaan_obat');	

	 	}

	 	function hapus_obat(){

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->delete('tbl_pengadaan_obat');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
	 		redirect('app/data_pengadaan_obat');	
	 	}

	 	function pengeluaran_obat(){


	 		$data['kode'] = 'p-obat-'.rand(0,10000);
	 		$data['obat'] = $this->db->get('tbl_obat')->result_array();
	 		$data['pengeluaran'] = $this->db->get('tbl_pengeluaran_obat')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/data_pengeluaran_obat', $data);
	 		$this->load->view('template/footer');


	 	}

	 	function add_pengeluaran_obat(){

	 		$data = [

	 			'kode' => $this->input->post('kode'),
	 			'nama_obat' => $this->input->post('nama_obat'),
	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'jenis_obat' => $this->input->post('jenis_obat'),
	 			'jml' => $this->input->post('jml'),
	 			'keterangan' => $this->input->post('keterangan'),
	 			'tgl_serah' => $this->input->post('tgl_serah'),
	 		];

	 		$nama_obat  = $this->input->post('nama_obat');
	 		$this->db->where('nama_obat', $nama_obat);
	 		$obat = $this->db->get('tbl_obat')->row_array();

	 		$data2 = [
	 			'qty' => $obat['qty'] - $this->input->post('jml'),
	 		];

	 		$this->db->where('nama_obat', $nama_obat);
	 		$this->db->update('tbl_obat', $data2);

	 		$this->db->insert('tbl_pengeluaran_obat', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
	 		redirect('app/pengeluaran_obat');
	 	}

	 	function hapus_pengeluaran_obat(){

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->delete('tbl_pengeluaran_obat');

	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
	 		redirect('app/pengeluaran_obat');
	 	}


	 	function data_poli(){

	 		$data['kode'] = 'poli-'.rand(0,1000);
	 		$data['poli'] = $this->db->get('tbl_poli')->result_array();

	 		$this->load->view('template/header');
	 		$this->load->view('app/data_poli', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function add_poli(){

	 		$data = [

	 			'kode' => $this->input->post('kode'),
	 			'nama_poli' => $this->input->post('nama_poli'),
	 		];

	 		$this->db->insert('tbl_poli', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
	 		redirect('app/data_poli');

	 	}

	 	function edit_poli(){

	 		$data = [

	 			'kode' => $this->input->post('kode'),
	 			'nama_poli' => $this->input->post('nama_poli'),
	 		];

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->update('tbl_poli', $data);


	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
	 		redirect('app/data_poli');

	 	}

	 	function hapus_poli(){
	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->delete('tbl_poli');


	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/data_poli');

	 	}


	 	function data_jabatan(){


	 		$data['kode'] = 'jbt-'.rand(0,1000);
	 		$data['jabatan'] = $this->db->get('tbl_jabatan')->result_array();

	 		$this->load->view('template/header');
	 		$this->load->view('app/data_jabatan', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function act_addjabatan(){

	 		$data = [
	 			'kode' => $this->input->post('kode'),
	 			'jabatan' => $this->input->post('jabatan'),
	 		];

	 		$this->db->insert('tbl_jabatan', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success");');
	 		redirect('app/data_jabatan');	
	 	}

	 	function act_editjabatan(){

	 		$data = [
	 			'kode' => $this->input->post('kode'),
	 			'jabatan' => $this->input->post('jabatan'),
	 		];

	 		$id = $this->input->post('id');

	 		$this->db->where('id', $id);
	 		$this->db->update('tbl_jabatan', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diubah", "success");');
	 		redirect('app/data_jabatan');	
	 	}

	 	function hapus_jabatan(){

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_jabatan');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success");');
	 		redirect('app/data_jabatan');	
	 	}


	 	function tenagakesehatan(){
	 		$data['tenagakesehatan'] = $this->db->get('tbl_tenagakesehatan')->result_array();
	 		$data['jabatan'] = $this->db->get('tbl_jabatan')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/tenagakesehatan', $data);
	 		$this->load->view('template/footer');

	 	}


	 	function addnakes(){

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'nip' => $this->input->post('nip'),
	 			'alamat' => $this->input->post('alamat'),
	 			'jk' => $this->input->post('jk'),
	 			'nohp' => $this->input->post('nohp'),
	 			'jabatan' => $this->input->post('jabatan')
	 		];

	 		$this->db->insert('tbl_tenagakesehatan', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/tenagakesehatan');	
	 	}

	 	function editnakes(){

	 		$id = $this->input->post('id');

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'nip' => $this->input->post('nip'),
	 			'alamat' => $this->input->post('alamat'),
	 			'jk' => $this->input->post('jk'),
	 			'nohp' => $this->input->post('nohp'),
	 			'jabatan' => $this->input->post('jabatan')
	 		];

	 		$this->db->where('id', $id);
	 		$this->db->update('tbl_tenagakesehatan', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/tenagakesehatan');	


	 	}

	 	function hapus_nakes(){

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_tenagakesehatan');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/tenagakesehatan');	


	 	}

	 	function pegawai(){

	 		$data['pegawai'] = $this->db->get('tbl_pegawai')->result_array();
	 		$data['jabatan'] = $this->db->get('tbl_jabatan')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/pegawai', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function addpegawai(){

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'nip' => $this->input->post('nip'),
	 			'alamat' => $this->input->post('alamat'),
	 			'jk' => $this->input->post('jk'),
	 			'nohp' => $this->input->post('nohp'),
	 			'jabatan' => $this->input->post('jabatan')
	 		];

	 		$this->db->insert('tbl_pegawai', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/pegawai');	
	 	}

	 	function editpegawai(){

	 		$id = $this->input->post('id');

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'nip' => $this->input->post('nip'),
	 			'alamat' => $this->input->post('alamat'),
	 			'jk' => $this->input->post('jk'),
	 			'nohp' => $this->input->post('nohp'),
	 			'jabatan' => $this->input->post('jabatan')
	 		];

	 		$this->db->where('id', $id);
	 		$this->db->update('tbl_pegawai', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/pegawai');	


	 	}

	 	function hapus_pegawai(){

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_pegawai');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/pegawai');	


	 	}

	 	function paramedis(){

	 		$data['poli'] = $this->db->get('tbl_poli')->result_array();
	 		$data['paramedis'] = $this->db->get('tbl_paramedis')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/paramedis', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function addparamedis(){

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'no_paramedis' => $this->input->post('no_paramedis'),
	 			'jk' => $this->input->post('jk'),
	 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	 			'tgl_lahir' => $this->input->post('tgl_lahir'),
	 			'alamat' => $this->input->post('alamat'),
	 			'poli' => $this->input->post('poli'),

	 		];

	 		$this->db->insert('tbl_paramedis', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/paramedis');	

	 	}

	 	function edit_paramedis(){

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'no_paramedis' => $this->input->post('no_paramedis'),
	 			'jk' => $this->input->post('jk'),
	 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	 			'tgl_lahir' => $this->input->post('tgl_lahir'),
	 			'alamat' => $this->input->post('alamat'),
	 			'poli' => $this->input->post('poli'),

	 		];

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->update('tbl_paramedis', $data);

	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/paramedis');	

	 	}

	 	function hapus_paramedis(){

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->delete('tbl_paramedis');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/paramedis');	
	 	}


	 	function doktor(){

	 		$data['poli'] = $this->db->get('tbl_poli')->result_array();
	 		$data['doktor'] = $this->db->get('tbl_doktor')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/data_doktor', $data);
	 		$this->load->view('template/footer');


	 	}

	 	function add_doktor(){

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'no_induk_doktor' => $this->input->post('no_induk_doktor'),
	 			'jk' => $this->input->post('jk'),
	 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	 			'tgl_lahir' => $this->input->post('tgl_lahir'),
	 			'alamat' => $this->input->post('alamat'),
	 			'poli' => $this->input->post('poli'),

	 		];


	 		$this->db->insert('tbl_doktor', $data);

	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/doktor');	

	 	}

	 	function edit_doktor(){

	 		$data = [
	 			'nama' => $this->input->post('nama'),
	 			'no_induk_doktor' => $this->input->post('no_induk_doktor'),
	 			'jk' => $this->input->post('jk'),
	 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	 			'tgl_lahir' => $this->input->post('tgl_lahir'),
	 			'alamat' => $this->input->post('alamat'),
	 			'poli' => $this->input->post('poli'),

	 		];

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->update('tbl_doktor', $data);

	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/doktor');	

	 	}

	 	function hapus_doktor(){

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->delete('tbl_doktor');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/doktor');	
	 	}

	 	function pasien(){

	 		$data['kode'] = 'rm-'.rand(0, 1000);
	 		$data['pasien'] = $this->db->get('tbl_pasien')->result_array();

	 		$this->load->view('template/header');
	 		$this->load->view('app/data_pasien', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function add_pasien(){

	 		$data = [
	 			'no_rekammedis' => $this->input->post('no_rekammedis'),
	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'no_ktp' => $this->input->post('no_ktp'),
	 			'no_bpjs' => $this->input->post('no_bpjs'),
	 			'notelp' => $this->input->post('notelp'),
	 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	 			'jenis_kelamin' => $this->input->post('jk'),
	 			'tanggal_lahir' => $this->input->post('tgl_lahir'),
	 			'alamat' => $this->input->post('alamat'),
	 			'status_pasien' => $this->input->post('status_pasien'),
	 		];

	 		$this->db->insert('tbl_pasien', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/pasien');
	 	}

	 	function edit_pasien(){

	 		$data = [

	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'no_ktp' => $this->input->post('no_ktp'),
	 			'no_bpjs' => $this->input->post('no_bpjs'),
	 			'notelp' => $this->input->post('notelp'),
	 			'tempat_lahir' => $this->input->post('tempat_lahir'),
	 			'jenis_kelamin' => $this->input->post('jk'),
	 			'tanggal_lahir' => $this->input->post('tgl_lahir'),
	 			'alamat' => $this->input->post('alamat'),
	 			'status_pasien' => $this->input->post('status_pasien'),
	 		];

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->update('tbl_pasien', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/pasien');

	 	}


	 	function hapus_pasien(){

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->delete('tbl_pasien');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/pasien');

	 	}

	 	function rujukan(){

	 		$data['kode'] = 'R-'.date('Y').date('m').date('d');
	 		$data['no_rawat'] = date('Y-m-d')."-".rand(0,10000);
	 		$data['rujukan'] = $this->db->get('tbl_rujukan')->result_array();

	 		$this->load->view('template/header');
	 		$this->load->view('app/data_rujukan', $data);
	 		$this->load->view('template/footer');
	 	}

	 	function edit_rujukan(){

	 		$no_rujukan = $this->input->post('id');

	 		$data = [
	 			'no_rujukan' => $this->input->post('no_rujukan'),
	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'nama_penyakit' => $this->input->post('nama_penyakit'),
	 			'diagnosa' => $this->input->post('diagnosa'),
	 			'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit'),
	 			'poli_tujuan' => $this->input->post('poli_tujuan'),
	 			'tgl_rujukan' => $this->input->post('tgl_rujukan'),
	 			'no_rawat' => $this->input->post('no_rawat'),
	 		];

	 		$this->db->where('no_rujukan', $no_rujukan);
	 		$this->db->update('tbl_rujukan', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/rujukan');
	 	}


	 	function hapus_rujukan(){
	 		$no_rujukan = $this->input->post('id');
	 		$this->db->where('no_rujukan', $no_rujukan);
	 		$this->db->delete('tbl_rujukan');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/rujukan');

	 	}

	 	function add_rujukan(){

	 		$data = [
	 			'no_rujukan' => $this->input->post('no_rujukan'),
	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'nama_penyakit' => $this->input->post('nama_penyakit'),
	 			'diagnosa' => $this->input->post('diagnosa'),
	 			'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit'),
	 			'poli_tujuan' => $this->input->post('poli_tujuan'),
	 			'tgl_rujukan' => $this->input->post('tgl_rujukan'),
	 			'no_rawat' => $this->input->post('no_rawat'),
	 		];


	 		$this->db->insert('tbl_rujukan', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/rujukan');
	 	}


	 	function pengguna(){
	 		$data['kode'] = 'pg-'.rand(0, 1000);
	 		$data['pengguna'] = $this->db->get('tbl_pengguna')->result_array();
	 		$data['level'] = $this->db->get('tbl_level')->result_array();

	 		$this->load->view('template/header');
	 		$this->load->view('app/data_pengguna', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function add_pengguna(){

	 		$data = [

	 			'username' => $this->input->post('username'),
	 			'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
	 			'level' =>  $this->input->post('level'),
	 		];

	 		$this->db->insert('tbl_pengguna', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/pengguna');
	 	}

	 	function edit_pengguna(){

	 		$data = [

	 			'username' => $this->input->post('username'),
	 			'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
	 			'level' =>  $this->input->post('level'),
	 		];

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->update('tbl_pengguna', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/pengguna');

	 	}


	 	function hapus_pengguna(){

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_pengguna');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/pengguna');
	 	}



	 	function level(){
	 		$data['kode'] = 'lv-'.rand(0, 1000);
	 		$data['level'] = $this->db->get('tbl_level')->result_array();
	 		$data['menu'] = $this->db->get('tbl_menu')->result_array();

	 		$this->load->view('template/header');
	 		$this->load->view('app/data_level', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function add_level(){


	 		$menu = $this->input->post('menu[]');
	 		$a = count($menu);

	 		for ($i=0; $i < $a ; $i++) { 


	 			$data = [

	 				'level' => $this->input->post('level'),
	 				'id_menu' => $menu[$i],
	 			];

	 			$this->db->insert('tbl_hak_akses', $data);

	 		}



	 		$data = [

	 			'level' => $this->input->post('level'),
	 		];

	 		$this->db->insert('tbl_level', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/level');
	 	}

	 	function edit_level(){

	 		$level = $this->input->post('level');
	 		$this->db->where('level', $level);
	 		$this->db->delete('tbl_hak_akses');

	 		$menu = $this->input->post('menu[]');
	 		$a = count($menu);

	 		for ($i=0; $i < $a ; $i++) { 
	 			$data = [
	 				'level' => $this->input->post('level'),
	 				'id_menu' => $menu[$i],
	 			];
	 			$this->db->insert('tbl_hak_akses', $data);
	 		}		

	 		$data = [

	 			'level' => $this->input->post('level'),
	 		];

	 		$this->db->where('id', $this->input->post('id'));
	 		$this->db->update('tbl_level', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/level');

	 	}

	 	function hapus_level(){

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_level');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/level');
	 	}


	 	function menu(){
	 		$data['kode'] = 'menu-'.rand(0, 1000);
	 		$data['menu'] = $this->db->get('tbl_menu')->result_array();

	 		$this->load->view('template/header');
	 		$this->load->view('app/data_menu', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function add_menu(){

	 		$data = [

	 			'title' => $this->input->post('title'),
	 			'icon' => $this->input->post('icon'),
	 			'url' => $this->input->post('url'),
	 		];

	 		$this->db->insert('tbl_menu', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/menu');
	 	}

	 	function edit_menu(){


	 		$data = [

	 			'title' => $this->input->post('title'),
	 			'icon' => $this->input->post('icon'),
	 			'url' => $this->input->post('url'),
	 		];

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->update('tbl_menu', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/menu');
	 	}


	 	function antrian(){
	 		$data['kode'] = 'kode-'.rand(0,10000);
	 		$data['antrian'] = $this->db->get_where('tbl_antrian', ['status' => 0])->result_array();
	 		$data['poli'] = $this->db->get('tbl_poli')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/data_antrian', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function add_antrian(){

	 		$data = [

	 			'kode_antrian' => $this->input->post('kode_antrian'),
	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'poli' => $this->input->post('poli'),
	 			'jam_antrian' => $this->input->post('jam_antrian'),
	 			'tgl_antrian' => $this->input->post('tgl_antrian'),
	 		];

	 		$this->db->insert('tbl_antrian', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
	 		redirect('app/antrian');
	 	}

	 	function edit_antrian(){

	 		$data = [

	 			'kode_antrian' => $this->input->post('kode_antrian'),
	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'poli' => $this->input->post('poli'),
	 			'jam_antrian' => $this->input->post('jam_antrian'),
	 			'tgl_antrian' => $this->input->post('tgl_antrian'),
	 		];

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->update('tbl_antrian', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di ubah", "success");');
	 		redirect('app/antrian');
	 	}


	 	function hapus_antrian(){
	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_antrian');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/antrian');
	 	}


	 	function status_antrian(){

	 		$data = [

	 			'status' => 1,
	 		];

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->update('tbl_antrian', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Antrian selesai", "success");');
	 		redirect('app/antrian');
	 	}

	 	function cek_kesehatan(){
	 		$data['kesehatan'] = $this->db->get('tbl_cek_kesehatan')->result_array();
	 		$this->load->view('template/header');
	 		$this->load->view('app/data_cek_kesehatan', $data);
	 		$this->load->view('template/footer');

	 	}

	 	function hapus_cekkesehatan(){

	 		$id = $this->input->post('id');
	 		$this->db->where('id', $id);
	 		$this->db->delete('tbl_cek_kesehatan');
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di hapus", "success");');
	 		redirect('app/antrian');
	 	}

	 	function kirim_pesan(){

	 		$data = [

	 			'nama_pasien' => $this->input->post('nama_pasien'),
	 			'id_cek_kesehatan' =>  $this->input->post('idcek'),
	 			'pesan' =>  $this->input->post('pesan'),
	 			'dokter' => $this->session->username,
	 		];

	 		$this->db->where('id', $this->input->post('idcek'));
	 		$this->db->update('tbl_cek_kesehatan', ['status' => 1]);

	 		$this->sendsms('085262503650', 'hello silvi');

	 		$this->db->insert('tbl_pesan', $data);
	 		$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di kirim", "success");');
	 		redirect('app/cek_kesehatan');
	 	}

	 	function sendsms($to, $text){

	 		$idmesin="258";
	 		$pin="071246";

	 		$ch = curl_init();
	 		curl_setopt($ch, CURLOPT_URL, "https://sms.indositus.com/sendsms.php?idmesin=$idmesin&pin=$pin&to=$to&text=$msg");
	 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 		$output = curl_exec($ch);
	 		curl_close($ch);
	 		return($output);
	 	}


	 }
	?>