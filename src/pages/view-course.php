<?php
        session_start();
        $pdo = new PDO('mysql:host=localhost;port=3306;dbname=education-website', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $statement = $pdo->prepare('SELECT * FROM users WHERE token=?');
        if(isset($_COOKIE["token"])) {
            $statement->execute([$_COOKIE["token"]]);
        }
        $user = $statement->fetch();   
        $documentTitle = 'EduMonk - Home';
    
        if($_SESSION) {
            if(!isset($_COOKIE['token'])) {
                include "../common/header.php";
            }else if(isset($_COOKIE['token'])) {
                $_SESSION["token"] = $_COOKIE["token"];
                include "../common/user-header.php";
            }
        }else {
            include "../common/header.php";
        }
    
        include "../common/welcome-section.php";
      
        include "../common/decodeJson.php"
?>


<section class="section courses">
    <div class="container">
        <?php foreach($json_data as $key => $value):?>
            <?php if($key ==  $_GET["id"]): ?>
                <div class="course-header">
                    <div class="course-header-img"><img src="<?= $value["src"] ?>" alt=""></div>
                    <div class="course-header-desc">
                        <h1><?= $value["title"] ?></h1>
                        <p><?= $value["lorem"] ?></p>
                        <div class="course-price fx-center">
                            <p class="new">
                                <?php 
                                if($value["newPrice"] !== null) {
                                    echo $value["newPrice"];
                                }else if($value["newPrice"] === null){
                                    echo "Free";
                                }
                                ?>
                            </p>
                            <s class="old"><?php echo $value["oldPrice"] ?></s>
                        </div>
                        <button class="view-course">buy now</button>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>

    </div>
</section>


<?php include "../common/footer.php" ?>
<?php include "../common/doctype.php"; ?>