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
        public $passw;
        public $confirmPassw;

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

        protected function idExists($data=false) {
            if(empty($this->id)) {
                return ["bool" => false, "message" => "Please Provide the user Id"];
            } else {
                try {

                    $stmt = "SELECT * FROM users WHERE id=?";
                    $sql = $this->db->prepare($stmt);
                    $sql->execute([$this->id]);
                    $user = $sql->fetch();

                    if(!$user) {
                        return ["bool" => false, "message" => "No User With Such Id"];
                    } else {
                        if($data) {
                            return ["bool" => true, "user" => $user];
                        } else {
                            return ["bool" => true];
                        }
                    }

                } catch(PDOExeption $ex) {
                    echo "Error: {$ex->getMessage()}";
                }
            }
        }

        protected function vEmail($checkExists=false) {}
        
        protected function vPassword($checkExists=false) {}

        protected function vNames() {}

        protected function vUserInfor() {}
    } 

    // $base = new Base;

    // $base->id = 2;
    // print_r($base->idExists());

?>