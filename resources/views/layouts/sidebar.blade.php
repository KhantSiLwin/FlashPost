<div class="card position-sticky border-0 shadow" style="top:80px;">
    <div class="card-body w-100">
        <a href="{{route('article.create')}}" class="btn w-100 mb-3 text-start d-flex justify-content-around btn-dark">
            <i class="bi bi-plus-circle"></i>
            Create Articles
        </a>
        <a href="{{route('article.index')}}" class="btn w-100 mb-3 text-start d-flex justify-content-around btn-dark">
            <i class="bi bi-list"></i>
            All Articles
        </a>
        <a href="{{route('category.create')}}" class="btn w-100 mb-3 text-start d-flex justify-content-around btn-dark">
            <i class="bi bi-plus-circle"></i>
            Create Category
        </a>
        <a href="{{route('category.index')}}" class="btn w-100 mb-3 text-start d-flex justify-content-around btn-dark">
            <i class="bi bi-list"></i>
            All Categories
        </a>
        @can('admin-only')
        <a href="{{route('user-list')}}" class="btn w-100 mb-3 text-start d-flex justify-content-around btn-dark">
            <i class="bi bi-list"></i>
            Users 
        </a>
        @endcan
    </div>
</div>