@extends('master')

@section('content')

<h2>Host: {{$host['name']}}
	<a href="#" class="btn btn-default pull-right">Port Scan</a>
	<a href="/hosts/{{$host['id']}}" class="btn btn-default pull-right">Ping</a>	
</h2>

<h3>Host Pings</h3>
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

@endsection