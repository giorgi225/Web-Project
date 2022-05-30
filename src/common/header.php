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
                    <div class="action fx-center">
                        <a class="action-btn login" href="login.php">Login</a>
                        <a class="action-btn register" href="register.php">Register</a>
                    </div>
                </nav>

            </div>
        </div>
    </header>
