@extends('backend.app');
@section('conten')
    
            <div class="row">
            <div class="col-5 card mb-4">
                <h3>Thêm danh mục</h3>
               @if (Session::has('fail'))
                   <p>{{ Session::get('fail') }}</p>
               @endif
                <form action="{{ route('admin.add.category') }}" method="post">
                    @csrf
                    <label for="">Tên danh mục</label>
                    <input type="text" class="form-control" name="name">
                    <label for="">Danh mục cha</label>
                    <select name="parent" id="" class="form-select">
                        <option value="0">Danh mục cha</option>
                    </select>
                    <button type="submit" class="btn btn-primary" name="submit">Xác nhận</button>
                </form>
            </div>
            <div class="col-7 card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                   Danh mục
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 0;
                            @endphp
                            @foreach ($category as $category )
                            <tr id="rowBrand_{{ $category->id }}">
                                <td>{{ $stt = $stt + 1 }}</th>
                                <td>{{ $category->namecate }}</th>
                                <td><a href="{{ route('admin.update.category',['id' =>$category->id]) }}" class="btn btn-primary">Sửa</a></td>
                                <td><a id="deleteCategory_{{ $category->id }}" onclick="deleteCategory({{ $category->id }})" class="btn btn-danger">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
@endsection

@push('javascript')
    <script>
        function deleteCategory(id){
            $.ajax({
                url: "{{ route('admin.delete.category') }}",
                type: "POST",
                data:{id},
                beforSend: function() {
                    $('#deleteCategory_'+id).text('Loading ...');
                },
                success: function(data){
                    if(data.cod == 200){
                        $('#rowBrand_'+id).hide();
                    }else{
                        alert(data.mess);
                    }
                }
            })
        }
    </script>
@endpush