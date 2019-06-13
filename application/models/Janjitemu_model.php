<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Janjitemu_model extends CI_Model
{
    public function getJanjiTemubyId($id)
    {
        $query = "SELECT `janji_temu`.*, `pasien`.`name`'psn',  `list_layanan`.`nama_layanan`
                    FROM `janji_temu` 
                    JOIN `pasien` ON `janji_temu`.`id_pasien` = `pasien`.`id`
                    JOIN `list_layanan` ON `janji_temu`.`id_layanan` = `list_layanan`.`id`
                    WHERE `janji_temu`.`id_jt` = '$id'
                ";

        return $this->db->query($query)->row_array();
    }

    public function getJanjiTemuAll()
    {
        $query = "SELECT `janji_temu`.*, `terapis`.`name`'trp', `pasien`.`name`'psn'
                    FROM `janji_temu` 
                    JOIN `terapis` ON `janji_temu`.`id_terapis` = `terapis`.`id`
                    JOIN `pasien` ON `janji_temu`.`id_pasien` = `pasien`.`id`
                ";

        return $this->db->query($query)->result_array();
    }

    public function getJanjiTemuMasuk()
    {
        $query = "SELECT `janji_temu`.*, `pasien`.`name`'psn',  `list_layanan`.`nama_layanan`
                    FROM `janji_temu` 
                    JOIN `pasien` ON `janji_temu`.`id_pasien` = `pasien`.`id`
                    JOIN `list_layanan` ON `janji_temu`.`id_layanan` = `list_layanan`.`id`
                    WHERE `status` = 'Menunggu Konfirmasi'
                ";

        return $this->db->query($query)->result_array();
    }

    public function getJanjiTemuPasien()
    {
        $query = "SELECT `janji_temu`.*,`list_layanan`.`nama_layanan`
                    FROM `janji_temu` 
                    JOIN `list_layanan` ON `janji_temu`.`id_layanan` = `list_layanan`.`id`
                    WHERE `status` = 'Menunggu Konfirmasi'
                ";
        return $this->db->query($query)->result_array();
    }

    public function getJanjiTemuby($get = NULL)
    {

        $query = "SELECT `janji_temu`.*, `terapis`.`name`'trp', `pasien`.`name`'psn',  `list_layanan`.`nama_layanan`,                    `list_penyakit`.`nama_penyakit`  
                    FROM `janji_temu` 
                    JOIN `terapis` ON `janji_temu`.`id_terapis` = `terapis`.`id`
                    JOIN `pasien` ON `janji_temu`.`id_pasien` = `pasien`.`id`
                    JOIN `list_layanan` ON `janji_temu`.`id_layanan` = `list_layanan`.`id`
                    JOIN `list_penyakit` ON `janji_temu`.`penyakit` = `list_penyakit`.`id`
                    WHERE `janji_temu`.`id_terapis` = $get
                ";

        return $this->db->query($query)->result_array();
    }
}
