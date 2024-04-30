<?php

namespace App\Livewire;

use Livewire\Component;
use DB;

class Counter extends Component
{

  // public $count = 1;
    public $test='';
    public $pl='';
    public $l;
     
   /* public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
       
    }*/
    public function myFunction()
    {
        
       if($this->test==='1616907585')
        {
            $this->test;
            $this->l=$this->test;
            $this->reset('test');
            $card=$this->l;
              $checkcardnumber=str_split($card);
              if($checkcardnumber[0]==0){
                 $newcrad="0".dechex($card);
                 $word=str_split($newcrad);
  
              $cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
              }else{
                 $word=str_split(dechex($card));
        
                 $cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
              }

              $getstudent1=\DB::connection('sqlsrv')->table('tblStudents')->where('IDSerialNum',$cardno)->first();
            $this->pl=$getstudent1->EnrollmentNumber;
           
           
       }else
              
        {
            $this->reset(['test','pl','l']);
       }
        // Perform your desired Livewire actions here
    }

    public function updatedBillingRate(){

        dd($this->billingRate);     // don't forget to use $this to access class property
 
         // persist to database here
     }
    public function render()
    {
        // $test;
        return view('livewire.counter');
    }
}
