/**
 * 
 */

var buyGoods = new Vue({
    el:'#buy-goods',
    data:{
        goodList:[
        	{
        		order:'01',
        		num:'6901285991219',
        		name:'怡宝纯净水',
        		unit:'555ml',
        		price:'2.00',
        		quantity:'1',
        		discount:'0.00',
        		amount:'2.00'
        	},
        	{
        		order:'02',
        		num:'6901285991220',
        		name:'雪花啤酒',
        		unit:'555ml',
        		price:'5.00',
        		quantity:'1',
        		discount:'0.00',
        		amount:'5.00'
        	},
	    ]
	}
});

var btn1 = new Vue({
	el:'#btn1',
	methods:{
		layui12:function() {
			layer.msg('内容', {time:1000});
			// layer.open({
			// 	title:'hello',
			// 	content:'1234',
			// 	btn:'yes'
			// });
		}
	}
});
