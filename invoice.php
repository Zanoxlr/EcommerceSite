<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/><title>Editable Invoice</title><style>*{margin:0;padding:0}body{font:14px/1.4 Georgia,serif}#page-wrap{width:800px;margin:0 auto}textarea{border:0;font:14px Georgia,Serif;overflow:hidden;resize:none}table{border-collapse:collapse}table td,table th{border:1px solid #000;padding:5px}#header{height:15px;width:100%;margin:20px 0;background:#222;text-align:center;color:#fff;font:bold 15px Helvetica,Sans-Serif;text-decoration:uppercase;letter-spacing:20px;padding:8px 0}#address{width:250px;height:150px;float:left}#customer{overflow:hidden}#customer-title{font-size:20px;font-weight:700;float:left}#meta{margin-top:1px;width:300px;float:right}#meta td{text-align:right}#meta td.meta-head{text-align:left;background:#eee}#meta td textarea{width:100%;height:20px;text-align:right}#items{clear:both;width:100%;margin:30px 0 0 0;border:1px solid #000}#items th{background:#eee}#items textarea{width:80px;height:50px}#items tr.item-row td{border:0;vertical-align:top}#items td.description{width:300px}#items td.item-name{width:175px}#items td.description textarea,#items td.item-name textarea{width:100%}#items td.total-line{border-right:0;text-align:right}#items td.total-value{border-left:0;padding:10px}#items td.total-value textarea{height:20px;background:0 0}#items td.balance{background:#eee}#items td.blank{border:0}#terms{text-align:center;margin:20px 0 0 0;position:absolute;bottom:30px;width:80%}#terms h5{text-transform:uppercase;font:13px Helvetica,Sans-Serif;letter-spacing:10px;border-bottom:1px solid #000;padding:0 0 8px 0;margin:0 0 8px 0}#terms textarea{width:100%;text-align:center}#items td.total-value textarea:focus,#items td.total-value textarea:hover,.delete:hover,textarea:focus,textarea:hover{background-color:#ef8}</style></head><body><div id="page-wrap"><textarea id="header">INVOICE</textarea><div style="clear:both"></div><div id="customer"> <textarea id="customer-title">zTECH</textarea> <table id="meta"> <tr> <td class="meta-head">Invoice ID</td><td><textarea>id</textarea></td></tr><tr> <td class="meta-head">Date</td><td><textarea id="date">date</textarea></td></tr><tr> <td class="meta-head">Amount Due</td><td><div class="due">cena</div></td></tr></table></div><table id="items"> <tr> <th>Item</th> <th>Unit Cost</th> <th>Quantity orderd</th> <th>Quantity got</th> <th>Price</th> </tr>
		  
		  <tr class="item-row">
		      <td class="description"><textarea>ASROCK X399 Phantom Gaming 6 TR4 ATX DDR4 RGB</textarea></td>
		      <td class="cost"><textarea>Monthly web</textarea></td>
		      <td><textarea class="qty">$650.00</textarea></td>
		      <td><textarea class="qty">1</textarea></td>
		      <td><span class="price">$650.00</span></td>
		  </tr>
		  
		  
		  <tr id="hiderow">
		    <td colspan="5"><br></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>This is a fake invoice, made by your order on zTECH site</textarea>
		</div>
	
	</div>
	
</body>

</html>