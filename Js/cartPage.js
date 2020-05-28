// when the page is loaded start BasketUpdate and
// get items in your cart
$(document).ready(function() {
    getDBresult();
    BasketUpdate();
});
$("#buyButton").click(function() {
    Buy();
});
// POSTs ids of items in cart to the server to receive
// json file which tells you its attributes
function getDBresult() {
    $.ajax({
        type: "POST",
        url: "php/cartDB.php",
        success: function(data) {
            // parses the resposne to an array
            dataARR = JSON.parse(data);
            html = "";
            // sets the price
            $("#Price").text("Price: " + dataARR[dataARR.length - 1] + " €");
            // for each object in the array
            // it appends a html div
            for (var a = 0; a < (dataARR.length - 1); a++) {
                // sets the values
                var _id = dataARR[a][0];
                var _name = dataARR[a][1];
                var _price = dataARR[a][2];
                var _quantity = dataARR[a][4];
                // appending in html
                html += "<div class='item' id=" + _id + "><picture><img onclick=\"location.href='product.php?id=" + _id + "';\" src='img/" + _id + ".webp' class='img'><p>" + _name + "</p><p>" + _price + "€</p><p id=" + _id + "q>" + _quantity + "</p><button onClick='AddCookies(" + _id + "," + 1 + ", 1 )'>Add</button><button onClick='AddCookies(" + _id + "," + -1 + ", 1 )'>Subtract</button><button onClick='RemoveCookies(" + _id + ")'>Delete</button></picture></div>";
                // adding the divs
                document.getElementById("cart").innerHTML = html;
            }
        }
    });
}