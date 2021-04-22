@extends('super_admin.layouts.app')

@section('content')

<style>
    .pagination .disabled{
        padding: 0 10px 0 10px;
        font-size: 20px;
    }
        .pagination .active{
        padding: 0 10px 0 10px;
        font-size: 20px;
    }
        .pagination a{
        padding: 0 10px 0 10px;
        font-size: 20px;
    }
</style>

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
             Table Lists:
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm">
                <thead>
                    <tr>
                        <th>I.D</th>
                        <th>Package Name</th>
                        <th>Seller Name</th>
                        <th>Package Rate</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                </thead>
                @foreach($packages as $key => $package)
                  @php $key++;@endphp
                <tbody>
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$package->package_name}}</td>
                        <td>{{$package->seller}}</td>
                        <td>₹{{$package->package_rate}}</td>
                        <td>
                            @if($package->status ==1)
                                <a href="#"><span class="badge badge-success">Activate</span></a>
                            @else
                                <a href="#"><span class="badge badge-danger">Deactivate</span></a>
                            @endif    
                        </td>
                        <td>
                        <a href="{{route('single_package_lists',$package->id)}}"><button type="button" class="btn btn-info btn-sm">More...</button></a>
                        </td>
                   </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="row" style="display:flex; justify-content:center;align-items:center;">
                {{$packages->links()}}     
            </div>
        </div>
    </div>
</div>

 @endsection
