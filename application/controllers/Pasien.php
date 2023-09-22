<?php 
	/**
	 * 
	 */
	class Pasien extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index(){
			$this->load->view('template_user/header');
			$this->load->view('user/index');
			$this->load->view('template_user/footer');
		}

		function antrian(){

			$data['kode'] = 'kode-'.rand(0, 10000);
			$data['poli'] = $this->db->get('tbl_poli')->result_array();
			$data['cekdata'] =  $this->input->get('data');
			$data['no'] =  $this->input->get('no');
			$this->load->view('template_user/header');
			$this->load->view('user/antrian', $data);
			$this->load->view('template_user/footer');
		}

		function data_antrian(){

			$this->db->where('nama_pasien', $this->session->nama);
			$data['antrian'] = $this->db->get('tbl_antrian')->result_array();
			$this->load->view('template_user/header');
			$this->load->view('user/data_antrian', $data);
			$this->load->view('template_user/footer');
		}

		function add_antrian(){

			$nama = $this->input->post('nama_pasien');
			$tgl = $this->input->post('tgl_antrian');

			$this->db->where('nama_pasien', $nama);
			$this->db->where('tgl_antrian', $tgl);
			$cekpasien = $this->db->get('tbl_antrian')->row_array();

			if($cekpasien){

				$this->session->set_flashdata('message', 'swal("Oops", "Anda sudah melakukan antrian", "error");');
				redirect('pasien/antrian');
			}else{


				$this->db->order_by('id', 'desc');
				$this->db->where('tgl_antrian', $tgl);
				$cek = $this->db->get('tbl_antrian')->row_array();

				if($cek){
					$no = $cek['no_antrian'] + 1;
				}else{
					$no = 1;
				}

				$data = [

					'kode_antrian' => $this->input->post('kode_antrian'),
					'nama_pasien' => $this->input->post('nama_pasien'),
					'poli' => $this->input->post('poli'),
					'no_antrian' => $no,
					'tgl_antrian' => $this->input->post('tgl_antrian'),
				];

				$kode = $this->input->post('kode_antrian');
				$this->db->insert('tbl_antrian', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Antrian berhasil di buat", "success");');
				redirect("pasien/antrian?data=$kode&no=$no");

			}

		}


		function cek_kesehatan(){
			$data['cek'] = $this->input->get('data');
			$this->load->view('template_user/header');
			$this->load->view('user/cek_kesehatan', $data);
			$this->load->view('template_user/footer');
		}

		function data_cek_kesehatan(){

			$this->db->where('nama_pasien', $this->session->nama);
			$data['kesehatan'] = $this->db->get('tbl_cek_kesehatan')->result_array();
			$this->load->view('template_user/header');
			$this->load->view('user/data_cek_kesehatan', $data);
			$this->load->view('template_user/footer');

		}

		function add_kesehatan(){

			$data = [

				'kode' => 'kode-'.rand(0,10000),
				'nama_pasien' => $this->input->post('nama_pasien'),
				'penyakit' => $this->input->post('penyakit'),
				'keluhan' => $this->input->post('keluhan'),
				'keterangan' => $this->input->post('keterangan'),
				'tgl' => date('Y-m-d'),
			];

			$this->db->insert('tbl_cek_kesehatan', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di kirim", "success");');
			redirect("pasien/cek_kesehatan?data=true");
		}

		function login(){

			$this->load->view('template_user/header');
			$this->load->view('user/login');
			$this->load->view('template_user/footer');
		}

		function act_login(){

			$nama = $this->input->post('nama');
			$no_ktp = $this->input->post('no_ktp');

			$this->db->where('nama_pasien', $nama);
			$this->db->where('no_ktp', $no_ktp);
			$cek = $this->db->get('tbl_pasien')->row_array();

			if($cek == true)
			{

				$data = [
					'nama' => $nama,
					'no_ktp' => $no_ktp,
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata('message', 'swal("Yess", "Anda berhasil login", "success");');
				redirect('Pasien/login');
			}else{

				$this->session->set_flashdata('message', 'swal("Oops", "Akun anda salah", "error");');
				redirect('Pasien/login');
			}
		}

		function daftar(){

			$this->load->view('template_user/header');
			$this->load->view('user/daftar');
			$this->load->view('template_user/footer');
		}

		function add_daftar(){

			$data = [
				'no_rekammedis' => 'rm-'.rand(0, 10000),
				'nama_pasien' => $this->input->post('nama_pasien'),
				'no_ktp' => $this->input->post('no_ktp'),
				'no_bpjs' => $this->input->post('no_bpjs'),
				'notelp' => $this->input->post('notelp'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'jenis_kelamin' => $this->input->post('jk'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'status_pasien' => $this->input->post('status_pasien'),
			];

			$this->db->insert('tbl_pasien', $data);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di tambah", "success");');
			redirect('Pasien/daftar');
		}


		function cetak_antrian (){

			$kode = $this->input->get('kode');

			$this->load->library('dompdf_gen');

			$data['antri'] = $this->db->get_where('tbl_antrian', ['kode_antrian' => $kode])->row_array();
			$this->load->view('user/pdf', $data);

			$paper_size = 'A4';
			$orientation = 'potrait';
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);

			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Surat_Antrian.pdf", array('Attachment' => 0));

		}

		function keluar(){

			$this->session->unset_userdata('nama');
			$this->session->unset_userdata('no_ktp');
			redirect('Pasien/');
		}
	}
?>