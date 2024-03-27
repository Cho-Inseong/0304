<?php
$sql = "SELECT * FROM restable INNER JOIN users on restable.user_idx = users.user_idx WHERE is_deleted = 0";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$reservations = $stmt->fetchall(PDO::FETCH_ASSOC);

?>
<button type="button" class="btn btn-danger" id="deletedbutton" onclick="maybeallcheckdeleted()">삭제★</button>
<table id='myreser'>
    <tr>
        <th>체크박스</th>
        <th>예약자ID</th>
        <th>예약자 이름</th>
        <th>리그</th>
        <th>날짜</th>
        <th>시간</th>
        <th>최소인원</th>
        <th>사용료</th>
        <th>예약가능여부</th>
        <th>예약승인버튼</th>
        <th>삭제버튼</th>
    </tr>
    <?php
    if($reservations) {
        foreach ($reservations as $reservation) {
            $league = $reservation['res_league'];
            $res_date = $reservation['res_date'];
            $res_time = $reservation['res_time'];
            
            $sql_2 = "SELECT * FROM restable WHERE res_league = :league AND res_date = :res_date AND res_time = :res_time AND res_av = '승인완료' AND is_deleted = '0'";
            $stmt_2 = $pdo->prepare($sql_2);
            $stmt_2->bindParam(":league", $league);
            $stmt_2->bindParam(":res_date", $res_date);
            $stmt_2->bindParam(":res_time", $res_time);
            $stmt_2->execute();
            $row = $stmt_2->fetch(PDO::FETCH_ASSOC);
            
            $divinnertext = "";
            $divinnertext .= "<tr class = '" . $reservation['res_idx'] . "'>";
            $divinnertext .= "<td><input type='checkbox' id='deletedcheckbox'></td>";
            $divinnertext .= "<td>" . $reservation['username'] . "</td>";
            $divinnertext .= "<td>" . $reservation['name'] . "</td>";
            $divinnertext .= "<td>" . $reservation['res_league'] . "</td>";
            $divinnertext .= "<td>" . $reservation['res_date'] . "</td>";
            $divinnertext .= "<td>" . $reservation['res_time'] . "시</td>";
            $divinnertext .= "<td>" . number_format($reservation['min_people']) . "명</td>";
            $divinnertext .= "<td>" . number_format($reservation['fee']) . "원</td>";
            if(isset($row['res_idx'])) {
                if($row['res_idx'] == $reservation['res_idx']) {
                    $divinnertext .= "<td>승인완료</td>";
                    $divinnertext .= "<td id='td_green'><button type='button' class='btn btn-success'id='tmddls' onclick='managertmddls(this)' disabled>승인</button></td>";
                    $divinnertext .= "<td><button type='button' class='btn btn-danger' disabled onclick='managerdeleted(this)'>삭제</button></td>";
                    // 활성화,삭제버튼 비활성화
                }else {
                    $divinnertext .= "<td>승인불가</td>";
                    $divinnertext .= "<td id='td_red'><button type='button' class='btn btn-success'id='tmddls' onclick='managertmddls(this)' disabled>승인</button></td>";
                    $divinnertext .= "<td><button type='button' class='btn btn-danger' onclick='managerdeleted(this)' >삭제</button></td>";
                    // 이때만 삭제버튼 활성화
                }
            } else {
                $divinnertext .= "<td>예약가능</td>";
                $divinnertext .= "<td id='td_blue'><button type='button' class='btn btn-success'id='tmddls' onclick='managertmddls(this)'>승인</button></td>";
                $divinnertext .= "<td><button type='button' class='btn btn-danger' disabled >삭제</button></td>";
            }
            $divinnertext .= "</tr>";
            echo $divinnertext;
        }
    }
    ?>
</table>

<!-- 
    
 -->