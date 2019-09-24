var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},PNotifyCallbacks=function(a){"use strict";var r=(a=a&&a.__esModule?a.default:a).prototype.open,o=a.prototype.close,f=function(t,e,n){var r=t?t.get().modules:e.modules,o=r&&r.Callbacks?r.Callbacks:{};return o[n]?o[n]:function(){return!0}};function t(t){var e,n;n=t,(e=this)._handlers=c(),e._slots=c(),e._bind=n._bind,e._staged={},e.options=n,e.root=n.root||e,e.store=n.store||e.root.store,n.root||(e._beforecreate=[],e._oncreate=[],e._aftercreate=[]),this._state=s({},t.data),this._intro=!0,this._fragment=(this._state,{c:i,m:i,p:i,d:i}),t.target&&(this._fragment.c(),this._mount(t.target,t.anchor))}function i(){}function s(t,e){for(var n in e)t[n]=e[n];return t}function c(){return Object.create(null)}function n(t){for(;t&&t.length;)t.shift()()}return a.prototype.open=function(){if(!1!==f(this,null,"beforeOpen")(this)){for(var t=arguments.length,e=Array(t),n=0;n<t;n++)e[n]=arguments[n];r.apply(this,e),f(this,null,"afterOpen")(this)}},a.prototype.close=function(t){if(!1!==f(this,null,"beforeClose")(this,t)){for(var e=arguments.length,n=Array(1<e?e-1:0),r=1;r<e;r++)n[r-1]=arguments[r];o.apply(this,[t].concat(n)),f(this,null,"afterClose")(this,t)}},s(t.prototype,{destroy:function(t){this.destroy=i,this.fire("destroy"),this.set=i,this._fragment.d(!1!==t),this._fragment=null,this._state={}},get:function(){return this._state},fire:function(t,e){var n=t in this._handlers&&this._handlers[t].slice();if(!n)return;for(var r=0;r<n.length;r+=1){var o=n[r];if(!o.__calling)try{o.__calling=!0,o.call(this,e)}finally{o.__calling=!1}}},on:function(t,e){var n=this._handlers[t]||(this._handlers[t]=[]);return n.push(e),{cancel:function(){var t=n.indexOf(e);~t&&n.splice(t,1)}}},set:function(t){if(this._set(s({},t)),this.root._lock)return;e=this.root,e._lock=!0,n(e._beforecreate),n(e._oncreate),n(e._aftercreate),e._lock=!1;var e},_set:function(t){var e=this._state,n={},r=!1;for(var o in t=s(this._staged,t),this._staged={},t)this._differs(t[o],e[o])&&(n[o]=r=!0);if(!r)return;this._state=s(s({},e),t),this._recompute(n,this._state),this._bind&&this._bind(n,this._state);this._fragment&&(this.fire("state",{changed:n,current:this._state,previous:e}),this._fragment.p(n,this._state),this.fire("update",{changed:n,current:this._state,previous:e}))},_stage:function(t){s(this._staged,t)},_mount:function(t,e){this._fragment[this._fragment.i?"i":"m"](t,e||null)},_differs:function(t,e){return t!=t?e==e:t!==e||t&&"object"===(void 0===t?"undefined":_typeof(t))||"function"==typeof t}}),t.prototype._recompute=i,function(t){t.key="Callbacks",t.getCallbacks=f;var e=a.alert,n=a.notice,r=a.info,o=a.success,i=a.error,s=function(t,e){f(null,e,"beforeInit")(e);var n=t(e);return f(n,null,"afterInit")(n),n};a.alert=function(t){return s(e,t)},a.notice=function(t){return s(n,t)},a.info=function(t){return s(r,t)},a.success=function(t){return s(o,t)},a.error=function(t){return s(i,t)},a.modules.Callbacks=t}(t),t}(PNotify);
//# sourceMappingURL=PNotifyCallbacks.js.map