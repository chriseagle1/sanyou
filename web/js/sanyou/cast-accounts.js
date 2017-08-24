/**
 * 
 */

var buyGoods = new Vue({
    el:'#buy-goods',
    data:{
        goodList:[
        	{
        		order:'1',
        		num:'6901285991219',
        		name:'怡宝纯净水',
        		unit:'555ml',
        		price:'2.00',
        		quantity:'1',
        		discount:'0.00',
        		amount:'2.00',
        		isActive:1
        	},
        	// {
        	// 	order:'2',
        	// 	num:'6901285991220',
        	// 	name:'雪花啤酒',
        	// 	unit:'555ml',
        	// 	price:'5.00',
        	// 	quantity:'1',
        	// 	discount:'0.00',
        	// 	amount:'5.00',
        	// 	isActive:0
        	// },
	    ],
	    total:1,
	    amount:2.00.toFixed(2)
	}
});

var prodNo = '6956416200067';
var btn1 = new Vue({
	el:'#btn1',
	methods:{
		layui12:function() {
			
			var inList = 0;
			buyGoods.goodList.forEach(function(item){
				item.isActive = 0;
				if (item.num == prodNo) {
					item.quantity = parseInt(item.quantity) + 1;
					item.amount = parseFloat(item.price * item.quantity).toFixed(2);
					item.isActive = 1;
					inList = 1;
					buyGoods.total++;
					buyGoods.amount =(parseFloat(buyGoods.amount) + parseFloat(item.price)).toFixed(2);
				}
			});

			if (inList == 0) {
				var len = buyGoods.goodList.length;

				$.ajax({
					url: '/ajax/sanyou/cast-account/ajax-query-good',
					type: 'POST',
					dataType: 'json',
					data: {productNo: prodNo},
				})
				.done(function(res) {
					if (res.isSuccess) {
						var product = res.result;
						buyGoods.goodList.push({
							order:len + 1,
			        		num:product.num,
			        		name:product.name,
			        		unit:product.unit,
			        		price:product.price,
			        		quantity:'1',
			        		discount:'0.00',
			        		amount:product.price,
			        		isActive:1
						});
						buyGoods.total++;
						buyGoods.amount = (parseFloat(buyGoods.amount) + parseFloat(product.price)).toFixed(2);
					} else {
						layer.msg(res.message, {time:1000});
					}
				})
				.fail(function() {
					layer.msg('查询失败', {time:1000});
				})
				.always(function() {
					console.log("complete");
				});
			}
		}
	}
});
