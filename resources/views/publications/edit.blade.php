<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Other HTML head elements -->
</head>

<body>
    <x-app-layout>
        <script src="https://cdn.tiny.cloud/1/up62vc2viot6nlbt0wry5yqjvcgvy5nngtewdr7a9ffk9qd6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="antialiased sans-serif bg-gray-200  h-auto">
                        <div class="container mx-auto py-6 px-4">
                            <div class="container mt-2">
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <h1 class="text-3xl py-4 border-b mb-10">Editar publicación</h1>
                                        <div class="pull-right">
                                            <x-agroamigable.buttons.intra-system color="lime-c900" hoverColor="hover:text-lime-c900" href="{{ route('publications.index') }}" label="Atrás">
                                            </x-agroamigable.buttons.intra-system>
                                        </div>
                                    </div>
                                </div>
                                @if (session('status'))
                                <div class="alert alert-success mb-1 mt-1">
                                    {{ session('status') }}
                                </div>
                                @endif
                                <form action="{{ route('publications.update', $publication->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row p-4">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication name:</strong>
                                                Título de la publciación:
                                                <input type="text" name="name" value="{{ $publication->name }}" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication name">
                                                @error('name')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication slug:</strong>
                                                Slug de la publicación:
                                                <input type="text" name="slug" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication slug" value="{{ $publication->slug }}">
                                                @error('slug')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">Category:</strong>
                                            <select name="category" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="Category">
                                                <option selected="selected" value="Agro Industria">Agro Industria</option>
                                                <option value="Eventos">Eventos</option>
                                                <option value="Interacción">Interacción</option>
                                                <option value="Fincas Escuela">Fincas Escuela</option>
                                                <option value="Recursos Naturales">Recursos Naturales</option>
                                                <option value="Soberanía Alimentaria">Soberanía Alimentaria</option>
                                                <option value="Marketing Agrícola">Marketing Agrícola</option>
                                                <option value="Noticias">Noticias</option>
                                                <option value="Opiniones">Opiniones</option>
                                                <option value="Turismo Rural">Turismo Rural</option>
                                                <option value="Otros">Otros</option>
                                            </select>
                                            @error('entity')
                                            <div class="alert alert-danger mt-1 mb-1 text-3xl text-red-600">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication body:</strong>
                                                Contenido de la publicación:
                                                <textarea name="body" id="editor" class="ckeditor form-control block w-full">{{ $publication->body }}</textarea>
                                                @error('body')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication abstract:</strong>
                                                Resumen de la publicación:
                                                <input type="text" name="abstract" value="{{ $publication->abstract }}" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication abstract">
                                                @error('abstract')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication image:</strong>
                                                Imagen actual de la publicación, si desea actualizarla cargue una imagen nueva en el siguiente campo:
                                                <input type="text" name="image" readonly="readonly" value="{{ $publication->image }}" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication image">
                                                @error('image')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication image to update:</strong>
                                                Si desea actualizar la imagen de la publicación, cárguela aquí:
                                                <input type="file" name="image2" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication image">
                                                @error('image')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication minimage:</strong>
                                                Mini imagen:
                                                <input type="text" name="minimage" value="{{ $publication->minimage }}" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication minimage">
                                                @error('minimage')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication published:</strong>
                                                Publicada:
                                                <input type="text" name="published" value="{{ $publication->published }}" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication published">
                                                @error('published')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication color:</strong>
                                                Color asociado a la publicación:
                                                <input type="text" name="color" value="{{ $publication->color }}" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication color">
                                                @error('color')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong class="block text-sm text-gray-700 capitalize dark:text-gray-200">publication author:</strong>
                                                Autor de la publicación:
                                                <input type="text" name="author" value="{{ $publication->author }}" class="form-control block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40" placeholder="publication author">
                                                @error('author')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="rounded-full border-2 bg-lime-c900 border-lime-c900 hover:bg-transparent hover:text-lime-c900 text-white p-2 m-4">Editar</button>
                                        <script>
                                            ClassicEditor
                                                .create(document.querySelector('#editor'))
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        </script>
                                        <script>
                                            tinymce.init({
                                                selector: 'textarea',
                                                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                                                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                                tinycomments_mode: 'embedded',
                                                tinycomments_author: 'Author name',
                                                mergetags_list: [{
                                                        value: 'First.Name',
                                                        title: 'First Name'
                                                    },
                                                    {
                                                        value: 'Email',
                                                        title: 'Email'
                                                    },
                                                ],
                                                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
                                            });
                                        </script>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-app-layout>

</body>

</html>