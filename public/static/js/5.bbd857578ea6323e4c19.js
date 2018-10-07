webpackJsonp([5],{If12:function(t,a,s){"use strict";Object.defineProperty(a,"__esModule",{value:!0});var e=s("6jZc"),i=s("vdon"),r=s("UgCr"),n=s("c+FZ"),c=s("TIfe"),o={name:"product",components:{Header:e.a,Footer:i.a},data:function(){return{product:{},images:{},currentImages:"",query:{id:0,attributes:[],color:""},amount:0}},created:function(){this.$route.params.id&&(this.query.id=this.$route.params.id),this.products()},methods:{addCart:function(){var t=this;Object(c.b)()?this.amount<0?this.$notify.warning("商品数量不得小于0"):Object(n.a)({sku_id:this.product.sku.id,amount:this.amount}).then(function(a){t.$notify.success("加入购物车成功")}).catch(function(a){t.$notify.warning(a.response.data.message)}):this.$router.push({name:"/login"})},buy:function(){var t=this;Object(c.b)()?this.amount<0?this.$notify.warning("商品数量不得小于0"):Object(n.a)({sku_id:this.product.sku.id,amount:this.amount}).then(function(a){t.$router.push({name:"/cart"})}).catch(function(a){t.$notify.warning(a.response.data.message)}):this.$router.push({name:"/login"})},handleChange:function(t){console.log(t)},changeSku:function(t,a){var s=this;t&&(this.query.color=t,this.product.images.forEach(function(a){a.value==t&&(s.images=a.images)})),a&&this.query.attributes.forEach(function(t){a.id==t.id&&(t.value=a.value)}),this.products()},handleImagesPreview:function(t){this.currentImages=t},products:function(){var t=this;Object(r.b)(this.query).then(function(a){t.product=a.data.list,t.product.images.forEach(function(a){a.images.forEach(function(t){t.url="http://shop.test/"+t.url}),a.value==t.product.sku.color&&(t.images=a.images)}),t.images.forEach(function(a,s){0==s&&(t.currentImages=a.url)}),t.query.attributes=JSON.parse(t.product.sku.attributes),t.query.color=t.product.sku.color}).catch(function(a){t.$message.warning(a.response.data.message)})}}},u={render:function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",[s("Header"),t._v(" "),s("div",{staticClass:"row container"},[s("div",{staticClass:"preview"},[s("div",{staticClass:"preview-booth"},[s("a",{attrs:{href:"javascript:;",id:"J_imgBooth"}},[s("img",{attrs:{src:t.currentImages,height:"560",width:"560",alt:""}})])]),t._v(" "),s("ul",{staticClass:"preview-thumb clearfix",attrs:{id:"J_previewThumb"}},t._l(t.images,function(a,e){return s("li",{key:e},[s("a",{attrs:{"data-mtype":"store_de_tp_2",href:"/"},on:{click:function(s){s.preventDefault(),t.handleImagesPreview(a.url)}}},[s("img",{attrs:{src:a.url,width:"80",height:"80"}})])])})),t._v(" "),t._m(0)]),t._v(" "),s("div",{staticClass:"property"},[s("div",{staticClass:"property-hd"},[s("h1",{domProps:{textContent:t._s(t.product.sku?t.product.sku.title:"")}}),t._v(" "),s("p",{staticClass:"mod-info ",domProps:{textContent:t._s(t.product.desc)}})]),t._v(" "),s("div",{staticClass:"property-sell"},[s("div",{staticClass:"property-sell-price clearfix"},[s("div",{staticClass:"mod-price"},[s("small",[t._v("¥")]),t._v(" "),s("span",{staticClass:"vm-money",attrs:{id:"J_price"},domProps:{textContent:t._s(t.product.sku?t.product.sku.price:"")}})]),t._v(" "),s("div",{staticClass:"mod-original",staticStyle:{display:"none"},attrs:{id:"J_originalPrice"}})])]),t._v(" "),s("div",{staticClass:"property-set"},[s("dl",{staticClass:"property-set-sale",attrs:{"data-property":"颜色分类"}},[s("dt",{staticClass:"vm-metatit"},[t._v("颜色分类")]),t._v(" "),s("dd",{staticClass:"clearfix"},t._l(t.product.images,function(a,e){return s("a",{key:e,class:a.value==t.query.color?"vm-sale-img selected":"vm-sale-img",attrs:{"data-value":"3:27062","data-mtype":"store_de_sp_2_1",href:"#",title:"雅金"},on:{click:function(s){t.changeSku(a.value,!1)}}},[s("img",{attrs:{src:a.images[0].url,width:"32",height:"32"}}),t._v(" "),s("span",{domProps:{textContent:t._s(a.value)}})])})),t._v(" "),t._l(t.product.productSkuAttribute,function(a,e){return s("div",{key:e},[s("dt",{staticClass:"vm-metatit",domProps:{textContent:t._s(a.name)}}),t._v(" "),s("dd",{staticClass:"clearfix"},t._l(a._child,function(i,r){return s("a",{key:r,class:a.id==t.query.attributes[e].id&&i==t.query.attributes[e].value?"vm-sale-img selected":"vm-sale-img",attrs:{"data-value":"3:27062","data-mtype":"store_de_sp_2_1",href:"#"},on:{click:function(s){t.changeSku(!1,{id:a.id,value:i})}}},[s("span",{domProps:{textContent:t._s(i)}})])}))])})],2)]),t._v(" "),s("div",{staticClass:"property-buy clearfix"},[s("p",{staticClass:"vm-message",attrs:{id:"J_message"}}),t._v(" "),s("dl",{staticClass:"property-buy-quantity"},[t._m(1),t._v(" "),s("dd",{staticClass:"clearfix"},[s("el-input-number",{attrs:{size:"small",min:1,max:10,label:"描述文字"},on:{change:t.handleChange},model:{value:t.amount,callback:function(a){t.amount=a},expression:"amount"}})],1)]),t._v(" "),s("div",{staticClass:"property-buy-action"},[s("a",{staticClass:"btn btn-primary btn-lg mr20",staticStyle:{display:"inline-block"},attrs:{"data-mtype":"store_de_buy",href:"javascript:void(0);",id:"J_btnBuy"},on:{click:t.buy}},[t._v("立即购买")]),t._v(" "),s("a",{staticClass:"btn btn-empty btn-lg hide",staticStyle:{display:"inline-block"},attrs:{"data-mtype":"store_de_cart",href:"javascript:void(0);",id:"J_btnAddCart"},on:{click:t.addCart}},[s("i"),t._v("加入购物车")]),t._v(" "),t._m(2),t._v(" "),s("span",{staticClass:"vm-service",attrs:{id:"J_panicBuyingWrap"}})])])])]),t._v(" "),s("Footer")],1)},staticRenderFns:[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"preview-action"},[a("a",{staticClass:"vm-favorite",attrs:{"data-mtype":"store_de_favorite",id:"J_favorite",href:"javascript:;"}},[a("i",{staticClass:"iconfont icon-favorite"}),this._v("收藏 ")]),this._v(" "),a("a",{staticClass:"compare-btn-list",attrs:{id:"J_compare","data-mtype":"store_de_compare"}},[a("i",{staticClass:"iconfont icon-duibi compare-duibi"}),a("span",[this._v("对比")])])])},function(){var t=this.$createElement,a=this._self._c||t;return a("dt",{staticClass:"vm-metatit"},[this._v("数"),a("span",{staticClass:"s-space"}),a("span",{staticClass:"s-space"}),this._v("量\n                    ")])},function(){var t=this.$createElement,a=this._self._c||t;return a("a",{staticClass:"btn btn-empty btn-lg hide",staticStyle:{display:"none"},attrs:{href:"javascript:void(0);","data-mtype":"store_de_remind",id:"J_btnRemind"}},[a("i"),this._v("开售提醒")])}]};var d=s("C7Lr")(o,u,!1,function(t){s("rP1y")},null,null);a.default=d.exports},UgCr:function(t,a,s){"use strict";a.b=function(t){return Object(e.a)({url:"api/products",method:"post",data:t})},a.a=function(){return Object(e.a)({url:"api/productClassify",method:"get"})};var e=s("vLgD")},rP1y:function(t,a){}});
//# sourceMappingURL=5.bbd857578ea6323e4c19.js.map