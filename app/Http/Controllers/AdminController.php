<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\News;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Notification;
use Illuminate\Support\Facades\File;



class AdminController extends Controller
{
    public function add_doctor_view()
    {

        return view("admin.add_doctor_view");


    }

    public function add_doctor(Request $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->doctor_image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->doctor_image-> move('doctors_image', $image_name);
        $doctor->doctor_image = $image_name;
        $doctor->save();
        return redirect()->back()->with("message", "Doctor details added successfully");
    }




    public function view_appointment()
    {   if(Auth::user())
        {
            if(Auth::user()->usertype == "admin")
            {
                $appointment = Appointment::all();
                return view("admin.view_appointment", compact("appointment"));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function approve_appointment($id)
    {
        if(Auth::user())
        {
            if(Auth::user()->usertype == "admin")
            {
                $data = Appointment::find($id);
                $data->status = "Approved";
                $data->save();
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }
    public function cancel_appointment($id)
    {
        if(Auth::user())
        {
            if(Auth::user()->usertype == "admin")
            {
                $data = Appointment::find($id);
                $data->status = "Cancelled";
                $data->save();
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function all_doctors()
    {
        if(Auth::user())
        {
            if(Auth::user()->usertype == "admin")
            {
                $doctor = Doctor::all();
                return view("admin.all_doctors", compact("doctor"));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }



    public function delete_doctor($id)
    {
        if (Auth::user())
        {
            if (Auth::user()->usertype == "admin")
            {
                $data = Doctor::find($id);
                $destination = "doctors_image/".$data->doctor_image;
                if (File::exists($destination))
                {
                    File::delete($destination);
                }
                $data->delete();
                return redirect()->back()->with("delete", "Doctor details deleted successfully");
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function edit_doctor($id)

    {
        if (Auth::user())
        {
            if (Auth::user()->usertype == "admin")
            {

                $data = Doctor::find($id);
                return view("admin.edit_doctor", compact("data"));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function update_doctor(Request $request, $id)
    {
        if (Auth::id())
        {
            if(Auth::user()->usertype == "admin")
            {
                $data = Doctor::find($id);
                $data->name = $request->name;
                $data->email = $request->email;
                $data->phone = $request->phone;
                $data->speciality = $request->speciality;
                $data->room = $request->room;
                $image = $request->doctor_image;
                if ($request->hasFile("doctor_image"))
                {
                    $destination = "doctors_image/".$data->doctor_image;
                    if (File::exists($destination))
                    {
                        File::delete($destination);
                    }
                    $image_name = time().'.'.$image->getClientOriginalExtension();
                    $request->doctor_image-> move('doctors_image', $image_name);
                    $data->doctor_image = $image_name;
                }
                $data->update();
                return redirect("all_doctors");
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function email_view($id)
    {
        if(Auth::user())
        {
            if(Auth::user()->usertype == "admin")
            {
                $data = Appointment::find($id);
                return view("admin.email_view", compact("data"));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function sendEmailNotification(Request $request, $id)
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype == "admin")
            {
                $data = Appointment::find($id);
                $details = [

                        "greeting"  => $request->greeting,
                        "body"      => $request->body,
                        "actiontext"=> $request->actiontext,
                        "actionurl" => $request->actionurl,
                        "endpart"   => $request->endpart


                ];
                Notification::send($data, new
                sendEmailNotification($details));
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }


    }
    public function view_users()
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype == "admin")
            {
                $data = User::all();
                return view("admin.view_users", compact("data"));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }


    }

    public function edit_user($id)
    {
        if (Auth::id())
        {
            if (Auth::user()->usertype == "admin")
            {
                $data = User::find($id);
                return view("admin.edit_user", compact("data"));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }


    public function delete_user($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == "admin")
            {
                $data = User::find($id);
                $data->delete();
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function update_user(Request $request, $id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == "admin")
            {
                $data = User::find($id);
                $data->name = $request->name;
                $data->email = $request->email;
                $data->phone = $request->phone;
                $data->address = $request->address;
                $data->usertype = $request->usertype;
                $data->save();
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function view_contacts()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == "admin" )
            {
                $data = Contact::all();
                return view("admin.view_contacts", compact("data"));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    public function delete_contact($id)
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == "admin")
            {
                $data = Contact::find($id);
                $data->delete();
                return redirect()->back();
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect("login");
        }

    }

    // Admin logout
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect("/");
    }

    public function add_news_view()
    {
        return view("admin.add_news");
    }

    public function add_news(Request $request)
    {
        $news = new News();
        $news->headline = $request->headline;
        $news->description = $request->description;
        $news->category = $request->category;
        $news->admin_user_id = Auth::user()->id;
        $image = $request->cover_image;
        $image_name = time().'.'.$image->getClientOriginalExtension();
        $request->cover_image-> move('news_cover_image', $image_name);
        $news->cover_image = $image_name;
        $news->save();
        return redirect()->back();
    }


}
