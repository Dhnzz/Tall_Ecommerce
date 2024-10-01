@php
    $inputs = [
        'add' => [
            'aksi' => [
                'action' => 'store()',
                'modalName' => 'add',
            ],
            'forms' => [
                [
                    'label' => 'Product Name',
                    'type' => 'text',
                    'model' => 'name',
                ],
                [
                    'label' => 'Product Price',
                    'type' => 'text',
                    'model' => 'price',
                ],
            ],
        ],

        'edit' => [
            'aksi' => ['action' => 'edit()', 'modalName' => 'edit'],
            'forms' => [
                [
                    'label' => 'Bussiness Category',
                    'type' => 'select',
                    'model' => 'bussinessCategory',
                    'options' => [
                        ['value' => 'elc', 'name' => 'Electronics'],
                        ['value' => 'fnb', 'name' => 'Food & Baverage'],
                        ['value' => 'ctl', 'name' => 'Clothes'],
                    ],
                ],
                [
                    'label' => 'Bussiness Name',
                    'type' => 'text',
                    'model' => 'bussinessName',
                ],
                [
                    'label' => 'Bussiness Level',
                    'type' => 'select',
                    'model' => 'bussinessLevel',
                    'options' => [
                        ['value' => 'h', 'name' => 'High'],
                        ['value' => 'm', 'name' => 'Medium'],
                        ['value' => 'l', 'name' => 'Low'],
                    ],
                ],
            ],
        ],
    ];
@endphp
<div>
    <div class="py-10 mx-auto max-w-7xl">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Product Management</h3>
                <button data-modal-target="add-modal" data-modal-toggle="add-modal"
                    class="mt-5 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Create Product
                </button>
            </div>



            <livewire:components.ModalForm :inputs="$inputs['add']" />
            <livewire:components.ModalForm :inputs="$inputs['edit']" />

            {{-- MODAL --}}
            {{-- <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                x-on:product-created="close">
                <div class="relative w-full max-w-2xl max-h-full p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Create New Product
                            </h3>
                            <button type="button"
                                class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 space-y-4 md:p-5">
                            <form wire:submit='store()'>
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" wire:model="name"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"
                                        id="name">
                                    @error('name')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                    <input type="text" wire:model="price"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm"
                                        id="price">
                                    @error('price')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                accept</button>
                            <button data-modal-hide="default-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}


            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Price
                        </th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ $product->price }}</td>
                            <td class="px-6 py-4 text-right">
                                <button wire:click="edit({{ $product->id }})"
                                    class="px-4 py-2 font-bold text-white bg-yellow-500 rounded hover:bg-yellow-700">Edit</button>
                                <button data-modal-target="edit-modal" data-modal-toggle="edit-modal"
                                    class="mt-5 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Create Product
                                </button>
                                <button wire:click="delete({{ $product->id }})"
                                    class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@script
    <script>
        $wire.on('product-created', () => {
            const modalElement = document.getElementById('default-modal');
            const modalInstance = new Modal(modalElement);
            modalInstance.hide();
        })

        window.addEventListener('swal', e => {
            Swal.fire(e.detail);
        });
    </script>
@endscript
