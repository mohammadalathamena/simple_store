<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\erem ;
use App\medicine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
// use App\Rules\Uppercase;   
use Illuminate\Validation\Rule;


// regex:/(^\+[0-9]{2}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)/

class eremController extends Controller
{
   public $message = [

      'password.required'=>'write your password',
      'password.regex'=>'your password is weak',
      'email.required'=>'write your email',
      'email.unique'=>'this email has been taken',
      'phone.numeric'=>'this is not a phone number',
      'pic.image'=>'this is not an image',
      'images.image'=>'this is not an image',
      'pic.image'=>'this is not an image',

      // 'expiry_date'=>'this is rong date'
   ];
   public $rules =[
      'username' => 'required|unique:users,username',
      'password' => 'required|regex:/^(?=.*[0-9])(?=.*[a-z]).+$/',
      // 'email'=> 'sometimes|required|unique:users,email,id,'$this->post,
      'email'=> 'required|',

      'phone'=>'required',
      'pic'=>'image',
      
   ];
   public $edit_rules = [
      'username' => 'unique:users,username',
      'email'=> 'unique:users,email',
      'phone'=>'required',
      'pic'=>'image',
   ];
   public $medicine_rules = [
      'name'=>'required|unique:medicine,name',
      'production_date'=>'required',
      'expiry_date'=>'required|date|after:production_date',
      'images'=>'image',
   ];
   public function __construct()
   {
   }
   public function add_medicine(Request $request)
   {

      $validator = Validator::make($request->all(),$this->medicine_rules,$this->message);
      if ($validator->fails()) {
           $request->session()->flash('mid_erorr','erorr');
           return redirect()->back()->withErrors($validator);
      }else{
         if ($request->file('images')!== null) {
            $file = explode('/',$request->file('images')->store('public/medicine_images'));
            unset($file[0]);
            $newRecord = new medicine;
            $newRecord->name = $request->name;
            $newRecord->production_date = $request->production_date;
            $newRecord->expiry_date = $request->expiry_date;
            $newRecord->pic ="storage/medicine_images/".$file[2];
            $newRecord->type = $request->type;
            $newRecord->save();
            return redirect()->back();
         }else{
            $newRecord = new medicine;
            $newRecord->name = $request->name;
            $newRecord->production_date = $request->production_date;
            $newRecord->expiry_date = $request->expiry_date;
            $newRecord->type = $request->type;
            $newRecord->save();
            return redirect()->back();
         }
      }
   }
   public function add_employee(Request $request)
   {
        $validator = Validator::make($request->all(),$this->rules,$this->message);
       if ($validator->fails()) {
            $request->session()->flash('erorr','erorr');
            return redirect()->back()->withErrors($validator);
       }else{
          if ($request->file('pic') !== null) {
             $file = explode('/',$request->file('pic')->store('public/images'));
             unset($file[0]);
             $newRecord = new erem;
             $newRecord->username = $request->username;
             $newRecord->password =Hash::make($request->password);
             $newRecord->email = $request->email;
             $newRecord->address = $request->address;
             $newRecord->phone = $request->phone;
             $newRecord->pic = "storage/images/".$file[2];
             $newRecord->save();
            if (Session::get('login')=='loged') {
                return redirect()->back();
            }else{
               return redirect('/');
            }
             
          }else {
            $newRecord = new erem;
            $newRecord->username = $request->username;
            $newRecord->password =Hash::make($request->password);
            $newRecord->email = $request->email;
            $newRecord->address = $request->address;
            $newRecord->phone = $request->phone;
            $newRecord->save();
            if (Session::get('login')=='loged') {
               return redirect()->back();
           }else{
              return redirect('/');
           }
          }
         }
   }
  
