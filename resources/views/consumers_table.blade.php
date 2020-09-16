<!DOCTYPE html>
<html>
<head>
	<title>Consumer`s table</title>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
    	$('#consumers').DataTable();
		} );</script>
</head>
<body>
	<table id="consumers" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
				<th>Amount</th>
		</thead>
		<tbody>
			@foreach($data as $person)
			<tr>
				<td>{{ $person->first_name }}</td>
				<td>{{ $person->last_name }}</td>
				<td>{{ $person->email }}</td>
				<td>{{ $person->amount }}</td>
			</tr>
			@endforeach
		</tbody>
</body>
</html>