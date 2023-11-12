<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRegisterRequest;
use App\Mail\AccountVerifyMail;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    //

    public function login(Request $request) {

        $validateUser = Validator::make($request->all(), 
        [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateUser->errors()
            ]);
        }

        $user = User::where('email', $request->email)->first();        

        if(!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email does not match with our record.',
            ]);
        }

        if(!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password does not match with our record.',
            ]);
        }

        $data = [
            "id" => $user->id, 
            "name" => $user->name, 
            "surname" => $user->surname, 
            "email" => $user->email,
        ];

        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            "data" => $data,
            'token' => $user->createToken("API TOKEN OF" . $user->name)->plainTextToken
        ]);
        
    }


    public function register(UserRegisterRequest $request) {

        $data = [...$request->validated(), 'password' => Hash::make($request->password)];
        
        $user = User::create($data);

        if($user) {
            Mail::to("jonzylfiu5@gmail.com")
            ->send(new AccountVerifyMail("jonzzylfiu@gmail.com"));

            return response()->json([
                "message" => "User Created Successfully",
                "status" => true
            ]);
        }
    }


    public function logout() {
        // Auth::user()->currentAccessToken()->delete();
        
        return response()->json([
            "message" => "You have successfully been logged out!"
        ]);
    }

    public function validateEmail(Request $request, $id=1) {

        

    }
}
