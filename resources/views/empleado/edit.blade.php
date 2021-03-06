<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('updateEmpleado', $empleado->id) }}" method="post">
                        @method('put')
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre" value="{{ $empleado->nombre }}">
                        </div>

                        @error('nombre')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group pt-3">
                            <label class="form-label">Apellidos</label>
                            <input class="form-control" type="text" name="apellidos"
                                value="{{ $empleado->apellidos }}">
                        </div>

                        @error('apellidos')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group pt-3">
                            <label class="form-label">Empresa</label>
                            <select class="form-select" name="empresa">
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pt-3">
                            <label class="form-label">Correo electronico</label>
                            <input class="form-control" type="email" name="correo" value="{{ $empleado->correo }}">
                        </div>

                        @error('correo')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group pt-3">
                            <label class="form-label">telefono</label>
                            <input class="form-control" type="text" name="telefono"
                                value="{{ $empleado->telefono }}">
                        </div>

                        @error('telefono')
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
