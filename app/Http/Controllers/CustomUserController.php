<?php

namespace App\Http\Controllers;

use App\Models\CustomUser;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomUserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Custom Users - PIXEL PLAZA';
        $viewData['subtitle'] = 'List of custom users';
        $viewData['users'] = CustomUser::all();

        return view('custom-users.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Custom User';
        $viewData['subtitle'] = 'Create a new custom user';

        return view('custom-users.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        CustomUser::validate($request);

        CustomUser::create($request->only(['username', 'email', 'password']));

        return redirect()->route('custom-users.index')->with('success', 'User created successfully.');
    }

    public function show(int $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            $user = CustomUser::findOrFail($id);
        } catch (Exception $e) {
            $viewData['objectType'] = "Custom User";
            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        $viewData['title'] = 'Custom User #'.$id.' - PIXEL PLAZA';
        $viewData['subtitle'] = 'Custom User #'.$id.' - User information';
        $viewData['user'] = $user;

        return view('custom-users.show')->with('viewData', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        $viewData = [];
        try {
            CustomUser::findOrFail($id)->delete();
        } catch (Exception $e) {
            $viewData['objectType'] = "Custom User";
            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }

        return redirect()->route('custom-users.index')->with('success', 'User deleted successfully.');
    }
}