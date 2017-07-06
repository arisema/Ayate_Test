@extends('layouts.app')

@section('content')
<div class="ontainer" style="width: 100%;">
    <div class="row">


        <div class="col-md-3 col-md-offset-1">
           <div class="panel panel-default">
                <div class="panel-heading">
                  Profile
                </div>

                <div class="panel-body">
                  <div class="container" style="width:100%">
                    <div class="row"><img src="/images/profile.png"></div>
                    <div class="row info-content">Name: {{Auth::user()->fName}} {{ Auth::user()->mName}}</div>
                    <div class="row info-content">E-mail: {{Auth::user()->email}}</div>
                    <div class="row info-content">Phone: {{Auth::user()->phone}}</div>
                    <div class="row info-content">Work Address: {{Auth::user()->workAddress}}</div>
                    <div class="row info-content">Occupation: {{Auth::user()->occupation}}</div>
                  </div>

                </div>
            </div> <!--panel-default closing-->

        </div>
        <div class="col-md-7">

           <div class="panel panel-default">
                <div class="panel-heading">

                  <ul class="nav nav-tabs nav-justified">
                    <li role="presentation" class="active"><a href="#newSubmissions" data-toggle="tab">Latest Submissions</a></li>
                    <li role="presentation"><a href="#prevDebunks" data-toggle="tab">Previous Debunks</a></li>
                  </ul>

                </div>

               <div class="panel-body">
                   <div class="tab-content">

                       <p style="color:red;">{{Session::get('message')}}</p>
                       <div class="tab-pane fade in active" id="newSubmissions">

<?Php $count = 0;
    $submissionCount = 0;
                       foreach ($debunk as $debunks){
                            $count++;
                       }
                       foreach ($data as $item){
                            $submissionCount++;
                       }
                       ?>

                                  <?php
                                  if($submissionCount != 0){
                                  $tempCount = 0;
                                    $c=0;
                                  foreach ($data as $item) {
                                    $tempCount = 0;
                               if($count != 0){


                                      foreach ($debunk as $debunks){
                                        $tempCount++;
                                        if(($item->id == $debunks->submissionId) && ($debunks->verifyBy == Auth::user()->id)){
                                            break;
                                      }
                                      else if($tempCount == $count ){
                                          $tempCount = 0

                                        ?>
                                  <div class="container" style="padding-top:1%;width: 100%;">
                          <div class="row"><?php echo $item->remedyName ;?></div>
                          <div class="row"><p><?php echo $item->description;

                              ?> </p></div>
                          <div class="row"><a name="debunk{{$c}}"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $c; ?>" data-whatever="@mdo">Debunk</a></div>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal<?php echo $c; ?>">

                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="container" style="width:100%">
                                <div class="row">
                                  <div class="col-md-11 col-md-offset-1 submissionLook">
                                    <p><?php echo $item->remedyName ;?></p>
                                    <p>Submission Content
                                        <?php echo $item->description ;?>
                                    </p>

                                  </div>
                                </div>

                                <div class="row">
                                  <form class="form-horizontal" name="debunk_form" role="form" method="GET" action="debunk/<?php echo $item->id; ?>">
                                      {{ csrf_field() }}
                                      <div class="form-group">
                                          <label for="detailedExplanation" class="col-md-4 control-label">Detailed Explanation</label>

                                          <div class="col-md-6">
                                              <input type="text" class="form-control" name="detailedExplanation" required>
                                          </div>
                                      </div>


                                      <div class="form-group">
                                          <label for="rating" class="col-md-4 control-label">Rating (out of 10)</label>

                                          <div class="col-md-6">
                                              <input type="number" size="100" class="form-control" name="rating" min="0" max="10" required>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-md-4 col-md-offset-5">
                                          <button id="debunk_form" name="debunk_form" type="submit" class="btn btn-primary" value="Submit Debunk">
                                              Submit Debunk
                                          </button>
                                            <button type="reset" class="btn btn-primary" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                      </div>
                                      {{ csrf_field() }}
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        </div>
                        <?php 
                                 $c++; }}
    }
    else{ ?>
    <div class="container" style="padding-top:1%;width: 100%;">
        <div class="row"><?php echo $item->remedyName ;?></div>
        <div class="row"><p><?php echo $item->description;

                ?> </p></div>
        <div class="row"><a name="debunk{{$c}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $c; ?>" data-whatever="@mdo">Debunk</a></div>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal<?php echo $c; ?>">

        <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="container" style="width:100%">
                        <div class="row">
                            <div class="col-md-11 col-md-offset-1 submissionLook">
                                <p><?php echo $item->remedyName ;?></p>
                                <p>Submission Content
                                    <?php echo $item->description ;?>
                                </p>

                            </div>
                        </div>

                        <div class="row">
                            <form class="form-horizontal" name="debunk_form" role="form" method="GET" action="debunk/<?php echo $item->id; ?>">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="detailedExplanation" class="col-md-4 control-label">Detailed Explanation</label>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="detailedExplanation" required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="rating" class="col-md-4 control-label">Rating (out of 10)</label>

                                    <div class="col-md-6">
                                        <input type="number" size="100" class="form-control" name="rating" min="0" max="10" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-5">
                                        <button id="debunk_form" name="debunk_form" type="submit" class="btn btn-primary" value="Submit Debunk">
                                            Submit Debunk
                                        </button>

                                        <button type="reset" class="btn btn-primary" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

   <?php
    $c++;}}}
                                 else {
                                   
                                   echo "<h3>No Submitted question</h3>";
                                 }
                                 ?>
                      </div>
    <div class="tab-pane fade" id="prevDebunks">
    <?php
$count = 0;

foreach ($debunk as $debunks){
 $count++; 
}
if($count != 0){
         foreach ($debunk as $debunks){

                if( ($debunks->verifyBy == Auth::user()->id)){
                    foreach ($data as $item){
                        if($item->id == $debunks->submissionId){



    ?>

                        <div class="container" style="width: 100%">
                          <div class="row"><h3><a style="color: black;"><?php echo $item->remedyName ;?></a></h3></div>
                          <div class="row"><p ><?php echo $item->description ;?></p></div>
                          <div class="row"><p><?php echo $debunks->explanation ;?></p></div>
                        </div>

                       <?php }}
            }

}}
else { ?>
  <div class="container" style="width: 100%">
    <div class="row"><h3><a style="color: black;">
      <h3>No debunked submission</h3>
      </div>
      </div>
      
<?php } ?>
    </div>
                  </div>
                </div>
          </div>

        </div>




    </div>
</div>
@endsection
