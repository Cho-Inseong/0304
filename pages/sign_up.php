<?php
session_start();
$_SESSION['captcha'] = '1q3eh';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $captcha = $_POST["captcha"];
    if ($captcha === $_SESSION['captcha']) {
        try{
            $sql = "INSERT INTO users (user_name, name, password) VALUES (?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username, $name, $password]);
            echo "<script>alert('회원가입이 성공적으로 마무리 되었다')</script>";
            header("Location: /");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        echo "<script>alert('캡챠 인증번호가 틀렸습니다.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/bootstrap-5.2.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style.css" >
</head>
<body>
    <?php include("./component/header.php") ?>
    <main id="containersign">
        <form action="" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">아이디</span>
                <input id="overlaptest" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="username">
                <button onclick="overlap()" class="btn btn-outline-secondary" type="button" id="button-addon1">아이디 중복 검사</button>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">이름</span>
                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="name" oninput="regexonlyko(this)">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">비밀번호</span>
                <input type="password" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="password">
            </div>
            <div class="input-group mb-3 capcha">
                <img src="../captcha.png" alt="" style="width: 100px; margin-top: 10px; margin-bottom:10px" >
                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="captcha" maxlength="5">
                <span class="input-group-text" id="addon-wrapping">캡챠입력</span>
            </div>
            <button id="disabledbutton" type="submit" class="btn btn-primary">회원가입</button>
        </form>
    </main>
    <?php include("./component/footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/bootstrap-5.2.0-dist/js/bootstrap.js"></script>
    <script src="./script.js"></script>
</body>

</html>