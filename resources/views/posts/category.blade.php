<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Cat</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-8">
		<table class="table">
			<thead>

<th>#</th>
<th>Name</th>
<th>Create At</th>
<th>Option</th>
			</thead>
<tbody>
	<?php $no=1; ?>
	@foreach($cat as $key => $value)
	<tr>
	<th>{{ $no++ }}</th>
<th>{{ $value->name }}</th>
<th>{{ $value->created_at }}</th>
<th>{!!Form::open(['method' => 'DELETE', 'route' => ['delete.category', $value->id], 'style'=>'display:inline'])!!}
	{!!Form::button('', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm glyphicon glyphicon-trash'])!!}
	{!!Form::close()!!}
</th>	
	</tr>
	@endforeach
</tbody>
</table>
</div>
<div class="col-md-4">
{!!Form::open(['route'=>'create.category', 'data-parsley-validate' => ''])!!}
<b>Name</b>
{!!Form::text('name', NULL, array('class' => 'form-control', 'required' => '', 'maxlength' => '225' ))!!}
{!!Form::submit('Add Category', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top:20px'))!!}
{!!Form::close()!!}
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>