
@foreach($subcategories as $subcategory)
    <li>
        <details>
            <summary class="btn btn-secondary mb-1" >
                {{ $subcategory->name }}
                @include('admin.categories.delete-form', ['subcategory' => $subcategory])
            </summary>
            <ul>
                @include('admin.categories.subcategories', ['subcategories' => $subcategory->children])
            </ul>
        </details>
    </li>
@endforeach
