@extends('master')

@section('content')

<h2>Host: {{$host['name']}}
	<a href="/hosts/{{$host['id']}}/portscan" class="btn btn-default pull-right">Port Scan</a>
	<a href="/hosts/{{$host['id']}}/ping" class="btn btn-default pull-right">Ping</a>	
</h2>

<h3>Pings</h3>
<table class="table table-striped">
	<tr>
		<th>id</th><th>latency (ms)</th><th>created</th>
	</tr>
	@foreach($host['pings'] as $ping)
	<tr>
		<td>{{$ping['id']}}</td>
		<td>{{$ping['latency']}}</td>
		<td>{{$ping['created_at']}}</td>

		
	</tr>
	@endforeach
</table>


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