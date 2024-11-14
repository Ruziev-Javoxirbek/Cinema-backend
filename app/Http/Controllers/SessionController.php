<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class SessionController extends Controller
{
    // Метод для отображения списка всех сеансов
    public function index(Request $request)
    {
        // Получаем значение perpage из запроса или по умолчанию устанавливаем 2
        $perPage = $request->get('perpage', 2);

        // Пагинация сеансов с сохранением параметров запроса
        $sessions = Session::with(['movie', 'theater'])->paginate($perPage)->withQueryString();

        return view('sessions.index', compact('sessions'));
    }

    // Метод для отображения информации о конкретном сеансе
    public function show($id)
    {
        $session = Session::with(['movie', 'theater'])->findOrFail($id);
        return view('sessions.show', compact('session'));
    }

    public function create()
    {
        $movies = Movie::all();
        $theaters = Theater::all();
        return view('sessions.create', compact('movies', 'theaters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'theater_id' => 'required|exists:theaters,id',
            'date' => 'required|date',
            'time' => 'required',
            'ticket_price' => 'required|numeric|min:0',
            'available_seats' => 'required|integer|min:1',
        ]);

        Session::create($request->all());

        return redirect('/sessions')->with('success', 'Сеанс успешно создан');
    }

    public function edit($id)
    {
        $session = Session::findOrFail($id);
        $movies = Movie::all();
        $theaters = Theater::all();

        return view('sessions.edit', compact('session', 'movies', 'theaters'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'theater_id' => 'required|exists:theaters,id',
            'date' => 'required|date',
            'time' => 'required',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        $session = \App\Models\Session::findOrFail($id);
        $session->update($request->all());

        return redirect('/sessions')->with('success', 'Сеанс успешно обновлен');
    }

    public function destroy($id, GateContract $gate)
    {
        $session = Session::findOrFail($id);

        // Проверяем доступ к удалению сеанса
        if (!$gate->allows('delete-expensive-session', $session)) {
            return redirect('/error')->with('error', 'У вас нет прав для удаления этого сеанса.');
        }

        $session->delete();

        return redirect('/sessions')->with('success', 'Session deleted successfully.');
    }
}
