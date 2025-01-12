<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProposalController extends Controller
{
    // index function 
    public function index()
    {
        return view('proposal.index');
    }
    // create function
    public function create()
    {
        return view('proposal.create');
    }
    // insert function
    public function insert(Request $request)
    {
        try{
            // create proposal
            $proposal_id = DB::table('proposals')->insertGetId(
                ['user_id' => auth()->id(),'title' => $request->detail_form[0]['value']]
            );
            // create form
            $form_id = DB::table('forms')->insertGetId(
                ['proposal_id' => $proposal_id,'form_name' => "Protokol Etik Penelitian Kesehatan Yang Mengikutsertakan Manusia Sebagai Subyek"]
            );
            foreach($request->detail_form as $value){
                $detail_form_id;
                if(isset($value['value'])){
                    // if value is available
                    $detail_form_id = DB::table('detail_forms')->insertGetId(['form_id'=>$form_id,'name'=>$value['name_df'], 'value' => $value['value']]);
                }else $detail_form_id =  DB::table('detail_forms')->insertGetId(['form_id'=>$form_id,'name'=>$value['name_df']]);
                foreach($value['input'] as $i => $input){
                    DB::table('inputs')->insert(['detail_form_id'=>$detail_form_id,'value'=>$input,'name'=>$value['name'][$i], 'type'=>$value['type'][$i]]);
                }
    
            }
        }catch(\Exception $e){
            return $e;
        }
    }
}
