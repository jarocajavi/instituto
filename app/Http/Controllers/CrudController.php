<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    public function index(string $resource)
    {
        $config = config("resources.$resource");
        $resource_name = $config['resource'] ?? $resource;

        $modelClass = "App\\Models\\" . Str::studly(Str::singular($resource));

        $query = $modelClass::query();

        $rows = $query->paginate(10);

        $fields = $config['fields'] ?? [];

        $table = __("$resource.table");

        return view('crud.index', compact('resource', 'rows', 'fields', 'table', 'resource_name'));
    }

    public function create(string $resource)
    {
        $config = config("resources.$resource");
        $fields = $config['fields'] ?? [];
        $resource_name = $config['resource'] ?? $resource;

        return view('crud.create', compact('resource', 'fields', 'resource_name'));
    }

    public function store(string $resource, Request $request)
    {
        $modelClass = "App\\Models\\" . Str::studly(Str::singular($resource));
        $config = config("resources.$resource");
        $fields = $config['fields'] ?? [];

        $data = $request->only(array_keys($fields));
        $modelClass::create($data);

        return redirect()->route('crud.index', $resource)
            ->with('success', __("$resource.created"));
    }

    public function show(string $resource, string $id)
    {
        $modelClass = "App\\Models\\" . Str::studly(Str::singular($resource));
        $config = config("resources.$resource");
        $fields = $config['fields'] ?? [];
        $resource_name = $config['resource'] ?? $resource;
        $row = $modelClass::findOrFail($id);

        return view('crud.show', compact('resource', 'row', 'fields', 'resource_name'));
    }

    public function edit(string $resource, string $id)
    {
        $modelClass = "App\\Models\\" . Str::studly(Str::singular($resource));
        $config = config("resources.$resource");
        $fields = $config['fields'] ?? [];
        $resource_name = $config['resource'] ?? $resource;
        $row = $modelClass::findOrFail($id);

        return view('crud.edit', compact('resource', 'row', 'fields', 'resource_name'));
    }

    public function update(string $resource, Request $request, string $id)
    {
        $modelClass = "App\\Models\\" . Str::studly(Str::singular($resource));
        $config = config("resources.$resource");
        $fields = $config['fields'] ?? [];

        $data = $request->only(array_keys($fields));
        $modelClass::findOrFail($id)->update($data);

        return redirect()->route('crud.index', $resource)
            ->with('success', __("$resource.updated"));
    }

    public function destroy(string $resource, int $id)
    {
        $modelClass = "App\\Models\\" . Str::studly(Str::singular($resource));
        $modelClass::findOrFail($id)->delete();

        return redirect()->route('crud.index', $resource)
            ->with('success', __("$resource.deleted"));
    }
}
