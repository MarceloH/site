<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
Use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller 
{
  protected $rules = array('name' => 'required|min:3|max:200','email' => 'required|email','password' => 'required|min:3|max:10');

/**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getIndex() 
  {
    $users = User::orderBy('id','desc')->paginate(8);
    return view('user.lista',compact('users'));
  }

  public function getAdicionar() 
  {
    
    return view('user.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/users/adicionar')->withErrors($validator)->withInput();
    }
    if ($dadosForm['password'] != $dadosForm['password2']) {
      return Redirect::to('admin/users/adicionar')->withErrors("Senhas não conferem")->withInput();
    }
    unset($dadosForm['password2']);
    $user = new User($dadosForm);
    $encoder = new BcryptHasher;
    $user->password = $encoder->make($user->password);
    try {
      $user->save();
    } catch (\Illuminate\Database\QueryException $e) {

      if (strpos($e->getMessage(),"users_email_unique") === false) {
        return Redirect::to('admin/users/adicionar')->withErrors("Erro ao salvar usuário.")->withInput();
      } else {
        return Redirect::to('admin/users/adicionar')->withErrors("Email já utilizado.")->withInput();
      }
      
    } catch (PDOException $e) {
      return Redirect::to('admin/users/adicionar')->withErrors("Erro ao salvar usuário.")->withInput();
    } 
    return Redirect::to('admin/users');
  }

  public function getEditar($id) 
  {
    //$user = DB::table('users')->where('id_user', $id)->get()[0];
    $user = User::find($id);
    return view('user.cadastrar',compact('user'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/users/editar/{$id}")->withErrors($validator)->withInput();
    }
    $user = User::find($id);
    $user->__construct($dadosForm);
    $user->data = implode("-",array_reverse(explode("/",Request::input('data'))));
   
    $user->save();

    return Redirect::to('admin/users');
  }

  public function getDeletar($id) 
  {
    if ($id == 1)
      return Redirect::to('admin/users')->withErrors("Não é possível excluir este usuário.");
    
    $user = User::find($id);
    $user->delete();
    return Redirect::to('admin/users');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}