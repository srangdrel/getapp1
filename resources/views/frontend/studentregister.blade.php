@extends('frontend.index')
@section('title','Student Registration')
@section('frontcontent')
<div class="content-wrapper">
    <div class="content-header text-center">
   
    </div>
    <div class="content">
      
        <div class="container">
        
            <div class="row">
                <div class="col-md-5">
                    
                    
                </div> 
            </div>  
            <div class="row">
                <div class="col-md-8">
                @include('partials.admin-message')
                    <div class="card card-info card-outline d-none d-md-block">
                        <div class="card-body">
                          
                            @csrf
                        
                                <div class="form-group row">
                                   
                                        <div class="col-sm-10">
                                       
                                            <input type="password" class="form-control" name="cid" id="inputEmail3" placeholder="*******" required autofocus onchange="withcard()">
                                        </div>
                                </div>

                                

                               

                               
                                
                                
                            
                           
                          
                        </div>
                    </div>
                    <div class="row">
                <div class="col-md-5">
                    <h4>Enrollment Number</h4>
                    
                </div> 
            </div>
                    <div class="card card-info card-outline">
                        <div class="card-body">
                            
                                <div class="form-group row">
                                   
                                        <div class="col-sm-10">
                                           
                                            <input type="text" class="form-control" name="cid" id="inputEmail4" placeholder="Enrollment Number" autofocus required>
                                        </div>
                                        <div class="col-sm-2">
                                        <input type="button" class="btn btn-primary" value="  submit  " onclick="withoutCard()">
                                        </div>
                                </div>

                                

                               

                               
                                <div class="text-right">
                               
                                </div>
                                
                            
                          
                        </div>
                    </div>
                </div> 
                
    
                
                <div class="col-md-12">
                   <div class="row">
                      <div class="col-md-3">
                      <div class="card card-outline card-danger">
                           <div class="card-body table-responsive">
                             <img id="Img" src="{{asset('images/img.png')}}" alt="profile image" class="img-responsive" width="150" height="auto">
                           </div>
                           
       
                         </div>
                       </div>
                       <div class="col-md-5">

                        <div class="card card-outline card-primary">
                          <div class="card-header">Personal Information</div>
                            <div class="card-body table-responsive">
                            
                        
                              <table class="table table-sm  table-striped">
                                <tr>
                                  <input type="hidden" name="crd" value="">
                                   <td><strong>Enrollment Number</strong></td><td><div id="enrl"></div><input type="hidden" name="id" value=""></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Full Name</strong></td><td><div id="name"></div><input type="hidden" name="n" value=""></td>
                                 </tr>
                                  <tr>
                                    <td><strong>Type</strong></td><td><div id="type"></div><div id="card" style="display:none;"></div></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Program</strong></td><td><div id="prg"></div><input type="hidden" name="p" value=""></td>
                                  </tr>
                                  <tr>
                                    <td><strong>Cohort</strong></td><td><div id="cohrt"></div><input type="hidden" name="c" value=""></td>
                                  </tr>
                
                                  <div >
                                  
								   <tr class="d-none d-md-block">
                
                 
                       
                                   <td colspan="2"><div class="d-flex justify-content">
                                     <input type="reset" class="btn btn-primary btn-lg btn-block " value="  Cancel  " onclick="ClearFields()">
                                    </div></td>
                 
                                  </tr>
                                </div>
                               
                
                                </table>
                              
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <h4><p id="mes"></p></h4>
                </div>


                
           


<script>


