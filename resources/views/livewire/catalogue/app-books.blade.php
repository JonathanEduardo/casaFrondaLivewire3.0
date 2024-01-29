<div class="z-40">
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <section class="bodySection">

        <div class="flex flex-col md:flex-row  justify-between mb-2 w-full">
            <div class="relative w-full md:w-2/5 lg:w-1/2 ">
                <i class="fa-solid fa-magnifying-glass absolute left-2 top-3"></i>
                <input wire:model.live="search" type="text" class="pl-8 pr-4 py-2 rounded-md w-full" placeholder="Buscar">

            </div>


            <div class="w-full md:w-3/5 lg:w-1/2 mt-2 md:mt-0 flex  gap-4  sm:justify-end ">
                <select wire:model="search" name="" id="" class="sm:w-fit py-1 rounded-md w-full ">

                    <option value="">Todos</option>



                </select>


                <select wire:model="perPage" name="" id="" class="sm:w-fit py-1 rounded-md w-full ">

                    <option value="15">15 por página</option>
                    <option value="25">25 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>

                </select>

                <button wire:click="toggle()" class="hidden sm:block  btnAdd">
                    <i class="fa-solid fa-plus"></i> Agregar </button>

            </div>


        </div>

        <div class="bg-green-700 bg-red-500 bg-yellow-600">

        </div>

        <div class="w-full mb-12 ">
            <div class="bgTable">
                <div class="rounded-t mb-0 px-4 py-3 border-0 bg-companyColor-primary-lighter">
                    <div class="flex flex-wrap items-center">
                        <div class="titleTable ">
                            <h3 class=" ">Libros</h3>
                        </div>

                        <button wire:click="toggle()" class="sm:hidden btnAdd">
                            <i class="fa-solid fa-plus "></i> Agregar </button>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto ">
                    <table class="items-center w-full bg-transparent border-collapse ">
                        <thead>
                            <tr>
                                <th class="thTable  " wire:click="setFilter('materials.id')">
                                code
                                    @if ($order == 'ASC' )
                                    <i class="fa-solid fa-arrow-up-1-9"></i>
                                    @else
                                    <i class="fa-solid fa-arrow-down-9-1"></i>
                                    @endif

                                </th>
                                <th class="thTable" wire:click="setFilter('materials.name_material')">
                                    Nombre


                                    @if ($order == 'ASC' )
                                    <i class="fa-solid fa-arrow-up-a-z"></i>
                                    @else
                                    <i class="fa-solid fa-arrow-down-a-z"></i>
                                    @endif

                                </th>
                                <th class="thTable" wire:click="setFilter('materials_labels.label_name')">
                                    Autor

                                    @if ($order == 'ASC' )
                                    <i class="fa-solid fa-arrow-up-a-z"></i>
                                    @else
                                    <i class="fa-solid fa-arrow-down-a-z"></i>
                                    @endif
                                </th>
                                <th class="thTable" wire:click="setFilter('units.unit_name')">
                                    Editorial
                                    @if ($order == 'ASC' )
                                    <i class="fa-solid fa-arrow-up-a-z"></i>
                                    @else
                                    <i class="fa-solid fa-arrow-down-a-z"></i>
                                    @endif
                                </th>


                                <th class="thTable" wire:click="setFilter('materials.stock')">
                                    Estado
                                    @if ($order == 'ASC' )
                                    <i class="fa-solid fa-arrow-up-1-9"></i>
                                    @else
                                    <i class="fa-solid fa-arrow-down-9-1"></i>
                                    @endif
                                </th>
                                <th class="thTable">
                                    Acciones
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($books as $book)

                            <td class="tdTable">
                                # {{$book->code}} </td>



                            <td class="tdTable">
                                {{$book->name_book}} </td>


                            <td class="tdTable">
                                    {{$book->author->author_name}} </td>



                            <td class="tdTable ">
                                {{$book->editorial->editorial_name}}

                            </td>



                            <td class="tdTable text-right">
                                <div class="flex items-center">



                                    <button wire:click="out({{$book->id}})" class="   {{$book->estatus->color}} text-white font-semibold  px-2 py-1 rounded">
                                        {{$book->estatus->status_name}}
                                    </button>


                                </div>
                            </td>




                            <td class="tdTable text-right">
                                <div class="flex items-center">


                                    <div class="flex gap-2">
                                        <button wire:click="$emit('deleteItem',{{ $book->id }})" class="btnDelete">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                              </svg>

                                        </button>


                                        <button wire:click="edit({{ $book->id }})" class="btnEdit"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                          </svg>
                                          </button>
                                    </div>
                                </div>


                            </td>

                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>



    <!-- Modal -->
    <div class="  @if ($modal == true) fixed   @else hidden @endif  bgBaseModal">

        <div class=" modalDetails" style="height: auto;  max-height: 88%;}">
            <header class=" modalHeader">
                <div class="relative">
                    <h1 class="titleModal">Nuevo Libro</h1>
                    <div class="absolute top-0 right-0">
                        <i wire:click="toggle()" class="fa-solid fa-rectangle-xmark bntClose "></i>
                    </div>
                </div>

            </header>

            <div class="modalBody ">
                <!-- Es un flex de 2 inputs  -->

                <div class="slotFormx2">

                    <div class="sectionInputx2">
                        <label class=" inputTextTitle " for="grid-name">
                            Nombre Libro
                        </label>

                        {{$name_book}}

                        <input wire:model="bookEdit.name_book" type="text" class="inputText">

                        @error('name_book')
                        <span class="errorBack"> {{$message}}</span>
                        @enderror
                    </div>



                    <div class="sectionInputx2">
                        <label class=" inputTextTitle " for="grid-category">Editorial: </label>


                        <input wire:model.debounce="editorial" type="text" class="inputText">

                        @error('editorial')
                        <span class="errorBack"> {{$message}}</span>
                        @enderror

                    </div>




                </div>

                <div class="slotFormx2">

                    <div class="sectionInputx2">
                        <label class=" inputTextTitle " for="grid-name">
                            Autor
                        </label>


                        <input wire:model="author" type="text" class="inputText">

                        @error('author')
                        <span class="errorBack"> {{$message}}</span>
                        @enderror
                    </div>



                    <div class="sectionInputx2">
                        <label class=" inputTextTitle " for="grid-category">Código: </label>

                        <input wire:model="code" type="text" class="inputText">

                        @error('code')
                        <span class="errorBack"> {{$message}}</span>
                        @enderror



                    </div>




                </div>










            </div>



            <footer class=" modalFooter ">
                <button wire:click="toggle()" class="btnTransparentCancel">Cancelar &nbsp; <i
                        class="fa-solid fa-ban"></i></button>
                <button wire:click="save({{$id_update}})" class="btnTransparentSave">Guardar &nbsp; <i
                        class="fa-solid fa-floppy-disk"></i></button>
            </footer>
        </div>

    </div>





    <div wire:loading class="baseBgLoading">

        <div class=" containerLoading">

            <svg aria-hidden="true" class=" spinLoading" viewBox="0 0 100 101" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                    fill="currentColor" />
                <path
                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                    fill="currentFill" />
            </svg>
            <span class="textLoading">Loading...</span>
        </div>

    </div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @push('js')
    <script>


        Livewire.on('deleteItem', deletebyId => {
                    Swal.fire({
                        title: '¿Seguro que deseas eliminar este elemento?',
                        text: "Esta acción es irreversible",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#202a33',
                        cancelButtonColor: '#fb7185',
                        confirmButtonText: 'Si, Eliminar!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('delete', deletebyId);
                            // Swal.fire(
                            //   '¡Eliminado!',
                            //   'Tu elemento ha sido eliminado.',
                            //   'Exito'
                            // )
                        }
                    })
                });

            document.addEventListener('livewire:load', function(){
                    $('.searchSelectCategory').select2();
                    $('.searchSelectCategory').on('change', function () {
                        @this.set('id_category', this.value);
                    });

                    // $('.searchSelectUnit').select2();
                    // $('.searchSelectUnit').on('change', function () {
                    //     @this.set('id_unit', this.value);
                    // });
                });


            //  Livewire.on('setUnit', opcion => {
            //    $('#id_unit').val(opcion).trigger('change.select2').trigger('select2:select');
            // });

            Livewire.on('setCategory', opcion => {
            $('#id_category').val(opcion).trigger('change.select2').trigger('select2:select');
            });
    </script>
    @endpush


</div>

