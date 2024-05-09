<a type="submit" href="{{route('admin.categories.edit',['categoryId'=>$subcategory->id])}}" class="btn btn-sm btn-primary ms-2" ><i class="bi bi-pencil"></i></a>

<form class="d-inline" action="{{route('admin.categories.destroy',['categoryId'=>$subcategory->id])}}" method="post" >
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger ms-1" ><i class="bi bi-trash"></i></button>
</form>

