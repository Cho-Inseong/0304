<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $command = $_POST['command'];
    if($command == "tmddls") {
        $res_idx = $_POST['res_idx'];
        $sql = "UPDATE restable SET res_av = '승인완료' WHERE res_idx = :res_idx";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":res_idx", $res_idx);
        $stmt->execute();
        echo "정상적으로 승인 되었습니다.";
    }
    if($command == "deleted") {
        $res_idx = $_POST['res_idx'];
        $sql = "UPDATE restable SET is_deleted = '1' WHERE res_idx = :res_idx";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":res_idx", $res_idx);
        $stmt->execute();
        echo "정상적으로 삭제 되었습니다.";
    }
}

?>