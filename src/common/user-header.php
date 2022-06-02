<?php 

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        if(isset($_GET["logout"])) {
            $pdo = new PDO('mysql:host=localhost;port=3306;dbname=education-website', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $statement = $pdo->prepare("UPDATE users SET token=? WHERE token=?");
            $statement->execute([null, $_COOKIE["token"]]);
            session_destroy();
            if (isset($_COOKIE['username'])) {
                unset($_COOKIE['username']);
                setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
            }
            if (isset($_COOKIE['token'])) {
                unset($_COOKIE['token']);
                setcookie('token', '', time() - 3600, '/'); // empty value and old timestamp
            }
            header("location: index.php");

        }
    }
    if($_SERVER["REQUEST_METHOD"] === "GET") {
        
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="../css/support.css">
    <link rel="stylesheet" href="../css/style.css">
    <!--Document Title-->
    <title><?php echo $documentTitle ?></title>
</head>
<body>
    <div class="modul-container logout-modul" data-modul="logout">
        <div class="modul-container__inner">
            <p class="text">Do you really want to log out ? </p>
            <div class="answer-cont fx-center">
                <div class="answer" id="no">
                    <button>No</button>
                </div>
                <div class="answer">
                    <form class="w-100" method="GET">
                        <button type="submit" name="logout">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <header class="header">
        <div class="container">
            <div class="header__inner fx-center-max">

                <a class="header__inner-logo fx-center" href="#">
                    <svg width="50" height="38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.325 15.2L25 22.8L50 11.4L25 0L0 11.4H25V15.2H8.325ZM0 15.2V30.4L5 26.182V17.48L0 15.2ZM25 38L12.5 32.3L7.5 30.02V18.62L25 26.6L42.5 18.62V30.02L25 38Z"
                            fill="black" />
                    </svg>
                    <h1>EduMonk</h1>
                </a>

                <nav class="header__inner-nav fx-center">
                    <ul class="nav-list fx-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Problems</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link fx-center" href="#">
                                Courses
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9999 15.5C11.8683 15.5008 11.7379 15.4755 11.616 15.4258C11.4942 15.376 11.3834 15.3027 11.2899 15.21L7.28994 11.21C7.1967 11.1168 7.12274 11.0061 7.07228 10.8843C7.02182 10.7624 6.99585 10.6319 6.99585 10.5C6.99585 10.3681 7.02182 10.2376 7.07228 10.1158C7.12274 9.99393 7.1967 9.88324 7.28994 9.79C7.38318 9.69676 7.49387 9.6228 7.61569 9.57234C7.73751 9.52188 7.86808 9.49591 7.99994 9.49591C8.1318 9.49591 8.26237 9.52188 8.38419 9.57234C8.50601 9.6228 8.6167 9.69676 8.70994 9.79L11.9999 13.1L15.2999 9.92C15.3919 9.81771 15.504 9.7355 15.6293 9.67852C15.7545 9.62153 15.8901 9.59099 16.0276 9.58881C16.1652 9.58664 16.3017 9.61286 16.4287 9.66585C16.5556 9.71884 16.6703 9.79746 16.7655 9.89678C16.8607 9.99611 16.9343 10.114 16.9819 10.2431C17.0294 10.3722 17.0498 10.5097 17.0418 10.647C17.0338 10.7844 16.9975 10.9186 16.9352 11.0413C16.873 11.1639 16.7861 11.2724 16.6799 11.36L12.6799 15.22C12.4971 15.3963 12.2539 15.4964 11.9999 15.5Z"
                                        fill="#0E0C0B" />
                                </svg>
                            </a>
                            <div class="dropdown-list">
                                <a class="dropdown-link fx-center" href="#">
                                    <p class="text">Front-end Course</p>
                                </a>
                                <a class="dropdown-link fx-center" href="#">
                                    <p class="text">Back-end Course</p>
                                </a>
                                <a class="dropdown-link fx-center" href="#">
                                    <p class="text">Html Cours</p>
                                </a>
                                <a class="dropdown-link fx-center" href="#">
                                    <p class="text">CSs Cours</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Get Hired</a>
                        </li>
                    </ul>
                    <div class="user-profile dropdown">
                        <div class="user-image-default fx-center">
                            <svg width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20 11.25C20 12.5761 19.4732 13.8479 18.5355 14.7855C17.5979 15.7232 16.3261 16.25 15 16.25C13.6739 16.25 12.4021 15.7232 11.4645 14.7855C10.5268 13.8479 10 12.5761 10 11.25C10 9.92392 10.5268 8.65215 11.4645 7.71447C12.4021 6.77678 13.6739 6.25 15 6.25C16.3261 6.25 17.5979 6.77678 18.5355 7.71447C19.4732 8.65215 20 9.92392 20 11.25V11.25ZM17.5 11.25C17.5 11.913 17.2366 12.5489 16.7678 13.0178C16.2989 13.4866 15.663 13.75 15 13.75C14.337 13.75 13.7011 13.4866 13.2322 13.0178C12.7634 12.5489 12.5 11.913 12.5 11.25C12.5 10.587 12.7634 9.95107 13.2322 9.48223C13.7011 9.01339 14.337 8.75 15 8.75C15.663 8.75 16.2989 9.01339 16.7678 9.48223C17.2366 9.95107 17.5 10.587 17.5 11.25V11.25Z" fill="black"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15 1.25C7.40625 1.25 1.25 7.40625 1.25 15C1.25 22.5937 7.40625 28.75 15 28.75C22.5937 28.75 28.75 22.5937 28.75 15C28.75 7.40625 22.5937 1.25 15 1.25ZM3.75 15C3.75 17.6125 4.64125 20.0175 6.135 21.9275C7.18404 20.5499 8.53737 19.4334 10.0893 18.6654C11.6412 17.8973 13.3497 17.4985 15.0812 17.5C16.7904 17.4984 18.4774 17.8869 20.0137 18.636C21.5499 19.385 22.8949 20.4749 23.9462 21.8225C25.0293 20.402 25.7585 18.744 26.0736 16.9857C26.3887 15.2274 26.2805 13.4194 25.7581 11.7112C25.2357 10.003 24.314 8.44381 23.0693 7.16254C21.8247 5.88128 20.2928 4.91482 18.6005 4.34313C16.9081 3.77145 15.104 3.61096 13.3373 3.87497C11.5706 4.13897 9.89224 4.81986 8.44096 5.86132C6.98968 6.90277 5.80726 8.27484 4.99154 9.86399C4.17581 11.4531 3.75022 13.2137 3.75 15V15ZM15 26.25C12.4174 26.2539 9.91283 25.3654 7.91 23.735C8.71616 22.5809 9.78917 21.6386 11.0377 20.9883C12.2863 20.3381 13.6735 19.999 15.0812 20C16.4714 19.9989 17.8419 20.3295 19.0787 20.9643C20.3155 21.5991 21.3829 22.5198 22.1925 23.65C20.1741 25.3334 17.6282 26.2537 15 26.25V26.25Z" fill="black"/>
                            </svg>
                            <p class="user-username">
                                <?php
                                echo strlen($user["username"]) > 10 ? substr($user["username"],0,10)."..." : $user["username"];
                                ?>
                            </p>
                            <svg width="24" height="25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9999 16.238C11.8683 16.2387 11.7379 16.2135 11.616 16.1637C11.4942 16.114 11.3834 16.0407 11.2899 15.948L7.28994 11.948C7.1967 11.8547 7.12274 11.744 7.07228 11.6222C7.02182 11.5004 6.99585 11.3698 6.99585 11.238C6.99585 11.1061 7.02182 10.9756 7.07228 10.8537C7.12274 10.7319 7.1967 10.6212 7.28994 10.528C7.38318 10.4347 7.49387 10.3608 7.61569 10.3103C7.73751 10.2599 7.86808 10.2339 7.99994 10.2339C8.1318 10.2339 8.26237 10.2599 8.38419 10.3103C8.50601 10.3608 8.6167 10.4347 8.70994 10.528L11.9999 13.838L15.2999 10.658C15.3919 10.5557 15.504 10.4735 15.6293 10.4165C15.7545 10.3595 15.8901 10.329 16.0276 10.3268C16.1652 10.3246 16.3017 10.3508 16.4287 10.4038C16.5556 10.4568 16.6703 10.5354 16.7655 10.6348C16.8607 10.7341 16.9343 10.852 16.9819 10.9811C17.0294 11.1102 17.0498 11.2477 17.0418 11.385C17.0338 11.5224 16.9975 11.6566 16.9352 11.7792C16.873 11.9019 16.7861 12.0104 16.6799 12.098L12.6799 15.958C12.4971 16.1343 12.2539 16.2344 11.9999 16.238Z" fill="#2D3436"/>
                            </svg>

                        </div>
                        <div class="user-nav dropdown-list">
                            <ul class="user-nav-list">
                                <li class="user-nav-item">
                                    <a class="user-nav-link" href="#">My Profile</a>
                                </li>
                                <li class="user-nav-item">
                                    <a class="user-nav-link" href="#">Courses</a>
                                </li>
                                <li class="user-nav-item">
                                    <a class="user-nav-link" href="#">Support</a>
                                </li>
                                <li class="user-nav-item">
                                    <a class="user-nav-link" href="#">Settings</a>
                                </li>
                                <li class="user-nav-item">
                                    <button class="user-nav-link fx-center modul" href="#" id="logout">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14.1667 6.66667L12.9917 7.84167L14.3083 9.16667H7.5V10.8333H14.3083L12.9917 12.15L14.1667 13.3333L17.5 10L14.1667 6.66667ZM4.16667 4.16667H10V2.5H4.16667C3.25 2.5 2.5 3.25 2.5 4.16667V15.8333C2.5 16.75 3.25 17.5 4.16667 17.5H10V15.8333H4.16667V4.16667Z" fill="black"/>
                                        </svg>
                                        Log Out
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>
    </header>
