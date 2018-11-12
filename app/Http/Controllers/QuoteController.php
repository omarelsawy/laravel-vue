<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Quote;
use JWTAuth;

class QuoteController extends Controller{

   public function postQuote(Request $request){
      $user = JWTAuth::parseToken()->toUser();
      $quote = new Quote();
      $quote->content = $request->content;
      $quote->save();
      return response()->json(['quote'=>$quote , 'user'=> $user] , 201);
   }

   public function getQuotes(){
      $quotes = Quote::all();
      $response = [
        'quotes'=> $quotes 
      ];
      return response()->json($response , 200);  
   }

   public function putQuote(Request $request , $id){
      $quote = Quote::find($id);
      if (!$quote) {
        return response()->json(['message'=>'not found'] , 404);    	
      }
      $quote->content = $request->content;
      $quote->save();
      return response()->json(['quote'=>$quote] , 200);
   }

   public function deleteQuote($id){
      Quote::find($id)->delete();
      return response()->json(['message'=>'deleted'] , 200);
   }

}







