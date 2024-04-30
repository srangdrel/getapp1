<?php

namespace App\Livewire;

use Livewire\Component;
use DB;
class EntryPage extends Component
{
    public $txtcrdsrno;
    public $crdsrno='';
    public $enrl;
    public function withcard(){

            //$this->txtcrdsrno;
            $this->crdsrno= $this->txtcrdsrno;
           
            $card=$this->crdsrno;
           
              $checkcardnumber=str_split($card);
              if($checkcardnumber[0]==0){
                 $newcrad="0".dechex($card);
                 $word=str_split($newcrad);
  
              $cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
              }else{
                 $word=str_split(dechex($card));
        
                 $cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
              }
               //dd($cardno);
              $getstudent1=\DB::connection('sqlsrv')->table('tblStudents')->where('IDSerialNum',$cardno)->first();
              $this->enrl=$getstudent1->EnrollmentNumber;
              $this->reset('txtcrdsrno');
    }
    public function render()
    {

              return view('livewire.entry-page');
    }
}
