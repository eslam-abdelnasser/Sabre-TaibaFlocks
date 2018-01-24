<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Ticket ; 
use App\User ;
use App\Models\TicketDetails;
use App\Mail\NewTicketCreated ;
use App\Notifications\TicketCreated ;
use Mail ;
use Auth ;
class TicketController extends Controller
{
    
    public function index(){

    	$tickets = Ticket::all(); 

    	return view('admin.tickets.index',compact('tickets')); 

    }


    public function create(){
        $users = User::all(); 
        return view('admin.tickets.create' , compact('users')); 
    }

    public function store(Request $request ){


        $rules = [
            'ticket_name' => 'required',
//            'ticket_email' => 'required' ,
            'message' => 'required'
            

        ]; 


        $this->validate($request , $rules); 


        // craete ticket id unique
        $tickets = Ticket::all();
        if(count($tickets) > 0){

//            dd('stop');
            $last_ticket = Ticket::orderBy('created_at', 'desc')->first();
            $last_uid = $last_ticket->uid ;

//            dd($last_uid) ;
            $uid = explode("-", $last_uid);

            $uid = (integer) $uid[1] ;
            $ticket_uid = $uid + 1 ;

            $ticket_uid = implode("-", ['TF',"$ticket_uid"]);
        }else{

            $ticket_uid = 'TF-'. rand(2,999999); ;
        }





        // check if this user member or not to register email
        if(isset($request->user)){
            $user = User::find($request->user) ;

            $email = $user->email ;
        }else{
            $email = $request->ticket_email ;
        }

        //========================================
        $ticket = new Ticket ;
        $ticket->name = $request->ticket_name ; 
        $ticket->email = $request->$email ;
        $ticket->user_id = $request->user ; 
        $ticket->message = $request->message ; 
        $ticket->department = $request->department ;
        $ticket->uid = $ticket_uid ;
        $ticket->status = 0 ;
        $ticket->save();
        isset($user) ? $user->notify(new TicketCreated(Ticket::find($ticket->id))) : false;
        // send email to user for new ticket
        Mail::to(trim($email))->send(new NewTicketCreated());

        ///    add ticket details for admin   nad registered admin id for each ticket
        $ticket_details = new TicketDetails();
        $ticket_details->admin_id = Auth::guard('admin')->user()->id ;
        $ticket_details->ticket_id = $ticket->id ;
        $ticket_details->description = $request->message ;
        $ticket_details->save();

        session()->flash('message' , 'New Ticket has been added successfully');

        return redirect()->route('tickets.index');


    }

    public function show($id){
//    	$ticket = Ticket::find($id);
    	$ticket_details = TicketDetails::where('ticket_id','=',$id)->get();
//    	dd($ticket_details);
    	return view('admin.tickets.show' , compact('ticket_details'),compact('id'));
    }


    public function edit($id){
    	$ticket = Ticket::find($id); 

    	return view('admin.tickets.edit',compact('ticket')); 
    }

    public function update(Request $request , $id){

    		$ticket = Ticket::find($id) ; 

    		$ticket->status = $request->status ; 

    		$ticket->save(); 

    		session()->flash('message' , 'Ticket status has been changed successfully');

    		return redirect()->route('tickets.index'); 

    }


    public function storeTicketDetails(Request $request){

//        dd(decrypt($request->ticket));
        $id = (integer) decrypt($request->ticket) ;
//        dd($id);
        $ticket = new TicketDetails();
        $ticket->admin_id =Auth::guard('admin')->user()->id ;
        $ticket->description =  $request->message ;
        $ticket->ticket_id = $id ;
        $ticket->save();

        return redirect()->back();

    }

}
