<?php

namespace App\Http\Controllers\Api;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class BaseController extends Controller
{
  public $requestName;

  public function getUser(Request $request)
  {
    $token = $request->header('Authorization');$decrypted = Crypt::decryptString($token);
    $decrypted = explode('M2Print', $decrypted);
    $result = User::where('User_email', $decrypted[0])
      ->where('User_matricula', $decrypted[1])
      ->first();

    return $result;
  }

  public function getRepository()
  {
    return null;
  }

  public function index(Request $request)
  {
    $model = $this->getRepository()->filter($request);

    if ($request->filled('page')) {
      return $model->paginate($request->get('paginate') ?? 10);
    }
    return $model->get();
  }

  public function show($id)
  {
    return $this->getRepository()->findById($id);
  }

  public function create()
  {
    $request = $this->callRequest();

    try {
      return json_encode($this->getRepository()->create($request));
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
  }

  public function update($id)
  {
    $request = $this->callRequest();

    try {
      return json_encode($this->getRepository()->update($id, $request));
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
  }

  public function delete($id)
  {
    try {
      return json_encode($this->getRepository()->delete($id));
    } catch (\Exception $e) {
      return response($e->getMessage(), 422);
    }
  }

  public function callRequest()
  {
    return App::make('App\\Http\\Requests\\' . $this->requestName);
  }
}
