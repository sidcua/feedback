@extends('layouts.app')
@section('title', 'Service')
@section('styles')
    {{-- <link rel='stylesheet' href='https://unpkg.com/emoji.css/dist/emoji.min.css'> --}}
@endsection
@section('content')
    @include('inc.navbar')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h1 class="display-1">Service</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal">Add Service</button>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-6 col-md-6 table-responsiv-sm table-responsive-md" style="overflow: auto; height: 500px;">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Entity</th>
                        <th scope="col">Service</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center" id="service-table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    
    {{-- Add Modal --}}
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="add-service-form" method="post" autocomplete="off">
            {{ csrf_field() }}
          <div class="modal-body">
            <div id="submit-service-error" class="alert alert-danger collapse">
            </div>
            <div class="form-group">
              <label>Service</label>
              <input name="service" type="text" class="form-control" placeholder="Service">
            </div>
            <div class="form-group">
              <label>Under (Entity)</label>
              <select id="entity-select" name="entity" class="form-control">
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="btn-submit-service">Add Service</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    {{-- Delete Modal --}}
    <div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Delete Entity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="delete-service-error" class="alert alert-danger collapse">
            </div>
            Entity: <span class="font-weight-bold" id="entity-span"></span> <br>
            Service: <span class="font-weight-bold" id="service-span"></span> <br>
            Are you sure you want to delete this service?
          </div>
          <form id="delete-service-form" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input id="service-text-delete" name="service" type="hidden" value="">
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="btn-delete-service">Delete</button>
          </div>
        </div>
      </div>
    </div>

    {{-- Edit Modal --}}
    <div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Service</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="edit-service-form" method="post" autocomplete="off">
            {{ csrf_field() }}
          <div class="modal-body">
            <div id="edit-service-error" class="alert alert-danger collapse">
            </div>
            <input name="id" id="edit-service-id" type="hidden" value="">
            <div class="form-group">
              <label>Service</label>
              <input name="service" id="edit-service" type="text" class="form-control">
            </div>
            <div class="form-group">
              <label>Under (Entity)</label>
              <select id="edit-service-select" name="entity" class="form-control" id="service-select">
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
    listServices();
    $("#addServiceModal").on('show.bs.modal', function (e) {
      listEntities_Service();
    })
    $("#btn-submit-service").on('click', function (e){
      addService();
    })
    $("#addServiceModal").on('hidden.bs.modal', function (e){
      $(this).find('form').trigger('reset');
      $("#submit-entity-error").hide();
      $("#submit-entity-error").html('');
    })
    $("#service-table").on('click', 'tr', function(e) {
      var table = $(this);

      // delete
      if(e.target.id == "delete-btn") {
        $("#service-text-delete").val($(this).closest('tr').attr('id'));
        $("#entity-span").text($(this).closest('tr').find('td:nth-child(1)').text());
        $("#service-span").text($(this).closest('tr').find('td:nth-child(2)').text());
      }

      // edit
      if(e.target.id == "edit-btn") {
        $("#edit-service-id").val($(this).closest('tr').attr('id'));
        listEntities_Service_edit(table);
        $("#edit-service").val($(this).closest('tr').find('td:nth-child(2)').text());
      }
    });
    $("#btn-delete-service").on('click', function(){
      deleteService();
    })
    $("#deleteServiceModal").on('hidden.bs.modal', function (e){
      $(this).find('form').trigger('reset');
      $("#delete-service-error").hide();
      $("#delete-service-error").html('');
    })
    // $("#editEntityModal").on('shown.bs.modal', function (e) {
      
    // })
    $("#editServiceModal").on('show.bs.modal', function (e) {
      $("#edit-service-error").hide();
      $("#edit-service-error").html('');
    })
    // $("#btn-edit-entity").on('click', function(){
    //   editEntity();
    // })
  })
</script>
@endsection