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
                    
                </div> 
            </div>  
            <div class="row">
                <div class="col-md-12">
               
                                            <div class="card card-info card-outline">
                                                <div class="card-body">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                      <thead>
                                                          <tr>
                                                              <th>Enrollment Number</th>
                                                              <th>Name</th>
                                                              <th>Cohort</th>
                                                              <th>Program</th>
                                                              <th>Type</th>
                                                              <th>Time</th>
                                                              <th>Date</th>
                                                              <th>Status</th>
                                                              <th>Is Swap</th>

                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          @foreach($getreprots as $report)
                                                          <tr>
                                                              <td>{{$report->enrollment_no}}</td>
                                                              <td>{{$report->name}}</td>
                                                              <td>{{$report->cohort}}</td>
                                                              <td>{{$report->program}}</td>
                                                              <td>{{$report->type}}</td>
                                                              <td><?php echo date("h:i:s",strtotime($report->created_at));?></td>
                                                              <td><?php echo date("Y-M-d",strtotime($report->created_at));?></td>
                                                              <td>{{$report->status}}</td>
                                                              <td>{{$report->is_swap}}</td>
                                                          </tr>
                                                          @endforeach
            
                                                          </tbody>
                                                          <tfoot>
                                                              <tr>
                                                              <th>Enrollment Number</th>
                                                              <th>Name</th>
                                                              <th>Cohort</th>
                                                              <th>Program</th>
                                                              <th>Type</th>
                                                              <th>Time</th>
                                                              <th>Date</th>
                                                              <th>Status</th>
                                                              <th>Is Swap</th>
                                                              </tr>
                                                            </tfoot>
                                                        </table>
                           
                           
                          
                                                </div>
                                                
                                            </div>
                   
                               
                          
                        </div>
                    </div>
                </div> 
                

                
            </div>        
        </div>
    </div>
</div>
                           
                           
                          
                                               
                   
             

@endsection







