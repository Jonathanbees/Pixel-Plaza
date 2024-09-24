<?php

// Samuel

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCustomUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['users'] = CustomUser::all();
        $viewData['success'] = session('viewData.success');

        return view('admin-custom-user.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin-custom-user.create');
    }

    public function save(Request $request): RedirectResponse
    {
        CustomUser::validate($request);

        CustomUser::create($request->only(['name', 'email', 'password', 'is_admin']));

        session()->flash('viewData.success', 'User created successfully.');

        return redirect()->route('admin-custom-user.index');
    }

    public function show(int $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $user = CustomUser::findOrFail($id);
        } catch (Exception $e) {
            $viewData['objectType'] = 'Custom User';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        $viewData['user'] = $user;

        return view('admin-custom-user.show')->with('viewData', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            CustomUser::findOrFail($id)->delete();
        } catch (Exception $e) {
            $viewData['objectType'] = 'Custom User';

            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }

        session()->flash('viewData.success', 'User deleted successfully.');

        return redirect()->route('admin-custom-user.index');
    }
}
