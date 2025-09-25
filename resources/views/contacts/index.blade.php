<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Meus Contatos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Botão para adicionar contato -->
                <div class="mb-4">
                    <a href="{{ route('contacts.create') }}"
                       class="inline-block bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg shadow hover:bg-blue-600 transition">
                        + Adicionar Contato
                    </a>
                </div>

                <!-- Tabela de contatos -->
                <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700 mt-4">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="border px-4 py-2">Nome</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Telefone</th>
                            <th class="border px-4 py-2">Endereço</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                            <tr class="odd:bg-white even:bg-gray-50 dark:even:bg-gray-800 dark:odd:bg-gray-900">
                                <td class="border px-4 py-2">{{ $contact->name }}</td>
                                <td class="border px-4 py-2">{{ $contact->email }}</td>
                                <td class="border px-4 py-2">{{ $contact->phone }}</td>
                                <td class="border px-4 py-2">{{ $contact->address }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                       class="inline-block bg-yellow-500 text-white font-semibold px-4 py-1 rounded hover:bg-yellow-600 transition">
                                        Editar
                                    </a>
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse contato? Essa ação é permanente.')"
                                                class="bg-red-500 text-white font-semibold px-4 py-1 rounded hover:bg-red-600 transition">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border px-4 py-2 text-center">Nenhum contato encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>