@extends('master')

@section('content')
<h2>Hosts</h2>

<table class="table table-striped">
	<tr>
		<th>id</th><th>name</th><th>created</th><th>&nbsp;</th><th>&nbsp;</th>
	</tr>
	@foreach ($hosts as $host)
	<tr>
		<td>{{$host['id']}}</td>
		<td>{{$host['name']}}</td>
		<td>{{$host['created_at']}}</td>
		<td><a href="#" class="btn btn-default pull-right">Port Scan</a></td>
		<td><a href="/hosts/{{$host['id']}}" class="btn btn-default pull-right">View</a></td>
		
	</tr>
	@endforeach
</table>

@endsection