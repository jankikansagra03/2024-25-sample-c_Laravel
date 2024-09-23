<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\Slider;
use Illuminate\Support\Facades\Mail;
use Exception;


class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin_dashboard');
    }
    public function logout()
    {
        session()->remove('admin_uname');
        return redirect('login');
    }

    // Manage FAQ
    public function manage_faqs()
    {
        $faqs = ContactUs::all();
        return view('manage_faqs', compact('faqs'));
    }

    public function edit_faq($id)
    {
        $faq = ContactUs::where('id', $id)->first();
        return view('edit_faq', compact('faq'));
    }

    public function edit_faq_action(Request $request)
    {
        $faq = ContactUs::where('id', $request->id)->update([
            'name' => $request->fn,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->msg,
        ]);

        if ($faq) {
            session()->flash('success', 'FAQ updated successfully');
        } else {
            session()->flash('error', 'Error updating FAQ');
        }

        return redirect('ManageFAQ');
    }
    public function delete_faq($id)
    {

        $faq = ContactUs::where('id', $id)->update(['status' => 'Deleted']);
        if ($faq) {
            session()->flash('success', 'FAQ deleted successfully');
        } else {
            session()->flash('error', 'Error deleting FAQ');
        }

        return redirect('ManageFAQ');
    }
    public function activate_faq($id)
    {
        $faq = ContactUs::where('id', $id)->update(['status' => 'Active']);
        if ($faq) {
            session()->flash('success', 'FAQ activated successfully');
        } else {
            session()->flash('error', 'Error activating FAQ');
        }

        return redirect('ManageFAQ');
    }

    public function view_faq($id)
    {
        $faq = ContactUs::where('id', $id)->first();
        return view('view_faq', compact('faq'));
    }

    public function reply_faq_action($id)
    {
        $faq = ContactUs::where('id', $id)->first();
        if (!$faq) {
            session()->flash('error', 'FAQ not found');
            return redirect('ManageFAQ');
        }
        return view('reply_faq', compact('faq'));
    }

    public function submit_faq_reply(Request $request, $id)
    {
        $faq = ContactUs::where('id', $id)->first();
        if (!$faq) {
            session()->flash('error', 'FAQ not found');
            return redirect('ManageFAQ');
        }

        $faq->reply = $request->reply;
        $faq->save();
        $faq = ContactUs::where('id', $id)->first();
        // Send email

        try {
            Mail::Send('faq_reply_text', ['faq' => $faq], function ($message) use ($faq) {
                $message->to($faq->email, $faq->name)
                    ->subject('Response to Your FAQ');
            });

            session()->flash('success', 'Reply sent and FAQ updated successfully');
        } catch (Exception $e) {

            session()->flash('success', 'FAQ updated successfully, but failed to send email');
        }
        return redirect('ManageFAQ');
    }



    public function view_reply($id)
    {
        $faq = ContactUs::find($id);
        return view('view_reply', compact('faq'));
    }

    public function manage_slider()
    {
        $sliders = Slider::all();
        return view('manage_slider', compact('sliders'));
    }
    public function add_new_faq()
    {
        return view('add_new_faq');
    }
    public function add_faq_action(Request $request)
    {
        $faq = new ContactUs();
        $faq->name = $request->fn;
        $faq->email = $request->email;
        $faq->mobile = $request->mobile;
        $faq->message = $request->msg;
        $faq->save();
        if ($faq) {
            session()->flash('success', 'FAQ added successfully');
        } else {
            session()->flash('error', 'Error adding FAQ');
        }

        return redirect('ManageFAQ');
    }

    public function add_slider()
    {
        return view('add_slider');
    }
    public function add_slider_action(Request $request)
    {
        $slider = new Slider();
        $original_name = $request->image->getClientOriginalName();
        $original_name = uniqid() . $original_name;
        $slider->image = $original_name;

        if ($slider->save()) {
            $request->image->move('images/sliders', $original_name);
            session()->flash('success', 'Slider added successfully');
        } else {
            session()->flash('error', 'Error adding slider');
        }

        return redirect('ManageSlider');
    }
}
