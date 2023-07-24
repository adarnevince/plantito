<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Session;
use DB;

class UserController extends Controller
{
    public function pageLogin(){
        return view('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', '=', $request->email)
        ->first();

        if ($user) {
            if (Hash::check($request->password, $user->password))
            {
                $request->session()
                ->put('user_id', $user->user_id);

                $request->session()
                ->put('first_name', $user->first_name);

                $request->session()
                ->put('last_name', $user->last_name);

                $request->session()
                ->put('email', $user->email);

                $request->session()
                ->put('role', $user->role);

                if (Session::get('role') == 'admin'){
                    return redirect('/admin')
                    ->with('success', 'Logged in as admin.');
                }
                return redirect('/profile')->with('success', 'Hi there, ' . Session::get('first_name') . '!');
            } else {
                return redirect('/login')->with('fail', 'Incorrect password!');
            }
        } else {
            return redirect('/login')->with('fail', 'An account with that email does not exist!');
        }
    }

    public function logout()
    {
        if (Session::has('user_id'))
        {
            Session::flush();
        }
        return redirect('home');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|min:4|max:12'
        ]);
        $userNew = new User;
        $userNew->first_name = $request->input("first_name");
        $userNew->last_name = $request->input("last_name");
        $userNew->email = $request->input("email");
        $userNew->password = Hash::make($request->input("password"));
        $userNew->role = "user";
        $userNew->save();

        return redirect("/login")->with('success', 'Account successfully created! Login now!');
    }

    public function pageProfile(){
        return view('profile');
    }

    public function showProfile(){
        if (Session::has('user_id'))
        {
            $user = User::query()
            ->select('*')
            ->where('user_id', '=', Session::get('user_id'))
            ->get()
            ->first();

            if (Session::get('role') == 'user')
            {

                return view('profile', compact('user'));

            } else {
                abort(401);
            }

           
        }
    }

    public function viewUser(string $id){
        $user = User::query()
        ->select('*')
        ->where('user_id', '=', $id)
        ->get()
        ->first();

        $orders = Order::query()
        ->select('status', 'order_id', 'time_placed')
        ->where('user_id', '=', $id)
        ->orderBy('time_placed', 'DESC')
        ->paginate(10);

        if (Session::get('role') == 'admin'){
        return view('admin_showuser', compact('user', 'orders'));
        } else {
            abort(401);
        }
    }

    public function contactUs(){
        return view('contact_us');
    }
}
