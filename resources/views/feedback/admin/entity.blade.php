@extends('layouts.app')
@section('title', 'Feedback')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
@endsection
@section('content')
    @include('inc.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1">Entity</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEntityModal">Add Entity</button>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Entity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center" id="entity-table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    {{-- Add Modal --}}
    <div class="modal fade" id="addEntityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Entity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="entity-form" method="post" autocomplete="off">
            {{ csrf_field() }}
          <div class="modal-body">
            <div id="submit-entity-error" class="alert alert-danger collapse">
            </div>
            <div class="form-group">
              <label>Entity</label>
              <input name="entity" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Under</label>
              <select id="entity-select" name="under" class="form-control" id="entity-select">
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-submit-entity">Add Entity</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteEntityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Entity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="delete-entity-error" class="alert alert-danger collapse">
            </div>
            Entity: <span class="font-weight-bold" id="entity-span"></span> <br>
            Are you sure you want to delete this entity?
          </div>
          <form id="delete-entity-form" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input id="entity-text-delete" name="entity" type="hidden" value="">
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="btn-delete-entity">Delete</button>
          </div>
        </div>
      </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editEntityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Entity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="edit-entity-form" method="post" autocomplete="off">
            {{ csrf_field() }}
          <div class="modal-body">
            <div id="edit-entity-error" class="alert alert-danger collapse">
            </div>
            <input name="id" id="edit-entity-id" type="hidden" value="">
            <div class="form-group">
              <label>Entity</label>
              <input name="entity" id="edit-entity" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Under</label>
              <select id="edit-entity-select" name="under" class="form-control" id="entity-select">
              </select>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select id="entity-status-select" name="status" class="form-control" id="entity-select">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning" id="btn-edit-entity">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

@endsection

@section('scripts')
<script>
  $(document).ready(function (){
    listEntities();
    $("#addEntityModal").on('show.bs.modal', function (e) {
      listMainEntity();
    })
    $("#btn-submit-entity").on('click', function (e){
      addEntity();
    })
    $("#addEntityModal").on('hidden.bs.modal', function (e){
      $(this).find('form').trigger('reset');
      $("#submit-entity-error").hide();
      $("#submit-entity-error").html('');
    })
    async function selectEntity(){
      await listMainEntity_edit();
      $('#entity-table tr').each(function() {
          var customerId = $(this).find('td:nth-child(2)').text();    
          alert(customerId)
      });
    }
    $("#entity-table").on('click', 'tr', function() {
      // delete
      $("#entity-text-delete").val($(this).closest('tr').attr('id'));
      $("#entity-span").text($(this).closest('tr').find('td:nth-child(1)').text());

      // edit
      $("#edit-entity-id").val($(this).closest('tr').attr('id'));
      $("#edit-entity").val($(this).closest('tr').find('td:nth-child(1)').text());
      $("#edit-entity-select").val($(this).closest('tr').find('td:nth-child(2)').text());
      $("#entity-status-select").val($(this).closest('tr').find('td:nth-child(3)').text());
    });
    $("#btn-delete-entity").on('click', function(){
      deleteEntity();
    })
    $("#deleteEntityModal").on('hidden.bs.modal', function (e){
      $(this).find('form').trigger('reset');
      $("#delete-entity-error").hide();
      $("#delete-entity-error").html('');
    })
    $("#editEntityModal").on('show.bs.modal', function (e) {
      $("#edit-entity-error").hide();
      $("#edit-entity-error").html('');
      selectEntity();
    })
    $("#btn-edit-entity").on('click', function(){
      editEntity();
    })
  })
</script>
@endsection