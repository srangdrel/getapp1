

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
                    
                    <div class="card card-info card-outline d-none d-md-block">
                        <div class="card-body">
                          
                            
                        
                                <div class="form-group row">
                                   
                                        <div class="col-sm-10">
                                       
                                            <input type="text" class="form-control" wire:model="txtcrdsrno"  placeholder="*******" required autofocus >
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
                                           
                                            <input type="text" class="form-control" name="cid" id="inputEmail4" placeholder="Enrollment Number" autofocus required onclick="withoutCard()">
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
                                   <td><strong>Enrollment Number</strong></td><td><div>{{$enrl}}</div></td>
                                 </tr>
                                 <tr>
                                   <td><strong>Full Name</strong></td><td><div></div><input type="hidden" name="n" value=""></td>
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
                                     <input type="button" class="btn btn-primary btn-lg btn-block " value="  Cancel  " wire:click="withcard" >
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
                   
                </div>

