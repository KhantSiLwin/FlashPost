<div class="position-sticky" style="top:80px;">
    <div class="search-for mb-3">
        <h5 class=" fw-semibold text-light-gray mb-3">Post Search</h5>
        <form action="">
            <div class="input-group shadow-sm">
                <input type="text" class="form-control border-1" style="border-color: #515151" name="keyword">
                <button class="btn btn-dark">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
    <div class="categories mb-4">
        <h5 class=" fw-semibold text-light-gray mb-3">Post's Catrgories</h5>
        <div class="card p-3 mb-3 shadow hover:shadow-lg border-0">
            <a href="{{route('index')}}" class=" mb-2 fw-semibold text-decoration-none text-dark">- All Categories</a>
            @foreach (App\Models\Category::all() as $category)
                <a href="{{route('categorized',$category->slug)}}" class="mb-2 fw-semibold text-decoration-none text-dark">
                   -  {{$category->title}}
                </a>
            @endforeach
        </div>
    </div>
    
    
    <div class="recent-articles mb-4">
        <h5 class=" fw-semibold text-light-gray mb-3">Recent Posts</h5>
        <div class="card p-3 shadow hover:shadow-lg border-0">
            
            @foreach (App\Models\Article::latest("id")->limit(5)->get() as $article)
                <a href="{{route('detail',$article->slug)}}" class="mb-2 fw-semibold text-decoration-none text-dark">
                    {{$article->title}}
                </a>
                <p class="text-light-gray mb-0"> {{Str::words($article->description,10,'...')}}</p>
                <hr>
            @endforeach
        </div>
    </div>
</div>