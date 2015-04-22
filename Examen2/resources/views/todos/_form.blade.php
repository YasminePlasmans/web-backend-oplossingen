
<div class="form-group">

	{!! Form::label('title', 'Your task:') !!}
	{!! Form::text('title', null, ['class' => 'form-control' ]) !!}
			
</div>

<div class="form-group">
			
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control' ]) !!}

</div>