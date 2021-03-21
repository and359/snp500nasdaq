<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>


<body>                  				
	
		<br/><!-- Just so that JSFiddle's Result label doesn't overlap the Chart -->
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<div id="chartContainer" style="height: 360px; width: 100%;"></div>
<input type="button" value="Click me" id="updateChart">
	
	<script>
		var data = [];
var data2 = [];
var chartData = [
  {
    'January':'1',
    'February':'2',
    'March':'3',
    'April':'4',
    'May':'5',
    'June':'6',
    'July':'7',
    'August':'8',
    'September':'9',
    'October':'10',
    'November':'11',
    'December':'12'
  },
  {
    'January':'12',
    'February': '11',
    'March':'10',
    'April':'9',
    'May':'8',
    'June':'7',
    'July':'6',
    'August':'5',
    'September':'4',
    'October':'3',
    'November':'2',
    'December':'1'
  }
]
var chartData2 = [
  {
    'January':'10',
    'February':'20',
    'March':'30',
    'April':'40',
    'May':'50',
    'June':'60',
    'July':'70',
    'August':'80',
    'September':'90',
    'October':'100',
    'November':'110',
    'December':'120'
  },
  {
    'January':'120',
    'February': '110',
    'March':'100',
    'April':'90',
    'May':'80',
    'June':'70',
    'July':'60',
    'August':'50',
    'September':'40',
    'October':'30',
    'November':'20',
    'December':'10'
  }
]



for( var i=0; i<chartData.length; i++) {
  var dataPoints = [];
  var axisYType = "primary";
  //nsole.log(chartData[i])
  for (var obj in chartData[i]) {
    if(i == 0){
      if (chartData[i].hasOwnProperty(obj)) {      	
        dataPoints.push({label : obj, y: Number(chartData[i][obj])});
      }
    }
    else
    {
      if (chartData[i].hasOwnProperty(obj)) {
        dataPoints.push({label : obj, y: Number(chartData[i][obj])});
      }
      axisYType = "secondary"
    }
  }
  data.push({
    type: 'line',
    axisYType: axisYType,
    dataPoints: dataPoints
  })
}
var chart= new CanvasJS.Chart('chartContainer', {
  title:{
    text: 'Multiple y – axis'
  },
  axisY2: {
  },
  axisY: {
  },
  toolTip: {
    shared: true
  },
  data:data
});
chart.render();

document.getElementById("updateChart").addEventListener("click", function(){
	for( var i=0; i<chartData2.length; i++) {
  var dataPoints = [];
  var axisYType = "primary";
  //nsole.log(chartData[i])
  for (var obj in chartData2[i]) {
    if(i == 0){
      if (chartData2[i].hasOwnProperty(obj)) {      	
        dataPoints.push({label : obj, y: Number(chartData2[i][obj])});
      }
    }
    else
    {
      if (chartData2[i].hasOwnProperty(obj)) {
        dataPoints.push({label : obj, y: Number(chartData2[i][obj])});
      }
      axisYType = "secondary"
    }
  }
  data.push({
    type: 'line',
    axisYType: axisYType,
    dataPoints: dataPoints
  })
}
	chart.options.data = data;
  chart.render();
});
        </script>


	 		
</body>
</html>

