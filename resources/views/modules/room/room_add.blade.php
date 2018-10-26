@extends('layouts.template')

@section('content')
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Room</li>
        <li class="breadcrumb-item active">Add</li>
      </ol>

      <div class="container-fluid">
        <div class="animated fadeIn">
              <form id="form">
          
          <div class="row">
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <strong>Room</strong>
                    <small>Form</small>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      
                      <div class="col-lg-6">
                          Name<br>
                          <input type="text" name="name" id="name" style="width:100%">
                          <hr>
                          City
                          <input type="text" name="city" id="city" style="width:100%">
                          <hr>
                          Price
                          <input type="text" name="price" id="price" style="width:100%">
                          <hr>
                          Available
                          <select name="available" id="available" style="width:100%">
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                          </select>
                          <hr>
                      </div>

                      <div class="col-lg-6">
                        Description
                        <textarea name="description" id="description" style="width:100%" rows="14"></textarea>
                      </div>

                    </div>
                      
                  </div>
                  <div class="card-footer">
                    <a href="{{ url('room') }}" class="btn btn-outline-secondary pull-left" id="btnCancel"> <i class="icon-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-outline-primary pull-right" id="btnSave"> <i class="fa fa-save"></i> Save</button>
                  </div>
                </div>
              </form>
            </div>
            <!--/.col-->

          </div>

        </div>

      </div>
@endsection

@section('footer-script')
      <script type="text/javascript">
        
        $("#form").on('submit', function(e){
            e.preventDefault();
            
            var name  = $("#name").val();
            var city  = $("#city").val();
            var price = $("#price").val();
            var available   = $("#available").val();
            var description = $("#description").val();

            var objRequest = {
              'judul'      : judul,
              'pengarang' : pengarang,
              'tahun_terbit' : tahun_terbit,
              'harga'     : harga,
              'deskripsi' : deskripsi
            };

            // console.log(objRequest);
            
            // $.ajax({
            //    type:'POST',
            //    url:'{{ url("api/buku/add") }}',
            //    data: JSON.stringify(objRequest),
            //    success:function(response){
            //       if (response.errorCode == "00") {
            //         alert('success');
            //         window.location.href = "{{ url('buku') }}";
            //       } else {
            //         console.log(response.errorCode + " : "+ response.message);
            //       }
            //    }
            // });
        });

      </script>
@endsection