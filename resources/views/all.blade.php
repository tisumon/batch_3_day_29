@foreach($students as $student)
<h1>{{$student['id']}}<br/>{{$student['name']}}<br/>{{$student['email']}}<br/>{{$student['mobile']}}</h1>
@endforeach
