<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content border-0 shadow">
        <div class="modal-header text-white" style="background-color: #4e73df;">
          <h5 class="modal-title mb-0 fw-bold" id="exampleModalLabel"><i class="bi bi-pencil-square me-2"></i>New Blog Post</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4 bg-light">
          <form action="{{route('admin.add.blog')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card border-0 shadow-sm mb-4">
                  <div class="card-body p-4">
                      <div class="row g-4">
                          <div class="col-md-8">
                              <div class="mb-3">
                                  <label for="recipient-name" class="form-label fw-bold text-dark">Title <span class="text-danger">*</span></label>
                                  <input type="text" name="blogTitle" value="{{old('blogTitle')}}" class="form-control form-control-lg bg-light" id="recipient-name" placeholder="Enter an engaging title">
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="mb-3">
                                  <label for="blog-image" class="form-label fw-bold text-dark">Cover Image <span class="text-danger">*</span></label>
                                  <input type="file" name="blogImage" class="form-control form-control-lg bg-light" id="blog-image">
                              </div>
                          </div>
                          <div class="col-12">
                              <div class="mb-2">
                                  <label for="blogDescription" class="form-label fw-bold text-dark">Description <span class="text-danger">*</span></label>
                                  <textarea name="description" class="form-control bg-light" id="blogDescription" rows="12" placeholder="Write your blog content here..."></textarea>
                              </div>
                              <small class="text-muted"><i class="bi bi-info-circle me-1"></i>Press <code>Windows + .</code> to add emojis inside the editor</small>
                          </div>
                      </div>
                  </div>
              </div>
            <div class="modal-footer border-top-0 px-0 pb-0 justify-content-end">
              <button type="button" class="btn btn-light border shadow-sm px-4" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold"><i class="bi bi-cloud-arrow-up-fill me-2"></i>Publish Post</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>