<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('model_owner');
        $this->load->helper('url', 'html');
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

        // $this->load->model('m_relasi');
        // $data['query'] = $this->m_relasi->get_relasi();

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

    public function pasien()
    {

        $data['title'] = "Pasien";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['pasien'] = $this->db->get('pasien')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/pasien', $data);
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
            $data_t = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
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
            $this->db->insert('pasien', $data_t);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">  
            Akun ' . $email . '  berhasil dibuat! 
        </div>'
            );
            redirect('owner/pasien');
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
            $this->load->view('owner/editpasien', $data);
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
            redirect('owner/pasien');
        }
    }

    public function detailpasien($id = null)
    {
        $data['title'] = "Detail Terapis";
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
        $this->load->view('owner/detailpasien', $data);
        $this->load->view('templates/footer');
    }

    public function hapuspasien($id = null)
    {
        if ($id) {
            $this->db->delete('pasien', ['id' => $id]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Akun berhasil dihapus! 
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Akun gagal dihapus! 
                </div>'
            );
        }
        redirect('owner/pasien');
    }

    public function terapis()
    {
        $data['title'] = "Terapis";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['terapis'] = $this->db->get_where(
            'terapis',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['terapis'] = $this->db->get('terapis')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/terapis', $data);
        $this->load->view('templates/footer');
    }

    public function addTerapis()
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
            $data['title'] = "Tambah Data Terapis";
            $data['user'] = $this->db->get_where(
                'user',
                ['email' => $this->session->userdata('email')]
            )->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('owner/addterapis', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data_t = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'riwayat_pendidikan' => htmlspecialchars($this->input->post('riwayat_pendidikan', true)),
                'usia' => htmlspecialchars($this->input->post('usia', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];

            $data_u = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data_u);
            $this->db->insert('terapis', $data_t);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">  
            Akun ' . $email . '  berhasil dibuat! 
        </div>'
            );
            redirect('owner/terapis');
        }
    }

    public function editterapis($id = null)
    {
        $data['title'] = "Edit Data Terapis";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['terapis'] = $this->db->get_where(
            'terapis',
            ['id' => $id]
        )->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('owner/editterapis', $data);
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
                    Akun ' . $email . '  berhasil diperbarui! 
                </div>'
            );
            redirect('owner/terapis');
        }
    }

    public function detailterapis($id = null)
    {
        $data['title'] = "Detail Terapis";
        $data['user'] = $this->db->get_where(
            'user',
            ['email' => $this->session->userdata('email')]
        )->row_array();

        $data['terapis'] = $this->db->get_where(
            'terapis',
            ['id' => $id]
        )->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/detailterapis', $data);
        $this->load->view('templates/footer');
    }

    public function hapusterapis($id = null)
    {
        if ($id) {
            $this->db->delete('terapis', ['id' => $id]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Akun berhasil dihapus! 
                </div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role = "alert">
                    Akun gagal dihapus! 
                </div>'
            );
        }
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

    public function tambah_layanan()
    {
        $data = array(
            'nama_layanan' => $this->input->post('nama_layanan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->load->model('model_admin');
        $this->model_admin->tambah_layanan($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('owner/layanan');
    }

    public function tambah_penyakit()
    {
        $data = array(
            'nama_penyakit' => $this->input->post('nama_layanan'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->load->model('model_admin');
        $this->model_admin->tambah_penyakit($data);
        $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('owner/penyakit');
    }

    function hapus_layanan($id)
    {
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

    public function hapus_penyakit($id)
    {
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
