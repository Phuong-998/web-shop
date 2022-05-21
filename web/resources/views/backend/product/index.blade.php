@extends('backend.app')
@section('conten')
<div class="card-body">
    <table id="datatablesSimple">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Giá tiền</th>
                <th>Giảm giá</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @php
                $stt = 0;
            @endphp
            @foreach ($product as $product )
            <tr id="rowBrand_{{ $product->id }}">
                <td>{{ $stt = $stt + 1 }}</th>
                <td>{{ $product->id }}</th>
                <td><img src="storage/image/backend/{{ $product->image }}" alt=""></th>
                <td>{{ $product->namecate }}</th>
                <td>{{ $product->price }}</th>
                <td>{{ $product->discout }}</th>
                <td>{!!$product->descripton!!}</th>
                <td>{{ $product->status }}</th>
                <td><a href="{{ route('admin.update.product',['id' =>$product->id]) }}" class="btn btn-primary">Sửa</a></td>
                <td><a id="deleteCategory_{{ $product->id }}" onclick="deleteProduct({{ $product->id }})" class="btn btn-danger">Xóa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('javascript')
    <script>
        function deleteProduct(id){
            $.ajax({
                url : "{{ route('admin.delete.ptoduct') }}",
                type: "POST",
                data:{id},
                success:function(data){
                    if(data.cod == 200){
                        $('#rowBrand_'+id).hide();
                        alert(data.mess);
                    }
                }
            });
        }
    </script>
@endpush