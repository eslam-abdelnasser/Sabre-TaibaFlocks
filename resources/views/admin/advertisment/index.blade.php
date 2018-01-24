



 


@extends('admin.layout')

@section('title' ,'View all Advertisments')


@section('content')

    <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Advertisments</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text">View All Advertisments</p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Allbum Attached</th>
                               
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                           @if(count($advertisments)>0)
                                                @foreach($advertisments as $advertisment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $advertisment->title }} </td>
                                                        <td>{{ $advertisment->position }} </td>
                                                       

                                                        <td>{!! $advertisment->status == 1 ? '<span class="label label-sm label-success"> Active </span>' : '<span class="label label-sm label-danger">Not Active</span>' !!} </td>

                                                        <td>{{ $advertisment->gallery->title }} </td>
                                                        
                                                        
                                                        @php 


                                                            switch ($advertisment->position) {
                                                                case 'first':
                                                                    $position = 1 ; 
                                                                    break;

                                                                    case 'second':
                                                                    $position = 2 ; 
                                                                    break;

                                                                    case 'third':
                                                                    $position = 3 ; 
                                                                    break;

                                                                    case 'fourth':
                                                                    $position = 4 ; 
                                                                    break;
                                                                
                                                                 
                                                            }


                                                        @endphp






                                                        <td> 
                                                            <a href='{{ url("admin/advertisment/$advertisment->id/edit?position=$position") }}' data-toggle="tooltip" title="" data-original-title="Edit Advertisment"  class="btn btn-outline btn-circle btn-sm purple">
                                                                <i class="icon-edit2"></i></a>
                                                        </td>
                                                        
                                                         
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="6" class="text-xs-center">Sorry we can't find any advertisments areas</td>
                                                </tr>
                                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->




       <!-- Bordered striped start -->
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Advertisments Areas</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>

                </div>
                <div class="card-body collapse in">
                    <div class="card-block card-dashboard">
                        <p class="card-text"><code>available  advertisments areas</code></p>

                         <div class="col-xs-6">
                                                <div class="mt-element-ribbon bg-grey-steel">
                                                    <div class="ribbon ribbon-shadow ribbon-color-success uppercase"><h3>First Area</h3></div>
                                                    @if(count($first_adv) > 0 )

                                                         <div class="ribbon ribbon-right ribbon-shadow ribbon-round ribbon-color-warning uppercase">Area already runs advertisment</div>

                                                    @else
                                                        
                                                        <a  href="{{ url('admin/advertisment/create?position=1') }}" class="btn btn-primary">Book First area</a>
            
                                                    @endif
                                                    <p class="ribbon-content"> </p>
                                                     
                                                     
                                                </div>
                                            </div>

                                            <div class="col-xs-6  ">
                                                <div class="mt-element-ribbon bg-grey-steel">
                                                    <div class="ribbon ribbon-shadow ribbon-color-success uppercase"><h3>Second Area</h3></div>

                                                    @if(count($second_adv) > 0 )

                                                         <div class="ribbon ribbon-right ribbon-shadow ribbon-round ribbon-color-warning uppercase">Area already runs advertisment</div>

                                                    @else
                                                        
                                                        <a href="{{ url('admin/advertisment/create?position=2') }}" class="btn btn-primary">Book Second area</a>

                                                    @endif


                                                    
                                                    <p class="ribbon-content"> </p>
                                                </div>
                                            </div>
                                            <div class="col-xs-6  ">
                                                <div class="mt-element-ribbon bg-grey-steel">
                                                    <div class="ribbon ribbon-shadow ribbon-color-success uppercase"><h3>Third Area</h3></div>

                                                    @if(count($third_adv) > 0 )

                                                         <div class="ribbon ribbon-right ribbon-shadow ribbon-round ribbon-color-warning uppercase">Area already runs advertisment</div>

                                                    @else

                                                         <a href="{{ url('admin/advertisment/create?position=3') }}" class="btn btn-primary">Book Third area</a>

                                                    @endif


                                                   
                                                    <p class="ribbon-content"> </p>
                                                </div>
                                            </div>

                                            <div class="col-xs-6  ">
                                                <div class="mt-element-ribbon bg-grey-steel">
                                                    <div class="ribbon ribbon-shadow ribbon-color-success uppercase"><h3>Fourth Area</h3></div>


                                                    @if(count($fourth_adv) > 0 )

                                                        <div class="ribbon ribbon-right ribbon-shadow ribbon-round ribbon-color-warning uppercase">Area already runs advertisment</div>

                                                    @else

                                                          <a href="{{ url('admin/advertisment/create?position=4') }}" class="btn btn-primary">Book Fourth area</a>

                                                    @endif 
                                                  
                                                    <p class="ribbon-content">  </p>
                                                </div>
                                            </div>

                    </div>
                     
                                             
                                           

                                         



                </div>
            </div>
        </div>
    </div>
    <!-- Bordered striped end -->

 



@endsection