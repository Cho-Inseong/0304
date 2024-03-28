<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $command = $_POST['command'];
    if($command == "yaeyak"){
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
                echo "정상적으로 등록되었습니다.";
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            echo "로그인하세요 시발롬씨";
        }
    }
    if($command == "alldaterjawmd") {
        $date = $_POST['date'];

        $sql = "SELECT * FROM holiday WHERE date = :date AND alldate = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
        $holiday = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!$holiday){
            echo "전체 지정 없음";
        }else{
            echo"예약불가능";
        }
    }
    if($command == "holidaydaytimerjawmd") {
        $league = $_POST['league'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        $sql = "SELECT * FROM holiday WHERE date = :date AND league = :league AND time = :time";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":league", $league);
        $stmt->bindParam(":time", $time);
        $stmt->execute();
        $holiday = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$holiday){
            echo "예약가능";
        }else{
            echo "동일 시간떄에 이미 예약이 있어 불가능합니다.";
        }
    }
}
?>