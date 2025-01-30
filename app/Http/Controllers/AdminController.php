<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\user;
use Illuminate\Support\Facades\Auth;
use App\models\Room;
use App\models\Booking;
use App\models\Gallary;
use App\models\Contact;
use App\Notification\MyfirstNotification;
use Notification;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                $room = Room::all();
                $gallary = Gallary::all();
                return view('home.index', compact('room','gallary'));
            }

            elseif($usertype == 'admin'){
                return view('admin.index');
            }

            else{
                return redirect()->back();
            }
        }

    }


    public function home(){

        $room = Room::all();
        $gallary = Gallary::all();

        return view('home.index', compact('room','gallary'));
    }

    public function create_room(){
        return view('admin.create_room');
    }

    public function add_room(Request $request){

        $room = new Room();
        $room->room_title = $request->input('title');
        $room->description = $request->input('description');
        $room->price = $request->input('price');
        $room->room_type = $request->input('type');
        $room->wifi = $request->input('wifi');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('room_images', 'public');
            $room->image = $imagePath;
        }

        $room->save();
        return redirect()->back()->with('success', 'Room added successfully!');
    }

    public function view_room(){

        $data = Room::all();
        return view('admin.view_room',compact('data'));
    }

    public function delete_room($id){

        $data = Room::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function update_room($id){

        $data = Room::find($id);
        return view('admin.update_room',compact('data'));
    }

    public function edit_room(Request $request, $id){

        $data = Room::find($id);
            $data->room_title  = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->wiFi = $request->wifi;
            $data->room_type = $request->type;
            $data->image = $request->image;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('room_images', 'public');
                $room->image = $imagePath;
            }
            $data->save();
            return redirect()->back();

    }

    public function bookings(){
        $data=Booking::all();
        return view('admin.booking',compact('data'));
    }

    public function delete_booking($id){
        $data=Booking::find($id);
        $data->delete();
        return redirect()->back();
    }


    public function approve_book($id){
        $booking=Booking::find($id);
        $booking->status='approved';
        $booking->save();
        return redirect()->back();
    }

    public function reject_book($id){
        $booking=Booking::find($id);
        $booking->status='rejected';
        $booking->save();
        return redirect()->back();
    }

    public function view_gallary(){

        $gallary = Gallary::all();
        return view('admin.gallary',compact('gallary'));
    }

    public function upload_gallary(Request $request){

        $data = new Gallary;
        $image = $request->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('room_images', 'public');
            $data->image = $imagePath;
        }

        $data->save();
        return redirect()->back();
    }

    public function delete_gallary($id){

        $data = Gallary::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function all_messages(){

        $data = Contact::all();
        return view('admin.all_messages',compact('data'));
    }

    public function send_mail($id){
        $data = Contact::find($id);
        return view('admin.send_mail',compact('data'));
    }


    public function mail(Request $request,$id){

        $data = Contact::find($id);

        $details = [

            'greeting' =>  $request->greeting ,

            'body' =>  $request->body ,

            'action_text' =>  $request->action_text ,

            'action_url' =>  $request->action_url ,

            'endLine' =>  $request->endLine ,
        ] ;

        Notification::send($data, new MyfirstNotification($details));
        return redirect()->back();
    }

}

