 <?php

class users extends model {

    private $id;

    public function setUser($u_name, $u_username,$u_email, $u_password, $u_fone) {

        $sql = "INSERT INTO users SET u_name=:u_name, u_username=:u_username, u_email=:u_email,  u_password=:u_pass, u_fone=:u_fone";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':u_name', $u_name);
        $sql->bindValue(':u_username', $u_username);
        $sql->bindValue(':u_email', $u_email);
        $sql->bindValue(':u_pass', $u_password);
        $sql->bindValue(':u_fone', $u_fone);
        $sql->execute();

    }

    public function getUserExists($u_email) {

        $sql = "SELECT u_email FROM users WHERE u_email=:u_email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':u_email', $u_email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function logar($email, $senha) {
        $dados = array();
        $sql = "SELECT * FROM users WHERE u_email=:email AND u_password=:senha OR u_username=:email AND u_password=:senha ";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            $this->id = $dados['u_id'];
            return true;
        } else {
            return false;
        }

    }

    public function getIdUser() {
        if(!empty($this->id)) {
            return $this->id;
        }
    }

    public function getInfoUser() {
        $dados = array();
        $sql = "SELECT u_id, u_email, u_username, u_fone FROM users WHERE u_id=:id";
        $sql =$this->pdo->prepare($sql);
        $sql->bindValue(':id', $this->getIdUser());
        $sql->execute();
        if($sql->rowCount() > 0) {
            $dados = $sql->fetch();
            return $dados;
        } else {
            return $dados = array();
        }
    }
}

?>
