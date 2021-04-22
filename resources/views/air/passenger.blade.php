<!-- 
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
        <ul class="nav navbar-nav">
    <li class="dropdown">

        <ul class="dropdown-menu" style="width: 250px; height: 327px; padding-left: 17px;">
            <li style="font-size: 14px; padding-top: 17px;"><bold>@{{adult}} Atdult </bold>
                <button class="btn btn-default"  type="button" style="margin-left: 90px;" ng-click="decrementfirst('adult');">-</button>
                <button class="btn btn-default"  type="button" ng-click="incrementfirst('adult');">+</button>
            </li>
            <li class="divider"></li>
            <li>@{{child}} Children <small>2-12YRS</small>
                <button class="btn btn-default" type="button" style="margin-left: 20px;" ng-click="decrementfirst('child');">-</button>
                <button class="btn btn-default"   type="button" ng-click="incrementfirst('child');">+</button>
            </li>
            <li class="divider"></li>
            <li>@{{infant}} infant <small>Below 2 YRS</small>
                <button class="btn btn-default"  type="button" style="margin-left: 12px;" ng-click="decrementfirst('infant');">-</button>
                <button class="btn btn-default"  type="button" ng-click="incrementfirst('infant');">+</button>
            </li>
            <li class="divider"></li>
            <li><input type="radio" name="Economy" style="position: absolute; margin-top: -10px;" ng-model="changedVal" ng-click="getVal()" value="Economy" checked><span style=" margin-left: 20px;">Economy</span></li>
            <li><input type="radio" name="Economy" style=" margin-top: -10px;"  ng-model="changedVal" ng-click="getVal()" value="Premium Economy" ><span style=" margin-left: 20px;">Premium Economy</span></li>
            <li><input type="radio" name="Economy" style=" margin-top: -10px;"  ng-model="changedVal" ng-click="getVal()" value="Business" ><span style=" margin-left: 20px;">Business</span></li>
            <li><input type="radio" name="Economy"  style=" margin-top: -10px;" ng-model="changedVal" ng-click="getVal()" value="First Class"><span style=" margin-left: 20px;">First Class</span></li>
            <li><button type="button" style="margin-left: 155px;"  class="btn btn-red" name="a" value="Done">Done</button></li>
        </ul>
    </li>
</ul>
</div>   -->

<!--
<ul class="nav navbar-nav">
                        <a class="dropdown-toggle btn btn-default" data-toggle="dropdown" href="#">
                      @{{pasenger}}
                        Travellers,@{{change}}<b class="caret" style="backgroud-color: black;"></b></a>
                    <ul class="dropdown-menu" style="width: 250px; height: 327px; padding-left: 17px;">
                          <li style="font-size: 14px; padding-top: 17px;"><bold>@{{adult}} Atdult </bold>
                                  <button class="btn btn-default" style="margin-left: 90px;" ng-click="decrementfirst('adult');">-</button>
                                    <button class="btn btn-default" ng-click="incrementfirst('adult');">+</button>
                                  </li>
                                  <li class="divider"></li>
                                  <li>@{{child}} Children <small>2-12YRS</small>
                                    <button class="btn btn-default" style="margin-left: 20px;" ng-click="decrementfirst('child');">-</button>
                                    <button class="btn btn-default" ng-click="incrementfirst('child');">+</button>
                                  </li>
                                  <li class="divider"></li>
                                  <li>@{{infant}} infant <small>Below 2 YRS</small>
                                    <button class="btn btn-default" style="margin-left: 12px;" ng-click="decrementfirst('infant');">-</button>
                                    <button class="btn btn-default" ng-click="incrementfirst('infant');">+</button>
                                  </li>
                                  <li class="divider"></li>
                                  <li><input type="radio" name="Economy" style="position: absolute; margin-top: -10px;" ng-model="changedVal" ng-click="getVal()" value="Economy" checked><span style=" margin-left: 20px;">Economy</span></li>
                                  <li><input type="radio" name="Economy" style=" margin-top: -10px;"  ng-model="changedVal" ng-click="getVal()" value="Premium Economy" ><span style=" margin-left: 20px;">Premium Economy</span></li>
                                  <li><input type="radio" name="Economy" style=" margin-top: -10px;"  ng-model="changedVal" ng-click="getVal()" value="Business" ><span style=" margin-left: 20px;">Business</span></li>
                                  <li><input type="radio" name="Economy"  style=" margin-top: -10px;" ng-model="changedVal" ng-click="getVal()" value="First Class"><span style=" margin-left: 20px;">First Class</span></li>
                                  <li><button type="button" style="margin-left: 155px;"  class="btn btn-red" name="a" value="Done">Done</button></li>
                          </ul>
                    
                </ul>  -->


<ul class="nav">
  <li class="button-dropdown">
    <a href="javascript:void(0)" class="dropdown-toggle">
                @{{pasenger}}
        Travellers,@{{change}} <span>▼</span>
        </a>  
          <ul class="dropdown-menu" style="    width: 250px; height: 370px;padding-left: 17px;display: block;"> 
             <li style="font-size: 14px; padding-top: 17px;"><bold>@{{adult}} Atdult </bold>
              <button class="btn btn-default" type="button" style="margin-left: 80px;" ng-click="decrementfirst('adult');">-</button>
                <button class="btn btn-default"  type="button" ng-click="incrementfirst('adult');">+</button>
              </li>
              <li class="divider"></li>
              <li style="margin-top: 25px;">@{{child}} Children <small>2-12YRS</small>
                <button class="btn btn-default" style="margin-left: 9px;"  type="button" ng-click="decrementfirst('child');">-</button>
                <button class="btn btn-default"  type="button" ng-click="incrementfirst('child');">+</button>
              </li>
              <li class="divider"></li>
              <li style="margin-top: 25px;">@{{infant}} infant <small>Below 2 YRS</small>
                <button class="btn btn-default"  type="button" style="margin-left: -1px;" ng-click="decrementfirst('infant');">-</button>
                <button class="btn btn-default"  type="button" ng-click="incrementfirst('infant');">+</button>
              </li>
              <li class="divider"></li>
              <li style="margin-top: 45px;">
                <input id="myRadio" type="radio" name="Economy" style="position: absolute; margin: -10px 0;" ng-checked ng-model="changedVal" ng-click="getVal()" value="Economy" checked>
                <span style=" margin-left: 26px;">Economy</span>
              </li>
              <li style="margin-top: 10px;display: block !important;">
                <input type="radio" name="Economy" style=" margin-top: -10px; "  ng-model="changedVal" ng-click="getVal()" value="Premium Economy" >
                <span style=" margin-left: 25px;">Premium Economy</span></li>
              <li style="margin-top:10px;">
                <input type="radio" name="Economy" style=" margin-top: -10px;"  ng-model="changedVal" ng-click="getVal()" value="Business" >
                <span style=" margin-left: 25px;">Business</span></li><br>
              <li style="margin-top: 10px;"><input type="radio" name="Economy"  style=" margin-top: -10px;" ng-model="changedVal" ng-click="getVal()" value="First Class">
                <span style=" margin-left: 25px;">First Class</span></li>
              <li><a href="javascript:void(0)" style="    margin-left: 138px;  width: 75px; height: 40px;  padding-top: 8px; padding-left: 16px;" class="dropdown-toggle btn btn-red">Done</a></li>
          </ul>
  </li>
</ul>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        </ul>
  </li>
</ul>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
