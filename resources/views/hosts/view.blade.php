@extends('master')

@section('content')

<h2>Host: {{$host['name']}}
	<a href="/hosts/{{$host['id']}}/portscan" class="btn btn-default pull-right">Port Scan</a>
	<a href="/hosts/{{$host['id']}}/ping" class="btn btn-default pull-right">Ping</a>	
</h2>

<canvas id="pingsChart" width="800" height="400"></canvas>

<h3>PortScans</h3>
<table class="table table-striped">
	<tr>
		<th>id</th><th>ports</th><th>created</th>
	</tr>
	@foreach($portScans as $scan)
	<tr>
		<td>{{$scan['id']}}</td>
		<td>{{$scan['ports']}}</td>
		<td>{{$scan['created_at']}}</td>
	</tr>
	@endforeach
</table>

@endsection

@section('javascript')

<script type="text/javascript">

var jsonData = JSON.parse('{!! $pingsJson !!}');

//console.log(jsonData.dates);

var data = {
	//labels: [jsonData.dates],
	labels: jsonData.labels,
	datasets: [
	{
        label: "My First dataset",
		data: jsonData.pings

	}]
}

var options = {

    ///Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : false,

    //Don't show the labels
    scaleShowLabels : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - Whether the line is curved between points
    bezierCurve : true,

    //Number - Tension of the bezier curve between points
    bezierCurveTension : 0.4,

    //Boolean - Whether to show a dot for each point
    pointDot : false,

    //Number - Radius of each point dot in pixels
    //pointDotRadius : 4,

    //Number - Pixel width of point dot stroke
    //pointDotStrokeWidth : 1,

    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 0,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 2,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill : false,

    //String - A legend template
    //legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

};
console.log(data);

var ctx = document.getElementById("pingsChart").getContext("2d");
var myBarChart = new Chart(ctx).Line(data,options);

</script>

@endsection