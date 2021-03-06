@extends('master')

@section('content')

<div class="row">
<div class="col-md-12">
<h2>Outages</h2>
</div>

<table class="table table-striped">
	<tr>
		<th>id</th><th>start_at</th><th>end_at</th><th>&nbsp;</th>
	</tr>
	@foreach ($outages as $outage)
	<tr>
		<td>{{$outage['id']}}</td>
		<td>{{$outage['display_start']}}</td>
		<td>
		@if(!is_null($outage['display_end']))
		{{$outage['display_end']}}
		@endif

		</td>
		<td><!--<a href="/outages/{{$outage['id']}}" class="btn btn-default pull-right">View</a>--></td>
	</tr>
	@endforeach
</table>

@endsection