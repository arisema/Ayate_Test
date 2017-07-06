<script src="{{ asset('js/jquery.js') }}"></script>

@extends('layouts.homeHeader')




@section('homeContent')

<div id="wrapper">

        <!--SearchBox-->
        <div class="row">
          <div class="col-md-5">
            <div id="custom-search-input">
              <div class="input-group col-md-12">
                <input type="text" class="form-control input-lg" placeholder="Search" onkeydown="search(this)"  id="search"/>
              </div>
            </div>
          </div>
        </div>


        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">

                    <li class="sidebar-brand">
                        <a href="home" id="home"><span class="fa fa-home solo">Home</span></a>
                    </li>
                    <li>
                        <a href="#" onclick="getDiseases(this.id)" data-scroll class='catagories' id="Respiratory">
                            <span class="fa fa-anchor solo">Respiratory Diseases</span>
                        </a>
                    </li>
                    <li>
                        <a href="#skin" onclick="getDiseases(this.id)" data-scroll class='catagories' id="Skin">
                            <span class="fa fa-anchor solo">Skin Diseases</span>
                        </a>
                    </li>
                    <li>
                        <a href="#mental" onclick="getDiseases(this.id)" data-scroll class='catagories' id="Mental">
                            <span class="fa fa-anchor solo">Mental Diseases</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"  onclick="getDiseases(this.id)" data-scroll class='catagories' id="Internal">
                            <span class="fa fa-anchor solo">Internal Disease</span>
                        </a>
                    </li>
                    <li>
                        <a href="#std" onclick="getDiseases(this.id)" data-scroll class='catagories' id="Std">
                            <span class="fa fa-anchor solo">Sexual Transmitted Disease</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="content-header">
                <h1 id="home">



                </h1>
            </div>

            <div class="page-content inset" data-spy="scroll" data-target="#spy">
                <div class="row">

                        <div class="jumbotron text-center" >
                            <h1><div id="heading">Remdies that may interest you</div></h1>
                            <p><div id="update"></p>

                        </div>

                </div>
                <div class="row">
                    <div class="col-md-12 well">
                        <legend id="anch1header">Ginger for sever flue</legend>
                        <div id="anch1" onload="loadAnch1()" >
                          Onion has anti-inflammatory properties. It is an effective remedy for curing chest congestion, when used with honey. Place a slice of onion in a bowl and cover it with honey. Let it stay for overnight. The next day, remove onion from it and consume this onion soaked honey, 4 times a day. Take one teaspoon of honey at a time.

                          You can also have raw, baked, or cooked onions to help mucus flow easily.
                        </div>

                    </div>
                    <div class="col-md-12 well">
                        <legend id="anch2header">Honey for acne and pimples</legend>
                        <div id="anch2">
                          Bay leaf is a very beneficial herb, which is a natural remedy for several health problems, including chest congestion. For curing chest congestion, one can have tea prepared from bay leaves. For this, you are required to take fresh bay leaves and put them into a cup of boiling water. Let it soak for some time. Drink it warm.
                        </div>
                    </div>
                    <div class="col-md-12 well">
                        <legend id="anch3header">Lemons</legend>
                        <div id="anch3">
                          To get rid of mucus-forming bacteria in the respiratory system, lemons are the best remedy. You are advised to add some grated lemon rind or a lemon wedge in a cup of hot water. Let it steep for five minutes. Drink the water after straining it. You can also this solution for gargling.
                      </div>
                    </div>
                    <div class="col-md-12 well">
                        <legend id="anch4header">Hot Tea with lemon and Honey</legend>
                        <div id="anch4">
                          One of the simplest home remedies for chest congestion is hot tea with lemon and honey. To get relief in sore throat, prepare tea and add a little honey and lemon juice in it. Drink it to get a calming relief in the throat and chest.
                        </div>
                    </div>
                </div>

                <div class="navbar navbar-default navbar-static-bottom" id="footer">
                    <p class="navbar-text pull-left">Ayate | Ethiopian Home Remedies </p>
                </div>
            </div>

        </div>

    </div>



@endsection('homeContent')

<script>

$(document).ready(function(){
$("#menu-toggle").click(function(e) {
    console.log(">>>");
   // window.alert(">>>Hey>>>>")
    e.preventDefault();
    $("#wrapper").toggleClass("active");

});

});


//Retrieves disease when catagory clicked
function getDiseases(id){

  var Id=" ";
  switch (id) {
    case 'Respiratory':
      Id='Respiratory Diseases';
      break;
    case  'Internal':
        Id='Internal Diseases';
        break;
    case 'Skin':
        Id='Skin Diseases';
        break;
    case 'Std':
        Id='Sexually transmitted Diseases';
        break;
    case 'Mental':
        Id="Mental Disease";
        break;
    default:
      Id=" ";

  }
//change the heading
document.getElementById("heading").innerHTML="Looking for "+Id;
//csrf token
var _TOKEN = $('meta[name="csrf-token"]').attr('content');
// ajax post method sends info to backend to retrieve model
$.ajax({
type:'POST',
url:'/getdisease',
data:{id:id, _token:_TOKEN},
success:function(data){
$('#update').html(data);
}
});
}

//Retrieves remedies for selected disease
function getRemedies(id){
var _TOKEN = $('meta[name="csrf-token"]').attr('content');
//ajax post method to retrieve model from RemedyList controller
$.ajax({
type:'POST',
url:'/getremedies',
data:{id:id, _token:_TOKEN},
success:function(data){
  //  when  ajax call successful retrievs data from model (remedies table)
$('#update').html(data);
}
});
}
//To Meba
function viewRemedy(id){
// this displays current url position + /remedySelected
var url=window.location.href+id;


}
</script>
