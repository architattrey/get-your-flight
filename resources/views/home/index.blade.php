@extends('super_admin.layouts.app')

@section('content')

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
                    <a href="#"><span class="badge badge-success">Activate</span></a>
                    <a href="#"><span class="badge badge-danger">Deactivate</span></a>
                    </td>
                    <td>
                    <a href="{{route('single_package_lists',$package->id)}}"><button type="button" class="btn btn-info btn-sm">More...</button></a>
                    </td>
               </tr>
                @endforeach
            </tbody>
        </table>
                
<!-- <tr>
<td>Estavan Lykos</td>
<td>2012/02/01</td>
<td>Staff</td>
<td>
<span class="badge badge-danger">Banned</span>
</td>
</tr>
<tr>
<td>Chetan Mohamed</td>
<td>2012/02/01</td>
<td>Admin</td>
<td>
<span class="badge badge-secondary">Inactive</span>
</td>
</tr>
<tr>
<td>Derick Maximinus</td>
<td>2012/03/01</td>
<td>Member</td>
<td>
<span class="badge badge-warning">Pending</span>
</td>
</tr>
<tr>
<td>Friderik Dávid</td>
<td>2012/01/21</td>
<td>Staff</td>
<td>
<span class="badge badge-success">Active</span>
</td>
</tr>
</tbody>
</table>
<ul class="pagination">
<li class="page-item"><a class="page-link" href="#">Prev</a></li>
<li class="page-item active">
<a class="page-link" href="#">1</a>
</li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">4</a></li>
<li class="page-item"><a class="page-link" href="#">Next</a></li> -->
<!-- </ul> -->
</div>
</div>
</div>

 @endsection
