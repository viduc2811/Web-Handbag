@extends('admin.main')
@section('head')
<script src="https://cdn.tiny.cloud/1/n16bdrwmjclekjbgelmvbu9ot2xcdq6jy4y1709ip7xoucrc/tinymce/7/tinymce.min.js" 
referrerpolicy="origin"></script> 

<script>
  tinymce.init({
    selector: 'textarea', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    branding: false
  });
</script>
@endsection


@section ('content')
<form action="{{ route('menus.edit', ['menu' => $menu->menu_id]) }}" method="POST">
        <div class="card-body">

        <div class="form-group">
        <label for="menu_name">Tên danh mục</label>
        <input type="text" class="form-control" id="menu_name" name="menu_name" value="{{ old('menu_name', $menu->menu_name) }}">
    </div>

    <div class="form-group">
        <label for="slug">Đường dẫn</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $menu->slug) }}">
    </div>

    <div class="form-group">
        <label for="menu_description">Mô tả</label>
        <textarea class="form-control" id="menu_description" name="menu_description">{{ old('menu_description', $menu->menu_description) }}</textarea>
    </div>

    <div class="form-group">
        <label for="parent_id">Danh mục cha</label>
        <select class="form-control" id="parent_id" name="parent_id">
            <option value="0">Không có danh mục cha</option>
            @foreach($menus as $menuOption)
                <option value="{{ $menuOption->id }}" {{ $menu->parent_id == $menuOption->id ? 'selected' : '' }}>
                    {{ $menuOption->menu_name }}
                </option>
            @endforeach
        </select>
    </div>


        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')

@endsection