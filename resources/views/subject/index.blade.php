@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover ">
        <thead>
        <tr>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($subjects as $subject)
        <tr class="table-active">
            <td>{{$subject->subject_code}}</td>
        </tr>
        @endforeach
        
        
        </tbody>
    </table> 
</div>
@endsection
