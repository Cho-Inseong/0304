async function fetchVisitor() {
  const fetchData = await fetch(
    "./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/B_Module/visitors.json"
  );
  const parseData = await fetchData.json();
  return parseData["data"];
}

function updateChartAndTable(visitorsData, leagueName, day, orientation) {
  const league = visitorsData.find((l) => l.name === leagueName);
  const dayData = league.visitors.find((d) => d.day === day);
  const visitorData = dayData.visitor;

  // 표 업데이트
  $("#visitorTable").empty();
  $("#visitorTable").append(
    `<thead><tr><th>시간대</th><th>방문자 수</th></tr></thead>`
  );
  const tbody = $("<tbody></tbody>");
  for (const [time, count] of Object.entries(visitorData)) {
    tbody.append(`<tr><td>${time}</td><td>${count}</td></tr>`);
  }
  $("#visitorTable").append(tbody);

  // 차트 업데이트
  $("#chartArea").empty();
  if (orientation === "horizontal") {
    const chartContainer = $("<div></div>");
    Object.entries(visitorData).forEach(([time, count]) => {
      const percentage = (count / 500) * 100;
      const bar = $(`
            <div class="d-flex align-items-center" style="margin-bottom: 10px;">
                <div style="width: ${percentage}%; min-width: 20px; height: 20px; background-color: #007bff; color: white;">${count}</div>
                <span class="ml-2">${time}</span>
            </div>
        `);
      chartContainer.append(bar);
    });
    $("#chartArea").css({
      display: "block",
    });
    $("#chartArea").append(chartContainer);
  } else {
    const chartContainer = $(
      "<div class='d-flex align-items-end' style='height: 200px;'></div>"
    );
    Object.entries(visitorData).forEach(([time, count]) => {
      const barHeight = (count / 500) * 200;
      const bar = $(`
            <div class="d-flex flex-column align-items-center" style="margin-right: 10px;">
            <div class="bar" style="width: 50px; height: ${barHeight}px; background-color: #007bff; color: white; display: flex; align-items: flex-end; justify-content: center;">${count}</div>
            <span>${time}</span>
            </div>
        `);
      chartContainer.append(bar);
    });
    $("#chartArea").css({
      display: "flex",
      "justify-content": "center",
      "text-align": "center",
    });
    $("#chartArea").append(chartContainer);
  }
}

async function initBaseballParkChart() {
  const visitorsData = await fetchVisitor();

  visitorsData.forEach((league) => {
    $("#leagueSelect").append(new Option(league.name, league.name));
  });

  const days = ["월", "화", "수", "목", "금", "토", "일"];
  days.forEach((day) => {
    $("#daySelect").append(new Option(day, day));
  });

  $("#leagueSelect, #daySelect, #chartOrientation")
    .change(function () {
      const selectedLeague = $("#leagueSelect").val();
      const selectedDay = $("#daySelect").val();
      const orientation = $("#chartOrientation").val();
      updateChartAndTable(
        visitorsData,
        selectedLeague,
        selectedDay,
        orientation
      );
    })
    .change();
}

async function getGoodsJson() {
  // 데이터 불러오기
  const a = await fetch(
    "./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/B_Module/goods.json"
  );
  const b = await a.json();
  return b["data"];
}

async function testPrint() {
  // console.log("[  각 데이터별 출력  ]");
  // c.forEach((data) => console.log(data));

  console.log("[ GROUP 리스트 ]");
  const groupListParseData = await getGoodsJson();
  const groupList = [];
  groupListParseData.forEach((data) =>
    !groupList.includes(data.group) ? groupList.push(data.group) : null
  );
  console.log(groupList);

  console.log("[ 가격을 기준으로 오름차순 출력 ]");
  const priceDesc = await getGoodsJson();
  console.log(
    priceDesc.sort(
      (a, b) =>
        Number(a.price.replace(",", "")) - Number(b.price.replace(",", ""))
    )
  );

  console.log("[ 가격을 기준으로 내림차순 출력 ]");
  const priceAsc = await getGoodsJson();
  console.log(
    priceAsc.sort(
      (a, b) =>
        Number(b.price.replace(",", "")) - Number(a.price.replace(",", ""))
    )
  );

  console.log("[ 판매량을 기준으로 오름차순 출력 ]");
  const saleDesc = await getGoodsJson();
  console.log(saleDesc.sort((a, b) => a.sale - b.sale));

  console.log("[ 판매량을 기준으로 내림차순 출력 ]");
  const saleAsc = await getGoodsJson();
  console.log(saleAsc.sort((a, b) => b.sale - a.sale));

  console.log("[ GROUP 필터가 적용 된 데이터 출력 ]");
  const filter_if = "의류";
  const filter = await getGoodsJson();
  console.log(filter.filter((elem) => elem["group"] === filter_if));
}

