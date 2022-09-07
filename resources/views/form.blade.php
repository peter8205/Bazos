@extends('layouts.master')
@section('content')
<div class="container text-left">
    <h1 class="text-center mt-3">Pridanie inzerátu</h1>
      <div class="row justify-content-md-center">
        <div class="col-6">
          <div class="card px-0 mb-5">
            <div class="card-header">
              Pridanie inzerátu
            </div>

            <div class="card-body">
              <form action="{{ route('store') }}" autocomplete="off" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="col-12">
                <input type="file" class="form-control mb-3" id="files" accept="image/jpeg, image/png, image/jpg"  multiple="multiple" 
                name="images[]">
              </div>
              <div class="col-12">

                <label for="rubrika">Rubrika: <span class="red">*</span></label><br>
                <select name="rubrika" id="rubrika" class="form-select mb-3">
                  @foreach($rubrics as $rubric)
                    <option value="{{ $rubric->id }}">{{ $rubric->name }}</option>
                  @endforeach
                </select>
                
              </div>
              <div class="row">
                <div class="col-6">

                  <label for="typ">Typ:</label><br>
                  <select name="typ" id="" class="form-select mb-3">
                    @foreach($types as $type)
                      <option value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                  </select>
                  
                </div>
                <div class="col-6">

                  <label for="kategoria">Kategória:</label><br>
                  <select name="kategoria" id="" class="form-select mb-3">
                    @foreach($rubrics as $rubric)
                      @foreach($rubric->categories as $c)
                        <option value="{{ $c->name }}">{{ $c->name }}</option>
                      @endforeach
                    @endforeach
                  </select>
                  
                </div>
                <div class="col-12">
                  <label for="nadpis">Nadpis:</label>
                  <input type="text" class="form-control mb-3" name="nadpis">
                </div>
                <div class="col-12">
                  <label for="text">Text:</label>
                  <textarea name="text" id="" cols="30" rows="5" class="form-control mb-3"></textarea>
                </div>
                <div class="col-6">
                  <label for="cena">Cena:</label>
                  <input type="text" class="form-control mb-3" name="cena">
                </div>
                <div class="col-6">
                  <label for="psc">Psč:</label>
                  <input type="text" class="form-control mb-3 typeahead" name="psc">
                </div>
                <div class="col-6">
                  <label for="meno">Meno:</label>
                  <input type="text" class="form-control mb-3" name="meno">
                </div>
                <div class="col-6">
                  <label for="tel">Telefón:</label>
                  <input type="text" class="form-control mb-3" name="tel">
                </div>
                <div class="col-6">
                  <label for="email">E-mail:</label>
                  <input type="text" class="form-control mb-3" name="email">
                </div>
                <div class="col-6">
                  <label for="heslo">Heslo:</label>
                  <input type="password" class="form-control mb-4" name="heslo">
                </div>
                <div class="col-3"></div>
                <div class="col-6">
                  <input type="submit" class="form-control">
                </div>

              </form>
              <div class="row">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger col-3">
                            {{ $error }}
                        </div>            
                    @endforeach
                @endif
             </div>
                   <div class="col-12 mt-3">

                  <div class="row mb-3" id="result">
                  </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
@endsection

@push('js')
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

 <script>
      document.querySelector("#files").addEventListener("change", (e) => { 
  if (window.File && window.FileReader && window.FileList && window.Blob) {
    const files = e.target.files;
    const output = document.querySelector("#result");
    //output.innerHTML = "";
    for (let i = 0; i < files.length; i++) {
       if (!files[i].type.match("image")) continue;
        const picReader = new FileReader();
        picReader.addEventListener("load", function (event) {
          const picFile = event.target;
          const div = document.createElement("div");
          div.classList.add('col-6');
                 div.innerHTML = `
            <div class="card">
                <img class="img-responsive height" src="${picFile.result}" title="${picFile.name}"/>
            </div>`;
          output.appendChild(div);
        });
        picReader.readAsDataURL(files[i]);
       }
  } else {
    alert("Your browser does not support File API");
  }
});
</script>

<script type="text/javascript">

    var path = "{{ route('autocomplete') }}";

    $('input.typeahead').typeahead({

        source:  function (query, process) {

        return $.get(path, { query: query }, function (data) {

                return process(data);

            });

        }

    });

</script>
<script>
    $(function(){
      // bind change event to select
      $('#rubrika').on('change', function () {
          var url = 'http://localhost/bazos/public/add?id='+$(this).val(); // get selected value 1
          console.log(url);
          if (url) { // require a URL
              window.replace = url; // redirect
          }
          return false;
      });
    });
</script>
@endpush

