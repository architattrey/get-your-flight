<div class="col-md-4" style="display: flex;">
    <button class="btn btn-default" type="button" style="margin-left: 80px; margin-right: 10px;" ng-click="decrementfirst('adult')">-</button>
        <span style="border: 1px solid #d2cdcd; padding: 0 5px;     background: #c3bdbd7a;"><b>@{{adult}} Adults</b> <br><small style="color: #999; font-size: 10px;     display: block; margin-top: -9px; margin-bottom: -6px;">(Above 12 years)</small></span>
    <button class="btn btn-default" type="button" ng-click="incrementfirst('adult');"  style="    margin-left: 15px;">+</button>
</div>
<div class="col-md-4" style="display: flex;">
    <button class="btn btn-default" type="button" style="margin-left: 80px; margin-right: 10px;" ng-click="decrementfirst('child')">-</button>
        <span style="border: 1px solid #d2cdcd; padding: 0 5px;     background: #c3bdbd7a;"><b>@{{child}} Child</b> <br> <small style="color: #999; font-size: 10px;     display: block; margin-top: -10px;    margin-left: 5px; margin-bottom: -6px;">(2 to 12 years)</small></span>
    <button class="btn btn-default" type="button" ng-click="incrementfirst('child')" style="    margin-left: 15px;">+</button>
</div>
<div class="col-md-4" style="display: flex;">
    <button class="btn btn-default" type="button"style="margin-left: 80px; margin-right: 10px;" ng-click="decrementfirst('infant')">-</button>
        <span style="border: 1px solid #d2cdcd;padding: 0 5px; background: #c3bdbd7a;"><b>@{{infant}} Infant</b> <br> <small style="color: #999; font-size: 10px; display: block; margin-top: -9px; margin-bottom: -6px;">(Below 2 years)</span></span>
    <button class="btn btn-default" type="button" ng-click="incrementfirst('infant')" style="    display: block;margin-top: 9px;     margin-left: 15px;">+</button>
</div>