@extends('master')

@section('content')

<div class="row">
<div class="col-md-4">
<h2>Port Scans for All Hosts</h2>
</div>


<table class="table table-striped">
	<tr>
		<th>id</th><th>host</th><th>created</th><th>&nbsp;</th><th>&nbsp;</th>
	</tr>
	@foreach ($portScans as $scan)
	<tr>
		<td>{{$scan['id']}}</td>
		<td>{{$scan['host_id']}}</td>
		<td>{{$scan['ports']}}</td>
		<td>{{$scan['created_at']}}</td>
		<td><a href="/hosts/{{$host['id']}}" class="btn btn-default pull-right">View</a></td>
		
	</tr>
	@endforeach
</table>

@endsection