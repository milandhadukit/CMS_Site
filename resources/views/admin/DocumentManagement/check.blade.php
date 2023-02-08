<!DOCTYPE html>
<html>
<head>
	<title>How to Delete Multiple Records in Laravel - Techsolutionstuff</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>How to Delete Multiple Records in Laravel - Techsolutionstuff</h1>
	<form method="post" action="{{url('multipleusersdelete')}}">
		{{ csrf_field() }}
		<br>
		<input class="btn btn-success" type="submit" name="submit" value="Delete All Users"/>
		<br><br>
		<table class="table-bordered table-striped" width="50%">
			<thead>
				<tr>
					<th class="text-center">S.No.</th>
					<th class="text-center">title</th>
					<th class="text-center"> <input type="checkbox" id="checkAll"> Select All</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=1;
				foreach ($list as $key => $value) {
					$name = $list[$key]->name;
					?>
					<tr>
						<td class="text-center">{{$i}}</td>
						<td class="text-center">{{$name}}</td>
						<td class="text-center"><input name='id[]' type="checkbox" id="checkItem" 
                         value="<?php echo $list[$key]->id; ?>">
                         
						</tr>
						<?php $i++; }?>
					</tbody>
				</table>
				<br>
			</form>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
		<script language="javascript">
			$("#checkAll").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
		</script>
	</body>
	</html>