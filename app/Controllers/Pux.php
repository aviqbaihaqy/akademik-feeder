<?php
namespace Controllers;

use Pux\Executor;
use Pux\Mux;
use Resources;

class Pux extends Resources\Controller
{

    public function __construct()
    {
        parent::__construct();
        Resources\Import::composer();
        $this->session = new Resources\Session;
        $this->mux = new Mux;
        $this->mux->expand = true;
    }

    public function index()
    {
        //mahasiswa
        $this->mux->any('/login', ['Controllers\LoginMahasiswa', 'index']);
        $this->mux->get('/signout', ['Controllers\LoginMahasiswa', 'signout']);

        $this->mux->any('/test.:format', ['Controllers\Mahasiswa', 'index']);

        $this->mux->any('/profil/biodata.:format', ['Controllers\Mahasiswa', 'biodata']);
        $this->mux->any('/profil/resetpassword.:format', ['Controllers\Mahasiswa', 'resetpassword']);

        $this->mux->any('/akademik/transkrip.:format', ['Controllers\Mahasiswa', 'transkripNilai']);
        $this->mux->any('/akademik/khs.:format', ['Controllers\Mahasiswa', 'khs']);
        $this->mux->any('/akademik/krs.:format', ['Controllers\Mahasiswa', 'krs']);
        $this->mux->any('/akademik/kurikulum.:format', ['Controllers\Mahasiswa', 'kurikulum']);
        $this->mux->any('/akademik/jadwal.:format', ['Controllers\Mahasiswa', 'jadwal']);

        $this->mux->any('/status/tagihan.:format', ['Controllers\Mahasiswa', 'tagihan']);
        $this->mux->any('/status/registrasi.:format', ['Controllers\Mahasiswa', 'registrasi']);

        $this->mux->any('/daftar/kkl.:format', ['Controllers\Mahasiswa', 'kkl']);
        $this->mux->any('/daftar/kp.:format', ['Controllers\Mahasiswa', 'kp']);
        $this->mux->any('/daftar/kpm.:format', ['Controllers\Mahasiswa', 'kpm']);
        $this->mux->any('/daftar/pendadaran.:format', ['Controllers\Mahasiswa', 'pendadaran']);
        $this->mux->any('/daftar/wisuda.:format', ['Controllers\Mahasiswa', 'wisuda']);
        $this->mux->any('/daftar/seminar.:format', ['Controllers\Mahasiswa', 'pesertaSeminar']);

        //administrator
        $this->mux->any('/adm-man', ['Controllers\LoginAdministrator', 'index']);
        $this->mux->get('/adm/signout', ['Controllers\LoginAdministrator', 'signout']);

        $match = $this->mux->match($_SERVER['PATH_INFO']);
        // die(var_dump($match));

        if (is_null($match)) {
            Resources\Tools::setStatusHeader(404);
            throw new Resources\HttpException('Page not found! 4');
            return;
        }
        // die(var_dump( $_SERVER['PATH_INFO']) );
        $route = $this->mux->dispatch($_SERVER['PATH_INFO']);
        echo Executor::execute($route);
    }
}
