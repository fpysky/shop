webpackJsonp([8],{"1CLz":function(t,s,e){"use strict";Object.defineProperty(s,"__esModule",{value:!0});var a=e("6jZc"),c=e("vdon"),i=e("c+FZ"),l={name:"cart",components:{Header:a.a,Footer:c.a},data:function(){return{cartList:[],amount:1,total:0,page:1,selectAll:!1,selects:[],multipleSelection:[],submitAbled:!1}},created:function(){this.fetchCartList()},methods:{settle:function(){var t=this;this.submitAbled&&Object(i.d)({cartIdCollection:this.multipleSelection}).then(function(s){t.$router.push({name:"/addOrder",params:{settle:s.data.list}})}).catch(function(s){t.$notify.warning(s.response.data.message)})},handleSelectChane:function(t,s){var e=this;if(t&&(this.selectAll?(this.multipleSelection=[],this.selectAll=!1,this.selects.forEach(function(t){t.select=!1})):(this.cartList.forEach(function(t){e.multipleSelection.push(t.id)}),this.selects.forEach(function(t){t.select=!0}),this.selectAll=!0)),s)if(s.select){var a=this.multipleSelection.indexOf(s.id);this.multipleSelection.splice(a,1),s.select=!1}else this.multipleSelection.push(s.id),s.select=!0;this.multipleSelection.length>0?(this.submitAbled=!0,this.$refs.cartSubmit.removeAttribute("disabled")):(this.submitAbled=!1,this.$refs.cartSubmit.setAttribute("disabled","disabled"))},handleChange:function(t,s){var e=this;Object(i.e)({id:s,amount:t}).then(function(t){e.$notify.success("购物车商品更新成功")}).catch(function(t){e.$notify.warning(t.response.data.message)})},fetchCartList:function(){var t=this;Object(i.b)().then(function(s){t.cartList=s.data.list,t.total=s.data.total,t.cartList.forEach(function(s){s.productSku.image="http://shop.test/"+s.productSku.image,t.selects.push({id:s.id,select:!1})})}).catch(function(t){})}}},r={render:function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",[e("Header"),t._v(" "),e("div",{staticClass:"cart"},[e("div",{staticClass:"mzcontainer"},[e("table",{staticClass:"cart-header"},[e("tbody",[e("tr",[e("td",{staticClass:"cart-col-select"},[e("div",{staticClass:"cart-select-all JSelectAll",attrs:{"data-mdesc":"全选按钮","data-mtype":"store_cart_all"}},[e("div",{class:t.selectAll?"mz-checkbox checked":"mz-checkbox",on:{click:function(s){t.handleSelectChane(!0,!1)}}}),t._v(" "),e("span",{staticClass:"cart-select-title"},[t._v("全选")])])]),t._v(" "),e("td",{staticClass:"cart-col-price"},[t._v("单价(元)")]),t._v(" "),e("td",{staticClass:"cart-col-number"},[t._v("数量")]),t._v(" "),e("td",{staticClass:"cart-col-total"},[t._v("小计(元)")]),t._v(" "),e("td",{staticClass:"cart-col-ctrl",attrs:{id:"J-cartHearCtrl"}},[t._v("编辑")])])])]),t._v(" "),e("ul",{staticClass:"cart-merchant-list"},[e("li",{staticClass:"cart-merchant"},[t._m(0),t._v(" "),e("table",{staticClass:"cart-merchant-body"},t._l(t.cartList,function(s,a){return e("tr",{key:a,staticClass:"cart-product hasTheBinder"},[e("td",{staticClass:"cart-col-select",attrs:{td:""}},[e("div",{class:t.selects[a].select?"mz-checkbox checked":"mz-checkbox",on:{click:function(s){t.handleSelectChane(!1,t.selects[a])}}}),t._v(" "),e("a",{staticClass:"cart-product-link",attrs:{href:"//detail.meizu.com/item/meizu15.html?skuId=7146",target:"_blank","data-mdesc":"购物车商品位","data-mtype":"store_cart_prod"}},[e("img",{staticClass:"cart-product-img",staticStyle:{display:"inline"},attrs:{alt:"魅族 15",src:s.productSku.image}})]),t._v(" "),e("a",{staticClass:"cart-product-link cart-product-info",attrs:{href:"//detail.meizu.com/item/meizu15.html?skuId=7146",target:"_blank","data-mdesc":"购物车商品位","data-mtype":"store_cart_prod"}},[e("p",{staticClass:"cart-product-item-name",domProps:{textContent:t._s(s.productSku.title)}}),t._v(" "),e("p",{staticClass:"cart-product-desc",domProps:{textContent:t._s(s.productSku.description)}})])]),t._v(" "),e("td",{staticClass:"cart-col-price"},[e("p",[e("span",{staticClass:"cart-product-price",domProps:{textContent:t._s(s.productSku.price)}})])]),t._v(" "),e("td",{staticClass:"cart-col-number"},[e("el-input-number",{attrs:{size:"small",min:1},on:{change:function(e){t.handleChange(e,s.id)}},model:{value:s.amount,callback:function(e){t.$set(s,"amount",e)},expression:"item.amount"}})],1),t._v(" "),e("td",{staticClass:"cart-col-total"},[e("span",{staticClass:"cart-product-price total main-goods",domProps:{textContent:t._s(s.productSku.price*s.amount)}})]),t._v(" "),t._m(1,!0)])}))])])]),t._v(" "),e("div",{staticClass:"cart-footer",attrs:{id:"cartFooter"}},[e("div",{staticClass:"mzcontainer"},[e("div",{staticClass:"cart-footer-left"},[e("div",{staticClass:"cart-select-all JSelectAll",attrs:{"data-mdesc":"全选按钮","data-mtype":"store_cart_all"}},[e("div",{class:t.selectAll?"mz-checkbox checked":"mz-checkbox",on:{click:function(s){t.handleSelectChane(!0,!1)}}}),t._v(" "),e("span",{staticClass:"cart-select-title"},[t._v("全选")])]),t._v(" "),e("span",{staticClass:"cart-remove-selected",attrs:{"data-mdesc":"删除选中商品","data-mtype":"store_cart_batch",id:"removeSelected"}},[t._v("删除选中的商品")]),t._v(" "),t._m(2)]),t._v(" "),e("div",{staticClass:"cart-footer-right"},[t._m(3),t._v(" "),e("div",{ref:"cartSubmit",staticClass:"mz-btn success to-order-btn",attrs:{id:"cartSubmit","data-mdesc":"去结算按钮","data-mtype":"store_cart_checkout",disabled:"disabled"},on:{click:t.settle}},[t._v("去结算")])])])])]),t._v(" "),e("Footer")],1)},staticRenderFns:[function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"cart-merchant-header"},[s("div",{staticClass:"cart-select-all"},[s("div",{staticClass:"mz-checkbox"}),this._v(" "),s("span",{staticClass:"cart-select-title"},[this._v("魅族")])]),this._v(" "),s("div",{staticClass:"cart-select-fee"},[s("span",{staticClass:"cart-free"},[this._v("已免邮费")])])])},function(){var t=this.$createElement,s=this._self._c||t;return s("td",{staticClass:"cart-col-ctrl"},[s("div",{staticClass:"cart-product-remove ",attrs:{"data-mdesc":"删除单个商品按钮","data-mtype":"store_cart_del"}})])},function(){var t=this.$createElement,s=this._self._c||t;return s("span",{staticClass:"cart-footer-count"},[this._v("\n                共"),s("span",{staticClass:"cart-footer-num",attrs:{id:"totalCount"}},[this._v("1")]),this._v("件商品，\n                已选择"),s("span",{staticClass:"cart-footer-num blue",attrs:{id:"totalSelectedCount"}},[this._v("0")]),this._v("件\n                ")])},function(){var t=this.$createElement,s=this._self._c||t;return s("span",{staticClass:"cart-footer-sum"},[this._v("\n                已优惠"),s("span",{staticClass:"cart-footer-num red",attrs:{id:"totalDiscount"}},[this._v("0.00")]),this._v("元，\n                合计(不含运费)："),s("span",{staticClass:"cart-footer-total",attrs:{id:"totalPrice"}},[this._v("0.00")])])}]};var n=e("C7Lr")(l,r,!1,function(t){e("NT5i")},"data-v-168e5630",null);s.default=n.exports},NT5i:function(t,s){}});
//# sourceMappingURL=8.fe9732a865a2dbe5779f.js.map