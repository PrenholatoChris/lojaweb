<?php 
    class Usuario{
        public string $nome;
        public string $login;
        public string $email;
        private string $senha;
        public DateTime $data_login;

        function Usuario($nome, $login, $email, $senha){
            $this->nome = $nome;
            $this->login = $login;
            $this->email = $email;
            $this->senha = $senha;
        }

        function isSenhaValid(){
            if(strlen($this->senha) == 6){
                return true;
            }
            return false;
        }

        function isLoginValid(){
            if(str_contains($this->email,'@') && str_ends_with($this->email,".br")){
                return true;
            }
            return false;
        }

        function doLogin($login, $senha){
            if($this->login == $login && $this->senha == $senha){
                return true;
            }
            return false;
        }
    }

    $obj = new Usuario("Christian", "chris", "christianprenholato10@gmail.com", "1234");

?>