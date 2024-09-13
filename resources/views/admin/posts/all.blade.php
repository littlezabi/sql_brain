<x-admin_layout>
    <x-slot:pageTitle>
        Posts
    </x-slot:pageTitle>
    <div class="m-7">
        <div class="container mx-auto mt-10">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-gray-800 rounded-lg shadow-lg">
                    <thead>
                        <tr class="bg-gray-700 text-left">
                            <th class="px-6 py-4 text-sm font-medium text-gray-300 border-b border-gray-700">
                                Title
                            </th>
                            <th class="px-6 py-4 text-sm font-medium text-gray-300 border-b border-gray-700">
                                Body
                            </th>
                            <th class="px-6 py-4 text-sm font-medium text-gray-300 border-b border-gray-700">
                                Default SQL</th>
                            <th class="px-6 py-4 text-sm font-medium text-gray-300 border-b border-gray-700">
                                Category</th>
                            <th class="px-6 py-4 text-sm font-medium text-gray-300 border-b border-gray-700">
                                Slug</th>
                            <th class="px-6 py-4 text-sm font-medium text-gray-300 border-b border-gray-700">
                                Create At</th>
                            <th class="px-6 py-4 text-sm font-medium text-gray-300 border-b border-gray-700">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $item)
                            <tr class="hover:bg-gray-700">
                                <td class="px-6 py-4 text-sm border-b border-gray-700">{{ $item->title }}</td>
                                <td class="px-6 py-4 text-sm border-b border-gray-700">
                                    {{ substr($item->body, 0, 100) }}...
                                </td>
                                <td class="px-6 py-4 text-sm border-b border-gray-700">{{ $item->default_sql }}</td>
                                <td class="px-6 py-4 text-sm border-b border-gray-700">{{ $item->category->title }}</td>
                                <td class="px-6 py-4 text-sm border-b border-gray-700">{{ $item->slug }}</td>
                                <td class="px-6 py-4 text-sm border-b border-gray-700">{{ $item->created_at }}</td>
                                <td class="px-6 py-4 text-sm border-b border-gray-700">
                                    <a href="/admin/posts/{{ $item->id }}"
                                        class="text-blue-500 ml-2 underline font-semibold">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <x-message />
            </div>
            <div class="mt-10 mx-4">
                {{ $posts->links() }}
            </div>
        </div>


    </div>
</x-admin_layout>
