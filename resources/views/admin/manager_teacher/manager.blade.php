@extends('welcome')
@section('header')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <a href="{{route('manager_teacher.create')}}" class="btn btn-primary btn-lg active btn-add">New Teacher</a>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Name </th>
            <th style="width: 18%">Email</th>
            <th style="width: 14%">Level</th>
            <th style="width: 15%">Address</th>
            <th style="width: 14%">Birthday</th>
            <th style="width: 15%">Academy</th>
        </tr>
        @foreach($teacher as $tea)
        <tr>
            <td>{{$tea->name}} </td>
            <td>{{$tea->email}} </td>
            <td>{{$tea->level}} </td>
            <td>{{$tea->address}}</td>
            <td>{{$tea->birthday}} </td>
            <td>{{$tea->academy}} </td>
            <td> <a class="glyphicon glyphicon-edit" title="edit" href="{{route('manager_teacher.edit',$tea->id)}}"></a></td>
            <td>
                <form action="{{route('manager_teacher.destroy',$tea->id)}}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" title="DELETE" ><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection