<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar empresa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('updateEmpresa', $empresa->id) }}" method="post"  enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre" value="{{ $empresa->nombre }}">
                        </div>

                        @error('nombre')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group pt-3">
                            <label class="form-label">Direccion</label>
                            <input class="form-control" type="text" name="direccion"
                                value="{{ $empresa->direccion }}">
                        </div>

                        @error('direccion')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group pt-3">
                            <label class="form-label">Sitio web</label>
                            <input class="form-control" type="text" name="sitioWeb" value="{{ $empresa->sitioWeb }}">
                        </div>

                        @error('sitioWeb')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group pt-3">
                            <label class="form-label">Correo electronico</label>
                            <input class="form-control" type="email" name="correo" value="{{ $empresa->correo }}">
                        </div>

                        @error('correo')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group pt-3">
                            <label class="form-label">Logotipo</label>
                            <input class="form-control" type="file" name="logotipo" value="{{ $empresa->logotipo }}">
                        </div>

                        @error('logotipo')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="d-grid gap-2 col-2 mx-auto pt-3">
                            <input class="btn btn-primary" type="submit" value="Editar" name="editar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
