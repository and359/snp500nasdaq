<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Trading Analytics</title>
       
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script> 	
	<!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
	<!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet" 
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
	
      <!--chart.js annotation plugin-->
      <script>
			!function e(t,n,i){function a(r,l){if(!n[r]){if(!t[r]){var s="function"==typeof require&&require;if(!l&&s)return s(r,!0);if(o)return o(r,!0);var c=new Error("Cannot find module '"+r+"'");throw c.code="MODULE_NOT_FOUND",c}var u=n[r]={exports:{}};t[r][0].call(u.exports,function(e){var n=t[r][1][e];return a(n?n:e)},u,u.exports,e,t,n,i)}return n[r].exports}for(var o="function"==typeof require&&require,r=0;r<i.length;r++)a(i[r]);return a}({1:[function(e,t,n){},{}],2:[function(e,t,n){t.exports=function(t){function n(e){o.decorate(e,"afterDataLimits",function(e,t){e&&e(t),o.adjustScaleRange(t)})}function i(e){return function(t,n){var i=t.annotation.options.drawTime;o.elements(t).filter(function(t){return e===(t.options.drawTime||i)}).forEach(function(e){e.transition(n).draw()})}}var a=t.helpers,o=e("./helpers.js")(t),r=e("./events.js")(t),l=t.Annotation.types;return{beforeInit:function(e){var t=e.options,i=e.annotation={elements:{},options:o.initConfig(t.annotation||{}),onDestroy:[],firstRun:!0,supported:!1};e.ensureScalesHaveIDs(),t.scales&&(i.supported=!0,a.each(t.scales.xAxes,n),a.each(t.scales.yAxes,n))},beforeUpdate:function(e){var t=e.annotation;if(t.supported){t.firstRun?t.firstRun=!1:t.options=o.initConfig(e.options.annotation||{});var n=[];t.options.annotations.forEach(function(i){var a=i.id||o.objectId();if(!t.elements[a]&&l[i.type]){var r=l[i.type],s=new r({id:a,options:i,chartInstance:e});s.initialize(),t.elements[a]=s,i.id=a,n.push(a)}else t.elements[a]&&n.push(a)}),Object.keys(t.elements).forEach(function(e){n.indexOf(e)===-1&&(t.elements[e].destroy(),delete t.elements[e])})}},afterScaleUpdate:function(e){o.elements(e).forEach(function(e){e.configure()})},beforeDatasetsDraw:i("beforeDatasetsDraw"),afterDatasetsDraw:i("afterDatasetsDraw"),afterDraw:i("afterDraw"),afterInit:function(e){var t=e.annotation.options.events;if(a.isArray(t)&&t.length>0){var n=e.chart.canvas,i=r.dispatcher.bind(e);r.collapseHoverEvents(t).forEach(function(t){a.addEvent(n,t,i),e.annotation.onDestroy.push(function(){a.removeEvent(n,t,i)})})}},destroy:function(e){for(var t=e.annotation.onDestroy;t.length>0;)t.pop()()}}}},{"./events.js":4,"./helpers.js":5}],3:[function(e,t,n){t.exports=function(e){var t=e.helpers,n=e.Element.extend({initialize:function(){this.hidden=!1,this.hovering=!1,this._model=t.clone(this._model)||{},this.setDataLimits()},destroy:function(){},setDataLimits:function(){},configure:function(){},inRange:function(){},getCenterPoint:function(){},getWidth:function(){},getHeight:function(){},getArea:function(){},draw:function(){}});return n}},{}],4:[function(e,t,n){t.exports=function(t){function n(e){var t=!1,n=e.filter(function(e){switch(e){case"mouseenter":case"mouseover":case"mouseout":case"mouseleave":return t=!0,!1;default:return!0}});return t&&n.indexOf("mousemove")===-1&&n.push("mousemove"),n}function i(e){var t=this.annotation,i=o.elements(this),r=a.getRelativePosition(e,this.chart),l=o.getNearestItems(i,r),s=n(t.options.events),c=t.options.dblClickSpeed,u=[],f=o.getEventHandlerName(e.type),d=(l||{}).options;if("mousemove"===e.type&&(l&&!l.hovering?["mouseenter","mouseover"].forEach(function(t){var n=o.getEventHandlerName(t),i=o.createMouseEvent(t,e);l.hovering=!0,"function"==typeof d[n]&&u.push([d[n],i,l])}):l||i.forEach(function(t){if(t.hovering){t.hovering=!1;var n=t.options;["mouseout","mouseleave"].forEach(function(i){var a=o.getEventHandlerName(i),r=o.createMouseEvent(i,e);"function"==typeof n[a]&&u.push([n[a],r,t])})}})),l&&s.indexOf("dblclick")>-1&&"function"==typeof d.onDblclick){if("click"===e.type&&"function"==typeof d.onClick)return clearTimeout(l.clickTimeout),l.clickTimeout=setTimeout(function(){delete l.clickTimeout,d.onClick.call(l,e)},c),e.stopImmediatePropagation(),void e.preventDefault();"dblclick"===e.type&&l.clickTimeout&&(clearTimeout(l.clickTimeout),delete l.clickTimeout)}l&&"function"==typeof d[f]&&0===u.length&&u.push([d[f],e,l]),u.length>0&&(e.stopImmediatePropagation(),e.preventDefault(),u.forEach(function(e){e[0].call(e[2],e[1])}))}var a=t.helpers,o=e("./helpers.js")(t);return{dispatcher:i,collapseHoverEvents:n}}},{"./helpers.js":5}],5:[function(e,t,n){function i(){}function a(e){var t=e.annotation.elements;return Object.keys(t).map(function(e){return t[e]})}function o(){return Math.random().toString(36).substr(2,6)}function r(e){return null!==e&&"undefined"!=typeof e&&("number"==typeof e?isFinite(e):!!e)}function l(e,t,n){var i="$";e[i+t]||(e[t]?(e[i+t]=e[t].bind(e),e[t]=function(){var a=[e[i+t]].concat(Array.prototype.slice.call(arguments));return n.apply(e,a)}):e[t]=function(){var t=[void 0].concat(Array.prototype.slice.call(arguments));return n.apply(e,t)})}function s(e,t){e.forEach(function(e){(t?e[t]:e)()})}function c(e){return"on"+e[0].toUpperCase()+e.substring(1)}function u(e,t){try{return new MouseEvent(e,t)}catch(n){try{var i=document.createEvent("MouseEvent");return i.initMouseEvent(e,t.canBubble,t.cancelable,t.view,t.detail,t.screenX,t.screenY,t.clientX,t.clientY,t.ctrlKey,t.altKey,t.shiftKey,t.metaKey,t.button,t.relatedTarget),i}catch(a){var o=document.createEvent("Event");return o.initEvent(e,t.canBubble,t.cancelable),o}}}t.exports=function(e){function t(t){return t=h.configMerge(e.Annotation.defaults,t),h.isArray(t.annotations)&&t.annotations.forEach(function(t){t.label=h.configMerge(e.Annotation.labelDefaults,t.label)}),t}function n(e,t,n,i){var a=t.filter(function(t){return!!t._model.ranges[e]}).map(function(t){return t._model.ranges[e]}),o=a.map(function(e){return Number(e.min)}).reduce(function(e,t){return isFinite(t)&&!isNaN(t)&&t<e?t:e},n),r=a.map(function(e){return Number(e.max)}).reduce(function(e,t){return isFinite(t)&&!isNaN(t)&&t>e?t:e},i);return{min:o,max:r}}function f(e){var t=n(e.id,a(e.chart),e.min,e.max);"undefined"==typeof e.options.ticks.min&&"undefined"==typeof e.options.ticks.suggestedMin&&(e.min=t.min),"undefined"==typeof e.options.ticks.max&&"undefined"==typeof e.options.ticks.suggestedMax&&(e.max=t.max),e.handleTickRangeOptions&&e.handleTickRangeOptions()}function d(e,t){var n=Number.POSITIVE_INFINITY;return e.filter(function(e){return e.inRange(t.x,t.y)}).reduce(function(e,i){var a=i.getCenterPoint(),o=h.distanceBetweenPoints(t,a);return o<n?(e=[i],n=o):o===n&&e.push(i),e},[]).sort(function(e,t){var n=e.getArea(),i=t.getArea();return n>i||n<i?n-i:e._index-t._index}).slice(0,1)[0]}var h=e.helpers;return{initConfig:t,elements:a,callEach:s,noop:i,objectId:o,isValid:r,decorate:l,adjustScaleRange:f,getNearestItems:d,getEventHandlerName:c,createMouseEvent:u}}},{}],6:[function(e,t,n){var i=e("chart.js");i="function"==typeof i?i:window.Chart,i.Annotation=i.Annotation||{},i.Annotation.drawTimeOptions={afterDraw:"afterDraw",afterDatasetsDraw:"afterDatasetsDraw",beforeDatasetsDraw:"beforeDatasetsDraw"},i.Annotation.defaults={drawTime:"afterDatasetsDraw",dblClickSpeed:350,events:[],annotations:[]},i.Annotation.labelDefaults={backgroundColor:"rgba(0,0,0,0.8)",fontFamily:i.defaults.global.defaultFontFamily,fontSize:i.defaults.global.defaultFontSize,fontStyle:"bold",fontColor:"#fff",xPadding:6,yPadding:6,cornerRadius:6,position:"center",xAdjust:0,yAdjust:0,enabled:!1,content:null},i.Annotation.Element=e("./element.js")(i),i.Annotation.types={line:e("./types/line.js")(i),box:e("./types/box.js")(i)};var a=e("./annotation.js")(i);t.exports=a,i.pluginService.register(a)},{"./annotation.js":2,"./element.js":3,"./types/box.js":7,"./types/line.js":8,"chart.js":1}],7:[function(e,t,n){t.exports=function(t){var n=e("../helpers.js")(t),i=t.Annotation.Element.extend({setDataLimits:function(){var e=this._model,t=this.options,i=this.chartInstance,a=i.scales[t.xScaleID],o=i.scales[t.yScaleID],r=i.chartArea;e.ranges={},a&&(min=n.isValid(t.xMin)?t.xMin:a.getPixelForValue(r.left),max=n.isValid(t.xMax)?t.xMax:a.getPixelForValue(r.right),e.ranges[t.xScaleID]={min:Math.min(min,max),max:Math.max(min,max)}),o&&(min=n.isValid(t.yMin)?t.yMin:o.getPixelForValue(r.bottom),max=n.isValid(t.yMax)?t.yMax:o.getPixelForValue(r.top),e.ranges[t.yScaleID]={min:Math.min(min,max),max:Math.max(min,max)})},configure:function(){var e=this._model,t=this.options,i=this.chartInstance,a=i.scales[t.xScaleID],o=i.scales[t.yScaleID],r=i.chartArea;e.clip={x1:r.left,x2:r.right,y1:r.top,y2:r.bottom};var l,s,c=r.left,u=r.top,f=r.right,d=r.bottom;a&&(l=n.isValid(t.xMin)?a.getPixelForValue(t.xMin):r.left,s=n.isValid(t.xMax)?a.getPixelForValue(t.xMax):r.right,c=Math.min(l,s),f=Math.max(l,s)),o&&(l=n.isValid(t.yMin)?o.getPixelForValue(t.yMin):r.bottom,s=n.isValid(t.yMax)?o.getPixelForValue(t.yMax):r.top,u=Math.min(l,s),d=Math.max(l,s)),e.left=c,e.top=u,e.right=f,e.bottom=d,e.borderColor=t.borderColor,e.borderWidth=t.borderWidth,e.backgroundColor=t.backgroundColor},inRange:function(e,t){var n=this._model;return n&&e>=n.left&&e<=n.right&&t>=n.top&&t<=n.bottom},getCenterPoint:function(){var e=this._model;return{x:(e.right+e.left)/2,y:(e.bottom+e.top)/2}},getWidth:function(){var e=this._model;return Math.abs(e.right-e.left)},getHeight:function(){var e=this._model;return Math.abs(e.bottom-e.top)},getArea:function(){return this.getWidth()*this.getHeight()},draw:function(){var e=this._view,t=this.chartInstance.chart.ctx;t.save(),t.beginPath(),t.rect(e.clip.x1,e.clip.y1,e.clip.x2-e.clip.x1,e.clip.y2-e.clip.y1),t.clip(),t.lineWidth=e.borderWidth,t.strokeStyle=e.borderColor,t.fillStyle=e.backgroundColor;var n=e.right-e.left,i=e.bottom-e.top;t.fillRect(e.left,e.top,n,i),t.strokeRect(e.left,e.top,n,i),t.restore()}});return i}},{"../helpers.js":5}],8:[function(e,t,n){t.exports=function(t){function n(e){var t=(e.x2-e.x1)/(e.y2-e.y1),n=e.x1||0;this.m=t,this.b=n,this.getX=function(i){return t*(i-e.y1)+n},this.getY=function(i){return(i-n)/t+e.y1},this.intersects=function(e,t,n){n=n||.001;var i=this.getY(e),a=this.getX(t);return(!isFinite(i)||Math.abs(t-i)<n)&&(!isFinite(a)||Math.abs(e-a)<n)}}function i(e,t,n,i,a){var o=e.line,s={},c=0,u=0;switch(!0){case e.mode==l&&"top"==e.labelPosition:u=a+e.labelYAdjust,c=t/2+e.labelXAdjust,s.y=e.y1+u,s.x=(isFinite(o.m)?o.getX(s.y):e.x1)-c;break;case e.mode==l&&"bottom"==e.labelPosition:u=n+a+e.labelYAdjust,c=t/2+e.labelXAdjust,s.y=e.y2-u,s.x=(isFinite(o.m)?o.getX(s.y):e.x1)-c;break;case e.mode==r&&"left"==e.labelPosition:c=i+e.labelXAdjust,u=-(n/2)+e.labelYAdjust,s.x=e.x1+c,s.y=o.getY(s.x)+u;break;case e.mode==r&&"right"==e.labelPosition:c=t+i+e.labelXAdjust,u=-(n/2)+e.labelYAdjust,s.x=e.x2-c,s.y=o.getY(s.x)+u;break;default:s.x=(e.x1+e.x2-t)/2+e.labelXAdjust,s.y=(e.y1+e.y2-n)/2+e.labelYAdjust}return s}var a=t.helpers,o=e("../helpers.js")(t),r="horizontal",l="vertical",s=t.Annotation.Element.extend({setDataLimits:function(){var e=this._model,t=this.options;e.ranges={},e.ranges[t.scaleID]={min:t.value,max:t.endValue||t.value}},configure:function(){var e,t,l=this._model,s=this.options,c=this.chartInstance,u=c.chart.ctx,f=c.scales[s.scaleID];if(f&&(e=o.isValid(s.value)?f.getPixelForValue(s.value):NaN,t=o.isValid(s.endValue)?f.getPixelForValue(s.endValue):e),!isNaN(e)){var d=c.chartArea;l.clip={x1:d.left,x2:d.right,y1:d.top,y2:d.bottom},this.options.mode==r?(l.x1=d.left,l.x2=d.right,l.y1=e,l.y2=t):(l.y1=d.top,l.y2=d.bottom,l.x1=e,l.x2=t),l.line=new n(l),l.mode=s.mode,l.labelBackgroundColor=s.label.backgroundColor,l.labelFontFamily=s.label.fontFamily,l.labelFontSize=s.label.fontSize,l.labelFontStyle=s.label.fontStyle,l.labelFontColor=s.label.fontColor,l.labelXPadding=s.label.xPadding,l.labelYPadding=s.label.yPadding,l.labelCornerRadius=s.label.cornerRadius,l.labelPosition=s.label.position,l.labelXAdjust=s.label.xAdjust,l.labelYAdjust=s.label.yAdjust,l.labelEnabled=s.label.enabled,l.labelContent=s.label.content,u.font=a.fontString(l.labelFontSize,l.labelFontStyle,l.labelFontFamily);var h=u.measureText(l.labelContent).width,b=u.measureText("M").width,m=i(l,h,b,l.labelXPadding,l.labelYPadding);l.labelX=m.x-l.labelXPadding,l.labelY=m.y-l.labelYPadding,l.labelWidth=h+2*l.labelXPadding,l.labelHeight=b+2*l.labelYPadding,l.borderColor=s.borderColor,l.borderWidth=s.borderWidth,l.borderDash=s.borderDash||[],l.borderDashOffset=s.borderDashOffset||0}},inRange:function(e,t){var n=this._model;return n.line&&n.line.intersects(e,t,this.getHeight())||n.labelEnabled&&n.labelContent&&e>=n.labelX&&e<=n.labelX+n.labelWidth&&t>=n.labelY&&t<=n.labelY+n.labelHeight},getCenterPoint:function(){return{x:(this._model.x2+this._model.x1)/2,y:(this._model.y2+this._model.y1)/2}},getWidth:function(){return Math.abs(this._model.right-this._model.left)},getHeight:function(){return this._model.borderWidth||1},getArea:function(){return Math.sqrt(Math.pow(this.getWidth(),2)+Math.pow(this.getHeight(),2))},draw:function(){var e=this._view,t=this.chartInstance.chart.ctx;e.clip&&(t.save(),t.beginPath(),t.rect(e.clip.x1,e.clip.y1,e.clip.x2-e.clip.x1,e.clip.y2-e.clip.y1),t.clip(),t.lineWidth=e.borderWidth,t.strokeStyle=e.borderColor,t.setLineDash&&t.setLineDash(e.borderDash),t.lineDashOffset=e.borderDashOffset,t.beginPath(),t.moveTo(e.x1,e.y1),t.lineTo(e.x2,e.y2),t.stroke(),e.labelEnabled&&e.labelContent&&(t.beginPath(),t.rect(e.clip.x1,e.clip.y1,e.clip.x2-e.clip.x1,e.clip.y2-e.clip.y1),t.clip(),t.fillStyle=e.labelBackgroundColor,a.drawRoundedRectangle(t,e.labelX,e.labelY,e.labelWidth,e.labelHeight,e.labelCornerRadius),t.fill(),t.font=a.fontString(e.labelFontSize,e.labelFontStyle,e.labelFontFamily),t.fillStyle=e.labelFontColor,t.textAlign="center",t.textBaseline="middle",t.fillText(e.labelContent,e.labelX+e.labelWidth/2,e.labelY+e.labelHeight/2)),t.restore())}});return s}},{"../helpers.js":5}]},{},[6]);
      </script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />-->
	
	<style>
	table, th, td {
  	border: 1px solid black;
	}
	</style>
