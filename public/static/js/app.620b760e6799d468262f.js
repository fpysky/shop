webpackJsonp([10],{"/Hv2":function(e,t){},IcnI:function(e,t,n){"use strict";var r=n("IvJb"),a=n("9rMa"),i=n("uAC3"),o=n.n(i),c={state:{sidebar:{opened:!+o.a.get("sidebarStatus"),withoutAnimation:!1},device:"desktop",language:o.a.get("language")||"en"},mutations:{TOGGLE_SIDEBAR:function(e){e.sidebar.opened?o.a.set("sidebarStatus",1):o.a.set("sidebarStatus",0),e.sidebar.opened=!e.sidebar.opened,e.sidebar.withoutAnimation=!1},CLOSE_SIDEBAR:function(e,t){o.a.set("sidebarStatus",1),e.sidebar.opened=!1,e.sidebar.withoutAnimation=t},TOGGLE_DEVICE:function(e,t){e.device=t},SET_LANGUAGE:function(e,t){e.language=t,o.a.set("language",t)}},actions:{toggleSideBar:function(e){(0,e.commit)("TOGGLE_SIDEBAR")},closeSideBar:function(e,t){(0,e.commit)("CLOSE_SIDEBAR",t.withoutAnimation)},toggleDevice:function(e,t){(0,e.commit)("TOGGLE_DEVICE",t)},setLanguage:function(e,t){(0,e.commit)("SET_LANGUAGE",t)}}},u={state:{logs:[]},mutations:{ADD_ERROR_LOG:function(e,t){e.logs.push(t)}},actions:{addErrorLog:function(e,t){(0,e.commit)("ADD_ERROR_LOG",t)}}},s=n("IHPB"),f=n.n(s),d=n("rVsN"),l=n.n(d),m=n("HzJ8"),h=n.n(m),p=n("KH7x"),E=n.n(p),v=n("aA9S"),_=n.n(v),b={state:{visitedViews:[],cachedViews:[]},mutations:{ADD_VISITED_VIEWS:function(e,t){e.visitedViews.some(function(e){return e.path===t.path})||(e.visitedViews.push(_()({},t,{title:t.meta.title||"no-name"})),t.meta.noCache||e.cachedViews.push(t.name))},DEL_VISITED_VIEWS:function(e,t){var n=!0,r=!1,a=void 0;try{for(var i,o=h()(e.visitedViews.entries());!(n=(i=o.next()).done);n=!0){var c=i.value,u=E()(c,2),s=u[0];if(u[1].path===t.path){e.visitedViews.splice(s,1);break}}}catch(e){r=!0,a=e}finally{try{!n&&o.return&&o.return()}finally{if(r)throw a}}var f=!0,d=!1,l=void 0;try{for(var m,p=h()(e.cachedViews);!(f=(m=p.next()).done);f=!0){var v=m.value;if(v===t.name){var _=e.cachedViews.indexOf(v);e.cachedViews.splice(_,1);break}}}catch(e){d=!0,l=e}finally{try{!f&&p.return&&p.return()}finally{if(d)throw l}}},DEL_OTHERS_VIEWS:function(e,t){var n=!0,r=!1,a=void 0;try{for(var i,o=h()(e.visitedViews.entries());!(n=(i=o.next()).done);n=!0){var c=i.value,u=E()(c,2),s=u[0];if(u[1].path===t.path){e.visitedViews=e.visitedViews.slice(s,s+1);break}}}catch(e){r=!0,a=e}finally{try{!n&&o.return&&o.return()}finally{if(r)throw a}}var f=!0,d=!1,l=void 0;try{for(var m,p=h()(e.cachedViews);!(f=(m=p.next()).done);f=!0){var v=m.value;if(v===t.name){var _=e.cachedViews.indexOf(v);e.cachedViews=e.cachedViews.slice(_,_+1);break}}}catch(e){d=!0,l=e}finally{try{!f&&p.return&&p.return()}finally{if(d)throw l}}},DEL_ALL_VIEWS:function(e){e.visitedViews=[],e.cachedViews=[]}},actions:{addVisitedViews:function(e,t){(0,e.commit)("ADD_VISITED_VIEWS",t)},delVisitedViews:function(e,t){var n=e.commit,r=e.state;return new l.a(function(e){n("DEL_VISITED_VIEWS",t),e([].concat(f()(r.visitedViews)))})},delOthersViews:function(e,t){var n=e.commit,r=e.state;return new l.a(function(e){n("DEL_OTHERS_VIEWS",t),e([].concat(f()(r.visitedViews)))})},delAllViews:function(e){var t=e.commit,n=e.state;return new l.a(function(e){t("DEL_ALL_VIEWS"),e([].concat(f()(n.visitedViews)))})}}},T=n("M9A7"),g=n("TIfe"),O={state:{user:"",status:"",code:"",token:Object(g.b)(),refreshToken:Object(g.a)(),name:"",avatar:"",introduction:"",roles:[],setting:{articlePlatform:[]}},mutations:{SET_CODE:function(e,t){e.code=t},SET_TOKEN:function(e,t){e.token=t},SET_REFRESH_TOKEN:function(e,t){e.refreshToken=t},SET_INTRODUCTION:function(e,t){e.introduction=t},SET_SETTING:function(e,t){e.setting=t},SET_STATUS:function(e,t){e.status=t},SET_NAME:function(e,t){e.name=t},SET_AVATAR:function(e,t){e.avatar=t},SET_ROLES:function(e,t){e.roles=t}},actions:{LoginByUsername:function(e,t){var n=e.commit;return new l.a(function(e,r){Object(T.d)(t).then(function(t){var a=t.data.access_token,i=t.data.refresh_token;n("SET_TOKEN",a),n("SET_REFRESH_TOKEN",i),Object(g.f)(a),Object(g.e)(i),e(),Object(T.c)().then(function(t){t.data||r("error");var a=t.data;n("SET_NAME",a.user.name),n("SET_STATUS",!0),e(t)}).catch(function(e){r(e)})}).catch(function(e){r(e)})})},GetUserInfo:function(e){var t=e.commit;e.state;return new l.a(function(e,n){Object(T.c)().then(function(r){r.data||n("error");var a=r.data;t("SET_NAME",a.user.name),t("SET_AVATAR",a.user.avatar),e(r)}).catch(function(e){n(e)})})},LogOut:function(e){var t=e.commit,n=e.state;return new l.a(function(e,r){Object(T.e)(n.token).then(function(){t("SET_TOKEN",""),t("SET_REFRESH_TOKEN",""),Object(g.d)(),Object(g.c)(),e()}).catch(function(e){r(e)})})},FedLogOut:function(e){var t=e.commit;return new l.a(function(e){t("SET_TOKEN",""),Object(g.d)(),e()})},ChangeRoles:function(e,t){var n=e.commit;return new l.a(function(e){n("SET_TOKEN",t),Object(g.f)(t),Object(T.c)(t).then(function(t){var r=t.data;n("SET_ROLES",r.roles),n("SET_NAME",r.name),n("SET_AVATAR",r.avatar),n("SET_INTRODUCTION",r.introduction),e()})})}}},S={sidebar:function(e){return e.app.sidebar},language:function(e){return e.app.language},device:function(e){return e.app.device},visitedViews:function(e){return e.tagsView.visitedViews},cachedViews:function(e){return e.tagsView.cachedViews},token:function(e){return e.user.token},refreshToken:function(e){return e.user.refreshToken},avatar:function(e){return e.user.avatar},name:function(e){return e.user.name},introduction:function(e){return e.user.introduction},status:function(e){return e.user.status},roles:function(e){return e.user.roles},setting:function(e){return e.user.setting},permission_routers:function(e){return e.permission.routers},addRouters:function(e){return e.permission.addRouters},errorLogs:function(e){return e.errorLog.logs}};r.default.use(a.a);var w=new a.a.Store({modules:{app:c,errorLog:u,tagsView:b,user:O},getters:S});t.a=w},M9A7:function(e,t,n){"use strict";t.d=function(e){return Object(r.a)({url:"oauth/token",method:"post",data:e})},t.e=function(){return Object(r.a)({url:"api/logout",method:"post"})},t.f=function(e){return Object(r.a)({url:"api/login",method:"post",data:e})},t.c=function(){return Object(r.a)({url:"api/user",method:"get"})},t.a=function(){return Object(r.a)({url:"api/geetest_api_v1",method:"post"})},t.g=function(e){return Object(r.a)({url:"api/admin/valiGeet",method:"post",data:e})},t.b=function(e){return Object(r.a)({url:"oauth/token",method:"post",data:e})};var r=n("vLgD")},NHnr:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var r=n("IvJb"),a=n("t+b9"),i=n.n(a),o=(n("/Hv2"),{render:function(){var e=this.$createElement,t=this._self._c||e;return t("div",{attrs:{id:"app"}},[t("router-view")],1)},staticRenderFns:[]});var c=n("C7Lr")({name:"App",data:function(){return{}}},o,!1,function(e){n("g70f")},null,null).exports,u=n("zO6J");r.default.use(u.a);var s=new u.a({routes:[{path:"/",name:"/home",component:function(){return Promise.all([n.e(0),n.e(6)]).then(n.bind(null,"KR8f"))}},{path:"/login",name:"/login",component:function(){return n.e(1).then(n.bind(null,"T+/8"))}},{path:"/login",name:"/login",component:function(){return n.e(2).then(n.bind(null,"12H5"))}},{path:"/userCenter",name:"/userCenter",component:function(){return Promise.all([n.e(0),n.e(7)]).then(n.bind(null,"CMyn"))}},{path:"/address",name:"/address",component:function(){return Promise.all([n.e(0),n.e(3)]).then(n.bind(null,"FZYL"))}},{path:"/product",name:"/product",component:function(){return Promise.all([n.e(0),n.e(5)]).then(n.bind(null,"If12"))}},{path:"/cart",name:"/cart",component:function(){return Promise.all([n.e(0),n.e(8)]).then(n.bind(null,"1CLz"))}},{path:"/addOrder",name:"/addOrder",component:function(){return Promise.all([n.e(0),n.e(4)]).then(n.bind(null,"GXNL"))}}]}),f=n("IcnI"),d=n("TIfe");Object(d.b)()&&""==f.a.getters.name&&f.a.dispatch("GetUserInfo"),r.default.config.productionTip=!1,r.default.use(i.a,{size:"medium"}),new r.default({el:"#app",router:s,store:f.a,components:{App:c},template:"<App/>"})},TIfe:function(e,t,n){"use strict";t.b=function(){return a.a.get(i)},t.f=function(e){return a.a.set(i,e)},t.d=function(){return a.a.remove(i)},t.a=function(){return a.a.get(o)},t.e=function(e){return a.a.set(o,e)},t.c=function(){return a.a.remove(o)};var r=n("uAC3"),a=n.n(r),i="shop-token",o="shop-refresh-token"},g70f:function(e,t){},vLgD:function(e,t,n){"use strict";var r=n("rVsN"),a=n.n(r),i=n("aozt"),o=n.n(i),c=n("t+b9"),u=(n.n(c),n("IcnI")),s=n("TIfe"),f=n("M9A7"),d=o.a.create({baseURL:"http://shop.test/",timeout:5e3});d.interceptors.request.use(function(e){return u.a.getters.token&&(e.headers.Authorization="Bearer "+Object(s.b)()),e},function(e){console.log(e),a.a.reject(e)}),d.interceptors.response.use(function(e){return e},function(e){if("Unauthenticated."==e.response.data.message){var t={grant_type:"refresh_token",refresh_token:Object(s.a)(),client_id:2,client_secret:"5IjevVN52Pe3GtiAy63WsViWfNj0L8igdscvcRtL",scope:""};Object(f.b)(t).then(function(e){Object(s.f)(e.data.access_token),Object(s.e)(e.data.refresh_token),u.a.dispatch("GetUserInfo")}).catch(function(e){401==e.response.status?(Object(s.d)(),Object(s.c)(),window.location.href="/login"):Object(c.Message)({message:e.message,type:"error",duration:5e3})})}return a.a.reject(e)}),t.a=d}},["NHnr"]);
//# sourceMappingURL=app.620b760e6799d468262f.js.map