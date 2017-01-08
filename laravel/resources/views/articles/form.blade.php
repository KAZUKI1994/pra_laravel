
<div class="form-group">
  {!! Form::label('title', 'Title:') !!}
  {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('body', 'Body:') !!}
  {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('published_at', 'Published On:') !!}
  {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-controll']) !!}
</div>
<div class="form-group">
  {!! Form::label('tag_list', 'Tags:') !!}
  {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-controll', 'multiple']) !!}
</div>
<div class="form-group">
  {!! Form::submit($submitButtonText, ['id' => 'tag_list', 'class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
  <script>
    $('#tag_list').select2({
      placeholder: 'Choose a tag',
      tags: true
    });
  </script>
@endsection
