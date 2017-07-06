@extends('layouts.app')

@section('content')
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <?php   $remedies=App\Remedy::all();
                 $nam=$_GET["name"]; ?>
                
                @foreach($remedies as $remedy) 
               <?php  $name=$remedy->Name;?>
                 @if($remedy->Name==$nam)
                <div class="panel-heading">{{$remedy->diseaseName}}{{$name}}</div>

                <div class="panel-body">
                    <div class="card">
                        <div class="card-header">
                          <h4>{{$name}}{{$remedy->status}}</h4>
                        </div>
                        <div class="card-block">
                            <!--<p class="card-title">Debunk status Here (Debunked/Not yet debunked)</p>-->
                            <p class="card-text">
                                {{$remedy->content}}
               
                        <div class="card-block">
                            <!--<p class="card-title">Debunk status Here (Debunked/Not yet debunked)</p>-->
                            <p class="card-text">
                               
                             <!-- Lorem ipsum dolor sit amet, tantas suscipit id est, ex indoctum consequat mei. Sea te ferri autem officiis.
                              Cetero argumentum delicatissimi quo ei. Eruditi dolorum vituperatoribus vix no, at dicta appareat incorrupte duo.
                              Sea ad volumus tincidunt, et vix labores docendi placerat.

                              At solum aeterno per, ea reprimique percipitur mei. Tamquam salutatus ei vel. Te iudico delicatissimi est. Graecis repudiare hendrerit ei usu.

                              Graeco putant vulputate ius te, et perpetua postulant complectitur vis. Ubique gubergren est ex, no vix saepe tritani.
                               Sonet malorum ad est, ut duo ullum nostrum, cu usu nobis ornatus tractatos.
                               Vim at audire antiopam ullamcorper, fugit consequat consequuntur sit ad. Et has munere omittam.
                               Ponderum intellegat definitiones cu eam, justo appareat ei qui, sed blandit scripserit ad.-->

                            </p>
                           
                            
                         
                            <div class="col-md-10 comment-form">
                                <p class="comment-form-title">Leave a Comment </p>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('remedyViewPage') }}"> <!--AJAX-->
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea id="comment" type="text" placeholder="Your Comment" class="form-control" name="comment" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="commentorName" type="text" placeholder="Name" class="form-control" name="commentorName" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="commentorEmail" type="text" placeholder="E-mail" class="form-control" name="commentorEmail" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Post Comment
                                        </button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 comments-block">
                                Comments <br/>
                                Comments Here (cascade)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Related Remedies</div>

                <div class="panel-body">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-outline-warning">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-outline-warning">Go somewhere</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Special title treatment</h4>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-outline-warning">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
