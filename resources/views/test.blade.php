@extends('layouts.master')
@section('content')
<div class="container text-left">

      <div class="row justify-content-md-center">
        <div class="col-6">
          <div class="card px-0 my-5">
            <div class="card-header">
              Pridanie inzerátu
            </div>

            <div class="card-body">
              <div class="col-12">
                <div class="row mb-3">
                  <div>
                  <div class="col-6">
                    <div class="card">
                      <img src="{{ asset('img/a.jpg') }}" alt="" class="img-responsive">
                    </div>
                  </div>
                  </div>


                  <div class="col-6">
                    <div class="card">
                      <img src="{{ asset('img/a.jpg') }}" alt="" class="img-responsive">
                    </div>
                  </div>

                </div>
              </div>
            </div>  


          </div>
        </div>
      </div>
     </div> 
     <!-- end container -->


@endsection
