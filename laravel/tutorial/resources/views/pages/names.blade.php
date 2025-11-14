@extends('layout.app')
@section('title', ' | Nevek')


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
                    @empty($name -> family)
                        <td><strong>Nincs adat.</strong></td>
                    @else
                        <td>{{ $name -> family -> surname }}</td>
                    @endempty
                    <td>{{ $name -> name  }}</td>
                    <td>{{ $name -> created_at }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger btn-delete-name" data-id="{{ $name->id }}">Törlés</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="mt-3">Új név hozzáadása</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        <form method="post" action="/names/manage/name/new">
            @csrf
            <div class="form-group">
                <label for="inputFamily">Családnév</label>
                <select name="inputFamily" id="inputFamily" class="form-control">
                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">{{ $family->surname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="inputName">Keresztnév</label>
                <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Keresztnév">
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
                url: '/names/delete',
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: id
                },
                success: function(){
                    tihsBtn.closest('tr').fadeOut();
                },
                error: function(){
                    alert('Nem sikerült a törlés!')
                }
            })
        })
    </script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() (
        let deleteButtons = document.querySelectorAll('.btn.delete-name');
        deleteButtons.forEach(function(button)) {
            button.addEventListener('click', function() {
                let id = this.dataset.id;

                let formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('id', id);

                fetch('/names/delete', {
                    method: 'POST',
                    body: formData})
            })
            .then(response => {
                if (response.ok) {
                    throw new Error('Nem sikerült a törlés!');
                }
                return response;
            })
            .then(() => {
                let row = this.closest('tr');
                row.style.display = 'none';
            })
            .catch(error => {
                alert(error.message);
            });
        });
    );
</script>
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