<?php

namespace App\Http\Controllers\Admin;

/*use App\LogActivity;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;*/

use App\LogActivity;
use App\User;
use App\MemberInfo;
use App\Area;
use App\Product;
use App\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use File;
use Storage;
use Illuminate\Support\Facades\Hash;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(){
      return view('admin.index');
    }
    public function add_memberinfo(){
      $area = Area::all();
      return view('admin.addForm.add_memberinfo', compact('area'));
    }
    public function save_memberinfo(Request $request)
    {
      // dd($request->toArray());
      $memberinfo = new MemberInfo(); 
      
      $memberinfo->name = $request->input('name');
      $memberinfo->club_name = $request->input('club_name');
      $memberinfo->member_id = $request->input('member_id');
      $memberinfo->gender = $request->input('gender');
      $memberinfo->area = $request->input('area');
      $memberinfo->phone = $request->input('phone');
      $memberinfo->email = $request->input('email');
      $memberinfo->mocha = $request->input('mocha');
      $memberinfo->mocha_rating = $request->input('mocha_rating');
      $memberinfo->natural_vanilla = $request->input('natural_vanilla');
      $memberinfo->vanilla_rating = $request->input('vanilla_rating');
      $memberinfo->mint_chocolate = $request->input('mint_chocolate');
      $memberinfo->mint_rating = $request->input('mint_rating');
      $memberinfo->save();
      return redirect('admin/display_member_info')->with('message', 'for your feedback.');
    }
    public function display_member_info(){
      $memberInfo = MemberInfo::all();
      return view('admin.display_member_info', compact('memberInfo'));
    }
    public function edit_memberinfo($id){
      $memberInfo = MemberInfo::find($id);
      $area = Area::all();
      return view('admin.edit_memberinfo', compact('memberInfo','area'));
    }
    public function update_memberinfo(Request $request,$id){
      $memberinfo = MemberInfo::find($id);

      
      $memberinfo->name = $request->input('name');
      $memberinfo->club_name = $request->input('club_name');
      $memberinfo->member_id = $request->input('member_id');
      $memberinfo->gender = $request->input('gender');
      $memberinfo->area = $request->input('area');
      $memberinfo->phone = $request->input('phone');
      $memberinfo->email = $request->input('email');
      $memberinfo->mocha = $request->input('mocha');
      $memberinfo->mocha_rating = $request->input('mocha_rating');
      $memberinfo->natural_vanilla = $request->input('natural_vanilla');
      $memberinfo->vanilla_rating = $request->input('vanilla_rating');
      $memberinfo->mint_chocolate = $request->input('mint_chocolate');
      $memberinfo->mint_rating = $request->input('mint_rating');
      $memberinfo->save();
      return redirect('admin/display_member_info');
    }
    public function delete_memberinfo($id)
    {
      $memberInfo = MemberInfo::findOrFail($id);
      $memberInfo->delete();
      return redirect('admin/display_member_info');
    }
    public function register_user(){
      return view('auth.register');
    }
    public function save_user(Request $request)
    {
      $this->validate($request, array(
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ));
        $user = new User(); 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('admin/display_user');
    }
    public function display_user(){
      $users = User::all();
      return view('admin.displayTable.displayUser', compact('users'));
    }
    public function delete_user($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return redirect('admin/display_user');
    }
    public function add_area(){
      return view('admin.addForm.addArea');
    }
    public function save_area(Request $request)
    {
      $area = new Area();
      $area->area = $request->input('area');
      $area->save();
      return redirect('admin/displayArea');
    }
    public function displayArea(){
      $area = Area::all();
      return view('admin.displayTable.displayArea', compact('area'));
    }
    public function delete_area($id)
    {
      $area = Area::findOrFail($id);
      $area->delete();
      return redirect('admin/displayArea');
    
    }
    public function show_selected_data(){
      $area = Area::all();
      return view('admin.addForm.add_memberinfo', compact('area'));
    }
  

    public function add_stock(){
      $products = Product::all();
      return view('admin.addForm.add_stock', compact('products'));
    }
    public function save_stock(Request $request)
    {
      $stock = new Stock(); 
      
      $stock->product_id = $request->input('product_id');
      $stock->input_date = $request->input('input_date');
      $stock->status = $request->input('status');
      $stock->amount = $request->input('amount');
      $stock->save();
      return Redirect::route('admin.add_stock')->with('message', 'stock updated successful.');;
    }
    public function display_stock(){
      $stocks = Stock::with('product')->OrderBy('product_id')
                   ->get();
      return view('admin.displayTable.displayStock', compact('stocks'));
    }
    public function edit_stock($id){
      $stock = Stock::find($id);
      $products = Product::all();
      return view('admin.edit_stock', compact('stock','products'));
    }
    public function update_stock(Request $request,$id){
      $stock = Stock::find($id);

      $stock->product_id = $request->input('product_id');
      $stock->input_date = $request->input('input_date');
      $stock->status = $request->input('status');
      $stock->amount = $request->input('amount');
      $stock->save();
      return Redirect::route('edit_stock', ['id' => $id]);
    }
}
