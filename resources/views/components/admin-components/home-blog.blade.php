<div class="row g-4 mt-1">
    @if ($blogs->isNotEmpty())  
        @foreach ($blogs as $blogPost)  
        <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm blog-card-hover rounded-3 overflow-hidden">
                <div class="position-relative" style="height: 200px; background-color: #f8f9fc;">
                    @if ($blogPost->image != "")
                        <img src="{{ asset('image/uploads/blog/'.$blogPost->image) }}" class="card-img-top w-100 h-100 object-fit-cover" alt="Blog Post Image" style="transition: transform 0.3s ease;">
                    @else
                        <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                            <i class="bi bi-image text-secondary text-opacity-25" style="font-size: 5rem;"></i>
                        </div>
                    @endif
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge bg-primary bg-opacity-90 shadow-sm px-3 py-2"><i class="bi bi-calendar3 me-1"></i>{{ \Carbon\Carbon::parse($blogPost->created_at)->format('M d, Y') }}</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title fw-bold mb-3 lh-base" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 3rem;">
                        <a href="{{route('blog.page', $blogPost->id)}}" class="text-dark text-decoration-none text-hover-primary" target="_blank">{{ $blogPost->title }}</a>
                    </h5>
                    
                    <div class="mt-auto pt-4 d-flex justify-content-between align-items-center">
                        <a href="{{route('admin.editBlog',$blogPost->id)}}" class="btn btn-primary px-4 fw-medium shadow-sm">Edit</a>
                        <div class="d-flex gap-2">
                            <a href="{{route('blog.page', $blogPost->id)}}" class="btn btn-light bg-white border shadow-sm text-secondary" target="_blank" title="View"><i class="bi bi-box-arrow-up-right"></i></a>
                            <button onclick="deleteBlogPost({{ $blogPost->id}});" class="btn btn-outline-danger shadow-sm" title="Delete"><i class="bi bi-trash"></i></button>
                        </div>
                        <form id="delete-blog-from-{{ $blogPost->id }}" action="{{route('admin.destroyBlog', $blogPost->id)}}" method="post" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-12">
            <div class="card border-0 shadow-sm p-5 text-center bg-white rounded-3">
                <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle mx-auto mb-4" style="width: 100px; height: 100px;">
                    <i class="bi bi-journal-x text-secondary opacity-50" style="font-size: 3rem;"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">No Blog Posts Found</h4>
                <p class="text-muted mb-0">It looks like you haven't created any blog posts yet. Click "Create Blog Post" above to begin writing.</p>
            </div>
        </div>
    @endif
</div>

{{-- Add some custom CSS for the blog cards --}}
<style>
.blog-card-hover {
    transition: all 0.3s ease;
}
.blog-card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 1rem 3rem rgba(0,0,0,.175) !important;
}
.blog-card-hover:hover .card-img-top {
    transform: scale(1.08);
}
.text-hover-primary {
    transition: color 0.2s;
}
.text-hover-primary:hover {
    color: #4e73df !important;
}
</style>

<script>
function deleteBlogPost(id){
    if(confirm("Are you sure you want to permanently delete this blog post? This action cannot be undone.")){
        document.getElementById('delete-blog-from-' + id).submit();
    }
}
</script>