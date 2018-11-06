<div class="modal fade" id="resetPasswordFr-{{ $f->researcher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">FR Password Reset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p>Reset Password to Password</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('cc.reset.password.post') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{ $f->researcher->id }}">
          <button type="submit" class="btn btn-danger">Reset Password</button>
        </form>
      </div>
    </div>
  </div>
</div>