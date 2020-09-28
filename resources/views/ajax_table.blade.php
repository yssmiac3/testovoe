<!DOCTYPE html>
<html>
<head>
	<title>Consumer`s table</title>
	<!-- <link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
    	$('#consumers').DataTable();
		} );</script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    </table>


    <form action="/api/consumers" method="POST" id="blockForm">
        @csrf
        <input type="text" name="first_name"><br>
        <input type="text" name="last_name"><br>
        <input type="email" name="email"><br>
        <input type="submit" value="confirm_button">
    </form>

    <button id="refresh_button">Refresh</button>
        
    <script>

        $(function() {
            $(#blockForm).submit(function() {

                var formData = {
                    'first_name': $('input[name=first_name]').val();
                    'last_name': $('input[name=last_name]').val();
                    'email': $('input[name=email]').val();
                };

                $(#blockForm).block();

                $.ajax({
                    type: "POST",
                    url: "/api/consumers", 
                    data: formData,
                    dataType: 'json',
                    success: function() {
                        $(#blockForm).unblock();
                    },
                    error: functin() {
                        $(#blockFOrm).unblock();
                        alert("Error!");
                    }
                });

                event.prevetDefault();
            });

            $(#refresh_button).click(function() {
                $(#refresh_button).block();

                $ajax({
                    type: "GET",
                    url: "/api/consumers",
                    success: function() {
                        $(#consumers).unblock();
                    },
                    error: function() {
                        $(#consumers).unblock();
                        alert("Error!");
                    }
                });

                event.prevetDefault();
            });

        });
    </script>
</body>
</html>