</head>

	<style type="text/css">
		.bg{
			background-image: linear-gradient(to top left,black,blue);
		}
		nav{
			background-image: linear-gradient(to top right,red,yellow); 
			padding-left: 200px;
			padding-right: -200px;
		}
		.content{
			padding-left: 200px;
			padding-right: -200px;
			height:100%;
		}
		.card-bg{
			background: rgba(0,0,0,0);
		}
		@media only screen and (max-width: 992px){
			.content,nav{
				padding-left: 0;
			}
		}
	</style>
	
<script type="text/javascript">
	$(document).ready(function(){
		$('.sidenav').sidenav();
	});
</script>
	
<body>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/annotations.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<!--get data from mysql-->
	<?php
	/* Database connection settings */
	$host = 'us-cdbr-east-03.cleardb.com';
	$user = 'b8a00bf633cf68';
	$pass = '1a8113a0';
	$db = 'heroku_69459908ed082cc';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1 = '';
	$data2 = '';
	$date = '';
	$data3 = '';
	$data4 = '';
	$data5 = '';
	$data6 = '';
	
	//query to get data from the table
	//$sql = "SELECT * FROM `backtest` WHERE Ticker = '".$ticker."';";
	$sql = "SELECT * FROM `backtest`;";
    	$result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$data1 = $data1 . '"'. $row['Price'].'",';
		$date = $date . '"'. $row['PriceDate'] .'",';
		$data6 = $data6 . '"'. $row['UnixTime'].'",';
	}
	
	$data1 = trim($data1,",");
	//$data2 = trim($data2,",");
	$date = trim($date,",");
	$data6 = trim($data6,",");
	
	$sql = "select Ticker from `heroku_69459908ed082cc`.`backtest` order by Ticker desc limit 1;";
    	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_array($result);
	$data2 = $data2 . $row['Ticker'];
	
	$sql = "select * from `heroku_69459908ed082cc`.`buy_sell`;";
    	$result = mysqli_query($mysqli, $sql);
	while ($row = mysqli_fetch_array($result)) {

		$data3 = $data3 . '"'. $row['TradeDate'].'",';
		$data4 = $data4 . '"'. $row['Remarks'].'",';
		$data5 = $data5 . '"'. $row['BuySell'].'",';
		$data7 = $data7 . '"'. $row['UnixTime'].'",';
		$data8 = $data8 . '"'. $row['Price'].'",';
		
	}

	$data3 = trim($data3,",");
	$data4 = trim($data4,",");
	$data5 = trim($data5,",");
	$data7 = trim($data7,",");
	$data8 = trim($data8,",");
	
	//echo "<script>document.writeln(txt);</script>";
	?>
	<!--end of mysql-->

	<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper">
			<a href="#" class="brand-logo center">Trading Results: </a>
			<a href="" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>		
		</div>
	</nav>
	</div>
	<ul class="sidenav sidenav-fixed bg" id="slide-out">
		<li>
			<div class="user-view">
				<div class="background">
					<img src="Backgrd.jpg" width="100%">
				</div>
				<a href="#"><img src="Untitled-1.jpg" class="circle"></a>
				<a href="#" class="white-text name">Andy Li (CA, FMVA, FRM)</a>
				<a href="#" class="white-text email">and.app28@gmail.com</a>
				<a href="#" class="white-text email">sli015@e.ntu.edu.sg</a>
			</div>	
		</li>
		<li><a href="" class="white-text"><i class="material-icons">home</i>Dashboard</a></li>
	</ul>
	<div class="content bg">
		<div class="container">
		<div class="row">
			<div class="col s12">
				<h1 class="white-text">DashBoard</h1>
			</div>
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<form action="/action_page.php">
                          			<div id="demo1" align="center"  value="1">
                      				<h3 style="color:orange; font-size:30px;">Choose Stock to Backtest</h3>
                      					<input type="radio" name="group1" id="color1" value="ETSY" style="color:orange; font-size:20px;" onClick="changeColor()"/><label for="color1">ETSY</label>
                      					<input type="radio" name="group1" id="color2" value="TSLA" style="color:orange; font-size:20px;" onClick="changeColor()"/><label for="color2">TSLA</label>
                      					<input type="radio" name="group1" id="color3" value="IVW" style="color:orange; font-size:20px;" onClick="changeColor()" /><label for="color3">IVW</label><br><br><br>
                  		  		</div>
                  				</form>

                  				<input type="button" name="tweet_button" id="tweet_button" onclick="myFunction()" value="Run Backtest" class="btn btn-info" />
						<!--<input type="button" name="tweet_button" id="tweet_button"  value="Tweet" class="btn btn-info" />-->
                  				<input type="text" id="order" size="30" style="color:orange; font-size:20px;">

                  				<script>
							
							
                                    			function myFunction() {
                                      				var group1 = document.forms[0];
                                      				var txt = "";
                                      				var i;
                                      				for (i = 0; i < group1.length; i++) {
                                        				if (group1[i].checked) {
                                          				txt = txt + group1[i].value + " ";
                                        				}
                                      				}
                                      			document.getElementById("order").value = "You Picked: " + txt;
							$(document).ready(function(){
								 //$('#tweet_button').click(function(){
								  //var tweet_txt = $('#tweet').val();
								  var tweet_txt = txt;
								  //trim() is used to remover spaces
								  if($.trim(tweet_txt) != '')
								  {
								   $.ajax({
								    url:"insert.php",
								    method:"POST",
								    data:{tweet:tweet_txt},
								    dataType:"text",
								    success:function(data)
								    {
								     	txt = txt;
								    }
								   });
								  }
								 //});
								setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
								  
									//$('#myChart').load("fetch.php").fadeIn("slow");
								  
								 	}, 1000);
								});
								
								myChart.destroy();
								//var chr3=document.getElementById("myChart").getContext("2d");
								var tweet_txt1 = txt;
								var tweet_txt2 = txt;
								var testing_date; 
								var testing_px; 
								
								$.ajax({
												type: 'get',
											  url: 'fetch_ticker.php',
											async: false,
											method:"POST",
											data:{tweet1:tweet_txt1},
											  //dataType:"json",
											  success: function(data) {
												  //testing_px = JSON.parse(data);
												  testing_px = data;												  
												  //testing_px = $.parseJSON(data);
												  
											    //$('.result').html(data);
											  }
											});
											   
								$.ajax({
												type: 'get',
											  url: 'fetch_date.php',
											async: false,
											method:"POST",
											data:{tweet2:tweet_txt2},
											  //dataType:"json",
											  success: function(data) {
												  //testing_date = JSON.parse(data);
												  //testing_date = $.parseJSON(data);
												  testing_date = data;
											    //$('.result').html(data);
											  }
											});
											   
								document.getElementById("order").value = testing_px;
								var findout = [document.getElementById("order").value];
								var findout1 = ["60.650002","58.5","57.970001","50.23","44.040001","49.009998","41.650002","42.119999","39.25","34.66","31.690001","33.029999","38.130001","41.290001","41.880001","38.669998","38.669998","38.439999","35.450001","34.799999","38.150002","46.459999","47.689999","51","53.68","55.439999","57.66","56.720001","59.720001","61.060001","65.050003","61.369999","62.75","62.849998","66.190002","69.279999","66.25","68.330002","64.870003","64.445","67.690002","72.790001","78.239998","76.589996","80.709999","80.279999","79.019997","81.550003","81.629997","85.629997","78.18","77.084999","75.294998","74.309998","77.480003","74.080002","76.239998","77.809998","80.980003","78.589996","81.860001","80.660004","80.300003","78.720001","76.470001","76.370003","79.809998","77.519997","79.760002","83.910004","84.550003","86.32","87","95.389999","96.300003","101.220001","98.169998","101.279999","102.540001","102.889999","106.230003","111.209999","110.68","112.970001","112.209999","111.900002","114.510002","111.290001","104.57","103.739998","101.970001","103.339996","102.709999","106.690002","104.650002","104.230003","102.459999","101.589996","105.949997","102.449997","108.690002","112.379997","118.379997","126.620003","129.800003","135.520004","130.660004","135.059998","134.720001","127.5","122.050003","128.729996","129.259995","129.720001","133.009995","131.130005","130.089996","130.369995","128.740005","125.480003","126.910004","122.370003","119.660004","119.699997","125.050003","124.370003","116.199997","112.040001","110.559998","112.709999","110.57","110.769997","112.550003","111.004997","108.800003","109.230003","111.75","116.010002","119.349998","115.089996","113.68","118.279999","123.690002","123.230003","121.629997","131.690002","131.630005","136.690002","134.559998","142.660004","139.539993","146.669998","147.380005","153.199997","149.970001","150.669998","147.589996","148.369995","144.789993","133.009995","135.940002","137.845001","139.729996","145.779999","139.639999","132.419998","121.589996","126.440002","130.449997","136.199997","143.639999","146.279999","121.199997","119.43","130.589996","127.029999","124.919998","125.620003","128.820007","127.010002","134.5","140.059998","140.199997","137.600006","145.089996","160.550003","160.699997","154.669998","154.619995","154.740005","155.029999","156.929993","163.970001","159.229996","165.300003","170.020004","169.970001","177.800003","182.339996","188.100006","190.759995","189.199997","197.380005","190.169998","190.309998","178.119995","177.009995","183.179993","177.910004","172.080002","174.979996","167.570007","170.789993","175.649994","183.039993","205.149994","207.029999","211.520004","204.419998","221.309998","215.690002","212.539993","213.589996","208.809998","204.410004","193.369995","202.410004","199.089996","203.770004","210.289993","210.070007","220.839996","231.119995","231.690002","229.869995","225.649994","226.050003","233.860001","228.320007","222.410004","220.820007","227.270004","213.119995","210.75","209.100006","197.580002","220.270004","244.580002","238.429993","208.610001","198.100006","200.300003"];
								//alert(testing_px + testing_date);
								//alert(tweet_txt1);
								//use another ajax
								//var testing_date1 = [testing_date];
								$(document).ready(function(){$.ajax({
								    url:"insert1.php",
								    method:"POST",
								    //data:{tweet5:testing_px},
									data:{tweet5:"123"},
								    dataType:"text",
								    success:function(data)
								    {
								     	txt = txt;
								    }
								   });
											    });

								
								var myChart3=new Chart(chr, {
								//var chart = new Chart(ctx, {
								   type: 'line',
								   data: {
									//labels: [<?php echo $date; ?>],
									   //labels: ["17/03/2020","13/04/2020","01/05/2020"],
									   labels: testing_date,
									   //labels: ["06/03/2020","09/03/2020","10/03/2020","11/03/2020","12/03/2020","13/03/2020","16/03/2020","17/03/2020","18/03/2020","19/03/2020","20/03/2020","23/03/2020","24/03/2020","25/03/2020","26/03/2020","27/03/2020","30/03/2020","31/03/2020","01/04/2020","02/04/2020","03/04/2020","06/04/2020","07/04/2020","08/04/2020","09/04/2020","13/04/2020","14/04/2020","15/04/2020","16/04/2020","17/04/2020","20/04/2020","21/04/2020","22/04/2020","23/04/2020","24/04/2020","27/04/2020","28/04/2020","29/04/2020","30/04/2020","01/05/2020","04/05/2020","05/05/2020","06/05/2020","07/05/2020","08/05/2020","11/05/2020","12/05/2020","13/05/2020","14/05/2020","15/05/2020","18/05/2020","19/05/2020","20/05/2020","21/05/2020","22/05/2020","26/05/2020","27/05/2020","28/05/2020","29/05/2020","01/06/2020","02/06/2020","03/06/2020","04/06/2020","05/06/2020","08/06/2020","09/06/2020","10/06/2020","11/06/2020","12/06/2020","15/06/2020","16/06/2020","17/06/2020","18/06/2020","19/06/2020","22/06/2020","23/06/2020","24/06/2020","25/06/2020","26/06/2020","29/06/2020","30/06/2020","01/07/2020","02/07/2020","06/07/2020","07/07/2020","08/07/2020","09/07/2020","10/07/2020","13/07/2020","14/07/2020","15/07/2020","16/07/2020","17/07/2020","20/07/2020","21/07/2020","22/07/2020","23/07/2020","24/07/2020","27/07/2020","28/07/2020","29/07/2020","30/07/2020","31/07/2020","03/08/2020","04/08/2020","05/08/2020","06/08/2020","07/08/2020","10/08/2020","11/08/2020","12/08/2020","13/08/2020","14/08/2020","17/08/2020","18/08/2020","19/08/2020","20/08/2020","21/08/2020","24/08/2020","25/08/2020","26/08/2020","27/08/2020","28/08/2020","31/08/2020","01/09/2020","02/09/2020","03/09/2020","04/09/2020","08/09/2020","09/09/2020","10/09/2020","11/09/2020","14/09/2020","15/09/2020","16/09/2020","17/09/2020","18/09/2020","21/09/2020","22/09/2020","23/09/2020","24/09/2020","25/09/2020","28/09/2020","29/09/2020","30/09/2020","01/10/2020","02/10/2020","05/10/2020","06/10/2020","07/10/2020","08/10/2020","09/10/2020","12/10/2020","13/10/2020","14/10/2020","15/10/2020","16/10/2020","19/10/2020","20/10/2020","21/10/2020","22/10/2020","23/10/2020","26/10/2020","27/10/2020","28/10/2020","29/10/2020","30/10/2020","02/11/2020","03/11/2020","04/11/2020","05/11/2020","06/11/2020","09/11/2020","10/11/2020","11/11/2020","12/11/2020","13/11/2020","16/11/2020","17/11/2020","18/11/2020","19/11/2020","20/11/2020","23/11/2020","24/11/2020","25/11/2020","27/11/2020","30/11/2020","01/12/2020","02/12/2020","03/12/2020","04/12/2020","07/12/2020","08/12/2020","09/12/2020","10/12/2020","11/12/2020","14/12/2020","15/12/2020","16/12/2020","17/12/2020","18/12/2020","21/12/2020","22/12/2020","23/12/2020","24/12/2020","28/12/2020","29/12/2020","30/12/2020","31/12/2020","04/01/2021","05/01/2021","06/01/2021","07/01/2021","08/01/2021","11/01/2021","12/01/2021","13/01/2021","14/01/2021","15/01/2021","19/01/2021","20/01/2021","21/01/2021","22/01/2021","25/01/2021","26/01/2021","27/01/2021","28/01/2021","29/01/2021","01/02/2021","02/02/2021","03/02/2021","04/02/2021","05/02/2021","08/02/2021","09/02/2021","10/02/2021","11/02/2021","12/02/2021","16/02/2021","17/02/2021","18/02/2021","19/02/2021","22/02/2021","23/02/2021","24/02/2021","25/02/2021","26/02/2021","01/03/2021","02/03/2021","03/03/2021","04/03/2021","05/03/2021"],
								      datasets: [{
									 label: 'Close Price',
									 //data: [100,200,300],
									 //data: [<?php echo $data1; ?>],
									 //data: testing_px,
									      data: findout1,
									 backgroundColor: 'rgba(0, 119, 290, 0.2)',
									 borderColor: 'rgba(0, 119, 290, 0.6)'
								      }]
								   },
								   options: {
								      scales: {
									 yAxes: [{
									    ticks: {
									       beginAtZero: true
									    }
									 }]
								      },
								      annotation: {
									 //drawTime: 'afterDatasetsDraw',
									 drawTime: 'afterDraw'//,
									 //annotations: test5
								      }
								   }
								});
                  					}
							
							
                  				</script>

					</div>
				</div>
			</div>
			<div class="col s12 m6 l3">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>Total Equity</p>
						<h5>$12,476.00</h5>
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">24.76%</b>
					</div>
				</div>
			</div>
			<div class="col s12 m6 l3">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>Net Gain/Loss</p>
						<h5>2,476.00</h5>
						<!--<i class="material-icons small red-text">keyboard_arrow_down</i><br>-->
						<!--<b class="red-text">%10</b>-->
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">100%</b>
					</div>
				</div>
			</div>
			<div class="col s12 l3 m6">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>Total Trades</p>
						<h5>12</h5>
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">100%</b>
					</div>
				</div>
			</div>
			<div class="col s12 l3 m6">
				<div class="card card-bg white-text">
					<div class="card-content center">
						<p>ROI</p>
						<h5>24.76%</h5>
						<i class="material-icons small green-text">keyboard_arrow_up</i><br>
						<b class="green-text">100%</b>
					</div>
				</div>
			</div>
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<canvas id="myChart2"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	
	
	
	<div class="content bg">
	<div class="container">
	<div class="row">
		<!--<div class="col-sm-6 col-md-6">-->
		<div class="col s12">
			<div class="col l12 m6 s12">
				<div class="card card-bg">
					<div class="card-content">
						<div id="container1"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
			
		<!--<h1><?php echo $data2; ?> Share Price</h1>-->	   
		
	<script type="text/javascript">
		var chr=document.getElementById("myChart").getContext("2d");
		var chr2=document.getElementById("myChart2").getContext("2d");
		
