@extends('master')

@section('content')

<div class="row">
<div class="col-md-4">
<h2>Hosts</h2>
</div>

<div class="col-md-8">
	<form class="form-inline pull-right" action="hosts" method="POST">
		<div class="form-group">
			<label for="hostName">Add New Host</label>
			<input type="text" class="form-control" id="hostName" name="name" placeholder="www.google.com">
		</div>
		<button type="submit" class="btn btn-default">Add Host</button>
	</form>
</div>
</div>

<table class="table table-striped">
	<tr>
		<th>id</th><th>name</th><th>created</th><th>&nbsp;</th><th>&nbsp;</th>
	</tr>
	@foreach ($hosts as $host)
	<tr>
		<td>{{$host['id']}}</td>
		<td>{{$host['name']}}</td>
		<td>{{$host['created_at']}}</td>
		<td><a href="/hosts/{{$host['id']}}/portscan" class="btn btn-default pull-right">Port Scan</a></td>
		<td><a href="/hosts/{{$host['id']}}" class="btn btn-default pull-right">View</a></td>
		
	</tr>
	@endforeach
</table>

@endsection