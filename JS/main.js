var sum = 0;
var finalSum = 0;
var menuList = [
  "pizza",
  "steak",
  "sushi",
  "kebab",
  "pilaf",
  "fish",
  "baursak",
  "manti",
];
let menuNameList = {
  pizza: "Греческая пицца ",
  steak: "Стейк ",
  sushi: "Суши",
  kebab: "Шашлык из баранины",
  pilaf: "Плов",
  fish: "Судак запечённый",
  baursak: "Бауырсаки",
  manti: "Манты",
};
let menuPriceList = {
  pizza: 2100,
  steak: 1400,
  sushi: 1450,
  kebab: 4200,
  pilaf: 900,
  fish: 12000,
  baursak: 450,
  manti: 1000,
};
function empty(mixed_var) {
  return (
    mixed_var === "" ||
    mixed_var === 0 ||
    mixed_var === "0" ||
    mixed_var === null ||
    mixed_var === false
  );
}
window.onload = function () {
  for (i = 0; i < menuList.length; i++) {
    if (
      localStorage.getItem(menuList[i]) !== null &&
      localStorage.getItem(menuList[i]) != 0
    ) {
      var li = document.createElement("li");
      li.className = "list-group-item";
      li.setAttribute("id", "item_" + menuList[i]);
      document.getElementById("list").appendChild(li);
      var divFlex = document.createElement("div");
      divFlex.className = "d-inline-flex";
      divFlex.setAttribute("id", "flexItem_" + menuList[i]);
      document.getElementById("item_" + menuList[i]).appendChild(divFlex);
      var div = document.createElement("div");
      div.className = "ml-4";
      div.setAttribute("id", menuList[i] + "Counter");
      div.style.fontSize = "20px";
      div.innerHTML =
        menuNameList[menuList[i]] +
        "   &nbsp&nbsp    x  &nbsp&nbsp  " +
        localStorage.getItem(menuList[i]);
      document.getElementById("flexItem_" + menuList[i]).appendChild(div);

      var buttonPlus = document.createElement("button");
      buttonPlus.className = "btn btn-success ml-4";
      buttonPlus.type = "button";
      buttonPlus.setAttribute("onclick", "addItem('" + menuList[i] + "')");
      buttonPlus.setAttribute("id", menuList[i] + "CounterPlus");
      buttonPlus.style.width = "29px";
      buttonPlus.style.height = "29px";
      buttonPlus.style.backgroundPosition = "50% 50%";
      buttonPlus.style.backgroundRepeat = "no-repeat";
      buttonPlus.style.backgroundSize = "15px";
      buttonPlus.style.backgroundImage = "url('files/plus.png')";
      document
        .getElementById("flexItem_" + menuList[i])
        .appendChild(buttonPlus);

      var buttonMinus = document.createElement("button");
      buttonMinus.className = "btn btn-danger ml-2";
      buttonMinus.type = "button";
      buttonMinus.setAttribute("onclick", "removeItem('" + menuList[i] + "')");
      buttonMinus.setAttribute("id", menuList[i] + "CounterMinus");
      buttonMinus.style.width = "29px";
      buttonMinus.style.height = "29px";
      buttonMinus.style.backgroundPosition = "50% 50%";
      buttonMinus.style.backgroundRepeat = "no-repeat";
      buttonMinus.style.backgroundSize = "15px";
      buttonMinus.style.backgroundImage = "url('files/minus.png')";
      document
        .getElementById("flexItem_" + menuList[i])
        .appendChild(buttonMinus);
    }
  }
  if (
    localStorage.getItem("sum") !== null &&
    localStorage.getItem("sum") != 0
  ) {
    sum = parseInt(localStorage.getItem("sum"));
    var price = document.createElement("h5");
    price.className = "ml-5 mt-4";
    price.setAttribute("id", "priceCounter");
    if (sum <= 5000) {
      finalSum = sum + 600;
      price.innerHTML = "Цена: " + finalSum + " (С доставкой)";
    } else if (sum >= 20000) {
      finalSum = sum - sum * 0.15;
      price.innerHTML = "Цена: " + Math.floor(finalSum) + " (Со скидкой)";
    } else {
      finalSum = sum;
      price.innerHTML = "Цена: " + finalSum;
    }
    document.getElementById("cart").appendChild(price);
  }
};
$(function () {
  $('[data-toggle="popover"]').popover();
});
i = 9;
function addItem(item) {
  name = item;
  if (localStorage.getItem(name) !== null && localStorage.getItem(name) != 0) {
    item = localStorage.getItem(name);
  } else {
    item = 0;
    var li = document.createElement("li");
    li.className = "list-group-item";
    li.setAttribute("id", "item_" + name);
    document.getElementById("list").appendChild(li);
    var divFlex = document.createElement("div");
    divFlex.className = "d-inline-flex";
    divFlex.setAttribute("id", "flexItem_" + name);
    document.getElementById("item_" + name).appendChild(divFlex);
    var div = document.createElement("div");
    div.className = "ml-4";
    div.setAttribute("id", name + "Counter");
    div.style.fontSize = "20px";
    div.innerHTML =
      menuNameList[name] +
      "   &nbsp&nbsp    x  &nbsp&nbsp  " +
      localStorage.getItem(name);
    document.getElementById("flexItem_" + name).appendChild(div);

    var buttonPlus = document.createElement("button");
    buttonPlus.className = "btn btn-success ml-4";
    buttonPlus.type = "button";
    buttonPlus.setAttribute("onclick", "addItem('" + name + "')");
    buttonPlus.setAttribute("id", name + "CounterPlus");
    buttonPlus.style.width = "29px";
    buttonPlus.style.height = "29px";
    buttonPlus.style.backgroundPosition = "50% 50%";
    buttonPlus.style.backgroundRepeat = "no-repeat";
    buttonPlus.style.backgroundSize = "15px";
    buttonPlus.style.backgroundImage = "url('files/plus.png')";
    document.getElementById("flexItem_" + name).appendChild(buttonPlus);

    var buttonMinus = document.createElement("button");
    buttonMinus.className = "btn btn-danger ml-2";
    buttonMinus.type = "button";
    buttonMinus.setAttribute("onclick", "removeItem('" + name + "')");
    buttonMinus.setAttribute("id", name + "CounterMinus");
    buttonMinus.style.width = "29px";
    buttonMinus.style.height = "29px";
    buttonMinus.style.backgroundPosition = "50% 50%";
    buttonMinus.style.backgroundRepeat = "no-repeat";
    buttonMinus.style.backgroundSize = "15px";
    buttonMinus.style.backgroundImage = "url('files/minus.png')";
    document.getElementById("flexItem_" + name).appendChild(buttonMinus);
    i++;
  }
  item++;
  if (localStorage.getItem("sum") == null || localStorage.getItem("sum") == 0) {
    var price = document.createElement("h5");
    price.className = "ml-5 mt-4";
    price.setAttribute("id", "priceCounter");
    document.getElementById("cart").appendChild(price);
  }
  sum += menuPriceList[name];
  localStorage.setItem(name, item);
  localStorage.setItem("sum", sum);
  updateData(name, item);
}
function removeItem(item) {
  name = item;
  if (localStorage.getItem(name) !== null) {
    item = localStorage.getItem(name) - 1;
  }
  sum -= menuPriceList[name];
  localStorage.setItem(name, item);
  localStorage.setItem("sum", sum);
  updateData(name, item);
}
function updateData(name, item) {
  document.getElementById(name + "Counter").innerHTML =
    menuNameList[name] + "  &nbsp&nbsp    x  &nbsp&nbsp  " + item;
  if (sum <= 5000) {
    finalSum = sum + 600;
    document.getElementById("priceCounter").innerHTML =
      "   Цена: " + finalSum + " (С доставкой)";
  } else if (sum >= 20000) {
    finalSum = sum - sum * 0.15;
    document.getElementById("priceCounter").innerHTML =
      "Цена: " + Math.floor(finalSum) + " (Со скидкой)";
  } else {
    finalSum = sum;
    document.getElementById("priceCounter").innerHTML = "Цена: " + finalSum;
  }

  if (sum <= 0) {
    document.getElementById("priceCounter").style.display = "none";
  } else {
    document.getElementById("priceCounter").style.display = "block";
  }

  if (item <= 0) {
    document.querySelector("#item_" + name).remove();
  }
}
