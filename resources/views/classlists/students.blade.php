@extends('layouts.app')
@section('content')
        <table class=" table-hover " border="1">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
            <tr class="table-active">
                <td>{{$student->student}}</a></td>
                <td><input type="text"></a></td>
            </tr>
            @endforeach
            
            
            </tbody>
        </table> 
    </div>
@endsection
