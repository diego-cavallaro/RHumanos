<?php

namespace App\Http\Controllers;
use App\Models\Extra;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExtraController extends Controller
{
    public function index(): View
    {
        return view('extras.index', 
        [
          'extras' => Extra::with(['employee', 'reason'])->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('extras.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Extra::create($request->all());
        return redirect()->route('extras.index');
    }

    public function edit(Extra $extra): View
    {
        return view('extras.edit', compact('extra'));
    }

    public function update(Request $request, Extra $extra): RedirectResponse
    {
        $extra->update($request->all());
        return redirect()->route('extras.index');
    }
    
    public function destroy(Extra $extra): RedirectResponse
    {
        $extra->delete();
        return redirect()->route('extras.index');
    }
}