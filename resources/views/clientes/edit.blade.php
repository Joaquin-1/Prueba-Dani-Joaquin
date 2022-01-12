<x-layout>
    <form action="{{ route('clientes.update', $cliente->id, false) }}" method="POST">
        @method('PUT')
        @csrf
        <h1 class="mb-4 text-2xl font-semibold">Modificar Cliente</h1>
        <div class="mb-6">
            <label for="nombre"
                class="text-sm font-medium text-gray-900 block mb-2 @error('nombre') text-red-500 @enderror">
                Nombre
            </label>
            <input type="text" name="nombre" id="nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nombre') border-red-500 @enderror"
                value="{{ old('nombre', $cliente->nombre) }}">

            <label for="dni"
                class="text-sm font-medium text-gray-900 block mb-2 @error('dni') text-red-500 @enderror">
                Dni
            </label>
            <input type="text" name="dni" id="dni"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('dni') border-red-500 @enderror"
                value="{{ old('dni', $cliente->dni) }}">

            <label for="localidad"
                class="text-sm font-medium text-gray-900 block mb-2 @error('localidad') text-red-500 @enderror">
                Localidad
            </label>
            <input type="text" name="localidad" id="localidad"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('localidad') border-red-500 @enderror"
                value="{{ old('localidad', $cliente->localidad) }}">

            <label for="fecha_nac"
                class="text-sm font-medium text-gray-900 block mb-2 @error('fecha_nac') text-red-500 @enderror">
                Fecha Nacimiento
            </label>
            <input type="text" name="fecha_nac" id="fecha_nac"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('fecha_nac') border-red-500 @enderror"
                value="{{ old('fecha_nac', (new DateTime($cliente->fecha_nac))->setTimeZone(new DateTimeZone('Europe/Madrid'))->format('d-m-Y'))  }}">

            @error('cliente')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Enviar</button>
        <a href="/clientes"
            class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-layout>
