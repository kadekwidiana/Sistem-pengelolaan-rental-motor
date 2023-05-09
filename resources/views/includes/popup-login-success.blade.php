<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-body text-center mt-3">
          <h3>@if (Auth::check())
            {{ Auth::user()->nama_pegawai }}
        @endif berhasil login.</h3>
        </div>
        <div class="text-center mt-2 mb-4">
          <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" onclick="$('#exampleModal').modal('hide')">OK</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#exampleModal').modal('show');
    });
  </script>