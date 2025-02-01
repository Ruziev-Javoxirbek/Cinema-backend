<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Aws\S3\S3Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class MovieApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(Movie::limit($request->perpage ?? 5)
            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
            ->get());
    }

    public function total()
    {
        return response(Movie::all()->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::allows('create-movie')) {
           return response()->json([
               'code' => 1,
               'message' => 'У вас нет права на добавление фильма!'
           ]);
        }
        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|unique:movies|max:255',
            'description' => 'required|string',
            'duration' => 'nullable|integer',
            'release_date' => 'nullable|date',
            'image' => 'required|file',
        ]);

        // Получение файла из запроса
        $file = $request->file('image');
        $fileName = rand(1, 100000) . '_' . $file->getClientOriginalName();

        try {
            // Загрузка файла в S3
            $path = Storage::disk('s3')->putFileAs('movie_pictures', $file, $fileName);
            $fileUrl = Storage::disk('s3')->url($path);

        } catch (Exception $e) {
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ]);
        }
        $movie = new Movie($validated);
        $movie->picture_url = $fileUrl;
        $movie->duration = $request->input('duration', 120);
        $movie->save();
        return response()->json([
            'code' => 0,
            'message' => 'Фильм успешно добавлен',
        ]);
    }

    /**
     * Display the specified resource.
     */

    //            $path = 'movie_pictures/' . $fileName;
    //            Storage::disk('s3')->put($path, file_get_contents($file->getRealPath()));
    //            $fileUrl = Storage::disk('s3')->url($path);
    //--------------------------------------------------
    //$path = Storage::disk('s3')->putFileAs('movie_pictures', $file, $fileName);
    //            $fileUrl = Storage::disk('s3')->url($path);
    public function show(string $id)
    {
        return response(Movie::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
