<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "Dashboard";

        $data['user'] = $this->db->get_where(
            'pasien',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $email = $this->session->userdata('email');

        $this->load->model('Janjitemu_model', 'jt');

        $data['janjitemu'] = $this->jt->getJanjiTemuPasienNext($email);
        $data['layanan'] = $this->db->get('list_layanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/index', $data);
        $this->load->view('templates/footer');
    }

    public function download($id_jt = null)
    {
        $this->load->helper('download');

        $data['janjitemu'] = $this->db->get_where(
            'janji_temu',
            ['id_jt' => $id_jt]
        )->row_array();

        $name = 'mytext.txt';
        force_download($name, $data);
        force_download('/path/to/photo.jpg', NULL);
        redirect('pasien/janjitemu');
    }

    public function detailjanji($id_jt = null)
    {
        $data['title'] = "Detail Janji Temu";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->model('Janjitemu_model', 'jt');

        $data['janjitemu'] = $this->jt->getJanjiTemubyId($id_jt);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/detailjanji', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = "Profile";

        $data['user'] = $this->db->get_where(
            'pasien',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = "Edit Profile";
        $data['user'] = $this->db->get_where(
            'pasien',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasien/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $alamat = $this->input->post('alamat');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tgl_lahir');
            $usia = $this->input->post('usia');
            $no_telp = $this->input->post('no_telp');
            $anak_ke = $this->input->post('anak_ke');
            $pendidikan = $this->input->post('riwayat_pendidikan');
            $pekerjaan = $this->input->post('pekerjaan');
            $perkawinan = $this->input->post('perkawinan');
            $email = $this->input->post('email');

            //cek jika ada gambar yang di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);

                    $this->db->set('image', $new_image);
                    $this->db->where('email', $email);
                    $this->db->update('pasien');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->db->set('name', $name);
            $this->db->set('alamat', $alamat);
            $this->db->set('tempat_lahir', $tempat_lahir);
            $this->db->set('tgl_lahir', $tanggal_lahir);
            $this->db->set('usia', $usia);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('anak_ke', $anak_ke);
            $this->db->set('riwayat_pendidikan', $pendidikan);
            $this->db->set('pekerjaan', $pekerjaan);
            $this->db->set('perkawinan', $perkawinan);

            $this->db->where('email', $email);
            $this->db->update('pasien');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Profile berhasil diperbarui! 
                </div>'
            );
            redirect('pasien');
        }
    }

    public function changePassword()
    {
        $data['title'] = "Ubah Password";
        $data['user'] = $this->db->get_where(
            'pasien',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasien/changepassword', $data);
            $this->load->view('templates/footer');
        } else {

            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role = "alert">
                    Password lama yang dimasukkan salah! 
                    </div>'
                );
                redirect('pasien/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role = "alert">
                        Password baru sama dengan password lama, coba password lain! 
                        </div>'
                    );
                    redirect('pasien/changepassword');
                } else {
                    // password ok

                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('pasien');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role = "alert">
                        Password berhasil diubah! 
                        </div>'
                    );
                    redirect('pasien/changepassword');
                }
            }
        }
    }

    public function janjitemu()
    {
        $data['title'] = "Janji Temu";

        $data['user'] = $this->db->get_where(
            'pasien',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $email = $this->session->userdata('email');

        $this->load->model('Janjitemu_model', 'jt');

        $data['janjitemu'] = $this->jt->getJanjiTemuPasien($email);
        $data['layanan'] = $this->db->get('list_layanan')->result_array();

        $this->form_validation->set_rules('tgl_temu', 'Tanggal Temu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasien/janjitemu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pasien' => $this->input->post('id', true),
                'layanan' => $this->input->post('layanan', true),
                'tgl_temu' => $this->input->post('tgl_temu', true),
                'waktu' => $this->input->post('waktu', true),
                'keluhan' => $this->input->post('keluhan', true),
                'status' => 'Menunggu Konfirmasi'
            ];

            $this->db->insert('janji_temu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">  
            Janji temu berhasil dibuat! 
        </div>'
            );
            redirect('pasien/janjitemu');
        }
    }

    public function editjanji($id_jt = null)
    {
        $data['title'] = "Edit Janji Temu";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['janjitemu'] = $this->db->get_where(
            'janji_temu',
            ['id_jt' => $id_jt]
        )->row_array();

        $data['layanan'] = $this->db->get('list_layanan')->result_array();

        $this->form_validation->set_rules('tgl_temu', 'Tanggal Temu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pasien/editjanji', $data);
            $this->load->view('templates/footer');
        } else {
            $id_jt = $this->input->post('id_jt');
            $id_pasien = $this->input->post('id_pasien');
            $layanan = $this->input->post('layanan');
            $tgl_temu = $this->input->post('tgl_temu');
            $waktu = $this->input->post('waktu');
            $keluhan = $this->input->post('keluhan');
            $status = 'Menunggu Konfirmasi';

            $this->db->set('id_pasien', $id_pasien);
            $this->db->set('layanan', $layanan);
            $this->db->set('tgl_temu', $tgl_temu);
            $this->db->set('waktu', $waktu);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('status', $status);

            $this->db->where('id_jt', $id_jt);
            $this->db->update('janji_temu');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Janji temu berhasil diperbarui! 
                </div>'
            );
            redirect('pasien/janjitemu');
        }
    }

    public function hapusjanji($id_jt = null)
    {
        if ($id_jt) {
            $this->db->delete('janji_temu', ['id_jt' => $id_jt]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Janji temu berhasil dihapus! 
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Janji temu gagal dihapus! 
                </div>'
            );
        }
        redirect('pasien/janjitemu');
    }

    public function keluhan()
    {
        $data['title'] = "Keluhan";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/keluhan', $data);
        $this->load->view('templates/footer');
    }

    public function layanan()
    {
        $data['title'] = "Layanan";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/layanan', $data);
        $this->load->view('templates/footer');
    }

    public function penyakit()
    {
        $data['title'] = "Penyakit";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/penyakit', $data);
        $this->load->view('templates/footer');
    }

    public function laporan()
    {
        $data['title'] = "Riwayat Janji Temu";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $email = $this->session->userdata('email');

        $this->load->model('Janjitemu_model', 'jt');

        $data['janjitemu'] = $this->jt->getJanjiTemuSelesaiPasien($email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/laporan', $data);
        $this->load->view('templates/footer');
    }
}
