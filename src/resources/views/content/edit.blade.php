@extends('admin::content.layout')

@section('sub-content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit content</div>

        <div class="panel-body">
            <form method="post" action="#">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Save & Publish">
                    <input type="submit" class="btn btn-warning" value="Save">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
@endsection