const groups = [];
async function goodsInit() {
  const goods = await getGoodsJson();
  const viewOptionsElem = document.querySelector("#viewOptions");
  // 그룹 데이터 출력
  goods.forEach((data) => {
    if (!groups.includes(data.group)) {
      groups.push(data.group);
    }
  });
  groups.forEach((data) => {
    viewOptionsElem.innerHTML += `<label><input type="checkbox" name="${data}" onclick="updateGoodsList()" checked> ${data}<label>`;
  });
  updateGoodsList(); // 페이지 로드 시 최초 업데이트 1회 실행
}

async function updateGoodsList() {
  // 출력 그룹 여부
  const checkList = groups.filter(
    (data) => document.querySelector(`[name="${data}"]`).checked
  );

  // 선택된 그룹만 outputData에 저장
  const goodsJson = await getGoodsJson();
  const outputData = goodsJson.filter((goods) =>
    checkList.includes(goods.group)
  );

  // sortFilter(정렬 조건)에 따른 데이터 출력
  const sortFilter = document.querySelector("#sortFilter").value;
  switch (sortFilter) {
    // 가격 내림차순
    case "priceDesc":
      outputData.sort(
        (a, b) =>
          Number(b.price.replace(",", "")) - Number(a.price.replace(",", ""))
      );
      break;
    // 가격 오름차순
    case "priceAsc":
      outputData.sort(
        (a, b) =>
          Number(a.price.replace(",", "")) - Number(b.price.replace(",", ""))
      );
      break;
    // 판매량 내림차순
    case "sortDesc":
      outputData.sort((a, b) => b.sale - a.sale);
      break;
    // 판매량 오름차순
    case "sortAsc":
      outputData.sort((a, b) => a.sale - b.sale);
      break;
    default:
      break;
  }
  const goodsListElem = document.querySelector(`#goodsList`);
  const bestGoodsListElem = document.querySelector(`#bestGoodsList`);
  goodsListElem.innerHTML = ""; // 기존 리스트 초기화
  bestGoodsListElem.innerHTML = ""; // 기존 리스트 초기화
  for (let i = 0; i < outputData.length; i++) {
    // console.log(outputData[i]);
    if (i < 3) {
      bestGoodsListElem.innerHTML += `<div id="goods${
        outputData[i].idx
      }" class="card" style="width: 18rem;">
        <img src="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/B_Module/${
          outputData[i].img
        }" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">[ BEST ] ${outputData[i].title}</h5>
          <p class="card-text">가격 : ${outputData[i].price}원</p>
          <p class="card-text">분류 : ${outputData[i].group}</p>
          <p class="card-text">판매량 : ${outputData[
            i
          ].sale.toLocaleString()}</p>
          <button class="btn btn-primary" onclick="goodsEdit(this)">수정제안</button>
        </div>
      </div>`;
    } else {
      goodsListElem.innerHTML += `
        <div id="goods${outputData[i].idx}" class="card" style="width: 18rem;">
        <img src="./[2024 지방기능경기대회] 웹 디자인 및 개발 선수제공파일/B_Module/${
          outputData[i].img
        }" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">${outputData[i].title}</h5>
          <p class="card-text">가격 : ${outputData[i].price}원</p>
          <p class="card-text">분류 : ${outputData[i].group}</p>
          <p class="card-text">판매량 : ${outputData[
            i
          ].sale.toLocaleString()}</p>
          <button class="btn btn-primary" onclick="goodsEdit(this)">수정제안</button>
        </div>
      </div>
      `;
    }
  }
}

