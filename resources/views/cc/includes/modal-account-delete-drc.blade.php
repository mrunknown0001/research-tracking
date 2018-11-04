<div class="modal fade" id="accountDeleteDrc-{{ $d->assigned_drc->drc->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">DRC Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p>Are you sure you want to delete {{ ucwords($d->assigned_drc->drc->firstname . ' ' . $d->assigned_drc->drc->lastname) }} as {{ $d->assigned_drc->department->name }} Department Chairperson?</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('cc.remove.account.post') }}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{ $d->assigned_drc->drc->id }}">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>