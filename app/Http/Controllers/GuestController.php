<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Registration;


class GuestController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function forgotPassword()
    {
        return view('forgot_password');
    }
    public function about()
    {
        return view('about');
    }
    public function gallery()
    {
        return view('gallery');
    }
    public function contact()
    {
        return view('contact');
    }

    public function register_action(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'unique:registration',
        ], [
            'email.unique' => 'The email has already been taken.',
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }
        $reg = new Registration();

        $reg->name = $request->fn;
        $reg->email = $request->email;
        $reg->password = $request->pswd;
        $reg->address = $request->address;
        $reg->gender = $request->gen;
        $reg->phone = $request->mobile;
        $token = uniqid();
        $reg->token = $token;

        $profile_pic = uniqid() . $request->pic->getClientOriginalName();
        $reg->profile_picture = $profile_pic;

        if ($reg->save()) {
            $request->pic->move("images/profile_pictures/", $profile_pic);

            $data = array('name' => $request->fn, 'email' => $request->email, 'token' => $token);
            Mail::Send('create_account_mail', ["data1" => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);
                $message->from("kansagrajanki@gmail.com", "Janki Kansagra");
            });
            session()->flash('success', 'Registration successfull and a verification link is sent to registered email address');
            return redirect('login');
        } else {
            session()->flash('error', 'Error in Registration');
            return redirect('register');
        }
    }
    public function verify_email($email, $token)
    {
        $result = Registration::where('email', $email)->where('token', $token)->first();
        if (empty($result)) {
            session()->flash('error', 'Your account is not registered. Kindly register here.');
            return redirect('register');
        } else {
            if ($result->status == 'Active') {
                session()->flash('success', 'Your account is already activated kindly login');
            } else {
                $update = Registration::where('email', $email)->update(array('status' => 'Active'));
                if ($update) {
                    session()->flash('success', 'Your account is activated successfully.');
                } else {
                    session()->flash('error', 'Account activation failed please try after sometime.');
                }
            }
            return redirect('login');
        }
    }
    public function login_action(Request $req)
    {
        $reg = new Registration();

        $em = $req->email;
        $pwd = $req->pswd;

        $result = Registration::where('email', $em)->where('password', $pwd)->first();
        if (!empty($result)) {
            if ($result->status == 'Active') {
                if ($result->role == 'User') {
                    session()->flash('success', "Login successful");
                    session()->put('user_uname', $em);
                    return redirect('UserDashboard');
                } else {
                    session()->flash('success', "Login successful");
                    session()->put('admin_uname', $em);
                    return redirect('AdminDashboard');
                }
            } else {
                session()->flash('error', 'Your Account is not activated. Kindly Activate yor account by verifying your email address using the verification link sent to your email account');
                return redirect('login');
            }
        } else {
            session()->flash('error', "Incorrect email address or password");
            return redirect('login');
        }
    }
}