$(document).ready(function () {
  let selectedTextBox = null;

  // 이미지 추가 기능
  $("#add-image-button").click(function () {
    $("#image-input").click();
  });

  $("#image-input").change(function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        // 배경 이미지로 이미지 설정
        $("#edit-area").css({
          "background-image": `url(${e.target.result})`,
          "background-size": "contain",
          "background-repeat": "no-repeat",
          "background-position": "center center",
          width: "100%",
          height: "400px", // 조정 가능
        });
        adjustModalForContent();
      };
      reader.readAsDataURL(file);
    }
  });

  // 글상자 추가 및 이동 기능
  $("#text-box-button").click(function () {
    const textBox = $('<div contenteditable="true">텍스트</div>')
      .addClass("text-box")
      .css({
        position: "absolute",
        top: "10%",
        left: "10%",
        border: "1px solid #000",
        padding: "5px",
        cursor: "move",
        background: "rgba(255, 255, 255, 0.8)",
        minWidth: "50px",
        minHeight: "20px",
      })
      .draggable({
        containment: "#edit-area",
      })
      .on("click", function (e) {
        e.stopPropagation();
        $(".text-box").removeClass("selected-text-box");
        $(this).addClass("selected-text-box");
        selectedTextBox = this;
      });

    $("#edit-area").append(textBox);
  });

  // 글상자 회전 기능
  $(document).keydown(function (e) {
    if (selectedTextBox && e.ctrlKey && e.keyCode === 39) {
      // Ctrl + 오른쪽 화살표
      let currentRotation = $(selectedTextBox).data("rotation") || 0;
      let newRotation = currentRotation + 90;
      $(selectedTextBox)
        .css({
          transform: `rotate(${newRotation}deg)`,
        })
        .data("rotation", newRotation);
    }
  });

  // 모달 크기 조정 함수
  function adjustModalForContent() {
    const maxHeight = $(window).height() * 0.8; // 화면 높이의 80%를 최대 높이로 설정
    $(".modal-body").css({
      "max-height": maxHeight + "px",
      "overflow-y": "auto",
    });
  }

  // 모달 외부 클릭 시 선택 해제
  $(document).click(function () {
    $(".text-box").removeClass("selected-text-box");
    selectedTextBox = null;
  });
});

// 모달을 여는 함수
function goodsEdit(elem) {
  const goodsTitle = elem.parentElement.querySelector(".card-title").innerText;
  const modalElem = document.querySelector("#exampleModal");
  const modalTitleElem = modalElem.querySelector("h1#exampleModalLabel");

  modalTitleElem.innerText = `${goodsTitle} 수정제안`;

  $("#exampleModal").modal("show");
  adjustModalForContent(); // 모달 열릴 때 모달 크기 조정
}

// 아이디 중복검사
function overlap() {
  const targetbutton = document.querySelector("#disabledbutton");
  const username = document.querySelector("#overlaptest");
  const username_value = username.value;
  $.post("./overlap", {
    username: username_value,
  }).done(function (data) {
    if (data == "이 아이디는 사용 가능합니다.") {
      alert(data);
    } else {
      alert(data);
    }
  });
}

//한글 정규표현식
const idAndPwRegex = (target) => {
  target.value = target.value.replace(/[^a-zA-Z0-9]/g, "");
}

const nameRegex = (target) => {
  target.value = target.value.replace(/[^가-힣-ㄱ-ㅎ]+$/g, "");
}


//예약
// let selectleague = "";
let date = "";
let price;
// let selectleaguetime = "";
// let min_people = "";

function reservation(elem) {
  date = `2024-04-${elem.innerText}`;
  document.querySelector("#exampleModalLabel").innerHTML = `날짜: ${date}`;
  const modal_body = document.querySelector("#modal-body")
  modal_body.innerHTML = ""
  $("#exampleModal").modal("show");
  if ($("#exampleModal").modal("show")) {
    modal_body.innerHTML += `
    <div class='modal-body' id='modal-body'>
    <span>리그선택</span>
    <select name="league" id="league" onchange="leagueval();">
    <option value="">--리그를 선택해주세요--</option>
    <option value="night">나이트리그</option>
    <option value="week">주말리그</option>
    <option value="dawn">새벽리그</option>
    </select>
    <br>
    <span>경기 선택</span>
    <select name="" id="time" onchange="selecttime()">
    <option value="sadf">--리그를 선택해주세요--</option>
    </select>
    <br>
    <span>인원선택</span>
    <input type="number" id="people" min="20" value="20" oninput="updateprice();">
    <br>
    <span id="price">가격:</span>
    </div>`
  }
  
}


// 경기 시간 띄우기
function leagueval() {
  const selectedIndex = document.querySelector("#league").selectedIndex;
  const selecttime = document.querySelector("#time");
  selecttime.innerHTML = "<select name='' id='time'></select>";
  
  if (selectedIndex == 1) {
    selecttime.add(new Option("19시", "19"));
    selecttime.add(new Option("23시", "23"));
  } else if (selectedIndex == 2) {
    selecttime.add(new Option("09시", "09"));
    selecttime.add(new Option("13시", "13"));
    selecttime.add(new Option("15시", "15"));
  } else if (selectedIndex == 3) {
    selecttime.add(new Option("04시", "04"));
    selecttime.add(new Option("07시", "07"));
  }
  
  // if (document.querySelector("#people").value <= 20) {
    //   alert("20명 이하는 예약할 수 없습니다.");
    // }
  }
  // 가격 계산하기
  function updateprice() {
    const selectElement = document.querySelector("#league").selectedIndex;
    const people = document.querySelector("#people").value;
    switch (selectElement) {
      case 1:
        price = 50000;
        break;
        case 2:
          price = 100000;
      break;
      case 3:
        price = 30000;
        break;
        default:
          break;
  }
  price += (people - 20) * 1000;
  document.querySelector("#price").innerText = `가격: ${price.toLocaleString()}원`;
}

