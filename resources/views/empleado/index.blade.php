<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="btn btn-success" href="{{ route('createEmpleado') }}">Crear una nuevo empleado</a>
                    <h3 class="pt-3">Lista de empleados</h3>
                    @if (count($empleados) > 0)
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Empresa</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->nombre }}</td>
                                        <td>{{ $empleado->apellidos }}</td>
                                        <td>
                                            @foreach ($empresas as $empresa)
                                                @if ($empresa->id == $empleado->empresa_id)
                                                    {{ $empresa->nombre }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $empleado->correo }}</td>
                                        <td>{{ $empleado->telefono }}</td>
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ route('editEmpleado', $empleado->id) }}">Editar</a>
                                            <form action="{{ route('deleteEmpleado', $empleado->id) }}" method="post">
                                                @method('delete')
                                                @csrf

                                                <input class="btn btn-danger" type="submit" value="Eliminar"
                                                    name="eliminar" />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $empleados->links() }}
                    @else
                        <p>No hay empleados en este momento</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
