@if(count($errors))
	<div class="alert alert-danger" role="alert">
		<ul>
			@foreach($errors->all() as $error)

				<li>
					<p  style="color:white;">{{ $error }}</p>
				</li>

			@endforeach
		</ul>
	</div>
@endif