function withcard() {
  var x = document.getElementById("inputEmail3").value;
  //x.value = x.value.toUpperCase();
 // console.log('jjkkk');
  $.ajax({
       url: "{{route('registration.post')}}",
       type: 'POST',
       dataType: 'JSON',
       data: {
           "cid": x,
           _token: '{{csrf_token()}}'
           
       },
       success: function(response){
        if(response){
                    var img=response.stdimgname;
                    document.getElementById("mes").innerHTML=""; 
                    //console.log(response.type);
                    if(response.err_msg){
                       // console.log("pl");
                       document.getElementById("type").innerHTML=response.err_msg;
                       $("#type").css("backgroundColor", "#FF0000");
                       document.getElementById("enrl").innerHTML="";
                      document.getElementById("name").innerHTML="";
                      document.getElementById("cohrt").innerHTML="";
                      document.getElementById("prg").innerHTML="";
                      document.getElementById("card").innerHTML="";
                       document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/"+img;
                       //document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/108574.jpg";
                       $( document ).ready(function() {
                               $( "#inputEmail3" ).focus();
                           });
                           $('#inputEmail3').val("");

                           var audio = new Audio('http://172.16.0.23/Gate/public/sorry.mp3');
                           audio.play(); 
                    }

                    else if(response.type==12||response.type==13){
                      document.getElementById("enrl").innerHTML=response.enrl;
                      document.getElementById("name").innerHTML=response.name;
                      document.getElementById("cohrt").innerHTML=response.cohrt;
                      document.getElementById("type").innerHTML="Pending";
                      document.getElementById("prg").innerHTML=response.prg;
                       document.getElementById("card").innerHTML=response.card;
                       document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/"+img;
                       //document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/108574.jpg";
                       $("#type").css("backgroundColor", "#FF0000");
                       $('#inputEmail3').val("");
                    }
                    
                    else{
                      document.getElementById("enrl").innerHTML=response.enrl;
                      document.getElementById("name").innerHTML=response.name;
                      document.getElementById("cohrt").innerHTML=response.cohrt;
                         if(response.type==1){
                                document.getElementById("type").innerHTML="Border";
                                $("#type").css("backgroundColor", "#FFFFFF");
                           } else if(response.type==2){
                                document.getElementById("type").innerHTML="Day Scholar";
                                $("#type").css("backgroundColor", "#FFFF00");
                           }else{
                                document.getElementById("type").innerHTML="C.E";
                                $("#type").css("backgroundColor", "#00CC00");
                           }

                      
                    
                    document.getElementById("prg").innerHTML=response.prg;
                    document.getElementById("card").innerHTML=response.card;
                    document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/"+img;
                   // document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/108574.jpg";
                    $('#inputEmail3').val("");
                   
                  

                    var audio = new Audio('http://172.16.0.23/Gate/public/welcome.mp3');
                   audio.play(); 
                  }

                    
                    
                    
                    
           
                    
                    
        }
           
       } ,
       error: function(error){
        console.log(error);
        }
    });
}
function withoutCard() {
  var x = document.getElementById("inputEmail4").value;
  //x.value = x.value.toUpperCase();
 // console.log('jjkkk');
 //alert("ll");
  $.ajax({
       url: "{{route('registration.post')}}",
       type: 'POST',
       dataType: 'JSON',
       data: {
           "cid": x,
           _token: '{{csrf_token()}}'
           
       },
       success: function(response){
        if(response){
                    var img=response.stdimgname;
                    document.getElementById("mes").innerHTML=""; 

                    if(response.err_msg){
                       // console.log("pl");
                       document.getElementById("type").innerHTML=response.err_msg;
                       $("#type").css("backgroundColor", "#FF0000");
                       document.getElementById("enrl").innerHTML="";
                      document.getElementById("name").innerHTML="";
                      document.getElementById("cohrt").innerHTML="";
                      document.getElementById("prg").innerHTML="";
                      document.getElementById("card").innerHTML="";
                      // document.getElementById("Img").src = "https://results.rtc.bt/images/StudGal/"+img;
                      document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/"+img;
                       
                       $( document ).ready(function() {
                               $( "#inputEmail3" ).focus();
                           });
                    }else{
                      document.getElementById("enrl").innerHTML=response.enrl;
                      document.getElementById("name").innerHTML=response.name;
                      document.getElementById("cohrt").innerHTML=response.cohrt;
                         if(response.type==1){
                                document.getElementById("type").innerHTML="Border";
                                $("#type").css("backgroundColor", "#FFFFFF");
                           } else if(response.type==2){
                                document.getElementById("type").innerHTML="Day Scholar";
                                $("#type").css("backgroundColor", "#FFFF00");
                           }else{
                                document.getElementById("type").innerHTML="C.E";
                                $("#type").css("backgroundColor", "#00CC00");
                           }

                      
                    
                    document.getElementById("prg").innerHTML=response.prg;
                    document.getElementById("card").innerHTML=response.card;
                   // document.getElementById("Img").src = "https://results.rtc.bt/images/StudGal/"+img;
                   document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/"+img;
                    $('#inputEmail3').val("");
                    $( document ).ready(function() {
                               $( "#inputEmail3" ).focus();
                           });
                   
                    }
                    
                    
           
                    
                    
        }
           
       } ,
       error: function(error){
        console.log(error);
        }
    });
}
function studentEntry() {
    var en = document.getElementById("enrl").innerHTML;
    var na = document.getElementById("name").innerHTML;
    var t = document.getElementById("type").innerHTML;
    var prg = document.getElementById("prg").innerHTML;
    var cr = document.getElementById("card").innerHTML;
    var co = document.getElementById("cohrt").innerHTML;
  //x.value = x.value.toUpperCase();
  //alert(cr);
    
  $.ajax({
       url: "{{route('studentdetials.post')}}",
       type: 'POST',
       dataType: 'JSON',
       data: {
           "en": en,
           "na": na,
           "t": t,
           "prg": prg,
           "cr": cr,
           "co": co,
           "st": 'Enter',
           _token: '{{csrf_token()}}'
           
       },
       success: function(response){
  
                        
                          document.getElementById("mes").innerHTML=response.mess;  
                          $("#mes").css("backgroundColor", "#00CC00");      
                           $( document ).ready(function() {
                               $( "#inputEmail3" ).focus();
                           });
                         
  
       },
       error: function(error){
        //alert(error);
        }
  });   
  
}
function Exit() {
    var en = document.getElementById("enrl").innerHTML;
    var na = document.getElementById("name").innerHTML;
    var t = document.getElementById("type").innerHTML;
    var prg = document.getElementById("prg").innerHTML;
    var cr = document.getElementById("card").innerHTML;
    var co = document.getElementById("cohrt").innerHTML;
  //x.value = x.value.toUpperCase();
  //alert(cr);
  //alerT("111");
    
  $.ajax({
       url: "{{route('studentdetials.post')}}",
       type: 'POST',
       dataType: 'JSON',
       data: {
           "en": en,
           "na": na,
           "t": t,
           "prg": prg,
           "cr": cr,
           "co": co,
           "st": 'Exit',
           _token: '{{csrf_token()}}'
           
       },
       success: function(response){
  
                        
                          document.getElementById("mes").innerHTML=response.mess;  
                          $("#mes").css("backgroundColor", "#00CC00");      
                           $( document ).ready(function() {
                               $( "#inputEmail3" ).focus();
                           });
                         
  
       },
       error: function(error){
        alert(error);
        }
  });   
  
}
function ClearFields() {

//document.getElementById("textfield1").value = "";
//document.getElementById("#inputEmail3").value = "";
//location.reload();
$( document ).ready(function() {
                               $('#prg').html("");
                               $('#type').html("");
                               $('#enrl').html("");
                               $('#name').html("");
                               $('#cohrt').html("");
                               $('#card').html("");
                               $('#Img').attr('src','images/img.png');
                               $('#inputEmail3').val("");
                               $( "#inputEmail3" ).focus();

                      
                     
                           });

}
$("#inputEmail4").keyup(function(event){
    if(event.keyCode == 13){
      var x = document.getElementById("inputEmail4").value;
  //x.value = x.value.toUpperCase();
 // console.log('jjkkk');
  $.ajax({
       url: "{{route('registration.post')}}",
       type: 'POST',
       dataType: 'JSON',
       data: {
           "cid": x,
           _token: '{{csrf_token()}}'
           
       },
       success: function(response){
        if(response){
                    var img=response.stdimgname;
                    document.getElementById("mes").innerHTML=""; 

                    if(response.err_msg){
                       // console.log("pl");
                       document.getElementById("type").innerHTML=response.err_msg;
                       $("#type").css("backgroundColor", "#FF0000");
                       document.getElementById("enrl").innerHTML="";
                      document.getElementById("name").innerHTML="";
                      document.getElementById("cohrt").innerHTML="";
                      document.getElementById("prg").innerHTML="";
                      document.getElementById("card").innerHTML="";
                      // document.getElementById("Img").src = "https://results.rtc.bt/images/StudGal/"+img;
                      document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/"+img;
                       $( document ).ready(function() {
                               $( "#inputEmail3" ).focus();
                           });
                    }else{
                      document.getElementById("enrl").innerHTML=response.enrl;
                      document.getElementById("name").innerHTML=response.name;
                      document.getElementById("cohrt").innerHTML=response.cohrt;
                         if(response.type==1){
                                document.getElementById("type").innerHTML="Border";
                                $("#type").css("backgroundColor", "#FFFFFF");
                           } else if(response.type==2){
                                document.getElementById("type").innerHTML="Day Scholar";
                                $("#type").css("backgroundColor", "#FFFF00");
                           }else{
                                document.getElementById("type").innerHTML="C.E";
                                $("#type").css("backgroundColor", "#00CC00");
                           }

                      
                    
                    document.getElementById("prg").innerHTML=response.prg;
                    document.getElementById("card").innerHTML=response.card;
                    //document.getElementById("Img").src = "https://results.rtc.bt/images/StudGal/"+img;
                    document.getElementById("Img").src = "https://gateway.rtc.bt/Photos/"+img;
                   $('#inputEmail3').val("");
                   $('#inputEmail4').val("");
                   $( document ).ready(function() {
                               //$( "#inputEmail3" ).focus();
                           });
                   
                    }
                    
                    
           
                    
                    
        }
           
       } ,
       error: function(error){
        console.log(error);
        }
    });

      
    }
});
</script>
@endsection

