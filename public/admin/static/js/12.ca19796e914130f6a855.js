webpackJsonp([12],{STSY:function(e,r,t){"use strict";r.b=function(e){return Object(s.a)({url:"api/admin/permission/roles",method:"get",params:e})},r.c=function(){return Object(s.a)({url:"api/admin/permission/getAllPermission",method:"get"})},r.d=function(e){return Object(s.a)({url:"api/admin/permission/getRolePermission",method:"get",params:e})},r.e=function(e){return Object(s.a)({url:"api/admin/permission/roles",method:"post",data:e})},r.a=function(e){return Object(s.a)({url:"api/admin/permission/roles",method:"delete",data:e})};var s=t("vLgD")},"hDE/":function(e,r,t){"use strict";Object.defineProperty(r,"__esModule",{value:!0});var s=t("STSY"),i={name:"createRole",data:function(){return{ruleForm:{id:0,name:"",permissions:[]},rules:{name:[{required:!0,message:"请输入角色名称",trigger:"blur"}],permissions:[{required:!0,message:"请选择权限",trigger:"change"}]},permissions:[]}},created:function(){this.$route.params.permissions&&(this.permissions=this.$route.params.permissions);var e=this.$route.params.role;e&&(this.ruleForm.id=e.id,this.ruleForm.name=e.name,this.getRolePermission(e.id))},methods:{submitForm:function(e){var r=this;this.$refs[e].validate(function(e){if(!e)return!1;Object(s.e)(r.ruleForm).then(function(e){r.$message.success("操作成功"),r.$router.push({path:"/permission/roles"})}).catch(function(e){r.$message.warning(e.response.data.message)})})},getRolePermission:function(e){var r=this;Object(s.d)({id:e}).then(function(e){r.ruleForm.permissions=e.data.list}).catch(function(e){console.log(e)})}}},n={render:function(){var e=this,r=e.$createElement,t=e._self._c||r;return t("div",{staticClass:"app-container",staticStyle:{width:"50%",margin:"20px auto"}},[t("el-form",{ref:"ruleForm",staticStyle:{width:"30%"},attrs:{model:e.ruleForm,rules:e.rules,"label-width":"100px"}},[t("el-form-item",{attrs:{label:"角色名称：",prop:"name"}},[t("el-input",{model:{value:e.ruleForm.name,callback:function(r){e.$set(e.ruleForm,"name",r)},expression:"ruleForm.name"}})],1),e._v(" "),t("el-form-item",{attrs:{label:"角色授权:",prop:"permissions"}},[t("el-checkbox-group",{attrs:{size:"small"},model:{value:e.ruleForm.permissions,callback:function(r){e.$set(e.ruleForm,"permissions",r)},expression:"ruleForm.permissions"}},e._l(e.permissions,function(r){return t("el-checkbox",{key:r.id,attrs:{label:r.id,border:""}},[t("span",{domProps:{textContent:e._s(r.name)}})])}))],1),e._v(" "),t("el-form-item",[t("el-button",{attrs:{type:"primary"},on:{click:function(r){e.submitForm("ruleForm")}}},[e._v("确定")])],1)],1)],1)},staticRenderFns:[]},o=t("vSla")(i,n,!1,null,null,null);r.default=o.exports}});