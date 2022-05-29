<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="src/css/support.css">
    <link rel="stylesheet" href="src/css/style.css">
    <!--Document Title-->
    <title>EduMonk - Home</title>
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
                        <a class="action-btn login" href="#">Login</a>
                        <a class="action-btn register" href="#">Register</a>
                    </div>
                </nav>

            </div>
        </div>
    </header>

    <section class="section welcome">
        <div class="container">
            <div class="welcome__inner fx-center-max">
                <div class="welcome-left">
                    <h2>What do you want to learn?</h2>
                    <form action="#" class="search-form">
                        <div class="form-control">
                            <div class="form-input mw-350 fx-center-max">
                                <input class="search" type="search" name="search" id="search"
                                    placeholder="Search for courses" autocomplete="off">
                                <button class="search-submit" type="submit">
                                    <svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.8067 12.86L11.54 10.6C12.2713 9.66831 12.6681 8.51777 12.6667 7.33334C12.6667 6.2785 12.3539 5.24736 11.7678 4.37029C11.1818 3.49323 10.3489 2.80965 9.37431 2.40598C8.39978 2.00231 7.32742 1.89669 6.29285 2.10248C5.25829 2.30827 4.30798 2.81622 3.5621 3.5621C2.81622 4.30798 2.30827 5.25829 2.10248 6.29285C1.89669 7.32742 2.00231 8.39978 2.40598 9.37431C2.80965 10.3489 3.49323 11.1818 4.37029 11.7678C5.24736 12.3539 6.2785 12.6667 7.33334 12.6667C8.51777 12.6681 9.66831 12.2713 10.6 11.54L12.86 13.8067C12.922 13.8692 12.9957 13.9188 13.077 13.9526C13.1582 13.9864 13.2453 14.0039 13.3333 14.0039C13.4213 14.0039 13.5085 13.9864 13.5897 13.9526C13.671 13.9188 13.7447 13.8692 13.8067 13.8067C13.8692 13.7447 13.9188 13.671 13.9526 13.5897C13.9864 13.5085 14.0039 13.4213 14.0039 13.3333C14.0039 13.2453 13.9864 13.1582 13.9526 13.077C13.9188 12.9957 13.8692 12.922 13.8067 12.86ZM3.33334 7.33334C3.33334 6.54221 3.56793 5.76885 4.00746 5.11106C4.44698 4.45326 5.0717 3.94057 5.8026 3.63782C6.53351 3.33507 7.33777 3.25585 8.1137 3.41019C8.88962 3.56454 9.60235 3.9455 10.1618 4.50491C10.7212 5.06432 11.1021 5.77705 11.2565 6.55297C11.4108 7.3289 11.3316 8.13317 11.0289 8.86407C10.7261 9.59497 10.2134 10.2197 9.55562 10.6592C8.89782 11.0987 8.12446 11.3333 7.33334 11.3333C6.27247 11.3333 5.25505 10.9119 4.50491 10.1618C3.75476 9.41162 3.33334 8.3942 3.33334 7.33334Z"
                                            fill="#5F5A52" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="suggestions fx-center">
                        <p class="text">Suggestions:</p>
                        <a class="suggestion-link" href="#">Data Structures</a>
                        <a class="suggestion-link" href="#">Discrete Mathematics</a>
                    </div>
                </div>
                <div class="welcome-right">
                    <img src="src/assets/undraw_static_assets_rpm6.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <script src="src/js/script.js"></script>
</body>

</html>