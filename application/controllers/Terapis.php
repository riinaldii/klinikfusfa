<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terapis extends CI_Controller
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
            'terapis',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $email = $this->session->userdata('email');

        $this->load->model('Janjitemu_model', 'jt');

        $data['janjitemu'] = $this->jt->getJanjiTemuTerapisNext($email);
        $data['layanan'] = $this->db->get('list_layanan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapis/index', $data);
        $this->load->view('templates/footer');
    }

    public function updatejanji($id_jt = null)
    {
        $data['title'] = "Update Janji Temu";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->model('Janjitemu_model', 'jt');

        $data['janjitemu'] = $this->jt->getJanjiTemubyId($id_jt);

        $data['penyakit'] = $this->db->get('list_penyakit')->result_array();
        $data['layanan'] = $this->db->get('list_layanan')->result_array();
        $data['terapis'] = $this->db->get('terapis')->result_array();

        $this->form_validation->set_rules('tgl_temu', 'Tanggal Temu', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu Temu', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('penyakit', 'Hasil Diagnosa', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('terapis/updatejanji', $data);
            $this->load->view('templates/footer');
        } else {
            $id_jt = $this->input->post('id_jt');
            $id_pasien = $this->input->post('id_pasien');
            $id_terapis = $this->input->post('id_terapis');
            $layanan = $this->input->post('layanan');
            $tgl_temu = $this->input->post('tgl_temu');
            $waktu = $this->input->post('waktu');
            $keluhan = $this->input->post('keluhan');
            $status = $this->input->post('status');
            $penyakit = $this->input->post('penyakit');

            $upload_image = $_FILES['laporan_diagnosis']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size'] = '10240';
                $config['upload_path'] = './assets/laporan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('laporan_diagnosis')) {

                    $new_file = $this->upload->data('file_name');
                    $this->db->set('laporan_diagnosis', $new_file);
                    $this->db->where('id_jt', $id_jt);
                    $this->db->update('janji_temu');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('id_pasien', $id_pasien);
            $this->db->set('layanan', $layanan);
            $this->db->set('id_terapis', $id_terapis);
            $this->db->set('tgl_temu', $tgl_temu);
            $this->db->set('waktu', $waktu);
            $this->db->set('keluhan', $keluhan);
            $this->db->set('status', $status);
            $this->db->set('penyakit', $penyakit);

            $this->db->where('id_jt', $id_jt);
            $this->db->update('janji_temu');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Janji temu berhasil diupdate! 
                </div>'
            );
            redirect('terapis/index');
        }
    }

    public function janjitemu()
    {
        $data['title'] = "Janji Temu";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $email = $this->session->userdata('email');

        $this->load->model('Janjitemu_model', 'jt');

        $data['janjitemu'] = $this->jt->getJanjiTemuTerapisSelesai($email);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapis/janjitemu', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = "Profile";
        $data['user'] = $this->db->get_where(
            'terapis',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapis/profile', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = "Edit Profile";
        $data['user'] = $this->db->get_where(
            'terapis',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('terapis/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $alamat = $this->input->post('alamat');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tanggal_lahir = $this->input->post('tgl_lahir');
            $usia = $this->input->post('usia');
            $no_telp = $this->input->post('no_telp');
            $pendidikan = $this->input->post('riwayat_pendidikan');
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
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->set('image', $new_image);
                    $this->db->where('email', $email);
                    $this->db->update('terapis');
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
            $this->db->set('riwayat_pendidikan', $pendidikan);

            $this->db->where('email', $email);
            $this->db->update('terapis');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Profile berhasil diperbarui! 
                </div>'
            );
            redirect('terapis');
        }
    }

    public function changePassword()
    {
        $data['title'] = "Ubah Password";
        $data['user'] = $this->db->get_where(
            'terapis',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('terapis/changepassword', $data);
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
                redirect('terapis/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role = "alert">
                        Password baru sama dengan password lama, coba password lain! 
                        </div>'
                    );
                    redirect('terapis/changepassword');
                } else {
                    // password ok

                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('terapis');

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success" role = "alert">
                        Password berhasil diubah! 
                        </div>'
                    );
                    redirect('terapis/changepassword');
                }
            }
        }
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

    public function pasien()
    {
        $data['title'] = "Data Pasien";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['pasien'] = $this->db->get('pasien')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapis/pasien', $data);
        $this->load->view('templates/footer');
    }

    public function addpasien()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah dipakai, gunakan email lain!'
        ]);

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[7]|matches[password2]',
            [
                'matches' => 'Password tidak cocok!',
                'min_length' => 'Password terlalu pendek!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Pasien";
            $data['user'] = $this->db->get_where(
                'user',
                ['email' => $this->session->userdata('email')]
            )->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('owner/addpasien', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data_p = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
                'anak_ke' => htmlspecialchars($this->input->post('anak_ke', true)),
                'riwayat_pendidikan' => htmlspecialchars($this->input->post('riwayat_pendidikan', true)),
                'usia' => htmlspecialchars($this->input->post('usia', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 4,
                'is_active' => 1,
                'date_created' => time()
            ];

            $data_u = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 4,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data_u);
            $this->db->insert('pasien', $data_p);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">  
            Akun ' . $email . '  berhasil dibuat! 
        </div>'
            );
            redirect('terapis/pasien');
        }
    }

    public function editpasien($id = null)
    {
        $data['title'] = "Edit Data Pasien";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['pasien'] = $this->db->get_where(
            'pasien',
            ['id' => $id]
        )->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('terapis/editpasien', $data);
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
                    Akun ' . $email . '  berhasil diperbarui! 
                </div>'
            );
            redirect('terapis/pasien');
        }
    }

    public function detailpasien($id = null)
    {
        $data['title'] = "Detail Pasien";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['pasien'] = $this->db->get_where(
            'pasien',
            ['id' => $id]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapis/detailpasien', $data);
        $this->load->view('templates/footer');
    }

    public function buatjanji($id = null)
    {
        $data['title'] = "Buat Janji Temu";

        $data['user'] = $this->db->get_where(
            'terapis',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['pasien'] = $this->db->get_where(
            'pasien',
            ['id' => $id]
        )->row_array();

        $data['layanan'] = $this->db->get('list_layanan')->result_array();

        $this->form_validation->set_rules('tgl_temu', 'Tanggal Temu', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu Temu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('terapis/buatjanji', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_pasien' => $this->input->post('id_pasien', true),
                'id_terapis' => $this->input->post('id_terapis', true),
                'layanan' => $this->input->post('layanan', true),
                'tgl_temu' => $this->input->post('tgl_temu', true),
                'waktu' => $this->input->post('waktu', true),
                'keluhan' => $this->input->post('keluhan', true),
                'status' => 'Dikonfirmasi'
            ];

            $this->db->insert('janji_temu', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">  
            Janji temu berhasil dibuat! 
        </div>'
            );
            redirect('terapis/index');
        }
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
