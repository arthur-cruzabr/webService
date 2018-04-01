<?php

class homeController extends controller {


    public function index() {

    }

    public function logar() {
        $dados = array();
        if(isset($_POST['u_user']) && !empty($_POST['u_user'])) {
            //if(filter_var($_POST['u_login'], FILTER_VALIDATE_EMAIL)) {
                $email = $this->antSql($_POST['u_user']);
                $senha = $this->antSql($_POST['u_pass']);
                $users = new users();
                if($users->logar($email, $senha)) {
                    echo "true";
                    //$true = array('logar', 'true');

                    //$dados = $users->getInfoUser();

                    //$dados = array_merge($dados, array('login' => 'true'));

                    //echo json_encode($dados);
                } else {
                    //$dados = array('logar' => 'erro');
                    //echo json_encode($dados);
                    echo "false";
                }
            //}
        }

        $this->loadView('login');
    }

    public function cadastro() {

        if (isset($_POST['u_name']) && !empty($_POST['u_name'])) {
            if (!empty($_POST['u_username']) && !empty($_POST['u_email']) && !empty($_POST['u_pass']) && !empty($_POST['u_fone'])) {
                $user       = new users();
                $u_name     = $this->antSql($_POST['u_name']);
                $u_username = $this->antSql($_POST['u_username']);
                $u_email    = $this->antSql($_POST['u_email']);
                $u_password = $this->antSql($_POST['u_pass']);
                $u_fone     = $this->antSql($_POST['u_fone']);

                if ($user->getUserExists($u_email)) {
                    $user->setUser($u_name, $u_username, $u_email, $u_password, $u_fone);
                    $dados = array("cadastro" => "true");
                    echo json_encode($dados);
                } else {
                    $dados = array("cadastro" => "false");
                    echo json_encode($dados);
                }
            }
        }

    }

}

?>
