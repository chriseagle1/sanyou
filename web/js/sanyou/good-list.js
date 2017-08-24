/**
 * 
 */

 var manageGoods = new Vue({
 	el:"#manageGoods",
 	data:{
 		productList:[],
 		productNo:'',
 		productTotal:'',
 		productPrice:'',
 		productRemark:''
 	},
 	methods:{
 		addProduct:function() {
			var inList = 0;
			this.productList.some(function(item){
				if (item.no == manageGoods.productNo) {
					inList = 1;
					item.number = parseInt(item.number) + parseInt(manageGoods.productTotal);
				}
			});
			
			if (inList === 0) {
				this.productList.push({
 				sort:this.productList.length + 1,
 				no:this.productNo,
 				name:'',
 				specification: '',
 				unit:'',
 				price:this.productPrice,
 				number:this.productTotal,
 				discount:0.00,
 				remark:this.productRemark
 			});
			}
 			
 		}
 	}
 });