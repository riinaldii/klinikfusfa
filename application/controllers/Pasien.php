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
        $data['title'] = "Profile";
        $data['user'] = $this->db->get_where(
            'pasien',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/index', $data);
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
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['janjitemu'] = $this->db->get('janji_temu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pasien/janjitemu', $data);
        $this->load->view('templates/footer');
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
