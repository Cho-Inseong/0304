<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>skillsbaseball</title>
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <?php include("./component/header.php")?>
  <main id="container">
    <!-- 슬라이드 시작 -->
    <div class="slidebox">
      <input type="radio" name="slide" id="slide01" checked />
      <input type="radio" name="slide" id="slide02" />
      <input type="radio" name="slide" id="slide03" />
      <input type="radio" name="slide" id="slide04" />
      <ul class="slidelist">
        <li class="slideitem">
          <div>
            <a><img src="./IMG/slide1.png" /></a>
          </div>
        </li>
        <li class="slideitem">
          <div>
            <a><img src="./IMG/slide2.png" /></a>
          </div>
        </li>
        <li class="slideitem">
          <div>
            <a><img src="./IMG/slide3.png" /></a>
          </div>
        </li>
        <li class="slideitem">
          <div>
            <a><img src="./IMG/slide4.png" /></a>
          </div>
        </li>
      </ul>
    </div>
    <!-- 슬라이드 끝 -->
    <!-- 인포메이션 영역 시작 -->
    <div class="informationh1">
      <h1>★Skills baseball park★</h1>
    </div>
    <div class="informationimgspan">
      <img src="./IMG/42.jpg" alt="" class="informationimg">
      <p>
        Skills baseball spanark는 시민들의 복리증진을 위하여 설치되었으며,<br>
        시민들의 건강 및 복지향상과 시민들에게 편리한 시설물 이용을 위한 야구장입니다<br>
        <br>
        야구를 사랑하며 즐기는 생활체육인들이 모이는 곳<br>
        다양한 즐거움과 감동을 선사하는 곳<br>
        <br>
        Skills baseball park<br>
        <br>
        <a href="./information">information 바로가기</a>
      </p>
    </div>
    <!-- 인포메이션 영역 끝 -->

    <!-- 금일 게임 현황 시작 -->
    <div class="rmadlfh1">
      <h1>★금일 게임 현황★</h1>
    </div>
    <div class="rmadlfday">
      <h1>4.1.(월)</h1>
    </div>

    <div class="today_game">
      <img src="./teamweb.png" alt="" class="teamweb">
      <span class="span5">5</span>
      <span>:</span>
      <span class="span4">4</span>
      <img src="./teamdesign.png" alt="" class="teamweb2">
    </div>
    <!-- 금일 게임 현황 끝 -->

    <!-- 게임 스케쥴 영역 시작 -->
    <div class="informationh1">
      <h1>★Game Schedule★</h1>
    </div>
    <Table class="game_table">
      <tr id="game_table_tr">
        <th colspan="7">
          2024년 4월
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
        <td>
          <span id="today">Today</span>
          1
        </td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
      </tr>
      <tr>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
        <td>11</td>
        <td>12</td>
        <td>13</td>
      </tr>
      <tr>
        <td>14</td>
        <td>15</td>
        <td>16</td>
        <td>17</td>
        <td>18</td>
        <td>19</td>
        <td class="have_game"><a href="#modal">20</a></td>
      </tr>
      <tr>
        <td>21</td>
        <td>22</td>
        <td>23</td>
        <td>24</td>
        <td>25</td>
        <td>26</td>
        <td>27</td>
      </tr>
      <tr>
        <td>28</td>
        <td>29</td>
        <td>30</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

    </Table>
    <!-- 게임 스케쥴 영역 끝 -->

    <!-- 랭킹 영역 시작 -->
    <div class="informationh1">
      <h1>★Ranking★</h1>
    </div>
    <ul class="menu">
      <li>
        <a href="#menu">나이트리그</a>
        <ul class="depth_1">
          <li><a href="# ">투수 순위</a></li>
          <li><a href="#nighthitter">타자 순위</a></li>
        </ul>
      </li>
      <li>
        <a href="#menu">주말리그</a>
        <ul class="depth_1">
          <li><a href="#weekendpitcher">투수 순위</a></li>
          <li><a href="#weekendhitter">타자 순위</a></li>
        </ul>
      </li>
      <li>
        <a href="#menu">새벽리그</a>
        <ul class="depth_1">
          <li><a href="#dawnpitcher">투수 순위</a></li>
          <li><a href="#dawnhitter">타자 순위</a></li>
        </ul>
      </li>
    </ul>
    <div class="rankall" id="nightpitcher">
      <div class="nightpitcher">
        <h1>나이트리그 - 투수순위</h1>
        <ul>
          <li>1.나일루</li>
          <li>2.나이루</li>
          <li>3.나삼루</li>
          <li>4.나사루</li>
          <li>5.나오루</li>
          <li>6.나육루</li>
          <li>7.나칠루</li>
        </ul>
      </div>
    </div>
    <div class="rankall" id="nighthitter">
      <div class="nighthitter">
        <h1>나이트리그 - 타자순위</h1>
        <ul>
          <li>1.나일타</li>
          <li>2.나이타</li>
          <li>3.나삼타</li>
          <li>4.나사타</li>
          <li>5.나오타</li>
          <li>6.나육타</li>
          <li>7.나칠타</li>
        </ul>
      </div>
    </div>
    <div class="rankall" id="weekendpitcher">
      <div class="weekendpitcher">
        <h1>주말리그 - 투수순위</h1>
        <ul>
          <li>1.주일루</li>
          <li>2.주이루</li>
          <li>3.주삼루</li>
          <li>4.주사루</li>
          <li>5.주오루</li>
          <li>6.주육루</li>
          <li>7.주칠루</li>
        </ul>
      </div>
    </div>
    <div class="rankall" id="weekendhitter">
      <div class="weekendhitter">
        <h1>주말리그 - 타자순위</h1>
        <ul>
          <li>1.주일루</li>
          <li>2.주이루</li>
          <li>3.주삼루</li>
          <li>4.주사루</li>
          <li>5.주오루</li>
          <li>6.주육루</li>
          <li>7.주칠루</li>
        </ul>
      </div>
    </div>
    <div class="rankall" id="dawnpitcher">
      <div class="dawnpitcher">
        <h1>새벽리그 - 투수순위</h1>
        <ul>
          <li>1.새일타</li>
          <li>2.새이타</li>
          <li>3.새삼타</li>
          <li>4.새사타</li>
          <li>5.새오타</li>
          <li>6.새육타</li>
          <li>7.새칠타</li>
        </ul>
      </div>
    </div>
    <div class="rankall" id="dawnhitter">
      <div class="dawnhitter">
        <h1>새벽리그 - 타자순위</h1>
        <ul>
          <li>1.새일타</li>
          <li>2.새이타</li>
          <li>3.새삼타</li>
          <li>4.새사타</li>
          <li>5.새오타</li>
          <li>6.새육타</li>
          <li>7.새칠타</li>
        </ul>
      </div>
    </div>
    <!-- 악코디언 시작 -->
    <ul class="rankmenu">
      <li>
        <a href="#">타율</a>
        <ul class="depth_1">
          <li><a href="#">(1위) 일타율</a></li>
          <li><a href="#">(2위) 이타율</a></li>
          <li><a href="#">(3위) 삼타율</a></li>
          <li><a href="#">(4위) 사타율</a></li>
          <li><a href="#">(5위) 오타율</a></li>
        </ul>
      </li>
    </ul>
    <ul class="rankmenu">
      <li>
        <a href="#">홈런</a>
        <ul class="depth_1">
          <li><a href="#">(1위) 일홈런</a></li>
          <li><a href="#">(2위) 이홈런</a></li>
          <li><a href="#">(3위) 삼홈런</a></li>
          <li><a href="#">(4위) 사홈런</a></li>
          <li><a href="#">(5위) 오홈런</a></li>
        </ul>
      </li>
    </ul>
    <ul class="rankmenu">
      <li>
        <a href="#">다승</a>
        <ul class="depth_1">
          <li><a href="#">(1위) 일다승</a></li>
          <li><a href="#">(2위) 이다승</a></li>
          <li><a href="#">(3위) 삼다승</a></li>
          <li><a href="#">(4위) 사다승</a></li>
          <li><a href="#">(5위) 오다승</a></li>
        </ul>
      </li>
    </ul>
    <ul class="rankmenu">
      <li>
        <a href="#">평균자책</a>
        <ul class="depth_1">
          <li><a href="#">(1위) 일평자</a></li>
          <li><a href="#">(2위) 이평자</a></li>
          <li><a href="#">(3위) 삼평자</a></li>
          <li><a href="#">(4위) 사평자</a></li>
          <li><a href="#">(5위) 오평자</a></li>
        </ul>
      </li>
    </ul>
    <ul class="rankmenu">
      <li>
        <a href="#">탈삼진</a>
        <ul class="depth_1">
          <li><a href="#">(1위) 일삼진</a></li>
          <li><a href="#">(2위) 이삼진</a></li>
          <li><a href="#">(3위) 삼삼진</a></li>
          <li><a href="#">(4위) 사삼진</a></li>
          <li><a href="#">(5위) 오삼진</a></li>
        </ul>
      </li>
    </ul>
    <ul class="rankmenu">
      <li>
        <a href="#">세이브</a>
        <ul class="depth_1">
          <li><a href="#">(1위) 일세이</a></li>
          <li><a href="#">(2위) 이세이</a></li>
          <li><a href="#">(3위) 삼세이</a></li>
          <li><a href="#">(4위) 사세이</a></li>
          <li><a href="#">(5위) 오세이</a></li>
        </ul>
      </li>
    </ul>
    <!-- 악코디언 끝 -->
    <!-- 랭킹 영역 끝 -->
    
    <!-- 갤러리 영역 시작 -->
    <div class="informationh1">
      <h1>★gallery★</h1>
    </div>
    <div id="gallery">
      <div id="gallery1">
        <a href="#gallery1">이전</a>
        <div class="imgWhite"></div>
        <div class="img1"><p>1번 이미지<br><button>more</button></p></div>
        <div class="img2"><p>2번 이미지<br><button>more</button></p></div>
        <a href="#gallery2">다음</a>
      </div>
      <div id="gallery2">
        <a href="#gallery1">이전</a>
        <div class="img1"><p>1번 이미지<br><button>more</button></p></div>
        <div class="img2"><p>2번 이미지<br><button>more</button></p></div>
        <div class="img3"><p>3번 이미지<br><button>more</button></p></div>
        <a href="#gallery3">다음</a>
      </div>
      <div id="gallery3">
        <a href="#gallery2">이전</a>
        <div class="img2"><p>2번 이미지<br><button>more</button></p></div>
        <div class="img3"><p>3번 이미지<br><button>more</button></p></div>
        <div class="img4"><p>4번 이미지<br><button>more</button></p></div>
        <a href="#gallery4">다음</a>
      </div>
      <div id="gallery4">
        <a href="#gallery3">이전</a>
        <div class="img3"><p>3번 이미지<br><button>more</button></p></div>
        <div class="img4"><p>4번 이미지<br><button>more</button></p></div>
        <div class="img5"><p>5번 이미지<br><button>more</button></p></div>
        <a href="#gallery5">다음</a>
      </div>
      <div id="gallery5">
        <a href="#gallery4">이전</a>
        <div class="img4"><p>4번 이미지<br><button>more</button></p></div>
        <div class="img5"><p>5번 이미지<br><button>more</button></p></div>
        <div class="img6"><p>6번 이미지<br><button>more</button></p></div>
        <a href="#gallery6">다음</a>
      </div>
      <div id="gallery6">
        <a href="#gallery5">이전</a>
        <div class="img5"><p>5번 이미지<br><button>more</button></p></div>
        <div class="img6"><p>6번 이미지<br><button>more</button></p></div>
        <div class="img1"><p>1번 이미지<br><button>more</button></p></div>
        <a href="#gallery1">다음</a>
      </div>
    </div>
    
    <!-- 갤러리 영역 끝 -->

    <!-- 굿즈 영역 시작 -->
    <div class="informationh1">
      <h1>★goods★</h1>
    </div>
    <div id="goods">
      <div id="images">
        <div class="image"><img src="./IMG/49.jpg" alt=""></div>
        <div class="image"><img src="./IMG/46.jpg" alt=""></div>
        <div class="image"><img src="./IMG/48.jpg" alt=""></div>
        <div class="image"><img src="./IMG/47.jpg" alt=""></div>
      </div>
    </div>
    <!-- 굿즈 영역 끝 -->
    
    <!-- 모달 시작 -->
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
    <!-- 모달 끝 -->
  </main>
  <!-- 푸터 시작 -->
  <?php include("./component/footer.php")?>
  <!-- 푸터 끝 -->
</body>


</html>