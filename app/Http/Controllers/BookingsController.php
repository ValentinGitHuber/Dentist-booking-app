<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookings;
use DB;

class BookingsController extends Controller
{
    public function create(){
        return view('welcome');
    }

    public function store(Request $request){

        // Validation
        $this->validate($request, [
            'procedure' => 'required',
            'doctor' => 'required',
            'availability' => 'required|date|unique:bookings,scheduled',
            'name' => 'required|string|max:50|min:2',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'nullable|string|max:500'
        ]);

        // TODO: (custom rule) check availability by doctors, because 5 doctors can heal 5 pacients at the same time

        //dd($request->all());

        // Storing
        $booking = new Bookings;
        $booking->procedure_id = $request->input('procedure');
        $booking->doctor_id = $request->input('doctor');
        $booking->scheduled = $request->input('availability');
        $booking->name = $request->input('name');
        $booking->phone = $request->input('phone');
        $booking->email = $request->input('email');
        if($request->input('message') === NULL){
            $booking->message = "";
        }else{
            $booking->message = $request->input('message');
        }
        $booking->save();

        return redirect('/')->with('success', 1);

    }

    public function find(){
        $bookings = DB::table('bookings')->orderBy('updated_at', 'DESC')->get();
        return view('dashboard', compact("bookings"));
    }

    public function filter(Request $request){//dd($request->all());
        $filter = $request->input('sortby');
        $keyword = $request->input('keyword');
        $timerange = $request->input('timerange');

        if($filter === "new_req"){
            $bookings = DB::table('bookings')->orderBy('updated_at', 'DESC');
        }else if($filter === "old_req"){
            $bookings = DB::table('bookings')->orderBy('updated_at', 'ASC');
        }else if($filter === "new_sch"){
            $bookings = DB::table('bookings')->orderBy('scheduled', 'DESC');
        }else if($filter === "old_sch") {
            $bookings = DB::table('bookings')->orderBy('scheduled', 'ASC');
        }else{
            return view('/dashboard');
        }

        if ($keyword !== null){
            $bookings->where('name', 'LIKE', "%$keyword%");
        }

        if($timerange !== null){
            $stringParts = explode("to", $timerange);
            $from  = $stringParts[0];
            $to = $stringParts[1];
            $bookings->where('scheduled','>=',$from);
            $bookings->where('scheduled','<=',$to);
        }

        $bookings = $bookings->get();
        return view('/dashboard', compact("bookings"));
    }


}
