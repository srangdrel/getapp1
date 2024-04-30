<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\StudentEnteryExitRec;
class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $studentregcount=User::where('role_id','3')->count();
          $scholarshipcount=Scholarship::where('is_active','1')->count();
          $sponsercount=Sponser::count();
          $getscholarships=Scholarship::where('is_active','1')->limit(5)->get();
          $gettestimonies=Testimony::with(["profile"])->where('is_approved','1')->get();
        
        return view ('frontend.frontpage')->with("studentregcount",$studentregcount)->with("scholarshipcount",$scholarshipcount)
                                          ->with("sponsercount",$sponsercount)->with('getscholarships',$getscholarships)
                                          ->with('gettestimonies',$gettestimonies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    
   
    public function goLogin()
    {
        return view ('auth.login');
    }
    
   
  /*  public function studentRegistration()
    {

       /// if (Auth::check())
        //{
              date_default_timezone_set('Asia/thimphu');
               return view ('frontend.studentregister');

        //}
        //echo "lll";
       
        
    }*/
    public function studentEntry()
    {

       /// if (Auth::check())
        //{
              date_default_timezone_set('Asia/thimphu');
               return view ('frontend.studentregister');

        //}
        //echo "lll";
       
        
    } public function studentExit()
    {

       /// if (Auth::check())
        //{
              date_default_timezone_set('Asia/thimphu');
               return view ('frontend.studentregister1');

        //}
        //echo "lll";
       
        
    }



    public function registration(Request $request)
    {
        $request->input('cid');
        /*$word=str_split(dechex($request->input('cid')));
        $cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
        $getstudent=\DB::connection('sqlsrv')->table('tblStudents')->where('IDSerialNum',$cardno)->first();*/
       // echo "lll";
        
       // return response()->json($cardno);
        //return 1;
        $request->validate([
            'cid' => 'required'
           
        ]);
         
      if(strlen($request->input('cid'))==6){
        
            $getstudent=\DB::connection('sqlsrv')->table('vwCurrentStudents')->where('EnrollmentNumber',$request->input('cid'))->first();
            if($getstudent===NULL){
                $getstudent1=\DB::connection('sqlsrv')->table('tblStudents')->where('EnrollmentNumber',$request->input('cid'))->first();
                $getstdstatus=\DB::connection('sqlsrv')->table('vwCurrentEnrollmentStatus')
                                                       ->join('tblStudents','vwCurrentEnrollmentStatus.Student','=','tblStudents.StudentID')
                                                       ->join('tlkpEnrollmentStatuses', 'vwCurrentEnrollmentStatus.CurrentStatus', '=', 'tlkpEnrollmentStatuses.EnrollmentStatusNum')
                                                       ->where('vwCurrentEnrollmentStatus.EnrollmentNumber',$getstudent1->EnrollmentNumber)->first();
                                                       
                                if($getstdstatus->CurrentStatus==12 || $getstdstatus->CurrentStatus==13){

                                $getprogram=\DB::connection('sqlsrv')->table('tlkpPrograms')->where('ProgramNum',$getstdstatus->Program)
                                             
                                      ->first();
                                         /*if(strlen($getstdstatus->Student)<5){
                                            $studentimg="S0".$getstdstatus->Student.".jpg";
                                         }else{
                                            $studentimg="S".$getstdstatus->Student.".jpg";
                                         }*/
                                         $studentimg=$getstudent->EnrollmentNumber.".jpg";

                                        
                                //return response()->json(['stdimgname' => $studentimg, 'card' => 'No','enrl' =>$getstdstatus->EnrollmentNumber,'name'=>$getstdstatus->StudentName,'cohrt'=>$getstdstatus->Cohort,'type'=>$getstudent->$getstdstatus->EnrollmentStatus,'prg'=>$getprogram->Program]);
                            }                                
                            else{
                                return response()->json(['err_msg' => $getstdstatus->EnrollmentStatus]);
                            }         
            }

          $card="no";
      

       
      }else{
        //$word=str_split(dechex($request->input('cid')));
        //$cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
              $card=$request->input('cid');
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
        if($getstudent1===NULL){
            return response()->json(['err_msg' => 'Card is old']);
        }
        $getstudent=\DB::connection('sqlsrv')->table('vwCurrentStudents')->where('EnrollmentNumber',$getstudent1->EnrollmentNumber)->first();
        if($getstudent===NULL){
            //return redirect()->back()->with("msg_error","Not a current Student");
            $getstdstatus=\DB::connection('sqlsrv')->table('vwCurrentEnrollmentStatus')
                                                       ->join('tblStudents','vwCurrentEnrollmentStatus.Student','=','tblStudents.StudentID')
                                                       ->join('tlkpEnrollmentStatuses', 'vwCurrentEnrollmentStatus.CurrentStatus', '=', 'tlkpEnrollmentStatuses.EnrollmentStatusNum')
                                                       ->where('vwCurrentEnrollmentStatus.EnrollmentNumber',$getstudent1->EnrollmentNumber)->first();
                            
                                             
                                     

                                      if($getstdstatus->CurrentStatus==12 || $getstdstatus->CurrentStatus==13){

                                        $getprogram=\DB::connection('sqlsrv')->table('tlkpPrograms')->where('ProgramNum',$getstdstatus->Program) ->first();
                                         /*if(strlen($getstdstatus->Student)<5){
                                            $studentimg="S0".$getstdstatus->Student.".jpg";
                                         }else{
                                            $studentimg="S".$getstdstatus->Student.".jpg";
                                         }*/
                                         $studentimg=$getstudent->EnrollmentNumber.".jpg";
                                         //echo "pl";
                                return response()->json(['stdimgname' => $studentimg, 'card' => 'Yes','enrl' =>$getstdstatus->EnrollmentNumber,'name'=>$getstdstatus->StudentName,'cohrt'=>$getstdstatus->Cohort,'type'=>$getstdstatus->CurrentStatus,'prg'=>$getprogram->Program]);
                            }                                
                            else{
                                //echo $getstdstatus->CurrentStatus;
                                return response()->json(['err_msg' => $getstdstatus->EnrollmentStatus]);
                            }                        
                                                      
        }
         $card="yes";
      } 
       $getprogram=\DB::connection('sqlsrv')->table('tlkpPrograms')->where('ProgramNum',$getstudent->Program)
                                             
      ->first();
      $getStudentPic=\DB::connection('sqlsrv')->table('tblStudents')->where('EnrollmentNumber',$getstudent->EnrollmentNumber)
                                             
      ->first();
         /*if(strlen($getstudent->StudentID)<5){
            $studentimg="S0".$getstudent->StudentID.".jpg";
         }else{
            $studentimg="S".$getstudent->StudentID.".jpg";
         }*/
         if($card=="yes"){
        
        try{
            date_default_timezone_set('Asia/thimphu');
            $student=new StudentEnteryExitRec;
            $student->enrollment_no=$getstudent->EnrollmentNumber;
            $student->name=$getstudent->StudentName;
            if($getstudent->StudentType==1){
               $student->type="border";
            }elseif($getstudent->StudentType==2)
            {
               $student->type="daysholar";
            }
            else{
               $student->type="C.E";
            }
           
            $student->cohort=$getstudent->Cohort;
            $student->program=$getprogram->Program;
            $student->status="Enter";
            $student->is_swap="yes";
            $student->save();
           /// return response()->json(['mess' => "success"]);
          
     

      }catch(\Illuminate\Database\QueryException $ex){
        // return response()->json(['err' => "Falied"]);
       dd($ex);          
      }
     }else{


      try{
         date_default_timezone_set('Asia/thimphu');
         $student=new StudentEnteryExitRec;
         $student->enrollment_no=$getstudent->EnrollmentNumber;
         $student->name=$getstudent->StudentName;
         if($getstudent->StudentType==1){
            $student->type="border";
         }elseif($getstudent->StudentType==2)
         {
            $student->type="daysholar";
         }
         else{
            $student->type="C.E";
         }
        
         $student->cohort=$getstudent->Cohort;
         $student->program=$getprogram->Program;
         if($request->input('exit')===1){
            $student->status="exit";
         }else{
            $student->status="Enter";

         }
        
         $student->is_swap="no";
         $student->save();
        /// return response()->json(['mess' => "success"]);
       
  

   }catch(\Illuminate\Database\QueryException $ex){
     // return response()->json(['err' => "Falied"]);
    dd($ex);          
   }

     }
     $studentimg=$getStudentPic->PhotoFile;
        return response()->json(['stdimgname' => $studentimg, 'card' => $card,'enrl' =>$getstudent->EnrollmentNumber,'name'=>$getstudent->StudentName,'cohrt'=>$getstudent->Cohort,'type'=>$getstudent->StudentType,'prg'=>$getprogram->Program]);
       
      
        

        
        
    }
    public function registration1(Request $request)
    {
        $request->input('cid');
        /*$word=str_split(dechex($request->input('cid')));
        $cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
        $getstudent=\DB::connection('sqlsrv')->table('tblStudents')->where('IDSerialNum',$cardno)->first();*/
       // echo "lll";
        
       // return response()->json($cardno);
        //return 1;
        $request->validate([
            'cid' => 'required'
           
        ]);
         
      if(strlen($request->input('cid'))==6){
        
            $getstudent=\DB::connection('sqlsrv')->table('vwCurrentStudents')->where('EnrollmentNumber',$request->input('cid'))->first();
            if($getstudent===NULL){
                $getstudent1=\DB::connection('sqlsrv')->table('tblStudents')->where('EnrollmentNumber',$request->input('cid'))->first();
                $getstdstatus=\DB::connection('sqlsrv')->table('vwCurrentEnrollmentStatus')
                                                       ->join('tblStudents','vwCurrentEnrollmentStatus.Student','=','tblStudents.StudentID')
                                                       ->join('tlkpEnrollmentStatuses', 'vwCurrentEnrollmentStatus.CurrentStatus', '=', 'tlkpEnrollmentStatuses.EnrollmentStatusNum')
                                                       ->where('vwCurrentEnrollmentStatus.EnrollmentNumber',$getstudent1->EnrollmentNumber)->first();
                                                       
                                if($getstdstatus->CurrentStatus==12 || $getstdstatus->CurrentStatus==13){

                                $getprogram=\DB::connection('sqlsrv')->table('tlkpPrograms')->where('ProgramNum',$getstdstatus->Program)
                                             
                                      ->first();
                                         /*if(strlen($getstdstatus->Student)<5){
                                            $studentimg="S0".$getstdstatus->Student.".jpg";
                                         }else{
                                            $studentimg="S".$getstdstatus->Student.".jpg";
                                         }*/
                                         $studentimg=$getstudent->EnrollmentNumber.".jpg";

                                        
                                //return response()->json(['stdimgname' => $studentimg, 'card' => 'No','enrl' =>$getstdstatus->EnrollmentNumber,'name'=>$getstdstatus->StudentName,'cohrt'=>$getstdstatus->Cohort,'type'=>$getstudent->$getstdstatus->EnrollmentStatus,'prg'=>$getprogram->Program]);
                            }                                
                            else{
                                return response()->json(['err_msg' => $getstdstatus->EnrollmentStatus]);
                            }         
            }

          $card="no";
      

       
      }else{
        //$word=str_split(dechex($request->input('cid')));
        //$cardno=strtoupper($word[6].$word[7].$word[4].$word[5].$word[2].$word[3].$word[0].$word[1]);
              $card=$request->input('cid');
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
        if($getstudent1===NULL){
            return response()->json(['err_msg' => 'Card is old']);
        }
        $getstudent=\DB::connection('sqlsrv')->table('vwCurrentStudents')->where('EnrollmentNumber',$getstudent1->EnrollmentNumber)->first();
        if($getstudent===NULL){
            //return redirect()->back()->with("msg_error","Not a current Student");
            $getstdstatus=\DB::connection('sqlsrv')->table('vwCurrentEnrollmentStatus')
                                                       ->join('tblStudents','vwCurrentEnrollmentStatus.Student','=','tblStudents.StudentID')
                                                       ->join('tlkpEnrollmentStatuses', 'vwCurrentEnrollmentStatus.CurrentStatus', '=', 'tlkpEnrollmentStatuses.EnrollmentStatusNum')
                                                       ->where('vwCurrentEnrollmentStatus.EnrollmentNumber',$getstudent1->EnrollmentNumber)->first();
                            
                                             
                                     

                                      if($getstdstatus->CurrentStatus==12 || $getstdstatus->CurrentStatus==13){

                                        $getprogram=\DB::connection('sqlsrv')->table('tlkpPrograms')->where('ProgramNum',$getstdstatus->Program) ->first();
                                         /*if(strlen($getstdstatus->Student)<5){
                                            $studentimg="S0".$getstdstatus->Student.".jpg";
                                         }else{
                                            $studentimg="S".$getstdstatus->Student.".jpg";
                                         }*/
                                         $studentimg=$getstudent->EnrollmentNumber.".jpg";
                                         //echo "pl";
                                return response()->json(['stdimgname' => $studentimg, 'card' => 'Yes','enrl' =>$getstdstatus->EnrollmentNumber,'name'=>$getstdstatus->StudentName,'cohrt'=>$getstdstatus->Cohort,'type'=>$getstdstatus->CurrentStatus,'prg'=>$getprogram->Program]);
                            }                                
                            else{
                                //echo $getstdstatus->CurrentStatus;
                                return response()->json(['err_msg' => $getstdstatus->EnrollmentStatus]);
                            }                        
                                                      
        }
         $card="yes";
      } 
       $getprogram=\DB::connection('sqlsrv')->table('tlkpPrograms')->where('ProgramNum',$getstudent->Program)
                                             
      ->first();
      $getStudentPic=\DB::connection('sqlsrv')->table('tblStudents')->where('EnrollmentNumber',$getstudent->EnrollmentNumber)
                                             
      ->first();
         /*if(strlen($getstudent->StudentID)<5){
            $studentimg="S0".$getstudent->StudentID.".jpg";
         }else{
            $studentimg="S".$getstudent->StudentID.".jpg";
         }*/
         if($card=="yes"){
        
        try{
            date_default_timezone_set('Asia/thimphu');
            $student=new StudentEnteryExitRec;
            $student->enrollment_no=$getstudent->EnrollmentNumber;
            $student->name=$getstudent->StudentName;
            if($getstudent->StudentType==1){
               $student->type="border";
            }elseif($getstudent->StudentType==2)
            {
               $student->type="daysholar";
            }
            else{
               $student->type="C.E";
            }
           
            $student->cohort=$getstudent->Cohort;
            $student->program=$getprogram->Program;
            $student->status="Exit";
            $student->is_swap="yes";
            $student->save();
           /// return response()->json(['mess' => "success"]);
          
     

      }catch(\Illuminate\Database\QueryException $ex){
        // return response()->json(['err' => "Falied"]);
       dd($ex);          
      }
     }else{


      try{
         date_default_timezone_set('Asia/thimphu');
         $student=new StudentEnteryExitRec;
         $student->enrollment_no=$getstudent->EnrollmentNumber;
         $student->name=$getstudent->StudentName;
         if($getstudent->StudentType==1){
            $student->type="border";
         }elseif($getstudent->StudentType==2)
         {
            $student->type="daysholar";
         }
         else{
            $student->type="C.E";
         }
        
         $student->cohort=$getstudent->Cohort;
         $student->program=$getprogram->Program;
         
            $student->status="Exit";

       
        
         $student->is_swap="no";
         $student->save();
        /// return response()->json(['mess' => "success"]);
       
  

   }catch(\Illuminate\Database\QueryException $ex){
     // return response()->json(['err' => "Falied"]);
    dd($ex);          
   }

     }
     $studentimg=$getStudentPic->PhotoFile;
        return response()->json(['stdimgname' => $studentimg, 'card' => $card,'enrl' =>$getstudent->EnrollmentNumber,'name'=>$getstudent->StudentName,'cohrt'=>$getstudent->Cohort,'type'=>$getstudent->StudentType,'prg'=>$getprogram->Program]);
       
      
        

        
        
    }

    
    
    
    public function studentdetailspost(Request $request){
      ///public function studentdetailspost(){    
        //return response()->json(['stdimgname' => "kkkkhg"]);
     /*   if (Auth::user()->isLibrary()){
           // dd ("1");
           try{
            date_default_timezone_set('Asia/thimphu');
            $student=new Library;
            $student->enrollment_no=$request->input('en');
            $student->name=$request->input('na');
            $student->type=$request->input('t');
            $student->cohort=$request->input('co');
            $student->program=$request->input('prg');
            $student->status=$request->input('st');;
            $student->is_swap=$request->input('cr');
            $student->save();
            return response()->json(['mess' => "success"]);;

     

               }catch(\Illuminate\Database\QueryException $ex){
                  return response()->json(['err' => "Falied"]);;
         
               }
           // exit();
        }
        else{*/
            try{
                date_default_timezone_set('Asia/thimphu');
                $student=new StudentEnteryExitRec;
                $student->enrollment_no=$request->input('en');
                $student->name=$request->input('na');
                $student->type=$request->input('t');
                $student->cohort=$request->input('co');
                $student->program=$request->input('prg');
                $student->status=$request->input('st');
                $student->is_swap=$request->input('cr');
                $student->save();
                return response()->json(['mess' => "success"]);
               
         

          }catch(\Illuminate\Database\QueryException $ex){
             return response()->json(['err' => "Falied"]);
           // dd($ex);          
          }

        //}
       
          
          
         
      
        

        
    }
    public function reports()
    {
       /* if (Auth::user()->isLibrary()){
            $getreprots=Library::whereYear('created_at',date('Y'))
            
            ->get();

        }else{*/
            //  echo date('d');
               //exit();
           return view("frontend.getDateForReprts");
                                      
        //}

       
      
    }
    

 public function reports1()
    {
        
            //  echo date('d');
               //exit();
              

               $getstdstatus=\DB::connection('sqlsrv')->table('vwCurrentEnrollmentStatus')
                                                       ->join('tblStudents','vwCurrentEnrollmentStatus.Student','=','tblStudents.StudentID')
                                                       ->join('tlkpEnrollmentStatuses', 'vwCurrentEnrollmentStatus.CurrentStatus', '=', 'tlkpEnrollmentStatuses.EnrollmentStatusNum')
                                                       ->where('vwCurrentEnrollmentStatus.EnrollmentNumber','124778')->first();
                            
                          echo $getstdstatus->EnrollmentNumber;
       //return view("frontend.reports")->with("getreprots",$getreprots);
    }
   /* public function bulkmail(){
        $getstds=DB::connection('sqlsrv')->table('vwBulkmailstd')->where('Department','BA Dev Econ')->where('Cohort','2021')->where('CurrentStatus','1')->get();
        return view("frontend.report1")->with("getstds",$getstds);
    }*/
     public function getStudentEntryRpt(Request $req)
   {
             
             
             $getreprots=StudentEnteryExitRec::whereYear('created_at',date('Y',strtotime($req->input('Edate'))))
                                            ->whereMonth('created_at',date('m',strtotime($req->input('Edate'))))
                                            ->whereDay('created_at',date('d',strtotime($req->input('Edate'))))
                                              ->get();
                                      
        

       
                 return view("frontend.reports")->with("getreprots",$getreprots);
             

   }
}
