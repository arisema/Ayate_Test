@extends('layouts.app')

@section('content')
<div class="ontainer" style="width: 100%;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <!--  <div class="panel panel-default">
                <div class="panel-heading"
                  Remedy directory
                </div>

                <div class="panel-body">
                    <div class="card">
                        <div class="card-header">
                            Remedy title
                        </div>
                        <div class="card-block">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                        </div>
                    </div>
                </div>
            </div> -->


               <?php
                $data = "hjgb jhsgvuy ghvv";
                $array = preg_split("/[\s,]+/", $data);
                $len =sizeof($array);
                echo $len;
              ?>
            
        </div>

    </div>
</div>
@endsection
