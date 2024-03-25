<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mb_level = $_POST['mb_level'];

    $sql = "SELECT user_idx, password, mb_level, login_date FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt-> bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && ($password == $user['password'])) {
        if ($user['mb_level'] == $mb_level){
            $_SESSION['user_idx'] = $user['user_idx'];
            $_SESSION['mb_level'] = $user['mb_level'];
            $time = date("Y-m-d H:i:s");
            $sql2 = "UPDATE users SET login_date = '$time' WHERE username = '" . $username . "'";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute();
            $stmt2->fetch(PDO::FETCH_ASSOC);
            $userdate = $user['login_date'];
            // header("Location: /");
            // echo "<script>console.log(' . $user['login_date'] . '</script>";
            echo "<script>
                alert('이전 로그인 일자: $userdate');
                location.href = '/';
             </script>";
            exit;
        }else {
            echo "<script>alert('회원구분, 아이디 또는 비밀번호를 확인해주세요.')</script>";
        }
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
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include("./component/header.php") ?>
    <main id="containersign">
        <form action="" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">아이디</span>
                <input id="overlaptest" type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="username">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="addon-wrapping">비밀번호</span>
                <input type="password" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="password">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="common" name="mb_level" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    일반회원
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="manager" name="mb_level" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    담당자
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="admin" name="mb_level" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    관리자
                </label>
            </div>
            
            <button id="disabledbutton" type="submit" class="btn btn-primary">로그인</button>
        </form>
    </main>
    <?php include("./component/footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/bootstrap-5.2.0-dist/js/bootstrap.js"></script>
    <script src="./script.js"></script>
</body>

</html>