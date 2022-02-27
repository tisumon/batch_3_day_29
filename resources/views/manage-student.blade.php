@extends('master')
@section('title')
     Manage Student Page
@endsection

@section('body')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">All Student</div>
                        <div class="card-body">
                        <h4 class="text-success text-center">{{Session::get('message')}}</h4>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr class="text-center">
                                        <th>SL NO</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Student Email</th>
                                        <th>Student Mobile</th>
                                        <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               @foreach($students as $student)
                                   <tr>
                                       <td>{{$loop->iteration}}</td>
                                       <td>{{$student->id}}</td>
                                       <td>{{$student->name}}</td>
                                       <td>{{$student->email}}</td>
                                       <td>{{$student->mobile}}</td>
                                       <td class="text-center">
                                           <a href="{{route('edit-student',['id'=>$student->id])}}" class="btn  btn-success btn-sm">
                                               <i class="fa fa-user-edit"></i>
                                           </a>
                                           <a href="" class="btn btn-danger btn-sm" onclick="deleteStudent({{$student->id}})">
                                               <i class="fas fa-user-times"></i>
                                           </a>
                                           <form method="post" action="{{route('delete-student',['id'=>$student->id])}}" id="deleteStudentForm{{$student->id}}">
                                               @csrf
                                           </form>
                                       </td>
                                   </tr>
                               @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function deleteStudent(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure to delete this..');
            if(check)
              {
                  document.getElementById('deleteStudentForm'+id).submit();
              }
        }
    </script>
@endsection

