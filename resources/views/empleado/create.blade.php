<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('addEmpleado') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" type="text" name="nombre">
                        </div>

                        <div class="form-group pt-3">
                            <label class="form-label">Apellidos</label>
                            <input class="form-control" type="text" name="apellidos">
                        </div>

                        <div class="form-group pt-3">
                            <label class="form-label">Empresa</label>
                            <select class="form-select">
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pt-3">
                            <label class="form-label">Correo electronico</label>
                            <input class="form-control" type="email" name="correo">
                        </div>

                        <div class="form-group pt-3">
                            <label class="form-label">telefono</label>
                            <input class="form-control" type="text" name="telefono">
                        </div>

                        <div class="d-grid gap-2 col-2 mx-auto pt-3">
                            <input class="btn btn-primary" type="submit" value="Crear" name="crear">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
