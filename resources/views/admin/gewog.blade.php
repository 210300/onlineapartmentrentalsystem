
@extends('layouts.master')
@section('title')
RegisterUsers
@endsection

@section('content')
  
      <form action="/save-gewog" method="POST">
      {{csrf_field()}}      
      <div class="modal-body">  
      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif       
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Gewog:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
          <select class="form-select" name="dzongkhag_id">
                                 <option value="" selected="selected">Select your dzongkhag</option>
                                <option value="3">Mongar</option>
                                <option value="4">Thimphu</option>
                                <option value="5">Dagana</option>
                                <option value="6">Paro</option>
                                <option value="7">Trongsa</option>
                                <option value="8">Punakha</option>
                                <option value="9">Wangdi</option>
                                <option value="10">Sarpang</option>
                                <option value="11">Chukha</option>
                                <option value="12">PemaGatshel</option>
                                <option value="13">SamdrupJongkhar</option>
                                <option value="14">Bumthang</option>
                                <option value="15">Tashigang</option>
                                <option value="16">Tashiyangtse</option>
                                <option value="17">Haa</option>
                                <option value="18">Gasa</option>
                                <option value="19">Tsirang</option>
                                <option value="20">Zhemgang</option>
                                <option value="21">Samtse</option>
                                <option value="22">Lhuntse</option>
                                </select>
</div>
                                
          
        <button type="submit" class="btn btn-primary">Save</button>
      
      </form>
      </div>   

@endsection
