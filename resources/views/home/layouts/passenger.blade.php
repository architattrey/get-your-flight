<ul class="nav" style="    border: 1px solid #f1eaea;">
  <li class="button-dropdown">
    <a href="javascript:void(0)" class="dropdown-toggle" style="background: #fff;    color: #716868 !important;">
                @{{pasenger}}
        Travellers,@{{change}} <span>▼</span>
        </a>  
          <ul class="dropdown-menu" style="    width: 250px; height: 370px;padding-left: 17px;display: none;"> 
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
              <li style="margin-top: 0px;">
                <input type="radio" name="class_type" style="position: absolute; margin-top: -9px; ;" ng-click="getVal('Economy')" value="2">
                <span style=" margin-left: 26px;">Economy</span>
              </li>
              <li style="margin-top: -3px;display: block !important;">
                <input type="radio" name="class_type" style=" margin-top: -10px; "  ng-click="getVal('Premium Economy')" value="3" >
                <span style=" margin-left: 25px;">Premium Economy</span></li>
              <li style="margin-top:-3px;">
                <input type="radio" name="class_type" style=" margin-top: -10px;"  ng-click="getVal('Business')" value="4">
                <span style=" margin-left: 25px;">Business</span></li><br>
              <li style="margin-top:-3px;">
                <input type="radio" name="class_type" style=" margin-top: -10px;"  ng-click="getVal('Premium Business')" value="5">
                <span style=" margin-left: 25px;">Premium Business</span></li><br>
              <li style="margin-top: -28px;"><input type="radio" name="class_type"  style=" margin-top: -10px;"  ng-click="getVal('First Class')" value="6">
                <span style=" margin-left: 25px;">First Class</span></li>
              <li><a href="javascript:void(0)" style="    margin-left: 138px;  width: 75px; height: 40px;  padding-top: 8px; padding-left: 16px; background: #e82b44;" class="dropdown-toggle btn btn-red">Done</a></li>
          </ul>
  </li>
</ul>



