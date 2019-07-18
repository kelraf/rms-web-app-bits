<?php 

    require_once "./base-user.php";

    class UserInfor extends Base {

        public function __construct() {
            parent::__construct();
        }

        public function register() {} 

        public function getUsers() {}
        
        public function updateInfor() {}

        public function updatePasswords() {}

        public function deleteUser() {}

    }

    $user = new UserInfor;

?>