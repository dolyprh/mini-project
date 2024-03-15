<div class="modal fade" id="generatecode" tabindex="-1" role="dialog" aria-labelledby="generate_code"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="generatecode">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('generate-code.store') }}" class="text-center" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary btn-lg">Generate Code</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-pill" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>