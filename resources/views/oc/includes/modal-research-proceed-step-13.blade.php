<div class="modal fade" id="researchProceed-{{ $r->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Proceed Research</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <p>
          {{ ucwords($r->title) }} by 
          {{ ucwords($r->author->firstname . ' ' . $r->author->lastname) }}
          @if(count($r->co_author) > 0)
            @foreach($r->co_author as $ca)
              , {{ ucwords($ca->researcher->firstname . ' ' . $ca->researcher->lastname) }}
            @endforeach
          @endif
        </p>

        <form action="{{ route('oc.proceed.step.fourteen.post') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <textarea name="comment" id="commment" class="form-control" placeholder="Comment..."></textarea>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <input type="hidden" name="research_id" value="{{ $r->id }}">
          <button type="submit" class="btn btn-success">Proceed</button>
        </form>
      </div>
    </div>
  </div>
</div>