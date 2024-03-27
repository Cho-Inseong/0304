<?php
// $sql = "SELECT * FROM restable";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();
// $reservation = $stmt->fetchall(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/bootstrap-5.2.0-dist/css/bootstrap.css">
</head>

<body>
    <?php include("./component/header.php") ?>
    <main id="containermypage">
        <?php
        if ($_SESSION['mb_level'] == "admin") {
            echo "안녕하세요 관리자 입니다.";
        } else if ($_SESSION['mb_level'] == "common") {
            echo "안녕하세요 일반 회원입니다.";
        } else {
            include("./pages/mypagemanager.php");
        }
        ?>
    </main>
    <?php include("./component/footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/bootstrap-5.2.0-dist/js/bootstrap.js"></script>
    <script src="./script.js"></script>

</body>

</html>