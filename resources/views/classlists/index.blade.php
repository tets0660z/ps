@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover table-sm">
        <thead>
        <tr>
        <th scope="col">Section</th>
        <th scope="col">Subject</th>
        <th scope="col">Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($classlists as $classlist)
        <tr >
            <td>{{$classlist->sections}}</td>
            <td></td>
            <td>
                <p><a href=" {{ route('display',[$classlist->sections,'lec']) }}">Lec</a></p>
                <p><a href=" {{ route('display',[$classlist->sections,'lab']) }}">Lab</a></p>
                <p><a href=" {{ route('display',[$classlist->sections,'leclab4060']) }}">LecLab 40 60</a></p>
                <p><a href=" {{ route('display',[$classlist->sections,'leclab5050']) }}">LecLab 50 50</a></p>
                <p><a href=" {{ route('display',[$classlist->sections,'leclab6040']) }}">LecLab 60 40</a></p>
            </td>
        </tr>
        @endforeach
        
        
        </tbody>
    </table> 
</div>
@endsection
