webpackJsonp([4],{COhG:function(n,t,e){var i=e("tYKe");"string"==typeof i&&(i=[[n.i,i,""]]),i.locals&&(n.exports=i.locals);e("8bSs")("5d7f2429",i,!0)},E4Ed:function(n,t,e){var i=e("ZHGY");"string"==typeof i&&(i=[[n.i,i,""]]),i.locals&&(n.exports=i.locals);e("8bSs")("98e081ca",i,!0)},"T+/8":function(n,t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=e("wAeJ");function o(n,t,e,i){var o=void 0!==window.screenLeft?window.screenLeft:screen.left,a=void 0!==window.screenTop?window.screenTop:screen.top,r=(window.innerWidth?window.innerWidth:document.documentElement.clientWidth?document.documentElement.clientWidth:screen.width)/2-e/2+o,s=(window.innerHeight?window.innerHeight:document.documentElement.clientHeight?document.documentElement.clientHeight:screen.height)/2-i/2+a,c=window.open(n,t,"toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, copyhistory=no, width="+e+", height="+i+", top="+s+", left="+r);window.focus&&c.focus()}var a={name:"social-signin",methods:{wechatHandleClick:function(n){this.$store.commit("SET_AUTH_TYPE",n);o("https://open.weixin.qq.com/connect/qrconnect?appid=xxxxx&redirect_uri="+encodeURIComponent("xxx/redirect?redirect="+window.location.origin+"/authredirect")+"&response_type=code&scope=snsapi_login#wechat_redirect",n,540,540)},tencentHandleClick:function(n){this.$store.commit("SET_AUTH_TYPE",n);o("https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=xxxxx&redirect_uri="+encodeURIComponent("xxx/redirect?redirect="+window.location.origin+"/authredirect"),n,540,540)}}},r={render:function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("div",{staticClass:"social-signup-container"},[e("div",{staticClass:"sign-btn",on:{click:function(t){n.wechatHandleClick("wechat")}}},[e("span",{staticClass:"wx-svg-container"},[e("svg-icon",{staticClass:"icon",attrs:{"icon-class":"wechat"}})],1),n._v(" 微信\n  ")]),n._v(" "),e("div",{staticClass:"sign-btn",on:{click:function(t){n.tencentHandleClick("tencent")}}},[e("span",{staticClass:"qq-svg-container"},[e("svg-icon",{staticClass:"icon",attrs:{"icon-class":"qq"}})],1),n._v(" QQ\n  ")])])},staticRenderFns:[]};var s=e("vSla")(a,r,!1,function(n){e("E4Ed")},"data-v-3b0e1e21",null).exports,c=(e("mZV3"),e("M9A7")),l={components:{LangSelect:i.a,SocialSign:s},name:"login",data:function(){return{loginForm:{username:"admin",password:"111111"},loginRules:{username:[{required:!0,trigger:"blur"}],password:[{required:!0,trigger:"blur"}]},passwordType:"password",loading:!1,showDialog:!1,isloading:!1,status:0,isValidate:!1}},methods:{_initGeetest:function(){var n=this;this.initGeetest(function(t){t.onSuccess(function(){n.isdisabled=!0,n.value="正在登录中...",n.loading=!0;var e=t.getValidate();if(e){var i={geetest_challenge:e.geetest_challenge,geetest_seccode:e.geetest_seccode,geetest_validate:e.geetest_validate,geetest_status:n.status};n.valiGeet(i)}else n.$Message.error("请先完成验证")}),t.onError(function(){n.$refs.captcha.innerHTML="",n.isdisabled=!1,n.value="登录"}),t.onReady(function(){n.isdisabled=!0,n.value="请完成验证"}),n.$refs.captcha.innerHTML="",t.appendTo("#captcha")})},valiGeet:function(n){var t=this;Object(c.e)(n).then(function(n){t.isValidate=!0,t.handleLogin()})},initGeetest:function(n){function t(t){return n.apply(this,arguments)}return t.toString=function(){return n.toString()},t}(function(n){var t=this;Object(c.a)().then(function(e){var i=e.data;t.status=i.status,initGeetest({gt:i.gt,challenge:i.challenge,offline:!i.success,new_captcha:i.new_captcha,product:"float",width:"448px"},n)})}),showPwd:function(){"password"===this.passwordType?this.passwordType="":this.passwordType="password"},handleLogin:function(){var n=this;this.$refs.loginForm.validate(function(t){if(!t)return console.log("error submit!!"),!1;n.isValidate?(n.loginForm.username=n.loginForm.username.trim(),n.loginForm.password=n.loginForm.password.trim(),n.loginForm.grant_type="password",n.loginForm.client_id=2,n.loginForm.client_secret="5IjevVN52Pe3GtiAy63WsViWfNj0L8igdscvcRtL",n.loginForm.scope="",n.loginForm.provider="adminers",n.loading=!0,n.$store.dispatch("LoginByUsername",n.loginForm).then(function(){n.loading=!1,n.$router.push({path:"/"})}).catch(function(t){n.loading=!1,n.$message.warning("用户名或密码错误"),n._initGeetest(),n.isValidate=!1})):n.$message.warning("请滑动以完成验证")})},afterQRScan:function(){}},created:function(){this._initGeetest()},destroyed:function(){}},p={render:function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("div",{staticClass:"login-container"},[e("el-form",{ref:"loginForm",staticClass:"login-form",attrs:{autoComplete:"on",model:n.loginForm,rules:n.loginRules,"label-position":"left"}},[e("div",{staticClass:"title-container"},[e("h3",{staticClass:"title"},[n._v(n._s(n.$t("login.title")))]),n._v(" "),e("lang-select",{staticClass:"set-language"})],1),n._v(" "),e("el-form-item",{attrs:{prop:"username"}},[e("span",{staticClass:"svg-container svg-container_login"},[e("svg-icon",{attrs:{"icon-class":"user"}})],1),n._v(" "),e("el-input",{attrs:{name:"username",type:"text",autoComplete:"on",placeholder:n.$t("login.username")},model:{value:n.loginForm.username,callback:function(t){n.$set(n.loginForm,"username",t)},expression:"loginForm.username"}})],1),n._v(" "),e("el-form-item",{attrs:{prop:"password"}},[e("span",{staticClass:"svg-container"},[e("svg-icon",{attrs:{"icon-class":"password"}})],1),n._v(" "),e("el-input",{attrs:{name:"password",type:n.passwordType,autoComplete:"on",placeholder:n.$t("login.password")},nativeOn:{keyup:function(t){if(!("button"in t)&&n._k(t.keyCode,"enter",13,t.key))return null;n.handleLogin(t)}},model:{value:n.loginForm.password,callback:function(t){n.$set(n.loginForm,"password",t)},expression:"loginForm.password"}}),n._v(" "),e("span",{staticClass:"show-pwd",on:{click:n.showPwd}},[e("svg-icon",{attrs:{"icon-class":"eye"}})],1)],1),n._v(" "),e("div",{staticStyle:{"margin-bottom":"22px"}},[e("div",{ref:"captcha",attrs:{id:"captcha"}},[n.isloading?e("p",{staticClass:"show",attrs:{id:"wait"}},[n._v("正在加载验证码......")]):n._e()])]),n._v(" "),e("el-button",{staticStyle:{width:"100%","margin-bottom":"30px"},attrs:{type:"primary",loading:n.loading},nativeOn:{click:function(t){t.preventDefault(),n.handleLogin(t)}}},[n._v(n._s(n.$t("login.logIn")))])],1),n._v(" "),e("el-dialog",{attrs:{title:n.$t("login.thirdparty"),visible:n.showDialog,"append-to-body":""},on:{"update:visible":function(t){n.showDialog=t}}},[n._v("\n    "+n._s(n.$t("login.thirdpartyTips"))+"\n    "),e("br"),n._v(" "),e("br"),n._v(" "),e("br"),n._v(" "),e("social-sign")],1)],1)},staticRenderFns:[]};var d=e("vSla")(l,p,!1,function(n){e("TzYR"),e("COhG")},"data-v-309f8432",null);t.default=d.exports},TzYR:function(n,t,e){var i=e("kHaI");"string"==typeof i&&(i=[[n.i,i,""]]),i.locals&&(n.exports=i.locals);e("8bSs")("e2a1f6be",i,!0)},ZHGY:function(n,t,e){(n.exports=e("BkJT")(!1)).push([n.i,"\n.social-signup-container[data-v-3b0e1e21] {\n  margin: 20px 0;\n}\n.social-signup-container .sign-btn[data-v-3b0e1e21] {\n    display: inline-block;\n    cursor: pointer;\n}\n.social-signup-container .icon[data-v-3b0e1e21] {\n    color: #fff;\n    font-size: 30px;\n    margin-top: 6px;\n}\n.social-signup-container .wx-svg-container[data-v-3b0e1e21],\n  .social-signup-container .qq-svg-container[data-v-3b0e1e21] {\n    display: inline-block;\n    width: 40px;\n    height: 40px;\n    line-height: 40px;\n    text-align: center;\n    padding-top: 1px;\n    border-radius: 4px;\n    margin-bottom: 20px;\n    margin-right: 5px;\n}\n.social-signup-container .wx-svg-container[data-v-3b0e1e21] {\n    background-color: #8dc349;\n}\n.social-signup-container .qq-svg-container[data-v-3b0e1e21] {\n    background-color: #6BA2D6;\n    margin-left: 50px;\n}\n",""])},aIIE:function(n,t){n.exports=function(n){if(!n.webpackPolyfill){var t=Object.create(n);t.children||(t.children=[]),Object.defineProperty(t,"loaded",{enumerable:!0,get:function(){return t.l}}),Object.defineProperty(t,"id",{enumerable:!0,get:function(){return t.i}}),Object.defineProperty(t,"exports",{enumerable:!0}),t.webpackPolyfill=1}return t}},kHaI:function(n,t,e){(n.exports=e("BkJT")(!1)).push([n.i,'\n@charset "UTF-8";\n/* 修复input 背景不协调 和光标变色 */\n/* Detail see https://github.com/PanJiaChen/vue-element-admin/pull/927 */\n@supports (-webkit-mask: none) and (not (cater-color: #fff)) {\n.login-container .el-input input {\n    color: #fff;\n}\n.login-container .el-input input::first-line {\n      color: #eee;\n}\n}\n/* reset element-ui css */\n.login-container .el-input {\n  display: inline-block;\n  height: 47px;\n  width: 85%;\n}\n.login-container .el-input input {\n    background: transparent;\n    border: 0px;\n    -webkit-appearance: none;\n    border-radius: 0px;\n    padding: 12px 5px 12px 15px;\n    color: #eee;\n    height: 47px;\n    caret-color: #fff;\n}\n.login-container .el-input input:-webkit-autofill {\n      -webkit-box-shadow: 0 0 0px 1000px #283443 inset !important;\n      -webkit-text-fill-color: #fff !important;\n}\n.login-container .el-form-item {\n  border: 1px solid rgba(255, 255, 255, 0.1);\n  background: rgba(0, 0, 0, 0.1);\n  border-radius: 5px;\n  color: #454545;\n}\n',""])},mZV3:function(n,t,e){"use strict";(function(n){var t,i,o=e("hRKE"),a=e.n(o);t="undefined"!=typeof window?window:this,i=function(n,t){if(void 0===n)throw new Error("Geetest requires browser environment");var e=n.document,i=n.Math,o=e.getElementsByTagName("head")[0];function r(n){this._obj=n}function s(n){var t=this;new r(n)._each(function(n,e){t[n]=e})}r.prototype={_each:function(n){var t=this._obj;for(var e in t)t.hasOwnProperty(e)&&n(e,t[e]);return this}},s.prototype={api_server:"api.geetest.com",protocol:"http://",type_path:"/gettype.php",fallback_config:{slide:{static_servers:["static.geetest.com","dn-staticdown.qbox.me"],type:"slide",slide:"/static/js/geetest.0.0.0.js"},fullpage:{static_servers:["static.geetest.com","dn-staticdown.qbox.me"],type:"fullpage",fullpage:"/static/js/fullpage.0.0.0.js"}},_get_fallback_config:function(){return c(this.type)?this.fallback_config[this.type]:this.new_captcha?this.fallback_config.fullpage:this.fallback_config.slide},_extend:function(n){var t=this;new r(n)._each(function(n,e){t[n]=e})}};var c=function(n){return"string"==typeof n},l={},p={},d=function(n,t,e,i){t=function(n){return n.replace(/^https?:\/\/|\/$/g,"")}(t);var o=function(n){return 0!==(n=n.replace(/\/+/g,"/")).indexOf("/")&&(n="/"+n),n}(e)+function(n){if(!n)return"";var t="?";return new r(n)._each(function(n,e){(c(e)||function(n){return"number"==typeof n}(e)||function(n){return"boolean"==typeof n}(e))&&(t=t+encodeURIComponent(n)+"="+encodeURIComponent(e)+"&")}),"?"===t&&(t=""),t.replace(/&$/,"")}(i);return t&&(o=n+t+o),o},u=function(n,t,i,a,r){!function s(c){!function(n,t){var i=e.createElement("script");i.charset="UTF-8",i.async=!0,i.onerror=function(){t(!0)};var a=!1;i.onload=i.onreadystatechange=function(){a||i.readyState&&"loaded"!==i.readyState&&"complete"!==i.readyState||(a=!0,setTimeout(function(){t(!1)},0))},i.src=n,o.appendChild(i)}(d(n,t[c],i,a),function(n){n?c>=t.length-1?r(!0):s(c+1):r(!1)})}(0)},g=function(t,e,o,r){if("object"===(void 0===(s=o.getLib)?"undefined":a()(s))&&null!==s)return o._extend(o.getLib),void r(o);var s;if(o.offline)r(o._get_fallback_config());else{var c="geetest_"+(parseInt(1e4*i.random())+(new Date).valueOf());n[c]=function(t){"success"===t.status?r(t.data):t.status?r(o._get_fallback_config()):r(t),n[c]=void 0;try{delete n[c]}catch(n){}},u(o.protocol,t,e,{gt:o.gt,callback:c},function(n){n&&r(o._get_fallback_config())})}},f=function(n,t){var e={networkError:"网络错误"};if("function"!=typeof t.onError)throw new Error(e[n]);t.onError(e[n])};n.Geetest&&(p.slide="loaded");var h=function(t,e){var i=new s(t);t.https?i.protocol="https://":t.protocol||(i.protocol=n.location.protocol+"//"),g([i.api_server||i.apiserver],i.type_path,i,function(t){var o=t.type,a=function(){i._extend(t),e(new n.Geetest(i))};l[o]=l[o]||[];var r=p[o]||"init";"init"===r?(p[o]="loading",l[o].push(a),u(i.protocol,t.static_servers||t.domains,t[o]||t.path,null,function(n){if(n)p[o]="fail",f("networkError",i);else{p[o]="loaded";for(var t=l[o],e=0,a=t.length;e<a;e+=1){var r=t[e];"function"==typeof r&&r()}l[o]=[]}})):"loaded"===r?a():"fail"===r?f("networkError",i):"loading"===r&&l[o].push(a)})};return n.initGeetest=h,h},"object"===a()(n)&&"object"===a()(n.exports)?n.exports=t.document?i(t):function(n){if(!n.document)throw new Error("Geetest requires a window with a document");return i(n)}:i(t)}).call(t,e("aIIE")(n))},tYKe:function(n,t,e){(n.exports=e("BkJT")(!1)).push([n.i,"\n.login-container[data-v-309f8432] {\n  position: fixed;\n  height: 100%;\n  width: 100%;\n  background-color: #2d3a4b;\n}\n.login-container .login-form[data-v-309f8432] {\n    position: absolute;\n    left: 0;\n    right: 0;\n    width: 520px;\n    padding: 35px 35px 15px 35px;\n    margin: 120px auto;\n}\n.login-container .tips[data-v-309f8432] {\n    font-size: 14px;\n    color: #fff;\n    margin-bottom: 10px;\n}\n.login-container .tips span[data-v-309f8432]:first-of-type {\n      margin-right: 16px;\n}\n.login-container .svg-container[data-v-309f8432] {\n    padding: 6px 5px 6px 15px;\n    color: #889aa4;\n    vertical-align: middle;\n    width: 30px;\n    display: inline-block;\n}\n.login-container .svg-container_login[data-v-309f8432] {\n      font-size: 20px;\n}\n.login-container .title-container[data-v-309f8432] {\n    position: relative;\n}\n.login-container .title-container .title[data-v-309f8432] {\n      font-size: 26px;\n      color: #eee;\n      margin: 0px auto 40px auto;\n      text-align: center;\n      font-weight: bold;\n}\n.login-container .title-container .set-language[data-v-309f8432] {\n      color: #fff;\n      position: absolute;\n      top: 5px;\n      right: 0px;\n}\n.login-container .show-pwd[data-v-309f8432] {\n    position: absolute;\n    right: 10px;\n    top: 7px;\n    font-size: 16px;\n    color: #889aa4;\n    cursor: pointer;\n    -webkit-user-select: none;\n       -moz-user-select: none;\n        -ms-user-select: none;\n            user-select: none;\n}\n.login-container .thirdparty-button[data-v-309f8432] {\n    position: absolute;\n    right: 35px;\n    bottom: 28px;\n}\n",""])}});