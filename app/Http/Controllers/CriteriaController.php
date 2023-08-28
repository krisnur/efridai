<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Criteria;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
    public function index()
    {
        if (!Auth::check() || !(Auth::user()->role === 'admin')) {
            return redirect('/login');
        }
        $criteria = Criteria::simplePaginate(15);;

        return view('criteria.index', compact('criteria'));
    }

    public function create()
    {
        if (!Auth::check() || !(Auth::user()->role === 'admin')) {
            return redirect('/login');
        }
        return view('criteria.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check() || !(Auth::user()->role === 'admin')) {
            return redirect('/login');
        }
        $criteria = new Criteria();
        $criteria->name = $request->input('name');
        $criteria->category = $request->input('category');
        $criteria->save();

        return redirect()->route('criteria.index');
    }

    public function edit(Criteria $criteria)
    {
        if (!Auth::check() || !(Auth::user()->role === 'admin')) {
            return redirect('/login');
        }
        return view('criteria.edit', compact('criteria'));
    }

    public function update(Request $request, Criteria $criteria)
    {
        if (!Auth::check() || !(Auth::user()->role === 'admin')) {
            return redirect('/login');
        }
        $criteria->name = $request->input('name');
        $criteria->category = $request->input('category');
        $criteria->save();

        return redirect()->route('criteria.index');
    }

    public function destroy(Criteria $criteria)
    {
        if (!Auth::check() || !(Auth::user()->role === 'admin')) {
            return redirect('/login');
        }
        $criteria->delete();

        return redirect()->route('criteria.index');
    }
}