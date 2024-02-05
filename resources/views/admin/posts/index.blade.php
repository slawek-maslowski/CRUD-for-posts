<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4">
                    <div class="mb-4 text-right">
                        <a href="{{ route('admin.posts.create') }}"
                           class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300
                                       font-medium rounded-lg text-sm px-2 py-1 mr-2 mb-2 dark:bg-blue-600
                                       dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            {{ __('Create Post') }}
                        </a>
                    </div>
                    <hr>
                    <table class="w-full text-sm mt-4 text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Title') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Body') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Active') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Action') }}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $post->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $post->body }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($post->active)
                                        <i class="fa fa-check text-green-700" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-close text-red-700" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td class="px-6 py-4 flex">
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('{{ __('Are you sure you want to delete this post?') }} \r\n {{ $post->title }}');"
                                          style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"
                                                class="px-2 focus:outline-none text-white bg-red-700 hover:bg-red-800
                                               focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2
                                               py-1 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700
                                               dark:focus:ring-red-900"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                       class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300
                                       font-medium rounded-lg text-sm px-2 py-1 mr-2 mb-2 dark:bg-blue-600
                                       dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

