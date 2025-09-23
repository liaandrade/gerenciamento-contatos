<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Adicionar Contato
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block font-medium text-sm text-gray-700">Nome</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="border-gray-300 rounded-md shadow-sm w-full">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                               class="border-gray-300 rounded-md shadow-sm w-full">
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block font-medium text-sm text-gray-700">Telefone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                               class="border-gray-300 rounded-md shadow-sm w-full">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block font-medium text-sm text-gray-700">Endereço</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                               class="border-gray-300 rounded-md shadow-sm w-full">
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Salvar Contato
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
