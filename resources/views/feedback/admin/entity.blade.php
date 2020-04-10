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
                        <th scope="col">#</th>
                        <th scope="col">Entity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                      @foreach ($entity as $e)                          
                          <tr>
                          <th scope="row">{{$e->entityID}}</th>
                          <td>{{$e->entity}}</td>
                          <td>
                              <button class="btn btn-secondary" data-toggle="modal" data-target="#modalEdit" data-id="{{$e->entityID}}" data-entity="{{$e->entity}}" data-status={{$e->status}}>Edit</button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
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
                <label for="entity">Entity Name</label>
                <input type="text" class="form-control" id="entity" name="entity" style="width:300px" placeholder="Enter entity name.">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addEntity">Add Entity</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <div class="row">
                      <div class="col-12 text-right">
                        <button class="statusbtn">ASD</button>
                      </div>
                    </div>
                    <label for="entity">Entity Name</label>
                    <input type="text" class="form-control" id="entity" name="entity" style="width:300px" placeholder="Enter entity name.">
                  <input type="text" id="entityID" name="entityID" hidden>
                  <input type="text" id="status" name="status" hidden>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-primary" id="editEntity">Edit Entity</button>
                </div>
              </form>
            </div>
          </div>
        </div>

@endsection
@section('scripts')
<script>
  $('#addEntity').click(function(){
    saveEntity();
  })

  $('#editEntity').click(function(){
    editEntity();
  })

  
</script>

   
@endsection