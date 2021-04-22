
<!DOCTYPE html>
<html lang="en">
<head>
  <title>hotel search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>

  <div class="container" ng-app="myApp" ng-controller="myCtrl">
    <div class="row">
      <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>HotelName</th>
              <th>Price</th>
              <th>HotelAddress</th>
              <th>CountryName</th>
              <th>Description</th>
              <th>Email</th>
              <th>FaxNumber</th>
              <th>HotelCode</th>
              <th>HotelContactNo</th>
              <th>HotelPicture</th>
              <th>HotelPolicy</th>
              <th>PinCode</th>
              <th>RoomData</th>
              <th>RoomFacilities</th>
              <th>Services</th>
              <th>SpecialInstructions</th>
              <th>StarRating</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>@{{hotel.HotelName}}</td>
              <td></td>
              <td>@{{hotel.Address}}</td>
              <td>@{{hotel.CountryName}}</td>
              <td>@{{hotel.Description}}</td>
              <td>@{{hotel.Email}}</td>
              <td>@{{hotel.FaxNumber}}</td>
              <td>@{{hotel.HotelCode}}</td>
              <td>@{{hotel.HotelContactNo}}</td>
              <td>@{{hotel.HotelPicture}}</td>
              <td>@{{hotel.HotelPolicy}}</td>
              <td>@{{hotel.PinCode}}</td>
              <td>@{{hotel.RoomData}}</td>
              <td>@{{hotel.RoomFacilities}}</td>
              <td>@{{hotel.Services}}</td>
              <td>@{{hotel.SpecialInstructions}}</td>
              <td>@{{hotel.StarRating}}</td>
            </tr>
          </tbody>
        </table>

    </div>

    

  </div>

</body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope, $http) {

        $scope.index = "{{$index}}"
        $scope.code = "{{$code}}"
        $scope.hotel = null
        $http.get("/api/v1/hotel/hotelinfo/"+$scope.index+"/"+$scope.code).then( response => {

             $scope.hotel = response.data.data.HotelInfoResult.HotelDetails
            console.log(response.data.data)
          }).catch(function (error) {
             console.log(error)
        });
    });
</script>


</html>
