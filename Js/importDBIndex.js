$(document).ready(function() {
    getDBresult();
    BasketUpdate();
});

$('#search').keyup(function() {
    var search = $('#search').val();
    if (search != '') {
        getDBresult(search);
    } else {
        getDBresult();
    }
});

function getDBresult($query) {

    $BrandVal = $('input[name="BrandID"]:checked').val();
    $CategoryVal = $('input[name="CategoryID"]:checked').val();
    $PriceVal = $('input[name="Price"]:checked').val();
    $StockVal = $('input[name="Stock"]:checked').val();
    $RateVal = $('input[name="Rate"]:checked').val();


    $.ajax({

        type: "POST",
        url: "php/data.php",
        data: { query: $query, BrandID: $BrandVal, CategoryID: $CategoryVal, Price: $PriceVal, Stock: $StockVal, Rate: $RateVal },

        success: function(data) {

            dataARR = JSON.parse(data);
            html = "";

            for (var a = 0; a < dataARR.length; a++) {

                var _id = dataARR[a][0];
                var _name = dataARR[a][1];
                var _price = dataARR[a][2];
                var _stock = dataARR[a][4];
                // Editing text so it fits the DIVs
                var modStock = StockInfoMethod(_stock);
                var modText = TextLengthEdit(_name);
                // appending in html
                html += "<div class='item'><picture><img onclick=\"location.href='product.php?id=" + _id + "';\" src='img/" + _id + ".webp' class='img'><p>" + modText + "</p><p>" + _price + "€</p><p>" + modStock + "</p><button onClick='AddCookies(" + _id + "," + 1 + ")'>Add</button><button onClick='AddCookies(" + _id + "," + -1 + ")'>Subtract</button><button onClick='RemoveCookies(" + _id + ")'>Remove</button></picture></div > ";
                // replacing the text
                document.getElementById("item").innerHTML = html;
            }
        }
    });
}

// uses stock as reference to how many items are left and returns a string
function StockInfoMethod(stock) {
    if (stock > 5) {
        return "<p>In Stock</p>";
    } else if (stock >= 1) {
        return "<p>Last pieces</p>";
    } else {
        return "<p>Not available</p>";
    }
}
// if there are more then 52 characters in _name, then it will stop at 49 and add "..."
function TextLengthEdit(_text) {
    if (_text.length >= 52) {
        return _text.slice(0, 49) + "...";
    } else {
        return _text;
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
}