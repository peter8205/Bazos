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
              <div class="col-12">

                <div class="row">
                  <div class="col-6">
                    <div class="card">
                      <div id="display-image">frff</div>
                        <img src="amikio8150.jpg" alt="" class="img-resive">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                        <img src="amikio8150.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="card">
                        <img src="amikio8150.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card">
                        <img src="amikio8150.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-6">
                    <div class="card">
                        <img src="amikio8150.jpg" alt="" class="img-responsive">
                    </div>
                  </div>

              </div>
              <form action="{{ route('store') }}" autocomplete="off" method="post">
                @csrf
              <div class="col-12">
                <input type="file" class="form-control mb-3" id="image-input" accept="image/jpeg, image/png, image/jpg">
              </div>
              <div class="col-12">

                <label for="rubrika">Rubrika: <span class="red">*</span></label><br>
                <select name="rubrika" id="" class="form-select mb-3">
                  @foreach($rubrics as $rubric)
                    <option value="{{ $rubric->name }}">{{ $rubric->name }}</option>
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
                    @foreach($categories as $category)
                      <option value="{{ $category->name }}">{{ $category->name }}</option>
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
                  <label for="psc">Psč:</label>
                  <input type="text" class="form-control mb-3" name="psc">
                </div>
                <div class="col-6"></div>
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
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
@endsection

@push('js')
<script>
  const image_input = document.querySelector("#image-input");image_input.addEventListener("change", function() {
    const reader = new FileReader();
      reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
      document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
  });
  reader.readAsDataURL(this.files[0]);
});
</script>
@endpush