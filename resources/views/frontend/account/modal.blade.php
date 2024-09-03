<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('image.update',[Auth::user()->id])}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                  <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mx-3">Update</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>