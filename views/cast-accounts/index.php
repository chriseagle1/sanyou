<div class="head">
	<div class="title">三友收银</div>
	<div class="time-info">2017年8月20日 周日 22:00</div>
</div>
<div class="wrap-self">
	<div class="top-nav">
		<ul class="nav nav-tabs nav-self">
		  <li role="presentation" class="active"><a href="/cast-accounts/index">POS收银(F1)</a></li>
		  <li role="presentation"><a href="/good-list/index">商品管理(F3)</a></li>
		  <li role="presentation"><a href="#">后台(F5)</a></li>
		</ul>
	</div>
	<div class="content">
		<div class="left-list">
			<div class="table-list">
				<table class="table table-hover">
				  <thead>
				  	<th>序号</th><th>条形码</th><th>名称</th><th>单位</th>
				  	<th>单价(￥)</th><th>数量</th><th>折扣</th><th>金额(￥)</th>
				  </thead>
				  <tbody class="good-list" id="buy-goods">
			  	     <tr class="{activeGood:index==0}" v-for="good, index in goodList">
            	  	    <td>{{good.order}}</td><td>{{good.num}}</td><td>{{good.name}}</td><td>{{good.unit}}</td>
            	  		<td>{{good.price}}</td><td>{{good.quantity}}</td><td>{{good.discount}}</td><td>{{good.amount}}</td>
				  	</tr>
				  </tbody>
				</table>
			</div>
			<div class="curr-statistic">
				<div class="good-info">
					<div class="good-total">共<span class="total-buy">2</span>件商品，合计￥&nbsp;&nbsp;2.00</div>
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
		<div class="right-operator">
			<div class="operator-goods">
				<div class="btn-group group-self" role="group">
				  <button id="goodprice" type="button" class="btn btn-default btn-self">单价</button>
				  <button id="goodnum" type="button" class="btn btn-default btn-self">数量</button>
				  <button id="delgood" type="button" class="btn btn-default btn-self btn-delgood">删除</button>
				  <!-- <button id="money-box" type="button" class="btn btn-default btn-self">钱箱</button>
				  <button id="cancel" type="button" class="btn btn-default btn-self">取消</button>
				  <button id="guadan" type="button" class="btn btn-default btn-self">挂单</button> -->
				  <button id="settlement" type="button" class="btn btn-default btn-settle">结算</button>
				</div>
				
			</div>
			<div class="clear"></div>
			<div class="good-input">
				<input type="text" name="goodNum">
				<div class="keyboard">
					<div class="grp-num-btn">
						<div class="row-num">  
				            <div id="seven" class="button-num">7</div>  
				            <div id="eight" class="button-num">8</div>  
				            <div id="nine" class="button-num">9</div>
				        </div>
				        <div class="row-num">  
				            <div id="four" class="button-num">4</div>  
				            <div id="five" class="button-num">5</div>  
				            <div id="six" class="button-num">6</div>
				        </div> 
				        <div class="row-num">  
				            <div id="one" class="button-num">1</div>  
				            <div id="two" class="button-num">2</div>  
				            <div id="three" class="button-num">3</div>
				        </div>
				        <div class="row-rum">  
				            <div id="zero" class="button-num button-zero">0</div>  
				            <div id="point" class="button-num button-point">.</div>
				        </div> 
					</div>
					<div class="num-operator">
						<div id="del-num" class="btn-del-self">
							<div>删</div><div>除</div>
						</div>
						<div id="confirm-num" class="btn-confirm-self">
							<div>确</div><div>定</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>