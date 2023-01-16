const target = document.getElementById("menu");
target.addEventListener("click", () => {
  target.classList.toggle("open");
  const nav = document.getElementById("nav");
  nav.classList.toggle("in");
});

document.addEventListener("change", (e) => {
  if (e.target.matches("[name=date]")) {
    document.querySelector("#output_date").textContent = e.target.value;
  }
});

document.addEventListener("change", (e) => {
  if (e.target.matches("[name=time]")) {
    document.querySelector("#output_time").textContent = e.target.value;
  }
});

document.addEventListener("change", (e) => {
  if (e.target.matches("[name=number]")) {
    document.querySelector("#output_number").textContent =
      e.target.value + "人";
  }
});

const reviewBtn = document.getElementById("reviewBtn");
const closeBtn = document.getElementById("closeBtn");
const modal = document.getElementById("modal");
reviewBtn.addEventListener("click", () => {
  modal.style.display = "block";
});
closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
});
window.addEventListener("click", (e) => {
  if (
    !e.target.closest(".modal__content-inner") &&
    e.target.id !== "reviewBtn"
  ) {
    modal.style.display = "none";
  }
});

// 日付の同期処理
function syncStartDate(elm, sync_elm) {
  const pulldownStartdate = document.getElementById(elm);
  pulldownStartdate.addEventListener("change", () => {
    document.getElementById(sync_elm).innerHTML = pulldownStartdate.value;
  });
}

syncStartDate("pulldown_date", "text_date");

// 時間の同期処理
function syncStartDate(elm, sync_elm) {
  const pulldownStartdate = document.getElementById(elm);
  pulldownStartdate.addEventListener("change", () => {
    document.getElementById(sync_elm).innerHTML = pulldownStartdate.value;
  });
}

syncStartDate("pulldown_time", "text_time");

// 人数の同期処理
function syncStartDate(elm, sync_elm) {
  const pulldownStartdate = document.getElementById(elm);
  pulldownStartdate.addEventListener("change", () => {
    document.getElementById(sync_elm).innerHTML = pulldownStartdate.value;
  });
}

syncStartDate("pulldown_number", "text_number");
