<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $news = News::orderBY('updated_at', 'DESC')
            ->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return View('news.create');
    }

    public function store(Request $request)
    {
        /**
         *Validacion de datos obtenidos desde el formulario de creacion de noticias
         * @return boolean
         * @fields: 'title', 'excerpt', 'body', 'category', 'image_name', 'image_path', 'user_id', 'created_at'
         **/
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $file_name = $image->getClientOriginalName();
            \Storage::disk('local')->put($file_name, \File::get($image));
        } else {
            $file_name = null;
        }

        $data = request()->validate([
            'title' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'body' => ['required', 'string'],
            'category' => ['nullable', 'string'],
            'image_file' => ['nullable', 'mimes:jpeg,bmp,png,gif'],
            'image_path' => ['nullable', 'string'],
            'user_id' => ['required', 'numeric']
        ], [
            'title.required' => 'Debe ingresar un título para la noticia',
            'title.string' => 'El título de la noticia debe ser un texto',
            'excerpt.required' => 'Debe ingresar una bajada para la noticia',
            'excerpt.string' => 'La bajada debe ser un texto',
            'body.required' => 'Debe ingresar el cuerpo de la noticia',
            'body.string' => 'El cuerpo de la noticia debe ser un texto',
            'category.string' => 'La categoría debe ser un texto',
            'image_file.mimes' => 'El tipo de archivo seleccionado no es válido',
            'user_id.required' => 'Error al capturar el usuario de creación de la noticia',
        ]);
        try {
            News::create([
                'title' => $data['title'],
                'excerpt' => $data['excerpt'],
                'body' => $data['body'],
                'category' => $data['category'],
                'image_name' => $file_name,
                'image_path' => public_path() . '/storage/' . $file_name,
                'user_id' => $data['user_id'],
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return redirect('/noticias');
    }

    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news]);
    }

    public function update(News $news, Request $request)
    {

        $data = request()->validate([
            'title' => ['required', 'string'],
            'excerpt' => ['required', 'string'],
            'body' => ['required', 'string'],
            'category' => ['nullable', 'string'],
            'image_name' => ['nullable', 'string', 'mimes:jpeg,bmp,png,gif'],
            'image_path' => ['nullable', 'string'],
            'user_id' => ['required', 'numeric']
        ], [
            'title.required' => 'Debe ingresar un título para la noticia',
            'title.string' => 'El título de la noticia debe ser un texto',
            'excerpt.required' => 'Debe ingresar una bajada para la noticia',
            'excerpt.string' => 'La bajada debe ser un texto',
            'body.required' => 'Debe ingresar el cuerpo de la noticia',
            'body.string' => 'El cuerpo de la noticia debe ser un texto',
            'category.string' => 'La categoría debe ser un texto',
            'image_name.mimes' => 'El tipo de archivo seleccionado no es válido',
            'user_id.required' => 'Error al capturar el usuario de creación de la noticia',
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $file_name = $image->getClientOriginalName();
            \Storage::disk('local')->put($file_name, \File::get($image));

            $data['image_name'] = $file_name;
            $data['image_path'] = public_path() . '/storage/' . $file_name;
        }

        $news->update($data);
        return redirect('/noticias');
    }

    public function delete(News $news)
    {
        $news->delete();
        return redirect('/noticias');
    }
}
