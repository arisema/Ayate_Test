@extends('layouts.app')

@section('content')
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                 <?php   $remedies=App\Remedy::orderBy('created_at','desc')->get();
                 //$data=$_GET["genre"];
             
                       $nam=$_GET["name"];
                    
                 
                               ?>
                               
                            
                
                @foreach($remedies as $remedy) 
               <?php  $name=$remedy->remedyName;?>
                 
                 @if($remedy->remedyName==$nam)
                  <?php  $disease=$remedy->diseaseName;?>
                 <?php $remid=$remedy->id;?>
                <div class="panel-heading">{{$remedy->diseaseName}} -> {{$name}}</div>

                <div class="panel-body">
                    <div class="card">
                        <div class="card-header">
                          <h4>{{$name}}</h4>
                        </div>
                        <div class="card-block">
                            <!--<p class="card-title">Debunk status Here (Debunked/Not yet debunked)</p>-->
                            <p class="card-text">
                                {{$remedy->description}}
                             <!-- Lorem ipsum dolor sit amet, tantas suscipit id est, ex indoctum consequat mei. Sea te ferri autem officiis.
                              Cetero argumentum delicatissimi quo ei. Eruditi dolorum vituperatoribus vix no, at dicta appareat incorrupte duo.
                              Sea ad volumus tincidunt, et vix labores docendi placerat.

                              At solum aeterno per, ea reprimique percipitur mei. Tamquam salutatus ei vel. Te iudico delicatissimi est. Graecis repudiare hendrerit ei usu.

                              Graeco putant vulputate ius te, et perpetua postulant complectitur vis. Ubique gubergren est ex, no vix saepe tritani.
                               Sonet malorum ad est, ut duo ullum nostrum, cu usu nobis ornatus tractatos.
                               Vim at audire antiopam ullamcorper, fugit consequat consequuntur sit ad. Et has munere omittam.
                               Ponderum intellegat definitiones cu eam, justo appareat ei qui, sed blandit scripserit ad.-->

                            </p>
                            @endif
                            @endforeach
                            
                         
                            <div class="col-md-10 comment-form">
                                <p class="comment-form-title">Leave a Comment </p>
                                <form class="form-horizontal" role="form" method="GET" action="/remedyViewPage/{{$remid}}"> <!--AJAX-->
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea id="comment" type="text" placeholder="Your Comment" class="form-control" name="comment" required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="commentorName" type="text" placeholder="Name" class="form-control" name="commentorName"  required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input id="commentorEmail" type="email" placeholder="E-mail" class="form-control" name="commentorEmail" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="number"  class="form-control" id="rating" name="rating"  min="1" max="5" placeholder="Rate It." required>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <div class="col-md-12">
                                            <input  type="hidden"  class="form-control" name="name" value="{{$nam}}" required>
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
                                <strong>Comments</strong> <br>
                               
                                 <?php   $comments=App\Comment::orderBy('time','desc')->get();?>
                                @foreach($comments as $comment) 
                                @if($comment->remedyid==$remid)
                                
                                <p style="color: orange;">
                                <i> {{$comment->username}}<br>
                                 {{$comment->Email}}</i><br>  @if($comment->rating=="1")
                                              <img src="/images/star1.jpeg" class="img-responsive" width="100" height="100">
                                             @elseif($comment->rating=="2")
                                              <img src="/images/star2.jpeg" class="img-responsive" width="100" height="100">
                                                @elseif($comment->rating=="3")
                                              <img src="/images/star3.jpeg" class="img-responsive" width="100" height="100">
                                               @elseif($comment->rating=="4")
                                              <img src="/images/star4.jpeg" class="img-responsive" width="100" height="100">
                                                @else($comment->rating=="5")
                                              <img src="/images/star5.jpeg" class="img-responsive" width="100" height="100">
                                           
                                              @endif</p>
                                 
                 
                                    <p style="margin-left:10px;">{{$comment->comment}}</p>
                                            
                                @endif  @endforeach
                                 
                              
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
                 <?php $i=0?>
                 @foreach($remedies as $remedy) 
                 @if($remedy->diseaseName==$disease & $remedy->id != $remid)
                 
                 @if($i<5)
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">{{$remedy->Name}}</h4>
                            <!--<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
                            <a href="/remedyViewPage?name={{$remedy->Name}}" class="btn btn-outline-warning">View</a>
                        </div>
                    </div>
                    
                    @endif
                   
                     @endif
                       <?php $i=$i+1?>
                    @endforeach
                
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
