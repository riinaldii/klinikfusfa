<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_owner');
        $this->load->helper('url','html');
        is_logged_in();
    }

    public function index()
    {
        //$this->load->view('janjitemu');

        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/index', $data);
        $this->load->view('templates/footer');
    }


    public function janjitemu()
    {

        $data['title'] = "Janji Temu";

        $this->load->model('m_relasi');
        $data['query'] = $this->m_relasi->get_relasi();

        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

       // $data['janjitemu'] = $this->db->get('janji_temu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/janjitemu', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $data = array(
            'id_pasien'  => $this->input->post('id_pasien'),
            'id_layanan' => $this->input->post('id_layanan'),
            'id_terapis' => $this->input->post('id_terapis'),
            'keluhan' => $this->input->post('keluhan'),
            'tgl' => $this->input->post('tgl'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'waktu' => $this->input->post('waktu'),
            'tempat' => $this->input->post('tempat'),
            'status' => $this->input->post('status'),
        );
        $this->load->model('model_owner');
        $this->model_owner->tambah($data);
        echo json_encode(array("status"=> true));

       // $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //redirect('owner/janjitemu');
    }

    public function ajax_edit($id_jt){
        $data=$this->model_owner->get_by_id_jt($id_jt);
        echo json_encode($data);
    }

    public function update(){
        $data = array(
            'id_pasien'  => $this->input->post('id_pasien'),
            'id_terapis' => $this->input->post('id_terapis'),
            'id_layanan' => $this->input->post('id_layanan'),
            'status' => $this->input->post('status'),
            'keluhan' => $this->input->post('keluhan'),
            'tgl' => $this->input->post('tgl'),
            'bulan' => $this->input->post('bulan'),
            'tahun' => $this->input->post('tahun'),
            'waktu' => $this->input->post('waktu'),
            'tempat' => $this->input->post('tempat'),
            
        );
        $this->model_owner->update(array('id_jt' => $this->input->post('id_jt')),$data);
        echo json_encode(array("status"=>TRUE));
    }

    public function hapus($id_jt){
        $this->model_owner->delete_by_id_jt($id_jt);
        echo json_encode(array("status" => TRUE));
        //$id_jt=$this->input->get('id_jt',TRUE);
        /*if($this->model_admin->hapus($id_jt) == false)
        {
            $this->session->set_flashdata('edit_mahasiswa','data anda berhasil dihapus');
        }
        redirect('owner/janjitemu','refresh');
        */
    }

    //Pasien
    public function pasien()
    {

        $data['title'] = "Pasien";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['pasien'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/pasien', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pasien(){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'image' => $this->input->post('image'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'usia' => $this->input->post('usia'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'perkawinan' => $this->input->post('perkawinan'),
            'anak_ke' => $this->input->post('anak_ke')
        );
        $this->load->model('model_owner');
        $this->model_owner->tambah_pasien($data);
        echo json_encode(array("status"=> true));

       // $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        //redirect('owner/janjitemu');
    }

    public function ajax_edit_pasien($id){
        $data=$this->model_owner->get_by_id_pasien($id);
        echo json_encode($data);
    }

    public function update1(){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'image' => $this->input->post('image'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'usia' => $this->input->post('usia'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'perkawinan' => $this->input->post('perkawinan'),
            'anak_ke' => $this->input->post('anak_ke'),
            
        );


        $this->model_owner->update_1(array('id' => $this->input->post('id')),$data);
        echo json_encode(array("status"=>TRUE));
    }

    public function hapus_pasien($id){
        $this->model_owner->delete_by_id_pasien($id);
        echo json_encode(array("status" => TRUE));
        //$id_jt=$this->input->get('id_jt',TRUE);
        /*if($this->model_admin->hapus($id_jt) == false)
        {
            $this->session->set_flashdata('edit_mahasiswa','data anda berhasil dihapus');
        }
        redirect('owner/janjitemu','refresh');
        */
    }

        public function terapis()
    {
        $data['title'] = "Terapis";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['terapis'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/terapis', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_terapis(){
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'image' => $this->input->post('image'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => $this->input->post('date_created'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_telp'),
            'usia' => $this->input->post('usia'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'perkawinan' => $this->input->post('perkawinan'),
            'anak_ke' => $this->input->post('anak_ke')
        );
        $this->load->model('model_admin');
        $this->model_admin->tambah_terapis($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('owner/terapis');
    }

    function hapus_terapis($id){
        $this->model_admin->hapus_terapis($id);
        redirect('owner/terapis');
    }

    function edit_terapis(){
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $image=$this->input->post('image');
        $password=$this->input->post('password');
        $role_id=$this->input->post('role_id');
        $is_active=$this->input->post('is_active');
        $date_created=$this->input->post('date_created');
        $alamat=$this->input->post('alamat');
        $no_telp=$this->input->post('no_telp');
        $usia=$this->input->post('usia');
        $pendidikan=$this->input->post('pendidikan');
        $pekerjaan=$this->input->post('pekerjaan');
        $perkawinan=$this->input->post('perkawinan');
        $anak_ke=$this->input->post('anak_ke');
        $this->model_admin->edit_terapis($id,$name,$email,$image,$password,$role_id,$is_active,$date_created,$alamat,$no_telp,$usia,$pendidikan,$pekerjaan,$perkawinan,$anak_ke);
        redirect('owner/terapis');
    }


    
    public function layanan()
    {
        $data['title'] = "Layanan";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['layanan'] = $this->db->get('list_layanan')->result_array();

        $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Layanan', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('owner/layanan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_layanan' => $this->input->post('nama_layanan'),
                'keterangan' => $this->input->post('keterangan')
            ];

            $this->db->insert('list_layanan', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                        Layanan baru berhasil ditambah! 
                </div>'
            );
            redirect('owner/layanan');
        }
    }

    public function tambah_layanan(){
        $data = array(
            'nama_layanan' => $this->input->post('nama_layanan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->load->model('model_admin');
        $this->model_admin->tambah_layanan($data);
        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('owner/layanan');
    }

    function hapus_layanan($id){
        $this->model_admin->hapus_layanan($id);
        redirect('owner/layanan');
    }

    public function penyakit()
    {
        $data['title'] = "Penyakit";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['penyakit'] = $this->db->get('list_penyakit')->result_array();

        $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Penyakit', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('owner/penyakit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_penyakit' => $this->input->post('nama_penyakit'),
                'keterangan' => $this->input->post('keterangan')
            ];

            $this->db->insert('list_penyakit', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                        Daftar penyakit baru berhasil ditambah! 
                </div>'
            );
            redirect('owner/penyakit');
        }
    }

    public function hapus_penyakit($id){
        $this->model_admin->hapus_penyakit($id);
        redirect('owner/penyakit');
    }


    public function grafik()
    {
        $data['title'] = "Grafik";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/grafik', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = "Role";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = "Role Access";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id != ', 1);

        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role = "alert">
            Access change! 
        </div>'
        );
    }
}
