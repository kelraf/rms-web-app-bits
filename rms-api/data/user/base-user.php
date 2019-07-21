<?php 

    require_once "../../database.php";
    
    class Base {

        public $id;
        public $currentPassw;

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

        protected function getAll() {
            try {
                $stmt = "SELECT * FROM users";
                $sql = $this->db->query($stmt);
                $data = $sql->fetchAll();

                if($data) {
                    return ["bool" => true, "data" => $data];
                } else {
                    return ["bool" => false, "message" => "Users Table Is empty"];
                }
            } catch(PDOExeption $ex) {
                echo "Error: {$ex->getMessage()}";
            }
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

        protected function vEmail($checkExists=false) {

            // Sanitize email
            $this->email = filter_var($this->email, FILTER_SANITIZE_EMAIL);
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                return ["bool" => false, "message" => "Invalid Email"];
            } else {
                if($checkExists) {
                    try {

                        $sql = $this->db->prepare("SELECT * FROM users WHERE email=?");
                        $sql->execute([$this->email]);
                        $user = $sql->fetch();

                        if ($user) {
                            return ["bool" => false, "message" => "Email Exists"];
                        } else {
                            return ["bool" => true, "message" => "Email Not Available"];
                        }
                    } catch(PDOExeption $ex) {
                        echo "Error: {$ex->getMessage()}";
                    }
                } else {
                    return ["bool" => true];
                }
            }

        }
        
        protected function vPassword($compareExisting=false) {
            if(empty($this->passw)) {
                return ["bool" => false, "message" => "Password Field Required"];
            } elseif(empty($this->confirmPassw)) {
                return ["bool" => false, "message" => "Confirm Password Field Required"];
            } elseif(strlen($this->passw) < 6) {
                return ["bool" => false, "message" => "Your Password should not be less than six Characters"];
            } elseif($this->passw != $this->confirmPassw) {
                return ["bool" => false, "message" => "Your Passwords Must Match"];
            } else {
                if($compareExisting) {

                    $data = $this->idExists(true);
                    if($data["bool"]) {
                        $user = $data["user"];
                        
                        if(!password_verify($this->currentPassw, $user["passw"])) {
                            return ["bool" => false, "message" => "Current Password is Invalid"];
                        } else {
                            $this->passw = password_hash($this->passw, PASSWORD_DEFAULT);
                            $this->confirmPassw = password_hash($this->confirmPassw, PASSWORD_DEFAULT);
                            return ["bool" => true];
                        }
                    } else {
                        return $data;
                    }

                } else {
                    $this->passw = password_hash($this->passw, PASSWORD_DEFAULT);
                    $this->confirmPassw = password_hash($this->confirmPassw, PASSWORD_DEFAULT);
                    return ["bool" => true];
                }
            }
        }

        protected function vNames() {}

        protected function vUserInfor() {}
    } 

    // $base = new Base;

    // $base->id = 4;
    // $base->email = "kelraf11746@gmail.co";
    // print_r($base->idExists(true));
    // print_r($base->vEmail(true));

?>