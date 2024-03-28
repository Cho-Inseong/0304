<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $command = $_POST['command'];
    if ($command == "designation") {
        $league = $_POST['league'];
        $time = $_POST['time'];
        $date = $_POST['date'];

        try {
            $sql = "INSERT INTO holiday (league, date, time) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$league, $date, $time]);
            echo "휴일이 정상적으로 등록되었습니다.";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    if ($command == "alldesignation") {
        $date = $_POST['date'];
        $alldate = 1;

        $sql = "INSERT INTO holiday (date, alldate) VALUES(?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$date, $alldate]);
        echo "전체요일이 정상적으로 등록되었습니다.";

    }
}
