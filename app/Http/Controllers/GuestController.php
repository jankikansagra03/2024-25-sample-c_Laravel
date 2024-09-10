<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Registration;
use App\Models\PasswordToken;
use Carbon\Carbon;
use Exception;


class GuestController extends Controller
{
    public function delete_token()
    {
        session()->remove('error');
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        PasswordToken::where('expiry_time', '<', $current_time)->delete();
    }
    public function check_token_expiry()
    {
        $result = PasswordToken::where('email', session()->get('forgot_em'))->first();
        if (empty($result)) {
            session()->flash('error', 'OTP Expired');
            return redirect('ForgotPassword');
        }
    }

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

    public function forgot_password(Request $req)
    {
        return view('Forgot_password');
    }
    public function send_otp(Request $req)
    {
        $this->delete_token();

        $em = $req->email;

        $result = Registration::where('email', $em)->first();
        if (empty($result)) {
            session()->flash('error', 'Email id is not registered. please enter registered email address');
            return redirect('ForgotPassword');
        } else {

            $result = PasswordToken::where('email', $req->email)->first();
            if ($result) {
                session()->flash('warning', 'A Password reset link is already sent to your mail please check. New link will be generated after old link expires');
                return redirect('OTPForm');
            } else {
                date_default_timezone_set("Asia/Kolkata");
                $otp = mt_rand(100000, 999999);
                $data = Registration::where('email', $em)->first();
                $data2 = array('name' => $data->name, 'email' => $em, 'otp' => $otp);
                try {
                    Mail::Send('mail_forget_pwd', ["data3" => $data2], function ($message) use ($data2) {
                        $message->to($data2['email'], $data2['name'])->subject('Password Reset');
                        $message->from('kansagrajanki@gmail.com', 'Janki Kansagra');
                    });
                } catch (Exception $ex) {
                    session()->flash('error', 'We encountered some error in sending the password reset token');
                    return redirect('ForgotPassword');
                }
                $expiry_time = Carbon::now()->addMinutes(2);
                $token_ins = new PasswordToken();
                $token_ins->email = $em;
                $token_ins->otp = $otp;
                session()->put('forgot_em', $em);
                //   $token_ins->token = $token;
                $token_ins->expiry_time = $expiry_time;
                if ($token_ins->save()) {
                    session()->flash('success', 'Password reset tokens sent to your registered email address');
                    return redirect('OTPForm');
                } else {
                    session()->flash('error', 'Sorry the email address you entered is not registered.');
                    return redirect('ForgotPassword');
                }
            }
        }
    }
    public function otp_form(Request $r)
    {
        $this->delete_token();
        $this->check_token_expiry();
        return view('otp_form');
    }
    public function verify_otp(Request $req)
    {
        $this->delete_token();
        $this->check_token_expiry();

        $otp = $req->otp;
        $result = PasswordToken::where('email', session()->get('forgot_em'))->first();
        if ($result->otp == $otp) {
            return redirect('SetNewPassword');
        } else {
            session()->flash('error', 'Incorrect OTP');
            return view('otp_form');
        }
    }
    public function new_password()
    {
        $this->delete_token();
        $this->check_token_expiry();

        return view('new_password');
    }
    public function update_new_password(Request $request)
    {
        $updt = Registration::where('email', session()->get('forgot_em'))->update(array('password' => $request->pswd));
        if ($updt) {
            PasswordToken::where('email', session()->get('forgot_em'))->delete();
            session()->remove('forgot_em');
            session()->flash('success', 'Password updated successfully');
            return redirect('login');
        } else {
            session()->flash('error', 'Error in resetting password');
            return redirect('ForgotPassword');
        }
    }
}
