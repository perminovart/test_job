<div>
    <ul class="list-unstyled">
        @foreach($data as $element)
            <li>
                <div class="alert alert-info">
                    <h3>Название пластинки: {{$element->name}}</h3>
                    <p>Описание: {{$element->description}}</p>
                    @auth
                    <form method="POST" action="{{ route('deletePlate')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$element->id}}">
                        <button class="btn btn-danger">
                            {{ __('Удалить') }}
                        </button>
                    </form>
                        <a href="{{route('getPlate', ['id'=>$element->id])}}"><button class="btn btn-warning">Редактировать</button></a>
                    @endauth
                </div>
            </li>
        @endforeach
    </ul>
</div>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="{{$data->previousPageUrl()}}">Предыдущая</a></li>
        <li class="page-item"><p class="page-link">{{$data->currentPage()}} из {{$data->lastPage()}} </p></li>
        <li class="page-item"><a class="page-link" href="{{$data->nextPageUrl()}}">Следующая</a></li>
    </ul>
</nav>