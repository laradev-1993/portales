<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use App\Models\Entrada;
use App\Models\Etiqueta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(){

    
    /**
     * Trae las entradas (posts) de la más nueva a la más antigua.
     * y muestra la vista principal con el listado.
     *
     * @return \Illuminate\View\View Vista con el listado completo de entradas.
     * 
     * */ 

    $entradas = Entrada::with('categoria', 'etiquetas')->latest()->get();

        return view('entradas.index', [
            
            'entradas' => $entradas
        ]);
    }


    /**
    * Muestra el formulario para crear una entrada.
    *
    * @return \Illuminate\Contracts\View\View
    */

        public function create(){
            
           return view('entradas.crear', [
             'categorias' => Categoria::all(),
                'etiquetas' => Etiqueta::orderBy('nombre')->get(), //Las etiquetas se ordenan por el nombre y las traiga.
            ]);
        }


/**
 * Valida los datos recibidos del formulario y guarda una nueva entrada de blog.
 * Sube la imagen con la API de Storage y guarda su ruta en la base.
 * Finalmente, redirige al listado de entradas con un mensaje de confirmación.
 *
 * @param Request $request Solicitud HTTP con los datos del formulario.
 * 
 */        

    public function store(Request $request){

    // - -- Validación-- (antes de obtener y guardar los datos)    
        $request->validate([
            'titulo' => ['required', 'min:3'],
            'extracto' => ['required'],
            'cuerpo' => ['required'],
            'categoria_fk' => ['required', 'exists:categorias,id'],
            'imagen' => ['required', 'image'],
        ], [
            'titulo.required' => 'El título es obligatorio.', 
            'titulo.min' => 'El título debe tener al menos 3 caracteres.', //Campo.regla => mensaje
            'extracto.required' => 'El extracto es obligatorio.',
            'cuerpo.required' => 'El cuerpo de la entrada es obligatorio.',
            'categoria_fk.required' => 'Elegí una categoría.',
            'imagen.required' => 'La imagen es obligatoria.',
            'imagen.image' => 'El archivo debe ser una imagen de tipo jpg, png.',
            ]);


            // dd($request->input());
            $data = $request->only(['titulo', 'extracto', 'cuerpo', 'categoria_fk']);


    //----- SUBIR IMÁGENES CON API Storage (Se obtienen los archivos c/ el objeto Request) -------

            if($request->hasFile('imagen')){
                $data['imagen'] = $request->file('imagen')->store('entradas'); 
            }

        
        //Version 2: Con el metodo create():
         $entrada = Entrada::create($data);    
         $entrada->etiquetas()->attach($request->input('etiqueta_id', [])); 

            return redirect('admin/entradas')

            //metodo with() del redirect
            ->with('feedback.message', 'La entrada ' . $entrada->titulo . ' se creó con éxito');
        }

    /**
     * Muestra el formulario de edición de una entrada específica.
     *
     * @param int $id Id único de la entrada a editar.
     * @return \Illuminate\View\View Vista con los datos de la entrada encontrada.
     *
     */
            public function edit(int $id){
            return view('entradas.editar', [

                'entrada' => Entrada::findOrFail($id),
                'categorias' => Categoria::all(),
                'etiquetas' => Etiqueta::orderBy('nombre')->get(),
            ]);
        }
    /**
     * Se solicitan dos datos: el id (que lo manda el parámetro de la ruta) 
     * y el objeto Request (para traer los datos).
     * 
     * Valida los datos recibidos, actualiza la entrada correspondiente
     * y redirige al listado con un mensaje de confirmación.
     *
     * @param \Illuminate\Http\Request $request Objeto con los datos enviados desde el formulario.
     * @param int $id Id único de la entrada a actualizar.
     *
     * */
        public function update(Request $request, int $id){

             $request->validate([
            'titulo' => ['required', 'min:3'],
            'extracto' => ['required'],
            'cuerpo' => ['required'],
            'categoria_fk' => ['required', 'exists:categorias,id'],
            'imagen' => ['nullable', 'image'],
        ], [
            'titulo.required' => 'El título es obligatorio.', 
            'titulo.min' => 'El título debe tener al menos 3 caracteres.', //Campo.regla => mensaje
            'extracto.required' => 'El extracto es obligatorio.',
            'cuerpo.required' => 'El cuerpo de la entrada es obligatorio.',
            'categoria_fk.required' => 'Elegí una categoría.',
            'imagen.image' => 'El archivo debe ser una imagen de tipo jpg, png.',
            ]);

            $entrada = Entrada::findOrFail($id);
            $imagenAntigua = $entrada->imagen;

            $data = $request->only(['titulo', 'extracto', 'cuerpo', 'categoria_fk']);   //guardar la data

            if($request->hasFile('imagen')){
                $data['imagen'] = $request->file('imagen')->store('entradas');
            }

            $entrada->update($data);

    //Editar los registros de la tabla pivot de una relación de muchos a muchos.
            
            $entrada->etiquetas()->sync($request->input('etiqueta_id', []));


            //Si se cambia la imágen y existe una antigua, se borra la antigua.
            if($request->hasFile('imagen') && $imagenAntigua !== null && Storage::exists($imagenAntigua)){

                Storage::delete($imagenAntigua);
            }

            return redirect('admin/entradas')
            ->with('feedback.message', 'La entrada ' . $entrada->titulo . ' se modificó con éxito');

        }



    /**
     * Muestra la vista de confirmación para eliminar una entrada.
     *
     * @param int $id Id único de la entrada a eliminar.
     * 
     * @return \Illuminate\View\View Vista con los datos de la entrada encontrada.
     */
        public function delete(int $id){
            return view('entradas.eliminar', [
               
                'entrada' => Entrada::findOrFail($id),
            ]);
        }

        /**
         * Elimina una entrada de blog existente.
         * Busca la entrada por su id, si no la encuentra da un error 404.
         *
         * En una transacción saca sus etiquetas de la tabla pivote y la elimina de la base de datos;
         *  si todo salió bien, borra su imagen de Storage.
         * 
         * @param int $id id único de la entrada a eliminar.
         * 
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy(int $id){

                $entrada = Entrada::findOrFail($id);

                //ELiminar registros de las relaciones de muchos-a-muchos.
                //utilizando el metodo --detach()--. 
    //Además Implementación de transacciones con el Query Builder
           
    try {
         DB::transaction(function() use ($entrada){
                 $entrada->etiquetas()->detach();
                // throw new \Exception('prueba, simulando un error');
                 $entrada->delete();
             });

            if($entrada->imagen !== null && Storage::exists($entrada->imagen)){
                Storage::delete($entrada->imagen);
            }    


            return redirect('admin/entradas')
            ->with('feedback.message', 'La entrada ' . $entrada->titulo . ' se eliminó con éxito');
             
        } catch (\Throwable $th) {
                
                return to_route('entradas.index') //una salida asegurada, por si ocurre un error
                ->with('feedback.message', 'Error. La entrada de blog no se pudo eliminar.')
                ->with('feedback.status', 'danger');
         }
    }
   
          

}
