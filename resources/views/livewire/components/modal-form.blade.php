<div>
    <div id="{{ $inputs['aksi']['modalName'] }}-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
        x-on:product-created="close">
        <div class="relative w-full max-w-2xl max-h-full p-4">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create New Product
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="{{ $inputs['aksi']['modalName'] }}-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 space-y-4 md:p-5">
                    <form wire:submit='{{ $inputs['aksi']['action'] }}'>
                        @foreach ($inputs['forms'] as $input)
                            @if ($input['type'] === 'text')
                                <div>
                                    <label for="{{ $input['model'] }}"
                                        class="block text-sm font-medium text-gray-700">{{ $input['label'] }}</label>
                                    <input type="text" wire:model="{{ $input['model'] }}"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"
                                        id="{{ $input['model'] }}">
                                    @error($input['model'])
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            @elseif ($input['type'] === 'select')
                                <div>
                                    <label for="{{ $input['model'] }}">{{ $input['label'] }}</label>
                                    <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"
                                        name="{{ $input['model'] }}" id="{{ $input['model'] }}">
                                        @foreach ($input['options'] as $option)
                                            <option value="{{ $option['value'] }}">{{ $option['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        @endforeach
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button data-modal-hide="{{ $inputs['aksi']['modalName'] }}-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
