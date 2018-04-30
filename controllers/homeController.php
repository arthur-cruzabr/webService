<?php

class homeController extends controller {


    public function index() {

    }

    public function logar() {
      $dados = array();
        if(isset($_POST['acesso']) && !empty($_POST['acesso'])) {
            //if(filter_var($_POST['u_login'], FILTER_VALIDATE_EMAIL)) {
                $email = $this->antSql($_POST['acesso']);
                $senha = $this->antSql($_POST['senha']);
                $users = new users();
                if($users->logar($email, $senha)) {
                    $dados = $users->getInfoUser();
                    $infouser = array("u_id"       => $dados['u_id'],
                                      "u_username" => $dados['u_username'],
                                      "u_fone"     => $dados['u_fone'],
                                      "u_email"    => $dados['u_email'],
                                      "result"     => "success",
                                      "message"    => "Login Successful"

                    );

                    echo json_encode($infouser);
                } else {
                    $infouser["result"] = "success";
                    $infouser["message"] = "Login Successful";
                    echo json_encode($infouser);
                }
            //}
        }

        //$this->loadView('login');
    }

    public function cadastro() {

        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            if (!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['fone'])) {
                $user       = new users();
                $u_name     = $this->antSql($_POST['nome']);
                $u_username = $this->antSql($_POST['username']);
                $u_email    = $this->antSql($_POST['email']);
                $u_password = $this->antSql($_POST['senha']);
                $u_fone     = $this->antSql($_POST['fone']);

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
