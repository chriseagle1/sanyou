<div class="head">
	<div class="title">三友收银</div>
	<div class="time-info">2017年8月20日 周日 22:00</div>
</div>
<div class="wrap-self">
	<div class="top-nav">
		<ul class="nav nav-tabs nav-self">
		  <li role="presentation"><a href="/cast-accounts/index">POS收银(F1)</a></li>
		  <li role="presentation" class="active"><a href="/good-list/index">商品管理(F3)</a></li>
		  <li role="presentation"><a href="#">后台(F5)</a></li>
		</ul>
	</div>
	<div class="content">
		<div class="add-good">
			<H4>添加商品：</H4>
			<div class="input-group self-add">
			  <span class="input-group-addon" id="basic-addon1">商品条码</span>
			  <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group self-add">  
			  <span class="input-group-addon" id="basic-addon2">入库数量</span>
			  <input type="text" class="form-control" placeholder="Number" aria-describedby="basic-addon2">
			</div>
			<div class="input-group self-add">  
			  <span class="input-group-addon">进货价￥</span>
			  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
			  <span class="input-group-addon">.00</span>
			</div>
			<div class="clear"></div>
			<div class="input-group good-remark">
				<span class="input-group-addon">商品备注</span>
				<textarea class="form-control" rows="3" cols="20"></textarea>
			</div>
			<button type="button" class="btn btn-default btn-lg active">添加</button>
		</div>
		<div class="clear"></div>
		<div class="table-grp">
			<div class="upload-batch">
				<button class="btn btn-default btn-file" type="button">批量导入</button>
			</div>
			<div class="table-list">
				<table class="table table-hover">
				  <thead>
				  	<th>序号</th><th>商品条码</th><th>商品名称</th><th>规格/单位</th>
				  	<th>售价(￥)</th><th>数量</th><th>折扣</th><th>备注</th>
				  </thead>
				  <tbody class="good-list">
				  	<tr class="active-good" v-for="product, index in productList">
				  		<td>{{product.sort}}</td><td>{{product.no}}</td><td>{{product.name}}</td>
				  		<td>{{product.specification}}/{{product.unit}}</td>
				  		<td>{{product.sellPrice}}</td><td>{{product.number}}</td><td>{{product.discount}}</td><td>0.00</td>
				  	</tr>
				  </tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>