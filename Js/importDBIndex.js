// when the page is loaded start BasketUpdate and
// get items in your cart
$(document).ready(function() {
    getDBresult();
    BasketUpdate();
});
// gets the string inputed in the search bar
// and calls getDBresult method
$('#search').keyup(function() {
    var search = $('#search').val();
    if (search != '') {
        getDBresult(search);
    } else {
        getDBresult();
    }
});
// POSTs filter attributes of items to the server to receive
// json file which displays those items
function getDBresult($query) {
    // gets all values from radio buttons 
    $BrandVal = $('input[name="BrandID"]:checked').val();
    $CategoryVal = $('input[name="CategoryID"]:checked').val();
    $PriceVal = $('input[name="Price"]:checked').val();
    $StockVal = $('input[name="Stock"]:checked').val();
    $RateVal = $('input[name="Rate"]:checked').val();
    // POSTs the values
    $.ajax({
        type: "POST",
        url: "php/data.php",
        data: { query: $query, BrandID: $BrandVal, CategoryID: $CategoryVal, Price: $PriceVal, Stock: $StockVal, Rate: $RateVal },
        // on servers response
        success: function(data) {
            // parses the response to an array
            dataARR = JSON.parse(data);
            html = "";
            // for each object in array it appends the 
            // info into a html div
            for (var a = 0; a < dataARR.length; a++) {
                // gets data for each element in the object
                var _id = dataARR[a][0];
                var _name = dataARR[a][1];
                var _price = dataARR[a][2];
                var _stock = dataARR[a][4];
                // Editing text so it fits the DIVs
                var modStock = StockInfoMethod(_stock);
                var modText = TextLengthEdit(_name);
                // appending in html
                html += "<div class='item'><picture><img onclick=\"location.href='product.php?id=" + _id + "';\" src='img/" + _id + ".webp' class='img'><p>" + modText + "</p><p>" + _price + "€</p><p>" + modStock + "</p><button onClick='AddCookies(" + _id + "," + 1 + ")'>Add</button><button onClick='AddCookies(" + _id + "," + -1 + ")'>Subtract</button><button onClick='RemoveCookies(" + _id + ")'>Remove</button></picture></div > ";
                // adding the divs
                document.getElementById("item").innerHTML = html;
            }
        }
    });
}
