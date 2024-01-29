<?php

namespace App\Livewire\Catalogue;

use Livewire\Component;
use DB;
use App\Models\books;
use App\Models\author;
use App\Models\editorial;
use App\Models\user;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class AppBooks extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

     /*public $action = 'none',  $recetaAdd = false, $cost_recipe;*/
     public $modal = false; // columnas de la tabla
     public $name_book, $editorial, $author, $code, $id_editorial = 0, $id_author = 0, $id_update;

     public $bookEdit = [
        'name_book' => 'prueba',
        'editorial' => '',
        'author' => '',
        'code' => ''
     ];

     public $search, $perPage = 25, $order = 'ASC', $filter = 'name_material';
     protected $listeners = ['delete', 'closeModalSon' => 'closeModal' ];
     protected $rules = [];

     protected $validationAttributes  = [
        'name_product' => "Nombre de producto",
        'details' => "Detalles del material",
        'id_category' => "Categoría",
    ];

    public function render()
    {

        $books = Books::leftJoin('editorials', 'books.id_editorial', 'editorials.id')
                ->leftJoin('authors', 'books.id_author', 'authors.id')
                ->leftJoin('status_books', 'books.id_status', 'status_books.id')
                ->where('books.name_book', 'like', '%' . $this->search . '%')
                ->orWhere('books.code', 'like', '%' . $this->search . '%')
                ->orWhere('editorials.editorial_name', 'like', '%' . $this->search . '%')
                ->orWhere('authors.author_name', 'like', '%' . $this->search . '%')
                ->orWhere('status_books.status_name', 'like', '%' . $this->search . '%')
                ->paginate(25);



        return view('livewire.catalogue.app-books')->with([
            'books' => $books,
        ]);
    }


    public function closeModal($data){
        $this->modal_subProduct = $data;
    }


    public function toggle(){

        if ($this->modal) {
           $this->modal = false;
           $this->bookEdit['name_book'] = 'ESTA POR CREAR';

        //    $this->reset(['id_category', 'name_product', 'details', 'id_update' ]);
        }else{
            $this->modal = true;
        }

    }

    public function save($id = null){


        // $this->rules += [
        //     'name_product' => 'required|max:80',
        //     'details' => 'required|max:255',
        //     'id_category' => 'required',
        // ];


        // $this->validate();

        try{
            //Calcula precio por millares es decir 1 litro lo convierte a mililitro
            //y saca su precio por unidad ya que al usar productes normalmente se uan porciones ejemplo 25ml leche o 50 gr de azucar

            // Save meterial new or edit
            if($id == null){
                $book = new Books();
            }else{
                $book = Books::find($id);
            }


            $book->name_book  = $this->name_book;
            $book->code = $this->code;
            $book->id_status = 1;

            if($this->id_editorial == 0){
                // se crean historial de editoriales
                $editorial = new Editorial();
                $editorial->editorial_name = $this->editorial;
                $editorial->save();

                // se agrega el id de la editorial
                $book->id_editorial =$editorial->id;

            }else{
                // se agrega directamente ya que lo eligieron
                $book->id_editorial = $this->editorial;
            }

            if($this->id_author == 0){
                $author = new Author();
                $author->author_name = $this->author;
                $author->save();

                // se agrega el id del autor
                $book->id_author =$author->id;
            }else{
                $book->id_author = $this->id_author;
            }


            $book->save();

            $this->alert('success', '¡Guardado con éxito!', [
                'timer' => 3000,
                'toast' => true,
            ]);

        }catch (\Exception $exception) {
            $this->alert('error', '¡Error al guardar!', [
                'timer' => 3000,
                'toast' => true,
               ]);
        }




        $this->modal = false;
        $this->reset(['name_book','editorial', 'author',  'code', 'id_editorial', 'id_author', 'id_update']);

    }

    public function edit($id){

        $book = Books::find($id);

        $this->id_update = $book->id ;
        $this->bookEdit['name_book'] = $book->name_book ;
        $this->bookEdit['code'] = $book->code ;

        $this->id_editorial = $book->id_editorial ;
        $this->id_author = $book->id_author ;

        $editorial = Editorial::find( $this->id_editorial);
        $author = Author::find( $this->id_author);
        $this->editorial = $editorial->editorial_name;
        $this->author = $author->author_name;

        $this->modal = true;



    }

}
