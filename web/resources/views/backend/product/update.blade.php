@extends('backend.app');
@section('conten')
    <div class="card-body row">
        <div class="col-6">
        <form action="{{ route('admin.hadnelUpdate.product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" id="" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="category" id="" class="form-select">
                    <option value="{{ $category->id  }}">{{ $category->name  }}</option>
                   
                </select>
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" name="qty" id="" class="form-control" value="{{ $product->quanty }}">
            </div>
            <div class="form-group">
                <label for="">Giá tiền</label>
                <input type="number" name="price" id="" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="">Giảm giá</label>
                <input type="number" name="discout" id=""class="form-control" placeholder="Phần trăm giảm giá" value="{{ $product->discout }}">
            </div>
            <div class="form-group">
                <label for="">Ảnh</label><br>
                <input type="hidden" value="{{ $product->image }}" name="img" >
                <img src="{{ asset('storage/image/backend/'.$product->image) }}"  alt="" width="150px">
            </div>
            <div class="form-group">
                <label for="">Cập nhật ảnh</label>
                <input type="file" name="image" id="">
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="des" id="editor" cols="60" rows="10" class="form-control" value="{{ $product->descripton }}">{{ $product->descripton }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
    </div>
    </div>
@endsection