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
                    <h4></h4>
                    <form action="{{route('getEntryRpt.Student')}}" Method="Post">
                       <div class="form-group">
                       @csrf
                         <label for="exampleInputEmail1">Month Date Year</label>
                         <input type="Date" class="form-control" name='Edate' aria-describedby="emailHelp" placeholder="Enter email">
    
                       </div>
  
                       <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
            </div>  
                           

                
            </div>        
        </div>
    </div>
</div>
  
                           
                          
                                               
                   
             

@endsection







