@props(['messages'])

@if ($messages)
    <div class="mt-2 w-75 alert alert-danger position-absolute top-0 start-50 translate-middle-x">
        @foreach ((array) $messages as $message)
            <li>Usename atau Password yang anda masukkan tidak valid, silahkan coba kembali</li>
        @endforeach
    </div>
@endif
