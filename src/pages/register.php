<?php
    include "../common/database.php";

     $documentTitle = 'EduMonk - Log in';

     $username = '';
     $email = '';
     $password = '';
     $password2 = '';

     $usernameErrorClass = '';
     $emailErrorClass = '';
     $passwordErrorClass = '';
     $password2ErrorClass = '';

     $usernameErrorText = '';
     $emailErrorText = '';
     $passwordErrorText = '';
     $password2ErrorText = '';

     if($_SERVER["REQUEST_METHOD"] === "POST"){

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

        if(!$username) {
            $usernameErrorText = 'Username is required';
            $usernameErrorClass = 'error';
        }else {
            if (!preg_match ("/^[a-zA-Z0-9]+$/", $username)) {  
                $usernameErrorText = 'Only alphabets Numbers and Whitespace allowed';
                $usernameErrorClass = "error";  
            }else if(strlen($username) <= 6) {
                $usernameErrorText = 'Username must be at least 7 charachters';
                $usernameErrorClass = "error";  
            }
            else {
                $usernameErrorText = '';
                $usernameErrorClass = "success";
            }
        }

        if(!$email) {
            $emailErrorClass = 'error';
            $emailErrorText = 'E-mail is required';
        }else {
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
            if (!preg_match ($pattern, $email) ){  
                $emailErrorText = 'E-mail is not valid';
                $emailErrorClass = "error";
            }else {
                if(count($users) === 0) {
                    $emailErrorText = '';
                    $emailErrorClass = "success";
                }
                else {
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
                    $stmt->execute([$email]); 
                    $userEmail = $stmt->fetch();
                    if ($userEmail) {
                        $emailErrorText = 'E-mail already exists';
                        $emailErrorClass = 'error';
                    } else {
                        $emailErrorText = '';
                        $emailErrorClass = 'success';
                    } 

                }
            }
        }

        if(!$password) {
            $passwordErrorClass = 'error';
            $passwordErrorText = 'Password is required';
            $password2ErrorClass = '';
            $password2ErrorText = '';
        }else {
            if(strlen($password) < 8) {
                $passwordErrorClass = 'error';
                $passwordErrorText = 'Password must be at least 8 characters';
                $password2ErrorClass = '';
                $password2ErrorText = '';
            }else if(!preg_match('@[0-9]@', $password)) {
                $passwordErrorClass = 'error';
                $passwordErrorText = 'Password must contain at least one number';
                $password2ErrorClass = '';
                $password2ErrorText = '';
            }else if(!preg_match('@[A-Z]@', $password)) {
                $passwordErrorClass = 'error';
                $passwordErrorText = 'Password must contain at least one uppercase letter';
                $password2ErrorClass = '';
                $password2ErrorText = '';
            }else if(!preg_match('@[^\w]@', $password)) {
                $passwordErrorClass = 'error';
                $passwordErrorText = 'Password must contain at least one special character';
                $password2ErrorClass = '';
                $password2ErrorText = '';
            }else {
                $passwordErrorClass = 'success';
                $passwordErrorText = '';
                if(!$password2) {
                    $password2ErrorClass = 'error';
                    $password2ErrorText = 'Please repeat password';
                }else {
                    if($password2 !== $password) {
                        $password2ErrorClass = 'error';
                        $password2ErrorText = 'Passwords does not matches';
                    }else {
                        $password2ErrorClass = 'success';
                        $password2ErrorText = '';
                    }
                }
            }
        }

        if($usernameErrorClass === "success" && $emailErrorClass === "success" && $passwordErrorClass=== "success" && $password2ErrorClass === "success") {

            $statement = $pdo->prepare("INSERT INTO users (username, email, password)
                                       VALUES(:username, :email, :password)");
                                       
            $statement->bindValue(':username', $username);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', hash('sha512', $password));

            $statement->execute();

            header("Location: login.php");
        }
     }
?>
<?php include "../common/header.php" ?>

    <section class="section login">
        <div class="container">
            <div class="bx-light w-100 fx-centerX fx-column">
                <h3 class="form-title">Register</h3>
                <form class="form-usr" action="#" method="POST">
                    <div class="form__inner fx-column mw-350">

                        <div class="form-control w-100">
                            <div class="form-input no-pd <?php echo $usernameErrorClass ?>">
                                <input type="text" name="username" placeholder="Username" autocomplete="off" value="<?php echo $username ?>">
                            </div>
                            <p class="error-text"><?php echo $usernameErrorText ?></p>
                        </div>
                        <div class="form-control w-100">
                            <div class="form-input no-pd <?php echo $emailErrorClass?>">
                                <input type="text" name="email" placeholder="E-mail" autocomplete="off" value="<?php echo $email ?>">
                            </div>
                            <p class="error-text"><?php echo $emailErrorText ?></p>
                        </div>
                        <div class="form-control w-100">
                            <div class="form-input no-pd <?php echo $passwordErrorClass?>">
                                <input data-pass="pass" class="pass" type="password" name="password" placeholder="Password" value="<?php echo $password ?>">
                                <div class="showHide">
                                    <div class="icon icon-show">
                                    <svg width="24" height="23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8667 13.0103C12.6399 13.0103 13.2667 12.3779 13.2667 11.5978C13.2667 10.8177 12.6399 10.1853 11.8667 10.1853C11.0935 10.1853 10.4667 10.8177 10.4667 11.5978C10.4667 12.3779 11.0935 13.0103 11.8667 13.0103Z" fill="#5F5A52"/>
                                        <path d="M21.0787 11.1272C20.4814 10.0819 17.196 4.83684 11.6147 5.00634C6.45334 5.13817 3.46668 9.71467 2.65468 11.1272C2.57276 11.2703 2.52963 11.4327 2.52963 11.598C2.52963 11.7633 2.57276 11.9257 2.65468 12.0688C3.24268 13.0953 6.38801 18.1897 11.8853 18.1897H12.1187C17.28 18.0578 20.276 13.4813 21.0787 12.0688C21.1606 11.9257 21.2037 11.7633 21.2037 11.598C21.2037 11.4327 21.1606 11.2703 21.0787 11.1272V11.1272ZM11.8667 14.8938C11.2206 14.8938 10.589 14.7005 10.0518 14.3384C9.51461 13.9762 9.09592 13.4615 8.84867 12.8593C8.60142 12.257 8.53673 11.5943 8.66278 10.955C8.78882 10.3157 9.09994 9.72843 9.5568 9.2675C10.0136 8.80657 10.5957 8.49267 11.2294 8.3655C11.8631 8.23833 12.5199 8.3036 13.1168 8.55305C13.7137 8.8025 14.2239 9.22494 14.5828 9.76694C14.9418 10.3089 15.1333 10.9461 15.1333 11.598C15.1333 12.4721 14.7892 13.3104 14.1766 13.9285C13.5639 14.5466 12.7331 14.8938 11.8667 14.8938V14.8938Z" fill="#5F5A52"/>
                                    </svg>

                                    </div>
                                    <div class="icon icon-close">
                                        <svg width="24" height="23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8667 12.8189C12.6399 12.8189 13.2667 12.1865 13.2667 11.4064C13.2667 10.6263 12.6399 9.9939 11.8667 9.9939C11.0935 9.9939 10.4667 10.6263 10.4667 11.4064C10.4667 12.1865 11.0935 12.8189 11.8667 12.8189Z" fill="#5F5A52"/>
                                            <path d="M14.9373 17.1695L13.7333 15.9077L13.668 15.8418L12.4827 14.6459C12.2946 14.6791 12.1042 14.698 11.9133 14.7024C11.4804 14.7086 11.0506 14.628 10.6489 14.4651C10.2472 14.3023 9.88152 14.0605 9.57322 13.7539C9.26492 13.4472 9.02012 13.0817 8.85304 12.6788C8.68597 12.2758 8.59995 11.8433 8.59999 11.4065C8.60432 11.2139 8.62304 11.0219 8.65599 10.8321L6.78933 8.94879L5.33333 7.51746C4.2799 8.51889 3.37744 9.67052 2.65466 10.9357C2.57274 11.0789 2.52962 11.2412 2.52962 11.4065C2.52962 11.5718 2.57274 11.7342 2.65466 11.8774C3.24266 12.9038 6.38799 17.9982 11.8853 17.9982H12.1187C13.1524 17.9673 14.1727 17.7537 15.1333 17.3673L14.9373 17.1695Z" fill="#5F5A52"/>
                                            <path d="M8.68396 5.5306L11.2973 8.16726C11.4854 8.13402 11.6757 8.11513 11.8666 8.11076C12.733 8.11076 13.5639 8.458 14.1765 9.07609C14.7891 9.69418 15.1333 10.5325 15.1333 11.4066C15.129 11.5992 15.1102 11.7912 15.0773 11.981L17.5786 14.5047L18.3626 15.2957C19.4293 14.2969 20.3444 13.1451 21.0786 11.8774C21.1605 11.7343 21.2037 11.5719 21.2037 11.4066C21.2037 11.2413 21.1605 11.0789 21.0786 10.9358C20.4813 9.89051 17.196 4.64543 11.6146 4.81493C10.5809 4.84587 9.56058 5.05941 8.59996 5.44585L8.68396 5.5306Z" fill="#5F5A52"/>
                                            <path d="M19.996 18.271L18.7826 17.0562L16.916 15.1729L8.03065 6.1988L6.65865 4.81455L5.06265 3.2043C4.97563 3.1165 4.87232 3.04686 4.75861 2.99934C4.64491 2.95182 4.52305 2.92737 4.39998 2.92737C4.27691 2.92737 4.15505 2.95182 4.04135 2.99934C3.92765 3.04686 3.82434 3.1165 3.73732 3.2043C3.56157 3.38162 3.46283 3.62212 3.46283 3.87289C3.46283 4.12366 3.56157 4.36415 3.73732 4.54147L5.82798 6.69789L7.46132 8.29872L14.284 15.1729L14.3493 15.2388L15.6 16.5006L16.1506 17.0562L18.6706 19.6081C18.7574 19.6964 18.8606 19.7665 18.9744 19.8143C19.0881 19.8621 19.2101 19.8867 19.3333 19.8867C19.4565 19.8867 19.5785 19.8621 19.6923 19.8143C19.806 19.7665 19.9092 19.6964 19.996 19.6081C20.0835 19.5206 20.1529 19.4165 20.2003 19.3017C20.2477 19.1869 20.2721 19.0639 20.2721 18.9396C20.2721 18.8152 20.2477 18.6922 20.2003 18.5774C20.1529 18.4627 20.0835 18.3585 19.996 18.271V18.271Z" fill="#5F5A52"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="error-text"><?php echo $passwordErrorText ?></p>
                        </div>
                        <div class="form-control w-100">
                            <div class="form-input no-pd <?php echo $password2ErrorClass ?>">
                                <input data-pass="pass2" type="password" name="password2" placeholder="Repeat Password" value="<?php echo $password2 ?>">
                                <div class="showHide">
                                    <div class="icon icon-show">
                                    <svg width="24" height="23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.8667 13.0103C12.6399 13.0103 13.2667 12.3779 13.2667 11.5978C13.2667 10.8177 12.6399 10.1853 11.8667 10.1853C11.0935 10.1853 10.4667 10.8177 10.4667 11.5978C10.4667 12.3779 11.0935 13.0103 11.8667 13.0103Z" fill="#5F5A52"/>
                                        <path d="M21.0787 11.1272C20.4814 10.0819 17.196 4.83684 11.6147 5.00634C6.45334 5.13817 3.46668 9.71467 2.65468 11.1272C2.57276 11.2703 2.52963 11.4327 2.52963 11.598C2.52963 11.7633 2.57276 11.9257 2.65468 12.0688C3.24268 13.0953 6.38801 18.1897 11.8853 18.1897H12.1187C17.28 18.0578 20.276 13.4813 21.0787 12.0688C21.1606 11.9257 21.2037 11.7633 21.2037 11.598C21.2037 11.4327 21.1606 11.2703 21.0787 11.1272V11.1272ZM11.8667 14.8938C11.2206 14.8938 10.589 14.7005 10.0518 14.3384C9.51461 13.9762 9.09592 13.4615 8.84867 12.8593C8.60142 12.257 8.53673 11.5943 8.66278 10.955C8.78882 10.3157 9.09994 9.72843 9.5568 9.2675C10.0136 8.80657 10.5957 8.49267 11.2294 8.3655C11.8631 8.23833 12.5199 8.3036 13.1168 8.55305C13.7137 8.8025 14.2239 9.22494 14.5828 9.76694C14.9418 10.3089 15.1333 10.9461 15.1333 11.598C15.1333 12.4721 14.7892 13.3104 14.1766 13.9285C13.5639 14.5466 12.7331 14.8938 11.8667 14.8938V14.8938Z" fill="#5F5A52"/>
                                    </svg>

                                    </div>
                                    <div class="icon icon-close">
                                        <svg width="24" height="23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8667 12.8189C12.6399 12.8189 13.2667 12.1865 13.2667 11.4064C13.2667 10.6263 12.6399 9.9939 11.8667 9.9939C11.0935 9.9939 10.4667 10.6263 10.4667 11.4064C10.4667 12.1865 11.0935 12.8189 11.8667 12.8189Z" fill="#5F5A52"/>
                                            <path d="M14.9373 17.1695L13.7333 15.9077L13.668 15.8418L12.4827 14.6459C12.2946 14.6791 12.1042 14.698 11.9133 14.7024C11.4804 14.7086 11.0506 14.628 10.6489 14.4651C10.2472 14.3023 9.88152 14.0605 9.57322 13.7539C9.26492 13.4472 9.02012 13.0817 8.85304 12.6788C8.68597 12.2758 8.59995 11.8433 8.59999 11.4065C8.60432 11.2139 8.62304 11.0219 8.65599 10.8321L6.78933 8.94879L5.33333 7.51746C4.2799 8.51889 3.37744 9.67052 2.65466 10.9357C2.57274 11.0789 2.52962 11.2412 2.52962 11.4065C2.52962 11.5718 2.57274 11.7342 2.65466 11.8774C3.24266 12.9038 6.38799 17.9982 11.8853 17.9982H12.1187C13.1524 17.9673 14.1727 17.7537 15.1333 17.3673L14.9373 17.1695Z" fill="#5F5A52"/>
                                            <path d="M8.68396 5.5306L11.2973 8.16726C11.4854 8.13402 11.6757 8.11513 11.8666 8.11076C12.733 8.11076 13.5639 8.458 14.1765 9.07609C14.7891 9.69418 15.1333 10.5325 15.1333 11.4066C15.129 11.5992 15.1102 11.7912 15.0773 11.981L17.5786 14.5047L18.3626 15.2957C19.4293 14.2969 20.3444 13.1451 21.0786 11.8774C21.1605 11.7343 21.2037 11.5719 21.2037 11.4066C21.2037 11.2413 21.1605 11.0789 21.0786 10.9358C20.4813 9.89051 17.196 4.64543 11.6146 4.81493C10.5809 4.84587 9.56058 5.05941 8.59996 5.44585L8.68396 5.5306Z" fill="#5F5A52"/>
                                            <path d="M19.996 18.271L18.7826 17.0562L16.916 15.1729L8.03065 6.1988L6.65865 4.81455L5.06265 3.2043C4.97563 3.1165 4.87232 3.04686 4.75861 2.99934C4.64491 2.95182 4.52305 2.92737 4.39998 2.92737C4.27691 2.92737 4.15505 2.95182 4.04135 2.99934C3.92765 3.04686 3.82434 3.1165 3.73732 3.2043C3.56157 3.38162 3.46283 3.62212 3.46283 3.87289C3.46283 4.12366 3.56157 4.36415 3.73732 4.54147L5.82798 6.69789L7.46132 8.29872L14.284 15.1729L14.3493 15.2388L15.6 16.5006L16.1506 17.0562L18.6706 19.6081C18.7574 19.6964 18.8606 19.7665 18.9744 19.8143C19.0881 19.8621 19.2101 19.8867 19.3333 19.8867C19.4565 19.8867 19.5785 19.8621 19.6923 19.8143C19.806 19.7665 19.9092 19.6964 19.996 19.6081C20.0835 19.5206 20.1529 19.4165 20.2003 19.3017C20.2477 19.1869 20.2721 19.0639 20.2721 18.9396C20.2721 18.8152 20.2477 18.6922 20.2003 18.5774C20.1529 18.4627 20.0835 18.3585 19.996 18.271V18.271Z" fill="#5F5A52"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <p class="error-text"><?php echo $password2ErrorText ?></p>
                        </div>

                    </div>
                    <button type="submit" class="submit-btn w-100">Register</button>
                    <p class="w-100 fx-centerX">Already have an account ? <a href="login.php">login</a></p>
                </form>
            </div>
        </div>
    </section>

<?php include "../common/doctype.php" ?>