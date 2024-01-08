<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use Illuminate\Console\Application;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            return redirect("home");
        }
        else
        {
            $doctor = Doctor::all();
            return view("user.home", compact('doctor'));

        }

    }

    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == "user")
            {
                $doctor = Doctor::all();
                return view("user.home", compact("doctor"));
            }
            else
            {
                $user = User::all();
                return view("admin.home", compact("user"));
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function logoutUser(Request $request)
    {
        Auth::guard('web')->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect("/");
    }

    public function show_appointment()
    {
        $doctor = Doctor::all();
        return view("user.appointment", compact("doctor"));
    }

    public function appointment(Request $request)
    {
        if (Auth::user())
        {
            $data = new Appointment();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->date = $request->date;
            $data->doctor_name = $request->selected_doctor;
            $data->phone = $request->phone;
            $data->message = $request->message;
            $data->status = "In progress";
            if (Auth::id())
            {
            $data->user_id = Auth::user()->id;
            }
            $data->save();
            return redirect()->back()->with("success_appointment", "Your appointment request has been submitted, We will contact with you soon!!");
        }
        else
        {

            return redirect("login")->with("appointment", "Before make an appointment, you must be login");
        }
    }

    public function my_appointment()
    {
        if (Auth::id())
        {
            $userid = Auth::user()->id;
            $appointment = Appointment::where("user_id", $userid)->get();

            return view("user.my_appointment", compact('appointment'));

        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back()->with("appointment_cancel_message", "Your appointment has been cancelled successfully");
    }
    public function edit_appointment($id)
    {
        if (Auth::id())
        {
        $doctor = Doctor::all();
        $appointment = Appointment::find($id);
        return view("user.edit_appointment", compact('doctor', 'appointment'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function update_appointment(Request $request, $id)
    {
        $uappoinment = Appointment::find($id);
        $uappoinment->name = $request->name;
        $uappoinment->phone = $request->phone;
        $uappoinment->doctor_name = $request->selected_doctor;
        $uappoinment->date = $request->date;
        $uappoinment->message = $request->message;
        $uappoinment->update();
        return redirect("my_appointment")->with("update_appointment", "Your appointment has been updated");

    }

    public function about()
    {
        $doctor = Doctor::all();
        return view("user.about", compact('doctor'));
    }

    public function doctor_view()
    {
        $doctor = Doctor::all();
        return view("user.doctor_view", compact("doctor"));
    }

    public function news()
    {
        return view("user.news");
    }

    public function contact()
    {
        return view("user.contact");
    }

    public function send_contact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with("contact", "Contact message sent successfully");
    }
    public function news_details()
    {
        return view("user.news_details");
    }


}
