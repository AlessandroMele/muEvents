<?php

namespace App\Model;
use App\Model\Resources\Faq;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FCatalog extends Model {
    public $paged=6;
    protected $_faq;

    public function __construct() {
        $this->_faq = new Faq;
    }
    
    //Ottengo tutte le FAQ nel DB
    public function GetFaqs(){
        return Faq::select()->paginate($this->paged);
    }
    
    //Recupero la FAQ tramite il suo id
    public function GetFaqById($faqId){
        return Faq::where('id', $faqId)->get();
    }
    
    //Inserisco la FAQ nel DB
    public function CreateFaq(Request $request) {   
        Faq::create(['question'=>$request->question,'answer'=>$request->answer]);
    }
    
    //Modifico la FAQ nel DB 
    public function UpdateFaq(Request $request) {
        Faq::where('id', $request->id)->update(['question'=>$request->question,'answer'=>$request->answer]);
    }
    
     //Elimino la FAQ nel DB 
    public function DeleteFaq($faqId) {    
        Faq::where('id', $faqId)->delete();
    }
    
}