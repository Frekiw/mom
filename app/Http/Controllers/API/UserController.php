<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function login(Request $request)
    {
        try  {
            //Validasi Input
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            // Mengecek credentials (login)
            $credentials = request(['email', 'password']);
            if(!Auth::attempt($credentials)){
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 500);
            }

            //Jika hash tidak sesuai maka beri error 
            $user = User::where('email', $request->email)
            ->first();
            if(!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            // Jika berhasil maka loginkan 
            $tokenResult = $user -> createToken ('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token'=> $tokenResult,
                'token_type'=>'Bearer', 
                'user' => $user
            ], 'Authenticated');


        } catch(Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function fetch(Request $request)
    {
        $user = $request->user();
        
        return ResponseFormatter::success(
            $user,
            'Data Profile User Berhasil Diambil'
        );
    }

    public function logout (Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->all();

        $user = Auth::user();
        $user->update($data);

        return ResponseFormatter::success($user, 'Profile Updated');
    }

    public function updatePhoto (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048'
        ]);

        if($validator->fails())
        {
            return ResponseFormatter::error(
                ['error'=> $validator->errors()],
                'Update Photo Fails', 
                401
            );
        }

        if($request->file('file'))
        {
            $file = $request->file->store('assets/user','public');

            // SImpan foto ke database (urlnya)
            $user = Auth::user();
            $user ->profile_photo_path = $file;
            $user->update();

            return ResponseFormatter::success([$file], 'FIle successfully uploaded');
        }
    }
}
