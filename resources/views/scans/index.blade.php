@extends('master')

@section('content')

<div class="row">
<div class="col-md-12">
<h2>Scans</h2>
</div>
<table class="table table-striped">
	<tr>
		<th>id</th><th>active</th><th>start</th><th>end</th><th>&nbsp;</th><th>&nbsp;</th>
	</tr>
	@foreach ($scans as $scan)
	<tr>
		<td>{{$scan['id']}}</td>
		<td>{{$scan['active']}}</td>		
		<td>{{$scan['created_at']}}</td>
		<td>{{$scan['stopped_at']}}</td>
		<td><a href="/scans/{{$scan['id']}}" class="btn btn-default pull-right">View</a></td>
		
	</tr>
	@endforeach
</table>


@endsection