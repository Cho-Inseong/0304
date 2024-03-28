<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>휴일지정</title>
    <link rel="stylesheet" href="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/bootstrap-5.2.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include("./component/header.php") ?>

    <main id="containersign">
        <Table class="game_table">
            <tr id="game_table_tr">
                <th colspan="7">
                    2024년 4월 휴일 지정
                </th>
            </tr>
            <tr id="game_table_tr">
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            <tr>
                <td></td>
                <td onclick="holidaydesignation(this)">1</td>
                <td onclick="holidaydesignation(this)">2</td>
                <td onclick="holidaydesignation(this)">3</td>
                <td onclick="holidaydesignation(this)">4</td>
                <td onclick="holidaydesignation(this)">5</td>
                <td onclick="holidaydesignation(this)">6</td>
            </tr>
            <tr>
                <td onclick="holidaydesignation(this)">7</td>
                <td onclick="holidaydesignation(this)">8</td>
                <td onclick="holidaydesignation(this)">9</td>
                <td onclick="holidaydesignation(this)">10</td>
                <td onclick="holidaydesignation(this)">11</td>
                <td onclick="holidaydesignation(this)">12</td>
                <td onclick="holidaydesignation(this)">13</td>
            </tr>
            <tr>
                <td onclick="holidaydesignation(this)">14</td>
                <td onclick="holidaydesignation(this)">15</td>
                <td onclick="holidaydesignation(this)">16</td>
                <td onclick="holidaydesignation(this)">17</td>
                <td onclick="holidaydesignation(this)">18</td>
                <td onclick="holidaydesignation(this)">19</td>
                <td onclick="holidaydesignation(this)">20</td>
            </tr>
            <tr>
                <td onclick="holidaydesignation(this)">21</td>
                <td onclick="holidaydesignation(this)">22</td>
                <td onclick="holidaydesignation(this)">23</td>
                <td onclick="holidaydesignation(this)">24</td>
                <td onclick="holidaydesignation(this)">25</td>
                <td onclick="holidaydesignation(this)">26</td>
                <td onclick="holidaydesignation(this)">27</td>
            </tr>
            <tr>
                <td onclick="holidaydesignation(this)">28</td>
                <td onclick="holidaydesignation(this)">29</td>
                <td onclick="holidaydesignation(this)">30</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </Table>
        <?php include("./component/footer.php") ?>
        <!-- 모달 시작 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
                        <button type="button" onclick="holidaySubmit()" class="btn btn-primary">휴일 지정하기</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- 모달 끝 -->
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/bootstrap-5.2.0-dist/js/bootstrap.js"></script>
    <script src="./script.js"></script>
    <script>
    </script>
</body>

</html>