// function selecttime() {
//   const selecttime = document.querySelector("#time");
//   const selectedIndex = selecttime.selectedIndex;
//   const selecttimeval = selecttime.options[selectedIndex].value;
  
// }

function reservationSubmit() {
  // e()함수에 pric✅username과 name은 이미 세션에 저장되있는 user_idx를 가지고 와서 sql문으로 가져오고
  // ✅1.리그: 그냥 select의 벨류값을 가지고 오면 될거같음
  // ✅2.날짜: reservation()함수에 있긴한데 저걸 어케 date타입으로 만들지...
  // ✅3.시간: 이것도 select의 벨류값을 가지고 오면 될거같음
  // ✅4.최소인원: updateprice()함수에 people변수를 밖으로 빼고 넘기기
  // ✅5.사용료: updateprice변수를 밖으로 빼고 price를 넘기면 되듯
  
  const selectleague = document.querySelector("#league");
  const selectedIndex = selectleague.selectedIndex;
  const selectleagueval = selectleague.options[selectedIndex].value; //리그 벨류값
  
  const resdate = date //예약날짜

  const selecttime = document.querySelector("#time");
  const selectedtimeIndex = selecttime.selectedIndex;
  const selecttimeval = selecttime.options[selectedtimeIndex].value; //시간 벨류값

  const people = document.querySelector("#people").value; //최소인원 벨류값

  const resfee = price; //사용료

  // console.log(selectleagueval);
  // console.log(resdate);
  // console.log(selecttimeval);
  // console.log(people);
  // console.log(resfee);

  $.post("./reservation1", {
    res_league: selectleagueval,
    res_date: resdate,
    res_time: selecttimeval,
    min_people: people,
    fee: resfee
  }).done(function (data) {
    if (data == "정상적으로 등록되었습니다.") {
      alert(data);
      $("#exampleModal").modal("hide");
        // location.href = "./";
    } else if(data == "로그인하세요 시발롬씨") {
      alert(data);
      location.href = 'login';
    } else {
      alert(data);
    }
  })

}

// 관리자 마이페이지 승인버튼

function managertmddls(elem) {
  const res_idx = elem.parentElement.parentElement.className;
  $.post("./managertmddls", {
    command: "tmddls",
    res_idx: res_idx,
  }).done(function (data) {
    if(data == "정상적으로 승인 되었습니다.") {
      alert(data);
      location.href = 'mypage';
    }else {
      alert(data);
      location.href = 'mypage';
    }
  })
}

function managerdeleted(elem) {
  const res_idx = elem.parentElement.parentElement.className;
  $.post("./managertmddls", {
    command: "deleted",
    res_idx: res_idx,
  }).done(function (data) {
    if(data == "정상적으로 삭제 되었습니다.") {
      alert(data);
      location.href = 'mypage';
    }else {
      alert(data);
      location.href = 'mypage';
    }
  })
}

function maybeallcheckdeleted() {
  const checkbox = document.querySelectorAll("#deletedcheckbox");
  checkbox.forEach((elem) => {
    const reservation_av_parent_child = elem.parentElement.parentElement.querySelector("td:nth-child(9)").innerText;
    const res_idx = elem.parentElement.parentElement.className;
    if(elem.checked == true) {
      if(reservation_av_parent_child == "승인불가"){
        console.log("일단");
        $.post("./managertmddls", {
          command: "deleted",
          res_idx: res_idx,
        }).done(function (data) {
          if(data == "정상적으로 삭제 되었습니다.") {
            alert(data);
            location.href = 'mypage';
          }else {
            alert(data);
            location.href = 'mypage';
          }
        })
      }else {
        console.log("가마있으세요");
      }
    }
  });  
}



//체크박스 부모님 찾고 부모님의 부모님을 찾아서 그 부모님의 예약가능여부가 번째 자식인지 찾아라 
//태그안에 내용을 가져오려면 innerText를 사용하면 됩니다.

//정리
//체크박스의 부모를 찾고 그 부모의 부모를 찾아서 그 부모의 몇 번쨰 자식이 예약가능여부인지 찾아서 예약가능여부의 <td>의 내용을 가지고와서
//승인불가면 삭제가 가능하고 예약가능,승인완료는 삭제가 불가능하다.


//기능구현
//전체삭제 버튼을 눌렀을때 체크박스가 ture면 체크박스의 부모의부모를 찾고 그 부모의 자식중에 예약가능여부를 찾는다 그리고 예약가능여부에서 승인불가만 삭제하는 로직을 구현