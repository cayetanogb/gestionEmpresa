<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empresas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="btn btn-success" href="{{ route('createEmpresa') }}">Crear una nueva empresa</a>
                    <h3 class="pt-3">Lista de empresas</h3>
                    @if (count($empresas) > 0)
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Sitio web</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empresas as $empresa)
                                    <tr>
                                        <td>
                                            <a href="{{ route('showEmpresa', $empresa->id) }}">{{ $empresa->nombre }}</a>
                                        </td>
                                        <td>{{ $empresa->direccion }}</td>
                                        <td>{{ $empresa->sitioWeb }}</td>
                                        <td>{{ $empresa->correo }}</td>
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ route('editEmpresa', $empresa->id) }}">Editar</a>
                                            <form action="{{ route('deleteEmpresa', $empresa->id) }}" method="post">
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

                        {{ $empresas->links() }}
                    @else
                        <p>No hay empresas en este momento</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
