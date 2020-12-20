<h1 class="blockquote text-center">Добавить новую пластинку</h1>
<form method="POST" action="{{ route('addDB') }}">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название пластинки') }}</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name">
        </div>
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>
        <div class="col-md-6">
            <input id="description" type="text" class="form-control" name="description">
        </div>
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                 {{ __('Добавить') }}
            </button>
        </div>
    </div>
</form> 
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif
@if(session('success')) 
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