//chart 1		
		var marketing = [<?php echo $data6; ?>];
		var amount = [<?php echo $data1; ?>];
		var marketing3 = [<?php echo $data7; ?>];
		var amount4 = [<?php echo $data4; ?>];
		var px4 = [<?php echo $data8; ?>];
		var B_S = [<?php echo $data5; ?>];
		var marketing4 = [<?php echo $data3; ?>];
		var amount5 = [<?php echo $data9; ?>];
		var date5 = [<?php echo $date2; ?>];
		//var txt = "";
		
		var test3 = marketing.map(function(date1, index1) {
		
			
			return [
			Number(marketing[index1]), Number(amount[index1])
			];
		
		});
		
		//annotations	
		var test4 = marketing3.map(function(date2, px2) {
		
			if (B_S[px2]=='Buy'){
			return {
			//type: 'line', borderColor: 'green', id: 'vline' + index2, mode: 'vertical', scaleID: 'x-axis-0', value: date2, borderWidth: 1, label: {enabled: true, position: "bottom", content: amount4[index2]}}
			labelOptions: {backgroundColor: 'rgba(255,255,255,0.5)',verticalAlign: 'top',y: 15},labels: [{point: {xAxis: 0,yAxis: 0,x: date2,y: px4[px2]},text: amount4[px2]}]}
			} else {
			return{
			//type: 'line', borderColor: 'red', id: 'vline' + index2, mode: 'vertical', scaleID: 'x-axis-0', value: date2, borderWidth: 1, label: {enabled: true, position: "top", content: amount4[index2]}}
			labels: [{point: {xAxis: 0,yAxis: 0,x: date2,y: px4[px2]},x: -30,text: amount4[px2]}]}
			};
		
		});	
		
		var test5 = marketing4.map(function(date3, index3) {
		
			if (B_S[index3]=='Buy'){
			return {
			type: 'line', borderColor: 'green', id: 'vline' + index3, mode: 'vertical', scaleID: 'x-axis-0', value: date3, borderWidth: 1, label: {enabled: true, position: "bottom", content: amount[index3]}}
			} else {
			return{
			type: 'line', borderColor: 'red', id: 'vline' + index3, mode: 'vertical', scaleID: 'x-axis-0', value: date3, borderWidth: 1, label: {enabled: true, position: "top", content: amount[index3]}}
			};
		
		});		
		</script>
	
	
