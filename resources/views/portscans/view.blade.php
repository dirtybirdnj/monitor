@extends('master')

@section('content')
<h1>Portscan!</h1>
<pre>
<?php var_dump($portScan->toArray()); ?>
</pre>
@endsection