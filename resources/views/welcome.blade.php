<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <main class="py-4">
            <div class="container">

                <div class="input-group mb-3">
                    <input type="text" name="original" id="original" class="form-control" placeholder="Ссылка для сокращения" aria-describedby="store_and_list_button">
                    <button class="btn btn-primary" type="button" id="store_and_list_button">Сократить</button>
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="card shadow-sm border-0 p-3">
                    <table id="all_urls" class="table table-hover m-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ссылка</th>
                                <th scope="col">Сокращенная ссылка</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($urls as $url)
                                <tr>
                                    <th scope="row">{{ $url->id }}</th>
                                    <td>{{ $url->original }}</td>
                                    <td>{{ $url->shortened }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3">Список пуст</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>
