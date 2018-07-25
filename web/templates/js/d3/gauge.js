// Copyright (C) 2012 JainLabs, Ajay Jain, Paras Jain
// This software is icensed under a Creative Commons Attribution-NonCommercial 3.0 Unported License, found at http://creativecommons.org/licenses/by-nc/3.0/.
var charts={};(function(e,t,n){var r=function(e){var t=JSON.parse({"[object Boolean]":"boolean","[object Number]":"number","[object String]":"string","[object Function]":"function","[object Array]":"array","[object Date]":"date","[object RegExp]":"regexp","[object Object]":"object"});return e==null?String(e):t[toString.call(e)]||"object"},i=function(e){if(!e||r(e)!=="object"||e.nodeType||e!=null&&e==e.window)return!1;try{if(e.constructor&&!hasOwn.call(e,"constructor")&&!hasOwn.call(e.constructor.prototype,"isPrototypeOf"))return!1}catch(t){return!1}var i;for(i in e);return i===n||hasOwn.call(e,i)},s=Array.isArray||function(e){return r(e)==="array"};t.extend=function(){var e,r,o,u,a,f,l=arguments[0]||{},c=1,h=arguments.length,p=!1;typeof l=="boolean"&&(p=l,l=arguments[1]||{},c=2),typeof l!="object"&&typeof l!="function"&&(l={}),h===c&&(l=t,--c);for(;c<h;c++)if((e=arguments[c])!=null)for(r in e){o=l[r],u=e[r];if(l===u)continue;p&&u&&(i(u)||(a=s(u)))?(a?(a=!1,f=o&&s(o)?o:[]):f=o&&i(o)?o:{},l[r]=t.extend(p,f,u)):u!==n&&(l[r]=u)}return l}})(this,charts),charts.extend({donut:function(e){function v(e){var t=(e.startAngle+e.endAngle)*90/Math.PI-90;return t>90?t-180:t}var t=[],n=[],r=[],i="donut"+Math.round(Math.random()*1e6),s=d3.scale.category20();(function(){for(var i=0,o=e.sections.length;i<o;i++){var u=e.sections[i].data,a=e.sections[i].label,f=e.sections[i].color;a=a&&a!==""&&a!=="undefined"?a:"",f=f&&f!==""&&f!=="undefined"?f:s(i);if(typeof u!="number"||u===0)continue;t[i]=u,n[i]=a,r[i]=f}})();var o=e.centerLabel||"",u=e.container||"body",a=e.width||400,f=e.height||400,l=a/2,c=d3.layout.pie().sort(null),h=d3.svg.arc().innerRadius(1.2*l/3).outerRadius(l),p=d3.select(u).append("svg:svg").attr("id",i).attr("width",a).attr("height",f).append("svg:g").attr("transform","translate("+a/2+","+f/2+")"),d=p.selectAll("g").data(c(t)).enter().append("svg:g");return d.append("svg:path").attr("d",h).style("fill",function(e,t){return r[t]}).style("stroke","#fff"),d.append("svg:text").attr("dy","0.35em").attr("text-anchor","middle").attr("transform",function(e){return"translate("+h.centroid(e)+")rotate("+v(e)+")"}).style("font",l/13+"px sans-serif").style("fill","white").text(function(e,t){return n[t]}),p.append("svg:text").attr("dy",".35em").attr("text-anchor","middle").style("font","bold "+l/10+"px Helvetica, Georgia").text(o),{id:i,obj:e,remove:function(){var e=document.getElementById(this.id),t=document.createElement("div");return t.setAttribute("id",this.id),e.parentNode.replaceChild(t,e),this},redraw:function(e){return this.remove(),this.obj.sections=e,this.obj.container="#"+this.id,charts.donut(this.obj)},add:function(e){return this.redraw(this.obj.sections.concat(e)),this}}}}),charts.extend({gauge:function(e){function t(e){this.placeholderName=e.container&&e.container!==""&&e.container!=="undefined"?e.container:"body";var t=this;this.configure=function(e){this.config=e,this.config.value=e.value||0,this.config.size=this.config.size*.9;if(!this.config.size||this.config.size<=0)this.config.size=108;this.config.raduis=this.config.size*.97/2,this.config.cx=this.config.size/2,this.config.cy=this.config.size/2,this.config.min=e.min||0,this.config.max=e.max||100,this.config.range=this.config.max-this.config.min,this.config.majorTicks=e.majorTicks||5,this.config.minorTicks=e.minorTicks||2,this.config.redZones=[],this.config.redZones.push(e.zones.red),this.config.yellowZones=[],this.config.yellowZones.push(e.zones.yellow),this.config.greenZones=[],this.config.greenZones.push(e.zones.green),this.config.greenColor=e.greenColor||"#74b749",this.config.yellowColor=e.yellowColor||"#ffb400",this.config.redColor=e.redColor||"#e25a48"},this.render=function(){this.body=d3.select(this.placeholderName).append("svg:svg").attr("class","gauge").attr("width",this.config.size).attr("height",this.config.size),this.body.append("svg:circle").attr("cx",this.config.cx).attr("cy",this.config.cy).attr("r",this.config.raduis).style("fill","#efefef").style("stroke","#efefef").style("stroke-width","0.5px"),this.body.append("svg:circle").attr("cx",this.config.cx).attr("cy",this.config.cy).attr("r",.9*this.config.raduis).style("fill","#FFFFFF").style("stroke","#efefef").style("stroke-width","2px");for(var e in this.config.greenZones)this.drawBand(this.config.greenZones[e].from,this.config.greenZones[e].to,t.config.greenColor);for(var e in this.config.yellowZones)this.drawBand(this.config.yellowZones[e].from,this.config.yellowZones[e].to,t.config.yellowColor);for(var e in this.config.redZones)this.drawBand(this.config.redZones[e].from,this.config.redZones[e].to,t.config.redColor);if(undefined!=this.config.label){var n=Math.round(this.config.size/9);this.body.append("svg:text").attr("x",this.config.cx).attr("y",this.config.cy/2+n/2).attr("dy",n/2).attr("text-anchor","middle").text(this.config.label).style("font-size",n+"px").style("font-family","Arial").style("fill","#353535").style("stroke-width","0px")}var n=Math.round(this.config.size/16),r=this.config.range/(this.config.majorTicks-1);for(var i=this.config.min;i<=this.config.max;i+=r){var s=r/this.config.minorTicks;for(var o=i+s;o<Math.min(i+r,this.config.max);o+=s){var u=this.valueToPoint(o,.75),a=this.valueToPoint(o,.85);this.body.append("svg:line").attr("x1",u.x).attr("y1",u.y).attr("x2",a.x).attr("y2",a.y).style("stroke","#FFFFFF").style("stroke-width","1px")}var u=this.valueToPoint(i,.7),a=this.valueToPoint(i,.85);this.body.append("svg:line").attr("x1",u.x).attr("y1",u.y).attr("x2",a.x).attr("y2",a.y).style("stroke","#FFF").style("stroke-width","2px");if(i==this.config.min||i==this.config.max){var f=this.valueToPoint(i,.63);this.body.append("svg:text").attr("x",f.x).attr("y",f.y).attr("dy",n/3).attr("text-anchor",i==this.config.min?"start":"end").text(i).style("font-size",n+"px").style("font-family","Arial").style("fill","#353535").style("stroke-width","0px")}}var l=this.body.append("svg:g").attr("class","pointerContainer");return this.drawPointer(0),l.append("svg:circle").attr("cx",this.config.cx).attr("cy",this.config.cy).attr("r",.12*this.config.raduis).style("fill","#FFFFFF").style("stroke","#efefef").style("opacity",1),this},this.redraw=function(e){return this.drawPointer(e),this},this.drawBand=function(e,n,r){if(0>=n-e)return;this.body.append("svg:path").style("fill",r).attr("d",d3.svg.arc().startAngle(this.valueToRadians(e)).endAngle(this.valueToRadians(n)).innerRadius(.65*this.config.raduis).outerRadius(.85*this.config.raduis)).attr("transform",function(){return"translate("+t.config.cx+", "+t.config.cy+") rotate(270)"})},this.drawPointer=function(e){var t=this.config.range/13,n=this.valueToPoint(e,.85),r=this.valueToPoint(e-t,.12),i=this.valueToPoint(e+t,.12),s=e-this.config.range*(1/.75)/2,o=this.valueToPoint(s,.28),u=this.valueToPoint(s-t,.12),a=this.valueToPoint(s+t,.12),f=[n,r,a,o,u,i,n],l=d3.svg.line().x(function(e){return e.x}).y(function(e){return e.y}).interpolate("basis"),c=this.body.select(".pointerContainer"),h=c.selectAll("path").data([f]);h.enter().append("svg:path").attr("d",l).style("fill","#4286F7").style("stroke","#4286F7").style("fill-opacity",.7),h.transition().attr("d",l);var p=Math.round(this.config.size/10);c.selectAll("text").data([e]).text(Math.round(e)).enter().append("svg:text").attr("x",this.config.cx).attr("y",this.config.size-this.config.cy/4-p).attr("dy",p/2).attr("text-anchor","middle").text(Math.round(e)).style("font-size",p+"px").style("font-family","Arial").style("fill","#353535").style("stroke-width","0px")},this.valueToDegrees=function(e){return e/this.config.range*270-45},this.valueToRadians=function(e){return this.valueToDegrees(e)*Math.PI/180},this.valueToPoint=function(e,t){var n={x:this.config.cx-this.config.raduis*t*Math.cos(this.valueToRadians(e)),y:this.config.cy-this.config.raduis*t*Math.sin(this.valueToRadians(e))};return n},this.configure(e)}var n=(new t(e)).render();return n.redraw(n.config.value)}}),charts.extend({groupedLine:function(e){var t=function(e){var t=e instanceof Array?[]:{};for(l in e){if(l=="clone")continue;e[l]&&typeof e[l]=="objToCloneect"?t[l]=e[l].clone():t[l]=e[l]}return t},n=document.createElement("style");document.head.appendChild(n),n.innerHTML=".lineChart .axis path, .lineChart .axis line {  fill: none;  stroke: #fff;  shape-rendering: crispEdges;}",e.popover&&jQuery&&(n.innerHTML=n.innerHTML+".tooltip{position:absolute;z-index:1020;display:block;padding:5px;font-size:11px;opacity:0;filter:alpha(opacity=0);visibility:visible}.tooltip.in{opacity:.8;filter:alpha(opacity=80)}.tooltip.top{margin-top:-2px}.tooltip.right{margin-left:2px}.tooltip.bottom{margin-top:2px}.tooltip.left{margin-left:-2px}.tooltip.top .tooltip-arrow{bottom:0;left:50%;margin-left:-5px;border-top:5px solid #fff;border-right:5px solid transparent;border-left:5px solid transparent}.tooltip.left .tooltip-arrow{top:50%;right:0;margin-top:-5px;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:5px solid #fff}.tooltip.bottom .tooltip-arrow{top:0;left:50%;margin-left:-5px;border-right:5px solid transparent;border-bottom:5px solid #fff;border-left:5px solid transparent}.tooltip.right .tooltip-arrow{top:50%;left:0;margin-top:-5px;border-top:5px solid transparent;border-right:5px solid #fff;border-bottom:5px solid transparent}.tooltip-inner{max-width:200px;padding:3px 8px;color:#fff;text-align:center;text-decoration:none;background-color:#fff;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.tooltip-arrow{position:absolute;width:0;height:0}.popover{position:absolute;top:0;left:0;z-index:1010;display:none;padding:5px}.popover.top{margin-top:-5px}.popover.right{margin-left:5px}.popover.bottom{margin-top:5px}.popover.left{margin-left:-5px}.popover.top .arrow{bottom:0;left:50%;margin-left:-5px;border-top:5px solid #fff;border-right:5px solid transparent;border-left:5px solid transparent}.popover.right .arrow{top:50%;left:0;margin-top:-5px;border-top:5px solid transparent;border-right:5px solid #fff;border-bottom:5px solid transparent}.popover.bottom .arrow{top:0;left:50%;margin-left:-5px;border-right:5px solid transparent;border-bottom:5px solid #000;border-left:5px solid transparent}.popover.left .arrow{top:50%;right:0;margin-top:-5px;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:5px solid #000}.popover .arrow{position:absolute;width:0;height:0}.popover-inner{width:280px;padding:3px;overflow:hidden;background:#000;background:rgba(0,0,0,0.8);-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;-webkit-box-shadow:0 3px 7px rgba(0,0,0,0.3);-moz-box-shadow:0 3px 7px rgba(0,0,0,0.3);box-shadow:0 3px 7px rgba(0,0,0,0.3)}.popover-title{margin:0;padding:9px 15px;line-height:1;background-color:#f5f5f5;border-bottom:1px solid #eee;-webkit-border-radius:3px 3px 0 0;-moz-border-radius:3px 3px 0 0;border-radius:3px 3px 0 0}.popover-content{padding:14px;background-color:#fff;-webkit-border-radius:0 0 3px 3px;-moz-border-radius:0 0 3px 3px;border-radius:0 0 3px 3px;-webkit-background-clip:padding-box;-moz-background-clip:padding-box;background-clip:padding-box}.popover-content p,.popover-content ul,.popover-content ol{margin-bottom:0}",!function(e){var t=function(e,t){this.init("tooltip",e,t)};t.prototype={constructor:t,init:function(t,n,r){var i,s;this.type=t,this.$element=e(n),this.options=this.getOptions(r),this.enabled=!0,this.options.trigger!="manual"&&(i=this.options.trigger=="hover"?"mouseenter":"focus",s=this.options.trigger=="hover"?"mouseleave":"blur",this.$element.on(i,this.options.selector,e.proxy(this.enter,this)),this.$element.on(s,this.options.selector,e.proxy(this.leave,this))),this.options.selector?this._options=e.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},getOptions:function(t){return t=e.extend({},e.fn[this.type].defaults,t,this.$element.data()),t.delay&&typeof t.delay=="number"&&(t.delay={show:t.delay,hide:t.delay}),t},enter:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);if(!n.options.delay||!n.options.delay.show)return n.show();clearTimeout(this.timeout),n.hoverState="in",this.timeout=setTimeout(function(){n.hoverState=="in"&&n.show()},n.options.delay.show)},leave:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);this.timeout&&clearTimeout(this.timeout);if(!n.options.delay||!n.options.delay.hide)return n.hide();n.hoverState="out",this.timeout=setTimeout(function(){n.hoverState=="out"&&n.hide()},n.options.delay.hide)},show:function(){var e,t,n,r,i,s,o;if(this.hasContent()&&this.enabled){e=this.tip(),this.setContent(),this.options.animation&&e.addClass("fade"),s=typeof this.options.placement=="function"?this.options.placement.call(this,e[0],this.$element[0]):this.options.placement,t=/in/.test(s),e.remove().css({top:0,left:0,display:"block"}).appendTo(t?this.$element:document.body),n=this.getPosition(t),r=e[0].offsetWidth,i=e[0].offsetHeight;switch(t?s.split(" ")[1]:s){case"bottom":o={top:n.top+n.height,left:n.left+n.width/2-r/2};break;case"top":o={top:n.top-i,left:n.left+n.width/2-r/2};break;case"left":o={top:n.top+n.height/2-i/2,left:n.left-r};break;case"right":o={top:n.top+n.height/2-i/2,left:n.left+n.width}}e.css(o).addClass(s).addClass("in")}},isHTML:function(e){return typeof e!="string"||e.charAt(0)==="<"&&e.charAt(e.length-1)===">"&&e.length>=3||/^(?:[^<]*<[\w\W]+>[^>]*$)/.exec(e)},setContent:function(){var e=this.tip(),t=this.getTitle();e.find(".tooltip-inner")[this.isHTML(t)?"html":"text"](t),e.removeClass("fade in top bottom left right")},hide:function(){function r(){var t=setTimeout(function(){n.off(e.support.transition.end).remove()},500);n.one(e.support.transition.end,function(){clearTimeout(t),n.remove()})}var t=this,n=this.tip();n.removeClass("in"),e.support.transition&&this.$tip.hasClass("fade")?r():n.remove()},fixTitle:function(){var e=this.$element;(e.attr("title")||typeof e.attr("data-original-title")!="string")&&e.attr("data-original-title",e.attr("title")||"").removeAttr("title")},hasContent:function(){return this.getTitle()},getPosition:function(t){return e.extend({},t?{top:0,left:0}:this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight})},getTitle:function(){var e,t=this.$element,n=this.options;return e=t.attr("data-original-title")||(typeof n.title=="function"?n.title.call(t[0]):n.title),e},tip:function(){return this.$tip=this.$tip||e(this.options.template)},validate:function(){this.$element[0].parentNode||(this.hide(),this.$element=null,this.options=null)},enable:function(){this.enabled=!0},disable:function(){this.enabled=!1},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(){this[this.tip().hasClass("in")?"hide":"show"]()}},e.fn.tooltip=function(n){return this.each(function(){var r=e(this),i=r.data("tooltip"),s=typeof n=="object"&&n;i||r.data("tooltip",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.tooltip.Constructor=t,e.fn.tooltip.defaults={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover",title:"",delay:0}}(window.jQuery),!function(e){var t=function(e,t){this.init("popover",e,t)};t.prototype=e.extend({},e.fn.tooltip.Constructor.prototype,{constructor:t,setContent:function(){var e=this.tip(),t=this.getTitle(),n=this.getContent();e.find(".popover-title")[this.isHTML(t)?"html":"text"](t),e.find(".popover-content > *")[this.isHTML(n)?"html":"text"](n),e.removeClass("fade top bottom left right in")},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var e,t=this.$element,n=this.options;return e=t.attr("data-content")||(typeof n.content=="function"?n.content.call(t[0]):n.content),e},tip:function(){return this.$tip||(this.$tip=e(this.options.template)),this.$tip}}),e.fn.popover=function(n){return this.each(function(){var r=e(this),i=r.data("popover"),s=typeof n=="object"&&n;i||r.data("popover",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.popover.Constructor=t,e.fn.popover.defaults=e.extend({},e.fn.tooltip.defaults,{placement:"right",content:"",template:'<div class="popover"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>'})}(window.jQuery));var r="groupedLine"+Math.round(Math.random()*1e6),i=[];(function(){for(var t in e.data){var n=e.data[t];if(e.data.hasOwnProperty(t)&&n instanceof Array){if(e.time)var r=new Date(t);else var r=t;n.sort();var s=new Number;for(var o=0;o<n.length;++o)n[o]!==s?(i.push({count:1,x:r,y:n[o]}),s=n[o]):i[i.length-1].y===n[o]&&i[i.length-1].x===r&&++i[i.length-1].count}}})();var s={};e.margin=e.margin||{},s.top=typeof e.margin.top=="number"?e.margin.top:20,s.right=typeof e.margin.right=="number"?e.margin.right:20,s.bottom=typeof e.margin.bottom=="number"?e.margin.bottom:30,s.left=typeof e.margin.left=="number"?e.margin.left:40,e.width=e.width&&typeof e.width=="number"?e.width:500,e.height=e.height&&typeof e.height=="number"?e.height:400,e.container=e.container&&e.container!==""&&e.container!=="undefined"?e.container:"body",e.color=e.color&&e.color!==""&&e.color!=="undefined"?e.color:"steelblue",e.title=e.title&&e.title!==""&&e.title!=="undefined"?e.title:"",e.xlabel=e.xlabel&&e.xlabel!==""&&e.xlabel!=="undefined"?e.xlabel:"",e.ylabel=e.ylabel&&e.ylabel!==""&&e.ylabel!=="undefined"?e.ylabel:"";var o=e.width-s.left-s.right,u=e.height-s.top-s.bottom,a=e.xMarker||!1;a&&typeof a=="number"&&!e.time&&(a=e.xMarker);if(a&&e.time)var a=(new Date(e.xMarker)).getTime();var f=e.yMarker&&typeof e.yMarker=="number"?e.yMarker:!1;if(e.time===!0){for(var l=0,c=i.length;l<c;l++)i[l].x=parseFloat((new Date(i[l].x)).getTime());i.sort(function(e,t){var n=new Date(e.x),r=new Date(t.x);return n<r?-1:n>r?1:0});var h=e.xMax?new Date(e.xMax):0;h===0&&function(){h=new Date(i[0].x);var e;for(var t=0,n=i.length;t<n;t++)e=new Date(i[t].x),e>h&&(h=e)}();var p=e.xMin?new Date(e.xMin):0;p===0&&function(){p=new Date(i[0].x);var e;for(var t=0,n=i.length;t<n;t++)e=new Date(i[t].x),e<p&&(p=e)}();var d=d3.time.scale().domain([new Date(p),new Date(h)]).range([0,o])}else{var h=e.xMax&&typeof e.xMax=="number"?e.xMax:0;h===0&&function(){var e={};for(var t=0,n=i.length;t<n;t++)e=i[t],e.x>h&&(h=e.x)}();var d=d3.scale.linear().domain([0,h]).range([0,o])}var v=e.yMax&&typeof e.yMax=="number"?e.yMax:0;v===0&&function(){var e=v===0?!0:!1,t={};for(var n=0,r=i.length;n<r;n++)t=i[n],e&&t.y>v&&(v=t.y)}();var m=d3.scale.linear().domain([0,v]).range([u,0]),g=d3.svg.axis().scale(d).orient("bottom"),y=d3.svg.axis().scale(m).orient("left"),b=d3.svg.line().x(function(e){return d(e.x)}).y(function(e){return m(e.y)}),w=d3.select(e.container).append("svg").datum(i).attr("id",r).attr("class","lineChart").attr("width",o+s.left+s.right).attr("height",u+s.top+s.bottom).style("font","10px sans-serif").append("g").attr("transform","translate("+s.left+","+s.top+")");w.append("svg:text").attr("x",o/2+"px").attr("text-anchor","middle").style("font-weight","bold").style("font-size","16px").text(e.title),w.append("svg:text").attr("x",o/2+"px").attr("y",u+29+"px").attr("text-anchor","middle").style("font-weight","bold").style("font-size","12px").text(e.xlabel),w.append("svg:text").attr("x",-u/2+"px").attr("y","-29px").attr("text-anchor","middle").attr("transform","rotate(-90)").style("font-weight","bold").style("font-size","12px").text(e.ylabel);if(a){var E=d(a).toString();w.append("line").attr("x1",E).attr("y1","0").attr("x2",E).attr("y2",u.toString()).style("stroke","black")}if(f){var S=m(f).toString();w.append("line").attr("x1","0").attr("y1",S).attr("x2",o.toString()).attr("y2",S).style("stroke","black")}return w.append("g").attr("class","x axis").attr("transform","translate(0,"+u+")").call(g),w.append("g").attr("class","y axis").call(y),function(){var n=!1,r=0,s=t(i),o=[],u=3.5,a="1.5px";while(!n){r!==0&&(a="2px"),w.selectAll(".dot .run"+r).data(s).enter().append("circle").attr("class","dot").attr("cx",b.x()).attr("cy",b.y()).attr("r",u+4*r+"px").style("fill",function(t){if(!e.boxColors||!f||r!==0)return"none";if(t.y<f)return e.boxColors.belowLine||e.color;if(t.y>f)return e.boxColors.aboveLine||e.color;if(t.y==f)return e.boxColors.onLine||e.color}).style("stroke",function(t){if(e.boxColors&&f){if(t.y<f)return e.boxColors.belowLine||e.color;if(t.y>f)return e.boxColors.aboveLine||e.color;if(t.y==f)return e.boxColors.onLine||e.color}return e.color}).style("stroke-width",a).attr("rel","popover").attr("data-title",function(e){return e.y}).attr("data-content",function(t){return'<div style="margin-top:-15px"><strong>'+e.xlabel+":</strong> "+(new Date(t.x)).toLocaleDateString()+"<br>"+"<strong>"+e.ylabel+":</strong> "+t.y+"</strong></div>"});for(var l=0,c=s.length;l<c;++l)--s[l].count,s[l].count>0&&o.push(s[l]);s=o,o=[],++r,s.length===0&&(n=!0)}}(),e.popover&&jQuery&&jQuery("circle").popover(),function(){for(var t in e.data)if(e.data.hasOwnProperty(t)){var n=e.data[t].sort(),r=n[n.length-1],i=n[0],s=d((new Date(t)).valueOf()),o=m(r),u;if(e.boxColors&&f){if(r<f)var a="belowLine";if(i>f)var a="aboveLine";if(r>f&&i<f)var a="onLine";u=e.boxColors[a]||e.color}else u=e.color;w.append("svg:rect").attr("class","box").attr("x",s-5).attr("y",o-5).attr("width",10).attr("height",m(i)-o+10).style("fill","none").style("stroke",u).style("stroke-width","1.5px")}}(),{id:r,obj:e,remove:function(){var e=document.getElementById(this.id),t=document.createElement("div");return t.setAttribute("id",this.id),e.parentNode.replaceChild(t,e),this},redraw:function(e){return this.remove(),this.obj.data=e,this.obj.container="#"+this.id,charts.groupedLine(this.obj)},add:function(e){return this.redraw(charts.extend(this.obj.data,e)),this}}}}),charts.extend({line:function(e){var t=document.createElement("style");document.head.appendChild(t),t.innerHTML=".lineChart .axis path, .lineChart .axis line {  fill: none;  stroke: #000;  shape-rendering: crispEdges;}",e.popover&&jQuery&&(t.innerHTML=t.innerHTML+".tooltip{position:absolute;z-index:1020;display:block;padding:5px;font-size:11px;opacity:0;filter:alpha(opacity=0);visibility:visible}.tooltip.in{opacity:.8;filter:alpha(opacity=80)}.tooltip.top{margin-top:-2px}.tooltip.right{margin-left:2px}.tooltip.bottom{margin-top:2px}.tooltip.left{margin-left:-2px}.tooltip.top .tooltip-arrow{bottom:0;left:50%;margin-left:-5px;border-top:5px solid #000;border-right:5px solid transparent;border-left:5px solid transparent}.tooltip.left .tooltip-arrow{top:50%;right:0;margin-top:-5px;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:5px solid #000}.tooltip.bottom .tooltip-arrow{top:0;left:50%;margin-left:-5px;border-right:5px solid transparent;border-bottom:5px solid #000;border-left:5px solid transparent}.tooltip.right .tooltip-arrow{top:50%;left:0;margin-top:-5px;border-top:5px solid transparent;border-right:5px solid #000;border-bottom:5px solid transparent}.tooltip-inner{max-width:200px;padding:3px 8px;color:#fff;text-align:center;text-decoration:none;background-color:#000;-webkit-border-radius:4px;-moz-border-radius:4px;border-radius:4px}.tooltip-arrow{position:absolute;width:0;height:0}.popover{position:absolute;top:0;left:0;z-index:1010;display:none;padding:5px}.popover.top{margin-top:-5px}.popover.right{margin-left:5px}.popover.bottom{margin-top:5px}.popover.left{margin-left:-5px}.popover.top .arrow{bottom:0;left:50%;margin-left:-5px;border-top:5px solid #000;border-right:5px solid transparent;border-left:5px solid transparent}.popover.right .arrow{top:50%;left:0;margin-top:-5px;border-top:5px solid transparent;border-right:5px solid #000;border-bottom:5px solid transparent}.popover.bottom .arrow{top:0;left:50%;margin-left:-5px;border-right:5px solid transparent;border-bottom:5px solid #000;border-left:5px solid transparent}.popover.left .arrow{top:50%;right:0;margin-top:-5px;border-top:5px solid transparent;border-bottom:5px solid transparent;border-left:5px solid #000}.popover .arrow{position:absolute;width:0;height:0}.popover-inner{width:280px;padding:3px;overflow:hidden;background:#000;background:rgba(0,0,0,0.8);-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:6px;-webkit-box-shadow:0 3px 7px rgba(0,0,0,0.3);-moz-box-shadow:0 3px 7px rgba(0,0,0,0.3);box-shadow:0 3px 7px rgba(0,0,0,0.3)}.popover-title{margin:0;padding:9px 15px;line-height:1;background-color:#f5f5f5;border-bottom:1px solid #eee;-webkit-border-radius:3px 3px 0 0;-moz-border-radius:3px 3px 0 0;border-radius:3px 3px 0 0}.popover-content{padding:14px;background-color:#fff;-webkit-border-radius:0 0 3px 3px;-moz-border-radius:0 0 3px 3px;border-radius:0 0 3px 3px;-webkit-background-clip:padding-box;-moz-background-clip:padding-box;background-clip:padding-box}.popover-content p,.popover-content ul,.popover-content ol{margin-bottom:0}",!function(e){var t=function(e,t){this.init("tooltip",e,t)};t.prototype={constructor:t,init:function(t,n,r){var i,s;this.type=t,this.$element=e(n),this.options=this.getOptions(r),this.enabled=!0,this.options.trigger!="manual"&&(i=this.options.trigger=="hover"?"mouseenter":"focus",s=this.options.trigger=="hover"?"mouseleave":"blur",this.$element.on(i,this.options.selector,e.proxy(this.enter,this)),this.$element.on(s,this.options.selector,e.proxy(this.leave,this))),this.options.selector?this._options=e.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},getOptions:function(t){return t=e.extend({},e.fn[this.type].defaults,t,this.$element.data()),t.delay&&typeof t.delay=="number"&&(t.delay={show:t.delay,hide:t.delay}),t},enter:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);if(!n.options.delay||!n.options.delay.show)return n.show();clearTimeout(this.timeout),n.hoverState="in",this.timeout=setTimeout(function(){n.hoverState=="in"&&n.show()},n.options.delay.show)},leave:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);this.timeout&&clearTimeout(this.timeout);if(!n.options.delay||!n.options.delay.hide)return n.hide();n.hoverState="out",this.timeout=setTimeout(function(){n.hoverState=="out"&&n.hide()},n.options.delay.hide)},show:function(){var e,t,n,r,i,s,o;if(this.hasContent()&&this.enabled){e=this.tip(),this.setContent(),this.options.animation&&e.addClass("fade"),s=typeof this.options.placement=="function"?this.options.placement.call(this,e[0],this.$element[0]):this.options.placement,t=/in/.test(s),e.remove().css({top:0,left:0,display:"block"}).appendTo(t?this.$element:document.body),n=this.getPosition(t),r=e[0].offsetWidth,i=e[0].offsetHeight;switch(t?s.split(" ")[1]:s){case"bottom":o={top:n.top+n.height,left:n.left+n.width/2-r/2};break;case"top":o={top:n.top-i,left:n.left+n.width/2-r/2};break;case"left":o={top:n.top+n.height/2-i/2,left:n.left-r};break;case"right":o={top:n.top+n.height/2-i/2,left:n.left+n.width}}e.css(o).addClass(s).addClass("in")}},isHTML:function(e){return typeof e!="string"||e.charAt(0)==="<"&&e.charAt(e.length-1)===">"&&e.length>=3||/^(?:[^<]*<[\w\W]+>[^>]*$)/.exec(e)},setContent:function(){var e=this.tip(),t=this.getTitle();e.find(".tooltip-inner")[this.isHTML(t)?"html":"text"](t),e.removeClass("fade in top bottom left right")},hide:function(){function r(){var t=setTimeout(function(){n.off(e.support.transition.end).remove()},500);n.one(e.support.transition.end,function(){clearTimeout(t),n.remove()})}var t=this,n=this.tip();n.removeClass("in"),e.support.transition&&this.$tip.hasClass("fade")?r():n.remove()},fixTitle:function(){var e=this.$element;(e.attr("title")||typeof e.attr("data-original-title")!="string")&&e.attr("data-original-title",e.attr("title")||"").removeAttr("title")},hasContent:function(){return this.getTitle()},getPosition:function(t){return e.extend({},t?{top:0,left:0}:this.$element.offset(),{width:this.$element[0].offsetWidth,height:this.$element[0].offsetHeight})},getTitle:function(){var e,t=this.$element,n=this.options;return e=t.attr("data-original-title")||(typeof n.title=="function"?n.title.call(t[0]):n.title),e},tip:function(){return this.$tip=this.$tip||e(this.options.template)},validate:function(){this.$element[0].parentNode||(this.hide(),this.$element=null,this.options=null)},enable:function(){this.enabled=!0},disable:function(){this.enabled=!1},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(){this[this.tip().hasClass("in")?"hide":"show"]()}},e.fn.tooltip=function(n){return this.each(function(){var r=e(this),i=r.data("tooltip"),s=typeof n=="object"&&n;i||r.data("tooltip",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.tooltip.Constructor=t,e.fn.tooltip.defaults={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover",title:"",delay:0}}(window.jQuery),!function(e){var t=function(e,t){this.init("popover",e,t)};t.prototype=e.extend({},e.fn.tooltip.Constructor.prototype,{constructor:t,setContent:function(){var e=this.tip(),t=this.getTitle(),n=this.getContent();e.find(".popover-title")[this.isHTML(t)?"html":"text"](t),e.find(".popover-content > *")[this.isHTML(n)?"html":"text"](n),e.removeClass("fade top bottom left right in")},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var e,t=this.$element,n=this.options;return e=t.attr("data-content")||(typeof n.content=="function"?n.content.call(t[0]):n.content),e},tip:function(){return this.$tip||(this.$tip=e(this.options.template)),this.$tip}}),e.fn.popover=function(n){return this.each(function(){var r=e(this),i=r.data("popover"),s=typeof n=="object"&&n;i||r.data("popover",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.popover.Constructor=t,e.fn.popover.defaults=e.extend({},e.fn.tooltip.defaults,{placement:"right",content:"",template:'<div class="popover"><div class="arrow"></div><div class="popover-inner"><h3 class="popover-title"></h3><div class="popover-content"><p></p></div></div></div>'})}(window.jQuery));var n="line"+Math.round(Math.random()*1e6),r=e.data,i={};e.margin=e.margin||{},i.top=typeof e.margin.top=="number"?e.margin.top:20,i.right=typeof e.margin.right=="number"?e.margin.right:20,i.bottom=typeof e.margin.bottom=="number"?e.margin.bottom:30,i.left=typeof e.margin.left=="number"?e.margin.left:40,e.width=e.width&&typeof e.width=="number"?e.width:500,e.height=e.height&&typeof e.height=="number"?e.height:400,e.container=e.container&&e.container!==""&&e.container!=="undefined"?e.container:"body",e.color=e.color&&e.color!==""&&e.color!=="undefined"?e.color:"steelblue",e.title=e.title&&e.title!==""&&e.title!=="undefined"?e.title:"",e.xlabel=e.xlabel&&e.xlabel!==""&&e.xlabel!=="undefined"?e.xlabel:"",e.ylabel=e.ylabel&&e.ylabel!==""&&e.ylabel!=="undefined"?e.ylabel:"";var s=e.width-i.left-i.right,o=e.height-i.top-i.bottom,u=e.xMarker||!1;u&&typeof u=="number"&&!e.time&&(u=e.xMarker);if(u&&e.time)var u=(new Date(e.xMarker)).getTime();var a=e.yMarker&&typeof e.yMarker=="number"?e.yMarker:!1;if(e.time===!0){for(var f=0,l=r.length;f<l;f++)r[f].x=parseFloat((new Date(r[f].x)).getTime());r.sort(function(e,t){var n=new Date(e.x),r=new Date(t.x);return n<r?-1:n>r?1:0});var c=e.xMax?new Date(e.xMax):0;c===0&&function(){c=new Date(r[0].x);var e;for(var t=0,n=r.length;t<n;t++)e=new Date(r[t].x),e>c&&(c=e)}();var h=e.xMin?new Date(e.xMin):0;h===0&&function(){h=new Date(r[0].x);var e;for(var t=0,n=r.length;t<n;t++)e=new Date(r[t].x),e<h&&(h=e)}();var p=d3.time.scale().domain([new Date(h),new Date(c)]).range([0,s])}else{var c=e.xMax&&typeof e.xMax=="number"?e.xMax:0;c===0&&function(){var e={};for(var t=0,n=r.length;t<n;t++)e=r[t],e.x>c&&(c=e.x)}();var p=d3.scale.linear().domain([0,c]).range([0,s])}var d=e.yMax&&typeof e.yMax=="number"?e.yMax:0;d===0&&function(){var e=d===0?!0:!1,t={};for(var n=0,i=r.length;n<i;n++)t=r[n],e&&t.y>d&&(d=t.y)}();var v=d3.scale.linear().domain([0,d]).range([o,0]),m=d3.svg.axis().scale(p).orient("bottom"),g=d3.svg.axis().scale(v).orient("left"),y=d3.svg.line().x(function(e){return p(e.x)}).y(function(e){return v(e.y)}),b=d3.select(e.container).append("svg").datum(r).attr("id",n).attr("class","lineChart").attr("width",s+i.left+i.right).attr("height",o+i.top+i.bottom).style("font","10px sans-serif").append("g").attr("transform","translate("+i.left+","+i.top+")");b.append("svg:text").attr("x",s/2+"px").attr("text-anchor","middle").style("font-weight","bold").style("font-size","16px").text(e.title),b.append("svg:text").attr("x",s/2+"px").attr("y",o+29+"px").attr("text-anchor","middle").style("font-weight","bold").style("font-size","12px").text(e.xlabel),b.append("svg:text").attr("x",-o/2+"px").attr("y","-29px").attr("text-anchor","middle").attr("transform","rotate(-90)").style("font-weight","bold").style("font-size","12px").text(e.ylabel);if(u){var w=p(u).toString();b.append("line").attr("x1",w).attr("y1","0").attr("x2",w).attr("y2",o.toString()).style("stroke","black")}if(a){var E=v(a).toString();b.append("line").attr("x1","0").attr("y1",E).attr("x2",s.toString()).attr("y2",E).style("stroke","black")}return b.append("g").attr("class","x axis").attr("transform","translate(0,"+o+")").call(m),b.append("g").attr("class","y axis").call(g),b.append("path").attr("class","line").attr("d",y).style("fill","none").style("stroke",e.color).style("stroke-width","1.5px"),b.selectAll(".dot").data(r).enter().append("circle").attr("class","dot").attr("cx",y.x()).attr("cy",y.y()).attr("r",3.5).style("fill","white").style("stroke",e.color).style("stroke-width","1.5px").attr("rel","popover").attr("data-title",function(e){return e.y}).attr("data-content",function(t){var n=t.x;if(e.time)var n=(new Date(t.x)).toLocaleDateString();return'<div style="margin-top:-15px"><strong>'+e.xlabel+":</strong> "+n+"<br>"+"<strong>"+e.ylabel+":</strong> "+t.y+"</div>"}),e.popover&&jQuery&&jQuery("circle").popover(),{id:n,obj:e,remove:function(){var e=document.getElementById(this.id),t=document.createElement("div");return t.setAttribute("id",this.id),e.parentNode.replaceChild(t,e),this},redraw:function(e){return this.remove(),this.obj.data=e,this.obj.container="#"+this.id,charts.line(this.obj)},add:function(e){return this.redraw(this.obj.data.concat(e)),this}}}}),charts.extend({behavior:function(e,t,n,r){var i=e.positive,s=e.negative,o=e.neutral,u=[];Object.size=function(e){var t=0,n;for(n in e)e.hasOwnProperty(n)&&t++;return t},function(){var t=["positive","negative","neutral"];for(var n in t){var r=t[n],i=Object.size(e[r]),s=d3.scale.linear().domain([0,i]).range([100,256]),o=0;for(var a in e[r]){if(r==="positive")var f="rgb(0,"+s(o)+",0)";if(r==="negative")var f="rgb("+s(o)+",0,0)";if(r==="neutral")var f="rgb("+s(o)+","+s(o)+","+s(o)+")";u.push({data:e[r][a],label:a,color:f}),o++}}}();var a=this.donut({sections:u,centerLabel:"Behavior",container:t,width:n,height:r});return a.data=e,a.redraw=function(e){return this.remove(),this.data=e,this.container="#"+this.id,charts.behavior(this.data,this.container,n,r)},delete a.add,a}}),charts.extend({DRA:function(e){var t=[],n=e.scores;e.container=e.container&&e.container!==""&&e.container!=="undefined"?e.container:"body",e.color=e.color&&e.color!==""&&e.color!=="undefined"?e.color:"",e.width=e.width&&typeof e.width=="number"?e.width:undefined,e.height=e.height&&typeof e.height=="number"?e.height:undefined,e.popover=e.popover===!0?!0:!1;for(var r in n)n.hasOwnProperty(r)&&t.push({x:r,y:n[r]});t.sort(function(e,t){return e.x<t.x?-1:e.x>t.x?1:0});var i={time:!0,data:t,title:"Reading Level",xlabel:"Time",ylabel:"DRA Score",xMarker:e.deadline,yMarker:e.goal,xMax:e.xMax,yMax:e.yMax,xMin:e.xMin,yMin:e.yMin,container:e.container,width:e.width,height:e.height,color:e.color,popover:e.popover},s=this.line(i);return s.obj=e,s.redraw=function(e){return this.remove(),this.obj.scores=e,this.obj.container="#"+this.id,charts.DRA(this.obj)},s.add=function(e){this.redraw(charts.extend(this.obj.scores,e))},s}})