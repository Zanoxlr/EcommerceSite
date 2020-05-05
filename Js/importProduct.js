$(document).ready(function() {
    getProduct();
    BasketUpdate();

});

function getProduct() {

    $val = window.location.href.split('=').pop();

    $.ajax({
        type: "GET",
        url: "php/productDB.php",
        data: { id: $val },

        success: function(data) {

            dataARR = JSON.parse(data);
            html = "";
            var _id = dataARR[0][0];
            var _name = dataARR[0][1];
            var _category = dataARR[0][2];
            var _brand = dataARR[0][3];
            var _price = dataARR[0][4];
            var _stock = dataARR[0][5];

            // appending in html
            html += "<div class='item'><picture><img onclick=\"location.href='product.php?id=" + _id + "';\" src='img/" + _id + ".webp' class='img'><p>" + _name + "</p><p>" + _price + "€</p><p>" + StockInfoMethod(_stock) + "</p><button onClick='AddCookies(" + _id + "," + 1 + ")'>Add</button><button onClick='AddCookies(" + _id + "," + -1 + ")'>Subtract</button><button onClick='RemoveCookies(" + _id + ")'>Delete</button></picture></div > ";;
            // replacing the text
            document.getElementById("productDIV").innerHTML = html;
        }
    });
}

function StockInfoMethod(stock) {
    if (stock > 5) {
        return "<p>In Stock</p>";
    } else if (stock >= 1) {
        return "<p>Last pieces</p>";
    } else {
        return "<p>Not available</p>";
    }
}

function InTheBasket(cname) {
    AddCookies(cname, 1);
    BasketUpdate();
}

function AddCookies(cname, num) {
    val = Cookies.get(cname);
    if (val == null || val == "Nan") {
        Cookies.set(cname, 1, { expires: 60 });
    } else {
        Cookies.set(cname, parseInt(val) + num, { expires: 60 });
    }
    QuantityUpdate(cname, num);
    BasketUpdate();
}

function BasketUpdate() {
    var num = 0;
    arr = Object.values(Cookies.get());
    for (var i = 0; i < arr.length; i++) {
        if (!isNaN(arr[i])) {
            num += parseInt(arr[i]);
        }
    }
    $('#shopingCart').text(num);
    PriceUpdate();
}

function RemoveCookies(id) {
    Cookies.remove(id);
    $("#" + id).remove();
    BasketUpdate();
}

function QuantityUpdate(id, typeOfChange) {
    select = $("#" + id + "q");
    if (typeOfChange == 1 || typeOfChange == -1) {
        select.text(parseInt(select.text()) + typeOfChange);

    } else if (typeOfChange == 0) {
        select.text() = "";
    }
    if (select.text() == 0) {
        RemoveCookies(id);
    }
}

function PriceUpdate(price) {
    $("#price").text(price);
}