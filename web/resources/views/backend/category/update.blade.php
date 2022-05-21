@extends('backend.app');
@section('conten')
    <main>
        <div class="container-fluid px-4">
            <div class="row">
            <div class="col-5 card mb-4">
                <h3>Sửa danh mục</h3>
               @if (Session::has('fail'))
                   <p>{{ Session::get('fail') }}</p>
               @endif
                <form action="{{ route('admin.hadnel-update.category') }}" method="post">
                    @csrf
                    <label for="">Tên danh mục</label>
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    <label for="">Danh mục cha</label>
                    <select name="parent" id="" class="form-select">
                        @if ($category->parent_id == 0)
                            <option value="{{ $category->parent_id }}">Danh mục cha</option>
                        @endif
                    </select>
                    <button type="submit" class="btn btn-primary" name="submit">Xác nhận</button>
                </form>
            </div>
            
        </div>
        </div>
    </main>
@endsection