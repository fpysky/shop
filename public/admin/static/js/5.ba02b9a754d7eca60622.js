webpackJsonp([5],{"5aCZ":function(t,e,i){"use strict";var n=i("rVsN"),o=i.n(n),s=i("ZLEe"),r=i.n(s),a={name:"editorSlideUpload",props:{color:{type:String,default:"#1890ff"}},data:function(){return{dialogVisible:!1,listObj:{},fileList:[],uploadUrl:""}},created:function(){this.uploadUrl="https://shop.test//api/admin/uploadImage"},methods:{checkAllSuccess:function(){var t=this;return r()(this.listObj).every(function(e){return t.listObj[e].hasSuccess})},handleSubmit:function(){var t=this,e=r()(this.listObj).map(function(e){return t.listObj[e]});this.checkAllSuccess()?(console.log(e),this.$emit("successCBK",e),this.listObj={},this.fileList=[],this.dialogVisible=!1):this.$message("请等待所有图片上传成功 或 出现了网络问题，请刷新页面重新上传！")},handleSuccess:function(t,e){for(var i=e.uid,n=r()(this.listObj),o=0,s=n.length;o<s;o++)if(this.listObj[n[o]].uid===i)return this.listObj[n[o]].url="https://shop.test/"+t.path,void(this.listObj[n[o]].hasSuccess=!0)},handleRemove:function(t){for(var e=t.uid,i=r()(this.listObj),n=0,o=i.length;n<o;n++)if(this.listObj[i[n]].uid===e)return void delete this.listObj[i[n]]},beforeUpload:function(t){var e=this,i=window.URL||window.webkitURL,n=t.uid;return this.listObj[n]={},new o.a(function(o,s){var r=new Image;r.src=i.createObjectURL(t),r.onload=function(){e.listObj[n]={hasSuccess:!1,uid:t.uid,width:this.width,height:this.height}},o(!0)})}}},l={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"upload-container"},[i("el-button",{style:{background:t.color,borderColor:t.color},attrs:{icon:"el-icon-upload",size:"mini",type:"primary"},on:{click:function(e){t.dialogVisible=!0}}},[t._v("上传图片\n  ")]),t._v(" "),i("el-dialog",{attrs:{visible:t.dialogVisible},on:{"update:visible":function(e){t.dialogVisible=e}}},[i("el-upload",{staticClass:"editor-slide-upload",attrs:{action:t.uploadUrl,multiple:!0,"file-list":t.fileList,"show-file-list":!0,"list-type":"picture-card","on-remove":t.handleRemove,"on-success":t.handleSuccess,"before-upload":t.beforeUpload}},[i("el-button",{attrs:{size:"small",type:"primary"}},[t._v("点击上传")])],1),t._v(" "),i("el-button",{on:{click:function(e){t.dialogVisible=!1}}},[t._v("取 消")]),t._v(" "),i("el-button",{attrs:{type:"primary"},on:{click:t.handleSubmit}},[t._v("确 定")])],1)],1)},staticRenderFns:[]};var c=["advlist anchor autolink autosave code codesample colorpicker colorpicker contextmenu directionality emoticons fullscreen hr image imagetools importcss insertdatetime link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount"],d=["bold italic underline strikethrough alignleft aligncenter alignright outdent indent  blockquote undo redo removeformat subscript superscript code codesample","hr bullist numlist link image charmap preview anchor pagebreak insertdatetime media table emoticons forecolor backcolor fullscreen"],u={name:"tinymce",components:{editorImage:i("vSla")(a,l,!1,function(t){i("GWay")},"data-v-4624ac28",null).exports},props:{id:{type:String},value:{type:String,default:""},toolbar:{type:Array,required:!1,default:function(){return[]}},menubar:{default:"file edit insert view format table"},height:{type:Number,required:!1,default:360}},data:function(){return{hasChange:!1,hasInit:!1,tinymceId:this.id||"vue-tinymce-"+ +new Date,fullscreen:!1}},watch:{value:function(t){var e=this;!this.hasChange&&this.hasInit&&this.$nextTick(function(){return window.tinymce.get(e.tinymceId).setContent(t||"")})}},mounted:function(){this.initTinymce()},activated:function(){this.initTinymce()},deactivated:function(){this.destroyTinymce()},methods:{initTinymce:function(){var t=this,e=this;window.tinymce.init({selector:"#"+this.tinymceId,height:this.height,body_class:"panel-body ",object_resizing:!1,toolbar:this.toolbar.length>0?this.toolbar:d,menubar:this.menubar,plugins:c,end_container_on_empty_block:!0,powerpaste_word_import:"clean",code_dialog_height:450,code_dialog_width:1e3,advlist_bullet_styles:"square",advlist_number_styles:"default",imagetools_cors_hosts:["www.tinymce.com","codepen.io"],default_link_target:"_blank",link_title:!1,nonbreaking_force_tab:!0,init_instance_callback:function(i){e.value&&i.setContent(e.value),e.hasInit=!0,i.on("NodeChange Change KeyUp SetContent",function(){t.hasChange=!0,t.$emit("input",i.getContent())})},setup:function(t){t.on("FullscreenStateChanged",function(t){e.fullscreen=t.state})}})},destroyTinymce:function(){window.tinymce.get(this.tinymceId)&&window.tinymce.get(this.tinymceId).destroy()},setContent:function(t){window.tinymce.get(this.tinymceId).setContent(t)},getContent:function(){window.tinymce.get(this.tinymceId).getContent()},imageSuccessCBK:function(t){var e=this;t.forEach(function(t){window.tinymce.get(e.tinymceId).insertContent('<img class="wscnph" src="'+t.url+'" >')})}},destroyed:function(){this.destroyTinymce()}},p={render:function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"tinymce-container editor-container",class:{fullscreen:this.fullscreen}},[e("textarea",{staticClass:"tinymce-textarea",attrs:{id:this.tinymceId}}),this._v(" "),e("div",{staticClass:"editor-custom-btn-container"},[e("editorImage",{staticClass:"editor-upload-btn",attrs:{color:"#1890ff"},on:{successCBK:this.imageSuccessCBK}})],1)])},staticRenderFns:[]};var h=i("vSla")(u,p,!1,function(t){i("B11H")},"data-v-5d978109",null);e.a=h.exports},"7hk0":function(t,e,i){var n=i("P4mw");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);i("8bSs")("407f0ade",n,!0)},Alkh:function(t,e,i){(t.exports=i("BkJT")(!1)).push([t.i,"\n.editor-slide-upload[data-v-4624ac28] {\n  margin-bottom: 20px;\n}\n.editor-slide-upload[data-v-4624ac28] .el-upload--picture-card {\n    width: 100%;\n}\n",""])},B11H:function(t,e,i){var n=i("sgWK");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);i("8bSs")("356ac33c",n,!0)},GWay:function(t,e,i){var n=i("Alkh");"string"==typeof n&&(n=[[t.i,n,""]]),n.locals&&(t.exports=n.locals);i("8bSs")("8cbead12",n,!0)},P4mw:function(t,e,i){(t.exports=i("BkJT")(!1)).push([t.i,"\ninput[type=file] {\n     display: none;\n}\n.avatar-uploader .el-upload {\n    border: 1px dashed #d9d9d9;\n    border-radius: 6px;\n    cursor: pointer;\n    position: relative;\n    overflow: hidden;\n}\n.avatar-uploader .el-upload:hover {\n    border-color: #409EFF;\n}\n.avatar-uploader-icon {\n    font-size: 28px;\n    color: #8c939d;\n    width: 178px;\n    height: 178px;\n    line-height: 178px;\n    text-align: center;\n}\n.avatar {\n    width: 178px;\n    height: 178px;\n    display: block;\n}\n",""])},f9a6:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=i("OcO9"),o=i("UgCr"),s={name:"create",components:{Tinymce:i("5aCZ").a},data:function(){return{productForm:{title:"",product_classify_id:"",image:"",description:"",on_sale:!1,desc:""},productRules:{title:[{required:!0,message:"请输入商品名称",trigger:"blur"}],desc:[{required:!0,message:"请输入商品简介(简短)",trigger:"blur"}],product_classify_id:[{required:!0,message:"请选择商品分类",trigger:"blur"}],image:[{required:!0,message:"请上传封面图",trigger:"blur"}]},secondRootClassify:[],imageUrl:"",error:!1,errors:{},submiting:!1,uploadUrl:""}},created:function(){this.uploadUrl="https://shop.test//api/admin/uploadImage",this.getSecondRootClassify()},methods:{handleAvatarSuccess:function(t,e){this.productForm.image="https://shop.test/"+e.response.path},beforeAvatarUpload:function(t){var e=t.size/1024/1024<2;return e||this.$message.error("上传头像图片大小不能超过 2MB!"),e},getSecondRootClassify:function(){var t=this;Object(n.e)().then(function(e){t.secondRootClassify=e.data})},handleRemove:function(t,e){console.log(t,e)},handlePictureCardPreview:function(t){this.imageDialogImageUrl=t.response.path,this.imageDialogVisible=!0},handleSuccess:function(t,e,i){this.productForm.image="https://shop.test/"+e.response.path},submitForm:function(t){var e=this;this.$refs[t].validate(function(t){if(!t)return!1;e.submiting=!0,Object(o.h)(e.productForm).then(function(t){e.submiting=!1,e.$router.push({path:"/products/products"})}).catch(function(t){e.error=!0,e.errors=t.response.data.errors,e.submiting=!1})})}}},r={render:function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("div",{staticClass:"app-container"},[i("div",{staticStyle:{width:"83%",margin:"0 auto"}},[i("el-form",{ref:"productForm",attrs:{model:t.productForm,rules:t.productRules,"label-width":"130px"}},[i("el-form-item",{attrs:{label:"商品名称：",prop:"title"}},[i("el-input",{attrs:{placeholder:"商品名称"},model:{value:t.productForm.title,callback:function(e){t.$set(t.productForm,"title",e)},expression:"productForm.title"}})],1),t._v(" "),i("el-form-item",{attrs:{label:"商品分类：",prop:"product_classify_id"}},[i("el-select",{staticStyle:{width:"100%"},attrs:{placeholder:"商品分类"},model:{value:t.productForm.product_classify_id,callback:function(e){t.$set(t.productForm,"product_classify_id",e)},expression:"productForm.product_classify_id"}},t._l(t.secondRootClassify,function(t){return i("el-option",{key:t.id,attrs:{label:t.name,value:t.id}})}))],1),t._v(" "),i("el-form-item",{attrs:{label:"封面图片：",prop:"image"}},[i("el-upload",{staticClass:"avatar-uploader",attrs:{action:t.uploadUrl,"show-file-list":!1,"on-success":t.handleAvatarSuccess,"before-upload":t.beforeAvatarUpload}},[t.productForm.image?i("img",{staticClass:"avatar",attrs:{src:t.productForm.image}}):i("i",{staticClass:"el-icon-plus avatar-uploader-icon"})])],1),t._v(" "),i("el-form-item",{attrs:{label:"商品描述(简短)：",prop:"desc"}},[i("el-input",{attrs:{placeholder:"一句话描述"},model:{value:t.productForm.desc,callback:function(e){t.$set(t.productForm,"desc",e)},expression:"productForm.desc"}})],1),t._v(" "),i("el-form-item",{attrs:{label:"商品描述："}},[[i("div",{staticClass:"editor-container"},[i("Tinymce",{ref:"editor",attrs:{height:400},model:{value:t.productForm.description,callback:function(e){t.$set(t.productForm,"description",e)},expression:"productForm.description"}})],1)]],2),t._v(" "),i("el-form-item",[i("el-button",{attrs:{loading:t.submiting,type:"primary"},on:{click:function(e){t.submitForm("productForm")}}},[t._v("确定")])],1)],1)],1)])},staticRenderFns:[]};var a=i("vSla")(s,r,!1,function(t){i("7hk0")},null,null);e.default=a.exports},sgWK:function(t,e,i){(t.exports=i("BkJT")(!1)).push([t.i,"\n.tinymce-container[data-v-5d978109] {\r\n  position: relative;\n}\n.tinymce-container[data-v-5d978109] .mce-fullscreen {\r\n  z-index: 10000;\n}\n.tinymce-textarea[data-v-5d978109] {\r\n  visibility: hidden;\r\n  z-index: -1;\n}\n.editor-custom-btn-container[data-v-5d978109] {\r\n  position: absolute;\r\n  right: 4px;\r\n  top: 4px;\r\n  /*z-index: 2005;*/\n}\n.fullscreen .editor-custom-btn-container[data-v-5d978109] {\r\n  z-index: 10000;\r\n  position: fixed;\n}\n.editor-upload-btn[data-v-5d978109] {\r\n  display: inline-block;\n}\r\n",""])}});