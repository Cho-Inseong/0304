<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_SESSION['user_idx'])) {
        $user_idx = $_SESSION['user_idx'];
        $res_league = $_POST['res_league'];
        $res_date = $_POST['res_date'];
        $res_time = $_POST['res_time'];
        $min_people = $_POST['min_people'];
        $fee = $_POST['fee'];
        try{
            $sql_2 = "INSERT INTO restable (user_idx, res_league, res_date, res_time, min_people, fee) VALUES (?,?,?,?,?,?)";
            $stmt_2 = $pdo->prepare($sql_2);
            $stmt_2->execute([$user_idx, $res_league, $res_date, $res_time, $min_people, $fee]);
            echo "정상적으로 등록되었습니다. SEX~";
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        echo "로그인하세요 시발롬씨";
    }
}
?>