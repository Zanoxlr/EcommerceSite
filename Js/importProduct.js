$(document).ready(function() {
    getProduct();
    BasketUpdate();

});
// requests to get data about a
// product by id
function getProduct() {
    // get the id in the url
    $val = window.location.href.split('=').pop();
    // ajax request
    $.ajax({
        type: "POST",
        url: "php/productDB.php",
        data: { id: $val },
        success: function(data) {
            // set the variables
            dataARR = JSON.parse(data);
            html = "";
            // set the values
            var _id = dataARR[0][0];
            var _name = dataARR[0][1];
            var _price = dataARR[0][4];
            var _stock = dataARR[0][5];

            // append in html
            html += "<div class='item'><picture><img onclick=\"location.href='product.php?id=" + _id + "';\" src='img/" + _id + ".webp' class='img'><p>" + _name + "</p><p>" + _price + "€</p><p>" + StockInfoMethod(_stock) + "</p><button onClick='AddCookies(" + _id + "," + 1 + ")'>Add</button><button onClick='AddCookies(" + _id + "," + -1 + ")'>Subtract</button><button onClick='RemoveCookies(" + _id + ")'>Delete</button></picture></div > ";;
            // replacing the text
            document.getElementById("productDIV").innerHTML = html;
        }
    });
}
