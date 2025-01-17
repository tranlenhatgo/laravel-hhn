<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListUserController extends Controller
{

    public function index()
    {
        $title = 'Xóa Người Dùng!';
        $text = "Bạn có chắc muốn xóa không?";
        confirmDelete($title, $text);
        User::where('role', '!=', 1)->paginate(10);
        return view('admin.list_users');
    }

    public function loadEntries($number_entries)
    {
        $usersQuery = User::where('role', '!=', 1)->orderBy('created_at', 'desc');
        $users = ($number_entries != -1) ? $usersQuery->paginate($number_entries) : $usersQuery->get();
        return response()->json($users);
    }


    public function deleteUser(Request $request, $number_entries)
    {

        $data = $request->get("data");
        if (is_array($data)) {
            $intIds = array_map('intval', $data);
            $rowCount = User::whereIn('user_id', $intIds)->delete();
        } else {
            $userId = $data;
            $rowCount = User::where('user_id', $userId)->delete();
        }
        
        if ($number_entries != -1) {
            $users = User::where('role', '!=', 1)->orderBy('created_at', 'desc')->paginate($number_entries);
        } else {
            $users = User::where('role', '!=', 1)->orderBy('created_at', 'desc')->get();
        }
        if ($rowCount > 0) {
            return response()->json($users, 200);
        } else {
            return response()->json("", 500);
        }

    }

    public function updateUser(Request $request, $number_entries)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        $user = User::find($request->userID);
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->address = $validated['address'];
        $user->phone_number = $validated['phone_number'];
        $user->save();
        if ($number_entries != -1) {
            $users = User::where('role', '!=', 1)
            ->orderBy('created_at', 'desc')
            ->paginate($number_entries);
        } else {
            $users = User::where('role', '!=', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        }

        if ($user->wasChanged()) {
            return response()->json($users, 200);
        } else {
            return response()->json("", 500);
        }
    }

    public function searchUsers(Request $request, $number_entries)
    {
        $usersQuery = User::where(function ($query) use ($request) {
            $query->where('username', "LIKE", "%$request->valueSearch%")
                ->orWhere("email", "LIKE", "%$request->valueSearch%")
                ->orWhere("address", "LIKE", "%$request->valueSearch%")
                ->orWhere("phone_number", "LIKE", "%$request->valueSearch%");
        })
        ->where('role', '!=', 1)
        ->orderBy('created_at', 'desc');
        $users = ($number_entries != -1) ? $usersQuery->paginate($number_entries) : $usersQuery->get();
        return response()->json($users, 200);
    }

    public function sortAscending(Request $request, $number_entries)
    {
        $users = User::orderBy($request->fieldName, 'asc')->where('role', '!=', 1);
        return response()->json($number_entries != -1 ? $users->paginate($number_entries) : $users->get());
    }

    public function sortDescending(Request $request, $number_entries)
    {
        $users = User::orderBy($request->fieldName, 'desc')->where('role', '!=', 1);
        return response()->json($number_entries != -1 ? $users->paginate($number_entries) : $users->get());
    }
}
