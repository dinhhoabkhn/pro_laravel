@extends('welcome')
@section('header')
    <div class="container">
        <form action="{{route('manager_subject.store')}}" method="post" role="form" class="form-horizontal">
            {{ csrf_field() }}
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group">
                <label class="control-label">Name Subject</label>
                <input type="text" placeholder="Name subject " class="form-control" name="name">
            </div>
            <div class="form-group">
                <label class="control-label">Academy</label>
                <select class="form-control" name="academy">
                    <option>Công nghệ thông tin- Truyền thông</option>
                    <option>Toán tin</option>
                    <option>Điện</option>
                    <option>Điện tử viễn thông</option>
                    <option>Kinh tế</option>
                    <option>Ngoại ngữ</option>
                    <option>Hóa học</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection