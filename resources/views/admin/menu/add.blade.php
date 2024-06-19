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

        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input type="text" class="form-control " id="menu-name" name="menu_name" value="{{ old('menu_name') }}">
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control " id="menu-slug" name="slug" value="{{ old('slug') }}">
                
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control " id="menu-description" name="menu_description">{{ old('description') }}</textarea>
                
            </div>

            <div class="form-group">
                <label for="parent_id">Parent_id</label>
                <select class="form-control " id="parent-id" name="parent_id" >
                    <option value="0">Danh mục cha</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->menu_id}}">{{$menu->menu_name}}</option>
                    @endforeach
                </select>
                
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
           
            @csrf
       
        </div>
    </form>
@endsection

@section('footer')

@endsection