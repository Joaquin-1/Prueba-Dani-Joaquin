<x-layout>

    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Clientes</h1>
        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-2 text-xs text-gray-500">
                        Id
                    </th>
                    <th class="px-6 py-2 text-xs text-gray-500">
                        Nombre
                    </th>
                    <th class="px-6 py-2 text-xs text-gray-500">
                        Dni
                    </th>
                    <th class="px-6 py-2 text-xs text-gray-500">
                        Localidad
                    </th>
                    <th class="px-6 py-2 text-xs text-gray-500">
                        Fecha_nac
                    </th>

                    <th class="px-6 py-2 text-xs text-gray-500">
                        Editar
                    </th>
                    <th class="px-6 py-2 text-xs text-gray-500">
                        Borrar
                    </th>
                    <th class="px-6 py-2 text-xs text-gray-500">
                        Ver
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach ($clientes as $cliente)
                    <tr class="whitespace-nowrap">
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $cliente->id }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $cliente->nombre }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $cliente->dni }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $cliente->localidad }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ (new DateTime($cliente->fecha_nac))->setTimeZone(new DateTimeZone('Europe/Madrid'))->format('d-m-Y') }}
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <a href="/clientes/{{ $cliente->id }}/edit"
                               class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                        </td>
                        <td class="px-6 py-4">
                            <form action="/clientes/{{ $cliente->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Seguro?')" class="px-4 py-1 text-sm text-white bg-red-400 rounded" type="submit">Borrar</button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            <a href="/clientes/{{ $cliente->id }}"
                               class="px-4 py-1 text-sm text-white bg-green-400 rounded">Ver</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="my-4">
        <a href="/clientes/create" class="px-4 py-2 text-sm text-white bg-gray-500 rounded">Insertar un nuevo cliente</a>
        </div>
    </div>




</x-layout>
