<?php
namespace Controllers;

use Libraries\AppResources;

class Dashboard extends AppResources\Controller
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
        $this->login = new LoginMahasiswa;
        $this->is_login();
    }

    private function is_login()
    {
        if (!$this->login->isLogin() ) {
            $this->redirect("/login");
        }
    }

    public function index()
    {
        $data = null;
        if ( $smt = $this->session->getValue('thsmst') ){
            $data = $this->propertyAkademik($smt);
        }

        return $this->view->render('mhs/mhs-dashboard.html', $data);
    }
}
