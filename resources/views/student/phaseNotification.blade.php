
  @if($phase->value == 1)
  <div class="panel panel-success">
      <div class="panel-heading">Enrolment Open</div>
  </div>
  @elseif($phase->value == 4)
  <div class="panel panel-success">
      <div class="panel-heading">Now you can Drop Units</div>
  </div>
  @elseif($phase->value == 6)
  <div class="panel panel-success">
      <div class="panel-heading">Now you can Add Units or Drop Units</div>
  </div>
  @elseif($phase->value == 7)
  <div class="panel panel-success">
      <div class="panel-heading">Now you can Drop Units</div>
  </div>
  @endif
