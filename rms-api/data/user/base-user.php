<?php 

    require_once "../../database.php";
    
    class Base {

        public $id;

        public $firstName;
        public $lastName;
        public $gender;
        public $nationalId;
        public $phoneNo;
        public $email;
        public $registrationDate;
        public $status;
        public $exitDate;

        public $admin;
        public $landLord;
        public $tenant;

        protected $dbinst;
        protected $db;

        public function __construct() {
            $this->dbinst = new Database;
            $this->db = $this->dbinst->getConn();
        }

        public function __destruct() {
            $this->db = $this->dbinst->closeConn();
        }

        protected function idExists() {}

        protected function vEmail() {}

        protected function vNames() {}

        protected function vUserInfor() {}
    }

    // $base = new Base;

?>