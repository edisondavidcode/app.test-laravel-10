<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('update', 'edit');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }
    public function index()
    {
        $tags = Tag::all();
        return view('Admin.tags.index', compact('tags'));
    }
    public function create()
    {
        $colors = [
            'blue' => 'Color azul',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'pink' => 'Color rosado',
            'purple' => 'Color morado',
            'red' => 'Color rojo',
            'Indigo' => 'Color indigo',
        ];
        return view('Admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'slug' => "required|unique:tags",
                'color' => "required"
            ]
        );

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La categoria se ha creado con exito ERES UN GENIO');
    }

    public function edit(Tag $tag)
    {
        $colors = [
            'blue' => 'Color azul',
            'yellow' => 'Color amarillo',
            'green' => 'Color verde',
            'pink' => 'Color rosado',
            'purple' => 'Color morado',
            'red' => 'Color rojo',
            'Indigo' => 'Color indigo',
        ];

        return view('Admin.tags.edit', compact('tag', 'colors'));
    }
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => "required"
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizo con exito');
    }
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'Se ha eliminado la etiqueta con exito');
    }
}
