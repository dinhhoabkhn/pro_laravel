@extends('welcome')
@section('header')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <a href="{{route('manager_teacher.create')}}" class="btn btn-primary active btn-add">New Teacher</a>
    </div>
    <div class="row">
        <form action="" method="get">
            <div class="form-group">
                <div class="col-md-3 col-md-offset-4">
                <input type="text" name="name" class="form-control" placeholder="type teacher name">
            </div>
                <input type="submit" name="Search" class="btn btn-primary" value="Search">
            </div>
            
        </form>
    </div>
    <table class="table-bordered table">
        <tr>
            <th >Name </th>
            <th >Email</th>
            <th >Level</th>
            <th >Address</th>
            <th >Birthday</th>
            <th >Academy</th>
            <th colspan="2">Action</th>
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
                    <button type="submit" title="DELETE" class="delete"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$teacher->links()}}
</div>
@endsection