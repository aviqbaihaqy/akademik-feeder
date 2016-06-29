<?php
namespace Controllers;

use Libraries\AppResources;
use Models;

class Mahasiswa extends AppResources\Controller
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
        $this->login = new LoginMahasiswa;
        $this->data = $this->propertyAkademik($this->session->getValue('thsmst'));
        $this->is_login();
    }

    private function is_login()
    {
        if (!$this->login->isLogin()) {
            $this->redirect("login");
        }
    }

    // filter by id_pd, id_reg_pd, id_smt, id_sms
    public function index($format=false)
    {
        if ($format == 'json') {
            $model = new Models\Event;
            return $model->init();
        }
        return $this->view->render('mhs/mhs-dashboard.html', $this->data);
    }

    public function biodata()
    {
        return $this->view->render('mhs/mhs-biodata.html', $this->data);
    }

    public function resetPassword()
    {
        if ($format == 'json') {
            return;
        }
        return $this->view->render('mhs/mhs-reset-password.html', $this->data);
    }

    public function transkripNilai($format=false)
    {
        if ($format == 'json') {
            $model = new Models\Nilai;

            $args = [
                "id_kls"    => "8f1f5af4-0727-41af-ba44-33b392c861c1", //from session
                "id_reg_pd" => "17fb5f45-3453-4cb5-bc20-1b581f0e3930", //from session
                "id_sms"    => "1d9a2cab-31ce-4c3f-a6e3-b641ac7dfc1b", //from session
                "id_smt"    => "20151" // from session
            ];
            $model->setFilters($args); // global filter
            return $model->kuliahNilai();
        }
        return $this->view->render('mhs/mhs-transkrip-nilai.html', $this->data);
    }

    public function khs()
    {
        return $this->view->render('mhs/mhs-khs.html', $this->data);
    }

    public function krs()
    {
        return $this->view->render('mhs/mhs-krs.html', $this->data);
    }

    public function kurikulum()
    {
        return $this->view->render('mhs/mhs-kurikulum.html', $this->data);
    }

    public function jadwal()
    {
        return $this->view->render('mhs/mhs-jadwal.html', $this->data);
    }

    public function tagihan()
    {
        return $this->view->render('mhs/mhs-tagihan.html', $this->data);
    }

    public function registrasi()
    {
        return $this->view->render('mhs/mhs-registrasi.html', $this->data);
    }

    public function kkl()
    {
        return $this->view->render('mhs/mhs-kkl.html', $this->data);
    }

    public function kp()
    {
        return $this->view->render('mhs/mhs-kp.html', $this->data);
    }

    public function kpm()
    {
        return $this->view->render('mhs/mhs-kpm.html', $this->data);
    }

    public function pendadaran()
    {
        return $this->view->render('mhs/mhs-pendadaran.html', $this->data);
    }

    public function wisuda()
    {
        return $this->view->render('mhs/mhs-wisuda.html', $this->data);
    }

    public function pesertaSeminar()
    {
        return $this->view->render('mhs/mhs-peserta-seminar.html', $this->data);
    }

    public function skripsi()
    {
        return $this->view->render('mhs/mhs-skripsi.html', $this->data);
    }

    public function sp()
    {
        return $this->view->render('mhs/mhs-sp.html', $this->data);
    }

}
