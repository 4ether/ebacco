let dashboard = document.getElementById("dashboard");
let incomes = document.getElementById("incomes");
let spendings = document.getElementById("spendings");
let settings = document.getElementById("settings");

let main_dashboard = document.getElementById("main-dashboard");
let main_incomes = document.getElementById("main-incomes");
let main_spendings = document.getElementById("main-spendings");
let main_settings = document.getElementById("main-settings");

dashboard.addEventListener("click", function () {
  dashboard.style.background = "white";
  dashboard.style.color = "rgb(0, 139, 194)";
  incomes.style.background = "rgb(0, 139, 194)";
  incomes.style.color = "white";
  spendings.style.color = "rgb(0, 139, 194)";
  spendings.style.color = "white";
  settings.style.color = "rgb(0, 139, 194)";
  settings.style.color = "white";

  main_dashboard.style.display = "block";
  main_incomes.style.display = "none";
  main_spendings.style.display = "none";
  main_settings.style.display = "none";
});

incomes.addEventListener("click", function () {
  dashboard.style.background = "rgb(0, 139, 194)";
  dashboard.style.color = "white";
  incomes.style.background = "white";
  incomes.style.color = "rgb(0, 139, 194)";
  spendings.style.background = "rgb(0, 139, 194)";
  spendings.style.color = "white";
  settings.style.background = "rgb(0, 139, 194)";
  settings.style.color = "white";

  main_dashboard.style.display = "none";
  main_incomes.style.display = "block";
  main_spendings.style.display = "none";
  main_settings.style.display = "none";
});

spendings.addEventListener("click", function () {
  dashboard.style.background = "rgb(0, 139, 194)";
  dashboard.style.color = "white";
  incomes.style.background = "rgb(0, 139, 194)";
  incomes.style.color = "white";
  spendings.style.background = "white";
  spendings.style.color = "rgb(0, 139, 194)";
  settings.style.background = "rgb(0, 139, 194)";
  settings.style.color = "white";

  main_dashboard.style.display = "none";
  main_incomes.style.display = "none";
  main_spendings.style.display = "block";
  main_settings.style.display = "none";
});

settings.addEventListener("click", function () {
  dashboard.style.background = "rgb(0, 139, 194)";
  dashboard.style.color = "white";
  incomes.style.background = "rgb(0, 139, 194)";
  incomes.style.color = "white";
  spendings.style.background = "rgb(0, 139, 194)";
  spendings.style.color = "white";
  settings.style.background = "white";
  settings.style.color = "rgb(0, 139, 194)";

  main_dashboard.style.display = "none";
  main_incomes.style.display = "none";
  main_spendings.style.display = "none";
  main_settings.style.display = "block";
});