   public function edit_employee(Request $request)
   {
      $this->edit_rules['email'] =Rule::unique('users','email')->ignore($request->id_emp).'';
      $this->edit_rules['username'] =Rule::unique('users','username')->ignore($request->id_emp).'';
      $validator = Validator::make($request->all(),$this->edit_rules,$this->message);

      if ($validator->fails()) {
         
         $request->session()->flash('erorr','erorr');
         return redirect()->back()->withErrors($validator);
      }else{
         if ($request->file('pic') !== null) {
            $file = explode('/',$request->file('pic')->store('public/images'));
            unset($file[0]);
            // dd($request->file('pic'));
            
            $newRecord = erem::find($request->id_emp);
            $newRecord->username = $request->username;
            $newRecord->email = $request->email;
            $newRecord->address = $request->address;
            $newRecord->phone = $request->phone;
            $newRecord->pic = "storage/images/".$file[2];
            $newRecord->update();
            return redirect()->back();
         }else{
            // dd($request->username);
            // dd($request);
            $newRecord = erem::find($request->id_emp);
            $newRecord->username = $request->username;
            $newRecord->email = $request->email;
            $newRecord->address = $request->address;
            $newRecord->phone = $request->phone;
            $newRecord->update();
            return redirect()->back();
         }
      }
   }
   public function save(Request $request)
   {
      $this->medicine_rules['name'] =Rule::unique('medicine','name')->ignore($request->id);
      $validator = Validator::make($request->all(),$this->medicine_rules,$this->message);
      if ($validator->fails()) {
         
         $request->session()->flash('mid_erorr','erorr');
         return redirect()->back()->withErrors($validator);
      }else{
         // dd('erorr');
         if ($request->file('images')!== null) {
            $file = explode('/',$request->file('images')->store('public/medicine_images'));
            unset($file[0]);
            $newRecord =medicine::find($request->id);
            $newRecord->name = $request->name;
            $newRecord->production_date = $request->production_date;
            $newRecord->expiry_date = $request->expiry_date;
            $newRecord->pic ="storage/medicine_images/".$file[2];
            $newRecord->type = $request->type;
            $newRecord->update();
            return redirect()->back();
         }else{
            
            $newRecord =medicine::find($request->id);
            $newRecord->name = $request->name;
            $newRecord->production_date = $request->production_date;
            $newRecord->expiry_date = $request->expiry_date;
            $newRecord->type = $request->type;
            $newRecord->update();
            return redirect()->back();
         }
      }
   }
    public function getdata()
   {
      $user = erem::all();
      $medicine = medicine::all();
      return view('home_admin',['user'=>$user , 'medicine'=>$medicine]);
   }
   public function get_superuser_data()
   {
      $medicine = medicine::all();
      return view('home_super_user',['medicine'=>$medicine]);
   }
   public function get_user_data()
   {
      $medicine = medicine::all();
      return view('store',['medicine'=>$medicine]);
   }
   public function get_product($id)
   {
      
      $medicine = medicine::find($id);
      return view('single_product',['medicine'=>$medicine]);
   }
   public function delet_select(Request $request)
   {
      // dd($request->selectedItem);
      $newRecord = medicine::whereIn('id', explode(',',$request->selectedItem))-> delete();
      return redirect()->back();
   }
   public function delet_select_emp(Request $request)
   {
      dd($request->selectedItem_emp);
      $newRecord = erem::whereIn('id', explode(',',$request->selectedItem_emp))-> delete();
      return redirect()->back();
   }
    public function login(Request $request)
   {
      $loged = "loged";
      $data = erem::where('username',$request->username)->first();
      $test=request()->only('username','password');
      if (Auth::attempt($test)) {
         if ($data->permission == 'ceo') {
            Session::put('login', "loged");
            Session::put('permission', Hash::make('ceo'));

            return redirect('indexCEO');
         }if ($data->permission == 'super_user') {
            Session::put('login', "loged");
            Session::put('permission', Hash::make('super_user'));

            return redirect('indexSuper');
         } else {
            Session::put('login', "loged");
            Session::put('permission', 'user');

            return redirect('indexUser');
         }
         
      }else{
         return redirect('login');
      }
      
   }
}
