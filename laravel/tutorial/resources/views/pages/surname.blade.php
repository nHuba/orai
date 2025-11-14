@extends('layout.app')
@section('title', ' | Családnevek')


@section('content')
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Létrehozása</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($names as $name)
                <tr>
                    <td>{{ $name -> id }}</td>
                    <td>{{ $name -> surname }}</td>
                    <td>{{ $name -> created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger btn-delete-name" data-id="{{ $name->id }}">Törlés</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="mt-3">Új családnév hozzáadása</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="/names/manage/surname/new">
            @csrf
            <div class="form-group">
                <label for="inputFamily">Családnév</label>
                <input type="text" class="form-control" name="inputFamily" id="inputFamily" placeholder="Családnév" value="{{ old('inputFamily') }}" minlength="2" maxlength="20" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Hozzáadás</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $('.btn-delete-name').on('click', function () {
            let thisBtn = $(this);
            let id = thisBtn.data('id');
            $.ajax({
                type: 'POST',
                url: '/names/manage/surname/delete',
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: id
                },
                success: function(data){
                    if(data.success == true){
                        thisBtn.closest('tr').fadeOut();
                    }
                else {
                    alert('Hiba történt a törlés során: \nRészletek: ' + data.message);
                    }
                },
                error: function(){
                    alert('Nem sikerült a törlés!');
                }
            });
        });
    </script>
@endsection
<!--
@section('content')
    <div class="container">
        <ul>
            @foreach($names as $name)
                <li @if($name == 'Charlie') style = "font-weight: bold;" @endif>
                     @if($loop->last) Utolsó  @endif
                    {{ $name }}
                   
                </li>
            @endforeach
        </ul>
    </div>
@endsection
-->