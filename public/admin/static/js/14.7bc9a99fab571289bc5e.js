webpackJsonp([14],{NR1Y:function(e,r,t){"use strict";Object.defineProperty(r,"__esModule",{value:!0});var i=t("vZz+"),o={name:"createPermission",data:function(){return{ruleForm:{id:0,name:"",icon:"",route:"",pid:0},rules:{name:[{required:!0,message:"请输入权限名称",trigger:"blur"}],route:[{required:!0,message:"请输入权限路由",trigger:"blur"}]},pidOptions:[]}},created:function(){this.$route.params.pidOptions&&(this.pidOptions=this.$route.params.pidOptions);var e=this.$route.params.permission;e&&(this.ruleForm.id=e.id,this.ruleForm.name=e.name,this.ruleForm.icon=e.icon,this.ruleForm.route=e.route,this.ruleForm.pid=e.pid)},methods:{submitForm:function(e){var r=this;this.$refs[e].validate(function(e){if(!e)return console.log("error submit!!"),!1;Object(i.d)(r.ruleForm).then(function(e){r.$message.success("操作成功"),r.$router.push({path:"/permission/permissions"})}).catch(function(e){r.$message.warning(e.response.data.message)})})}}},s={render:function(){var e=this,r=e.$createElement,t=e._self._c||r;return t("div",{staticClass:"app-container",staticStyle:{width:"50%",margin:"20px auto"}},[t("el-form",{ref:"ruleForm",attrs:{model:e.ruleForm,rules:e.rules,"label-width":"100px"}},[t("el-form-item",{attrs:{label:"权限层级:",prop:"pid"}},[t("el-select",{attrs:{placeholder:"--请选择层级--"},model:{value:e.ruleForm.pid,callback:function(r){e.$set(e.ruleForm,"pid",r)},expression:"ruleForm.pid"}},e._l(e.pidOptions,function(e){return t("el-option",{key:e.value,attrs:{label:e.label,value:e.value}})}))],1),e._v(" "),t("el-form-item",{attrs:{label:"权限名称:",prop:"name"}},[t("el-input",{staticStyle:{width:"300px"},model:{value:e.ruleForm.name,callback:function(r){e.$set(e.ruleForm,"name",r)},expression:"ruleForm.name"}})],1),e._v(" "),t("el-form-item",{attrs:{label:"图标:",prop:"icon"}},[t("el-input",{staticStyle:{width:"300px"},model:{value:e.ruleForm.icon,callback:function(r){e.$set(e.ruleForm,"icon",r)},expression:"ruleForm.icon"}}),e._v(" "),t("a",{attrs:{target:"_blank",href:"http://fontawesome.dashgame.com/"}},[e._v("不知道格式?")])],1),e._v(" "),t("el-form-item",{attrs:{label:"权限路由:",prop:"route"}},[t("el-input",{staticStyle:{width:"300px"},model:{value:e.ruleForm.route,callback:function(r){e.$set(e.ruleForm,"route",r)},expression:"ruleForm.route"}})],1),e._v(" "),t("el-form-item",[t("el-button",{attrs:{type:"primary"},on:{click:function(r){e.submitForm("ruleForm")}}},[e._v("确定")])],1)],1)],1)},staticRenderFns:[]},n=t("vSla")(o,s,!1,null,null,null);r.default=n.exports},"vZz+":function(e,r,t){"use strict";r.b=function(e){return Object(i.a)({url:"api/admin/permission/permissions",method:"get",params:e})},r.c=function(){return Object(i.a)({url:"api/admin/permission/getPidOptions",method:"get"})},r.d=function(e){return Object(i.a)({url:"api/admin/permission/permissions",method:"post",data:e})},r.a=function(e){return Object(i.a)({url:"api/admin/permission/permissions",method:"delete",data:e})};var i=t("vLgD")}});