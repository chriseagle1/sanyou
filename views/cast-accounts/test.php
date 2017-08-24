<div class="upload-batch">
	<button class="btn btn-default btn-file" type="button" data-type="product">批量导入</button>
	<button class="btn btn-default" id="btn1" @click="layui12">say hello</button>
</div>
<div class="left-list" id="buy-goods">
	<div class="table-list">
		<table class="table table-hover">
		  <thead>
		  	<th>序号</th><th>条形码</th><th>名称</th><th>单位</th>
		  	<th>单价(￥)</th><th>数量</th><th>折扣</th><th>金额(￥)</th>
		  </thead>
		  <tbody class="good-list">
	  	     <tr :class="{activeGood:good.isActive}" v-for="good,index in goodList">
		  	    <td>{{good.order}}</td><td>{{good.num}}</td><td>{{good.name}}</td><td>{{good.unit}}</td>
		  		<td>{{good.price}}</td><td>{{good.quantity}}</td><td>{{good.discount}}</td><td>{{good.amount}}</td>
		  	</tr>
		  </tbody>
		</table>
	</div>

	<div class="curr-statistic">
		<div class="good-info">
			<div class="good-total">共<span class="total-buy">{{total}}</span>件商品，合计￥&nbsp;&nbsp;{{amount}}</div>
			<div class="discount-info">折扣 ￥&nbsp;&nbsp;0.00</div> 
		</div>

		<div class="pay-info">
			<div class="have-pay">
				实付：<span class="pay-money">￥0.00</span>
			</div>
			<div class="last-pay">
				<div>上次已付￥ 0.00</div>
				<div>上次找零￥ 0.00</div>
			</div>
		</div>
	</div>
</div>