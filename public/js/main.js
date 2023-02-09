const target = document.getElementById("menu");
target.addEventListener("click", () => {
  target.classList.toggle("open");
  const nav = document.getElementById("nav");
  nav.classList.toggle("in");
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
