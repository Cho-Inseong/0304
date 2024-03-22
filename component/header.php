<header>
        <div>
          <div class="headerdis">
            <img src="./logo.png" alt="" class="logo">
            <ul class="nav_ul">
              <li class="headerli"><a href="information">information</a></li>
              <li class="headerli"><a href="statistics">statistics</a></li>
              <li class="headerli"><a href="reservation">reservation</a></li>
              <li class="headerli"><a href="goods">goods</a></li>
            </ul>
            <ul class="login_ul">
              <?php
                if (isset($_SESSION['user_idx'])) {
                  echo "<li class='headerli'><a href='logout'>로그아웃</a></li>";
                  // $user_name = $_SESSION['user_idx'];
                  echo $_SESSION['user_idx'];
                } else {
                  echo "
                  <li class='headerli'><a href='sign_in'>로그인</a></li>
                  <li class='headerli'><a href='sign_up'>회원가입</a></li>
                  ";
                }
                ?>
            </ul>
          </div>
        </div>
</header>