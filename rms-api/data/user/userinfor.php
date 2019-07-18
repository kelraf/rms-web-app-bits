<?php 

    require_once "./base-user.php";

    class UserInfor extends Base {

        public function __construct() {
            parent::__construct();
        }

        public function register() {

            try {

                $stmt = "INSERT INTO users(email, passw, confirmPassw) VALUES(?, ?, ?)";
                $sql = $this->db->prepare($stmt);

                if($sql->execute([$this->email, $this->passw, $this->confirmPassw])) {
                    return ["bool" => true, "message" => "Successfully Registered"];
                } else {
                    throw new Exception("Error Occurred During Registration");  
                }

            } catch(PDOExeption $ex) {
                echo "Error: {$ex->getMessage()}";
            }

        } 

        public function getUsers($getOne=false) {
            
            if($getOne) {
                $done = $this->idExists(true);

                if(!$done["bool"]) {
                    return $done;
                } else {
                    return $done;
                }

            } else {

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

        }
        
        public function updateInfor() {
            try {

                $stmt = "UPDATE users SET firstName=?, lastName=?, gender=?, nationalId=?, phoneNo=?, email=? WHERE id=?";
                $sql = $this->db->prepare($stmt);

                $data = [$this->firstName, $this->lastName, $this->gender, $this->nationalId, $this->phoneNo, $this->email, $this->id];

                if($sql->execute($data)) {
                    return ["bool" => true, "message" => "Updated Successfully"];
                } else {
                    throw new Exception("Error Occurred When Updating A User");
                }

            } catch(PDOExeption $ex) {
                echo "Error: {$ex->getMessage()}";
            }
        }

        public function updatePasswords() {}

        public function deleteUser() {}

    } 

    $user = new UserInfor;

    $user->id = 1;
    $user->firstName = "Kelvin";
    $user->lastName = "Wambugu";
    $user->gender = "male";
    $user->nationalId = 1122678;
    $user->phoneNo = "0727456354";
    $user->email = "kelraf@gmail.com";
    $user->passw = "kelraf11776";
    $user->confirmPassw = "kelraf11776";
    // print_r($user->register());
    // print_r($user->getUsers(true));
    print_r($user->updateInfor());

?>