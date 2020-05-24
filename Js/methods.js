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
// starts the methods to update the cart
function InTheBasket(cname) {
    AddCookies(cname, 1);
    BasketUpdate();
}
// sets the cookie with attributes
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
// updates the count for items in the basket
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
// removes the cookie by id
function RemoveCookies(id) {
    Cookies.remove(id);
    $("#" + id).remove();
    BasketUpdate();
}
// updates the count of items in cart
// on the client realtime 
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
// sets price on client
function PriceUpdate(price) {
    $("#price").text(price);
}
// request to buy items in cart
function Buy() {
    $.ajax({
        type: "GET",
        url: "php/purchase.php",
    });
}