<script type="text/javascript">
	
	var elevationData = test3;

//chart JS
var myChart=new Chart(chr, {
		//var chart = new Chart(ctx, {
		   type: 'line',
		   data: {
			labels: [<?php echo $date; ?>],
		      datasets: [{
			 label: 'Close Price',
			 data: [<?php echo $data1; ?>],
			 backgroundColor: 'rgba(0, 119, 290, 0.2)',
			 borderColor: 'rgba(0, 119, 290, 0.6)'
		      }]
		   },
		   options: {
		      scales: {
			 yAxes: [{
			    ticks: {
			       beginAtZero: true
			    }
			 }]
		      },
		      annotation: {
			 //drawTime: 'afterDatasetsDraw',
			 drawTime: 'afterDraw',
			 annotations: test5
		      }
		   }
		});
//end of chart JS
	
//Highchart
	Highcharts.chart('container1', {

    chart: {
        type: 'area',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
            minWidth: 600
        }
    },

    caption: {
        text: 'This chart uses the Highcharts Annotations feature to place labels at various points of interest. The labels are responsive and will be hidden to avoid overlap on small screens.'
    },

    title: {
        text: 'Strategy Backtest Result'
    },

        credits: {
        enabled: false
    },
	
	
    annotations: test4,	

    xAxis: {
	    labels: {
      format: "{value:%b %e}"
    },
    
    type: "datetime"
    },

    yAxis: {
        startOnTick: true,
        endOnTick: false,
        maxPadding: 0.35,
        title: {
            text: null
        },
        labels: {
            format: '{value}'
        }
    },

    tooltip: {
        formatter: function() {
                return  '<b>' + this.series.name +'</b><br/>' +
                    Highcharts.dateFormat('%e - %b - %Y',
                                          new Date(this.x))
                + ' date, ' + this.y ;
            }
    },

    legend: {
        enabled: false
    },

    series: [{
        accessibility: {
            keyboardNavigation: {
                enabled: false
            }
        },
        data: elevationData,
        lineColor: Highcharts.getOptions().colors[1],
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 0.5,
        name: 'Elevation',
        marker: {
            enabled: false
        },
        threshold: null
    }]

});		
//end of Highchart
	
	
		var myChart2=new Chart(chr2,{
			type:'line',
			data:{
				labels:['Monday','Tuesday','Wednesday','Thursday','Friday'],
				datasets:[{
					label:'Data Users',
					data:[100,512,150,120,190],
					backgroundColor:'rgba(0,0,0,0)',
					borderColor:'#fff',
					borderWidth:1,
				}]
			},
			options:{
				legend:{
					labels:{
						fontColor:'#fff',
					}
				}
			}
		});
	</script>


