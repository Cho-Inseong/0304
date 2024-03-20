<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
}
?>
<div id="modal">
    <div id="modal_container">
        <div id="modal_header">
            <h1>4월 20일</h1>
        </div>
        <hr>
        <div id="modal_body">
            <p>아직 게임이 없습니다.</p>
        </div>
        <a href="#game_schedule_table"><button id="modal_close">닫기</button></a>
    </div>
</div>