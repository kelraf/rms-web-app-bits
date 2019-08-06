<?php 

    
    class User {
        public $gender;
        public $phoneNo;
        public $email;
        public $registrationDate;
        public $status;
        public $exitDate;
        public $passw;
        public $confirmPassw;

        public $role;

        public static function idExists($id=null, $conn=null, $table=null, $data=false) {

            if(empty($id)) {
                return ["bool" => false, "message" => "Please Provide the user Id"];
            } elseif (empty($conn)) {
                return ["bool" => false, "message" => "Please Provide Database Connection"];
            } else {
                $result = mysqli_query($conn, "SELECT * FROM $table WHERE id='$id'");
                $user = mysqli_fetch_array($result);
                if($user) {
                    if($data) {
                        return ["bool" => true, "data" => $user];
                    } else {
                        return ["bool" => true];
                    }
                    
                } else {
                    return ["bool" => false, "message" => "No User With Such id"];
                }
            }
            
        }

        public static function vEmail($email=null, $conn=null, $checkExists=false, $exeption=false, $id=null) {

            // Sanitize email
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(empty($email)) {
                return ["bool" => false, "message" => "Email Field Required"];
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return ["bool" => false, "message" => "Invalid Email"];
            } else {
                if($checkExists) {
                    if($conn) {

                        if($exeption) {
                            $result = mysqli_query($conn, "SELECT * FROM users WHERE email !='$email'");
                            $user = mysqli_fetch_array($result);
                            if($user) {
                                return ["bool" => true, "exists" => true, "message" => "Email already exists"];
                            } else {
                                return ["bool" => true, "exists" => false, "message" => "No User With Such email"];
                            }
                        } else {
                            $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
                            $user = mysqli_fetch_array($result);
                            if($user) {
                                return ["bool" => true, "exists" => true, "message" => "Email already exists"];
                            } else {
                                return ["bool" => true, "exists" => false, "message" => "No User With Such email"];
                            }
                        }
                        
                    } else {
                        return ["bool" => false, "message" => "Please Check or Provide Database Connection"];
                    }
                    
                } else {
                    return ["bool" => true];
                }
            }

        }
        
        public static function vPassword($passw=null, $confirmPassw=null, $conn=null, $current=null, $id=null, $compareExisting=false) {
            if(empty($passw)) {
                return ["bool" => false, "message" => "Password Field Required"];
            } elseif(empty($confirmPassw)) {
                return ["bool" => false, "message" => "Confirm Password Field Required"];
            } elseif(strlen($passw) < 6) {
                return ["bool" => false, "message" => "Your Password should not be less than six Characters"];
            } elseif($passw != $confirmPassw) {
                return ["bool" => false, "message" => "Your Passwords Must Match"];
            } else {
                if($compareExisting) {

                    if(empty($current)) {
                        return ["bool" => false, "message" => "Current Password Field Required"];
                    } elseif (empty($id)) {
                        return ["bool" => false, "message" => "id Field Required"];
                    } else {
                        
                        $data = self::idExists($id, $conn, "users", true);
                        if($data["bool"]) {
                            $user = $data["data"];
                            
                            if(!password_verify($current, $user["passw"])) {
                                return ["bool" => false, "message" => "Current Password is Invalid"];
                            } else {

                                $passwords = [];
                                $passwords["passw"] = password_hash($passw, PASSWORD_DEFAULT);
                                $passwords["confirmPassw"] = password_hash($confirmPassw, PASSWORD_DEFAULT);
                                return ["bool" => true, "passwords" => $passwords];

                            }
                        } else {
                            return $data;
                        }
                    }

                } else {

                    $passwords = [];

                    $passwords["passw"] = password_hash($passw, PASSWORD_DEFAULT);
                    $passwords["confirmPassw"] = password_hash($confirmPassw, PASSWORD_DEFAULT);
                    return ["bool" => true, "passwords" => $passwords];
                }
            }
        }

        public static function vNames($firstName, $lastName) {
            // Sanitize The Names
            $firstName = filter_var($firstName, FILTER_SANITIZE_STRING);
            $lastName = filter_var($lastName, FILTER_SANITIZE_STRING);

            if(empty($firstName)) {
                return ["bool" => false, "message" => "First Name Field is required"];
            } elseif(empty($lastName)) {
                return ["bool" => false, "message" => "Last Name Field is required"];
            } elseif(strlen($firstName) < 2 or strlen($lastName) < 2) {
                return ["bool" => false, "message" => "Names Should Not Be Too Short"];
            } else {
                return ["bool" => true];
            }
        }

    } 

    // $passw = User::vPassword("kelra", "kelraf");
    // $mail = User::vEmail("kelraf@gmail.com");

    // print_r($mail);

    // print_r($passw);

?>