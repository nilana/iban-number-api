<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private UserInterface $userRepository;

    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function saveIban(Request $request) : JsonResponse
    {
        $return = [
            'success' => true,
            'message' => 'IBAN saved successfully',
        ];

        $validator = Validator::make($request->all(), [
            'iban' => 'required',

        ]);

        if ($validator->fails()) {
            $return = [
                'success' => false,
                'message' => $validator->errors(),
            ];
        }
        $iban = $request->input('iban');
        if(isValidIBAN($iban)){
            try{
                $this->userRepository->saveIban($request->input('iban'));
            }catch(\Exception $e){
    
                $return = [
                    'success' => false,
                    'message' => $e->getMessage()
                ];
            }
        }else{
            $return = [
                'success' => false,
                'message' => 'Invalid IBAN'
            ];
        }

        
        
        return response()->json($return);
    }

    public function getIban() : JsonResponse
    {
        $return = [
            'success' => true,
            'message' => 'User Iban Number',
        ];
        try{

            $iban = $this->userRepository->getIban();
            $return['data'] = ['iban' => $iban];
        }catch(\Exception $e){
    
            $return = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($return);
    }

    public function getAllIban() : JsonResponse
    {
        $return = [
            'success' => true,
            'message' => 'All Iban',
        ];
        try{
            //$users = DB::table('users')->whereNotNull('iban')->paginate(2);
            if(Auth::user()->is_admin){
                $users = DB::table('users')->paginate(10);
                $return['data'] = ['users' => $users];
            }else{
                $return = [
                    'success' => false,
                    'message' => 'Unauthorized '
                ];
            }
        }catch(\Exception $e){
    
            $return = [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($return);
    }
}