<br>
	
	
<style>
table, th, td {
  border: 1px solid black;
}
</style>

<?php
//echo "FINALLY!!! AUNTY IS STAYING!!!!";
  
$servername = "us-cdbr-east-03.cleardb.com";
$username = "b8a00bf633cf68";
$password = "1a8113a0";
$dbname = "heroku_69459908ed082cc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT * FROM heroku_69459908ed082cc.`s&p500_returns`;";
	$sql = "SELECT * FROM heroku_69459908ed082cc.`rtd`;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<div class='content bg'><div class='container'><div class='row'><div class='col s12'><div class='col l12 m6 s12'><div class='card card-bg'><div class='card-content'><table border=1 bgcolor='#000066'><tr><th><font color='#ff9900'>#</font></th><th><font color='#ff9900'>Ticker</font></th><th><font color='#ff9900'>Desc</font></th><th><font color='#ff9900'>Close Price</font></th><th><font color='#ff9900'>Returns</font></th><th><font color='#ff9900'>Sector</font></th><th><font color='#ff9900'>Industry</font></th><th><font color='#ff9900'>Volume</font></th><th><font color='#ff9900'>Index</font></th></tr>";
	
    while($row = $result->fetch_assoc()) {
        //echo ++$row_num . ") Ticker: " . $row["Ticker"]. " - Value Date: " . $row["ValueDate"]. " - Close Price: " . $row["ClosePx"]. " Returns: " . $row["Returns_Percent"]. " - Volume: " . $row["Volume"]. " - Uploaded: " . $row["UploadTime"]. " " . "<br>";
	
	echo "<tr><td><font color='#ff9900'>" . ++$row_num . ")</font></td><td><font color='#ff9900'>" . $row["Ticker"]. "</font></td><td><font color='#ff9900'>" . $row["Desc_"]. "</font></td><td><font color='#ff9900'>" . $row["LastPx"]. "</font></td><td><font color='#ff9900'>" . $row["RtnPercent"]. "</font></td><td><font color='#ff9900'>" . $row["Sector"]. "</font></td><td><font color='#ff9900'>" . $row["Industry"]. "</font></td><td><font color='#ff9900'>" . $row["Volume"]. "</font></td><td><font color='#ff9900'>" . $row["Index_"]. "</font></td></tr>";
	
    }	echo "</font></table></div></div></div></div></div></div></div>";
} else {
    echo "0 results";
}
	
	$sql = "select uploadtime from `heroku_69459908ed082cc`.`rtd` order by uploadtime desc limit 1;";
$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo "Table updated on: " . $row["uploadtime"] . "<br><br>";
	
$conn->close();
	
	//echo "TGIF";
	
?>
	<p>
<script> document.write(new Date().toLocaleDateString()); </script>
</p>

	 		
</body>
</html>

