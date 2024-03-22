<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["user_name"];
    $sql = "SELECT * FROM users WHERE user_name = :user_name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":user_name", $user_name);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$user) {
        echo "이 아이디는 사용 가능합니다.";
    } else {
        echo "이 아이디는 사용 불가능합니다..";
    }
    }
?>
