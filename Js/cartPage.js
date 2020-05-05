$(document).ready(function() {
    getDBresult();
    BasketUpdate();

});
$("#buyButton").click(function() {
    Buy();
});

function getDBresult() {

    $.ajax({
        type: "POST",
        url: "php/cartDB.php",

        success: function(data) {

            dataARR = JSON.parse(data);
            html = "";

            $("#Price").text("Price: " + dataARR[dataARR.length - 1] + " €");

            for (var a = 0; a < (dataARR.length - 1); a++) {

                var _id = dataARR[a][0];
                var _name = dataARR[a][1];
                var _price = dataARR[a][2];
                var _quantity = dataARR[a][4];
                // appending in html
                html += "<div class='item' id=" + _id + "><picture><img onclick=\"location.href='product.php?id=" + _id + "';\" src='img/" + _id +
                    ".webp' class='img'><p>" + _name + "</p><p>" + _price +
                    "€</p><p id=" + _id + "q>" + _quantity + "</p><button onClick='AddCookies(" + _id + "," + 1 +
                    ")'>Add</button><button onClick='AddCookies(" + _id + "," + -1 +
                    ")'>Subtract</button><button onClick='RemoveCookies(" + _id + ")'>Delete</button></picture></div>";
                // replacing the text
                document.getElementById("cart").innerHTML = html;
            }
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
        Cookies.set(cname, 1, {
            expires: 60
        });
    } else {
        Cookies.set(cname, parseInt(val) + num, {
            expires: 60
        });
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

function Buy() {

    $.ajax({
        type: "POST",
        url: "php/purchase.php",
        success: function() {

        }
    });
}