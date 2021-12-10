@extends('front.layout')
@section('title')
    Disc Assessment
@endsection
@section('content')
{{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
{{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> --}}
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

{{-- <div class="container"> --}}
    <div class="top-content" style="margin-top: 169px !important;">
        <h1 class="text-center">Personality psychometer</h1>
        <p class="text-center">Please read the test sentences and choose the best answer that fits you during the last 2 weeks</p>
    </div>
    {{-- <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:30px">Instructions!</strong><p class="text-dark"> Choose one MOST and one LEAST description of you for each of the 24 statement sets. Answer spontaneously and don’t overthink your response.The assessment 
        will take around 15 minutes depending upon your behaviour type</p><a href="#" style="color:#47B8C6 !important" data-toggle="modal" data-target="#exampleModalCenter" id="modal" class="cursor-pointer">Click here to read more...</a>
      </div> --}}
<div class="stepwizard  ">
    <div class="stepwizard-row d-none setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
           
        </div>
        <div class="stepwizard-step">
            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
            
        </div>
        <div class="stepwizard-step">
            <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
          
        </div>
        <div class="stepwizard-step">
            <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
            
        </div>
        <div class="stepwizard-step">
            <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">8</a>
            
        </div>
        <div class="stepwizard-step">
            <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled">9</a>
         
        </div>
        <div class="stepwizard-step">
            <a href="#step-10" type="button" class="btn btn-default btn-circle" disabled="disabled">10</a>
            
        </div>
        <div class="stepwizard-step">
            <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">11</a>
        
        </div>
        <div class="stepwizard-step">
            <a href="#step-12" type="button" class="btn btn-default btn-circle" disabled="disabled">12</a>
         
        </div>
        <div class="stepwizard-step">
            <a href="#step-13" type="button" class="btn btn-default btn-circle" disabled="disabled">13</a>
          
        </div>
        <div class="stepwizard-step">
            <a href="#step-14" type="button" class="btn btn-default btn-circle" disabled="disabled">14</a>
          
        </div>
        <div class="stepwizard-step">
            <a href="#step-15" type="button" class="btn btn-default btn-circle" disabled="disabled">15</a>
          
        </div>
        <div class="stepwizard-step">
            <a href="#step-16" type="button" class="btn btn-default btn-circle" disabled="disabled">16</a>
           
        </div>
        <div class="stepwizard-step">
            <a href="#step-17" type="button" class="btn btn-default btn-circle" disabled="disabled">17</a>
         
        </div>
        <div class="stepwizard-step">
            <a href="#step-18" type="button" class="btn btn-default btn-circle" disabled="disabled">18</a>
           
        </div>
        <div class="stepwizard-step">
            <a href="#step-19" type="button" class="btn btn-default btn-circle" disabled="disabled">19</a>
        
        </div>
        <div class="stepwizard-step">
            <a href="#step-20" type="button" class="btn btn-default btn-circle" disabled="disabled">20</a>
        
        </div>
        <div class="stepwizard-step">
            <a href="#step-21" type="button" class="btn btn-default btn-circle" disabled="disabled">21</a>
          
        </div>
        <div class="stepwizard-step">
            <a href="#step-22" type="button" class="btn btn-default btn-circle" disabled="disabled">22</a>
         
        </div>
        <div class="stepwizard-step">
            <a href="#step-23" type="button" class="btn btn-default btn-circle" disabled="disabled">23</a>
           
        </div>
        <div class="stepwizard-step">
            <a href="#step-24" type="button" class="btn btn-default btn-circle" disabled="disabled">24</a>
          
        </div>
        <div class="stepwizard-step">
            <a href="#step-25" type="button" class="btn btn-default btn-circle" disabled="disabled">25</a>
          
        </div>
    </div>
</div>
<form role="form">
    <div class="row setup-content mt-5" id="step-1">
        <div class="col-lg-12">
            <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #1</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Easy-going, Agreeable</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="S"  name="opinion1" required="required"></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="0"  name="opinion2" required="required" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Trusting, believing in others</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="I" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Adventurous, Risk taker</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="D" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Tolerant, Respectful</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
                <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
        
    </div>
    <div class="row setup-content mt-5" id="step-2">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #2</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Soft spoken, Reserved</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion"  class="mr-2 qleast">A <input type="radio" value="0" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Optimistic, Visionary</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="D" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Centre of attention, Sociable</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Peacemaker, Bring harmony</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="S" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-3">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #3</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Encourage others</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="I" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Strive for perfection</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="C" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Be part of the team</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="S" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Want to establish goals</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="0" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-4">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #4</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Become frustrated</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="C" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Keep my feelings inside</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="S" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Tell my side of the story</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Stand up to opposition</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="D" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-5">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #5</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Lively, Talkative</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="0" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Fast paced, Determined	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="D" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Try to maintan balance	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="S" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Try to follow the rules	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-6">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #6</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Manage time effectively</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="0" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Often rushed, Feel pressured	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="D" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Social things are important	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Like to finish what I start</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="S" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-7">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #7</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Resist sudden change</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="0" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Tend to over promise	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="I" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Withdraw under pressure	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="C" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Not afraid to fight</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="D" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-8">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #8</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">A good encourager</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="I" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">A good listener</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="S" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">A good analyser	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio"  value="C" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">A good delegator</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="D" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-9">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #9</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Results are what matter</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="D" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Do it right, Accuracy counts	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="C" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Make it enjoyable	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Let's do it together</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="0" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-10">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #10</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Will do without, Self-controlled</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="C" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Will buy on impulse	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="D" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Will wait, No pressure	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="S" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Will spend on what I want	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="S" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-11">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #11</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Friendly, Easy to be with</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="0" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Unique, Bored by routine	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="I" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Actively change things</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="D" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Want things exact	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-12">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #12</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Non-confrontational, Giving in</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="S" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Overloaded with details	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="0" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Changes at the last minute</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="0" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Demanding, Abrupt	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="D" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-13">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #13</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Want advancement</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="D" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Satisfied with things, Content	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="0" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Openly display feelings	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio"  value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio"  value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Humble, Modest	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio"  value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-14">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #14</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Cool, Reserved</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="C" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Happy, Carefree	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="I" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Pleasing, Kind	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="0" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Bold, Daring	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="D" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-15">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #15</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Spend quality time with others</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="S" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Plan for the future, Be prepared	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="0" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Travel to new adventures	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Receive rewards for goals met	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="D" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-16">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #16</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Rules need to be challenged</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="D" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Rules make it fair	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio"  value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="0" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Rules make it boring	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Rules make it safe	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="S" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-17">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #17</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Education, Culture</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="C" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Achievements, Awards	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="D" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Safety, Security	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="S" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Social, Group Gatherings		</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="0" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-18">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #18</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Take charge, Direct approach</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="D" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Outgoing, Adventurous	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="I" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Predictable, Consistent	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="S" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Cautious, Careful	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="D" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-19">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #19</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Not easily defeated</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="D" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Will do as told, Follows leader	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="0" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Excitable, Cheerful</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Want things orderly, Neat	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-20">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #20</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">I will lead them	</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="0" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">I will follow through	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="S" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">I will persuade them</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">I will get the facts		</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="0" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-21">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #21</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Think of others first	</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="S" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Competitive, Like a challenge	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="D" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Optimistic, Positive</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="I" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Logical thinker, Systematic	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-22">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #22</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Please others, Agreeable</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="D" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Laugh out loud, Animated	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="0" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Courageous, Bold	</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="S" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Quiet, Reserved	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-23">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #23</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Want more authority</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="D" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Want new opportunities	</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="0" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Avoid any conflict		</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="S" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="S" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Want clear directions		</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content mt-5" id="step-24">
        <div class="col-lg-12">
             <div class="col-lg-9 mx-auto">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-lg-6">Question #24</th>
                        <th scope="col" class="col-lg-3">Most</th>
                        <th scope="col" class="col-lg-3">Least</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Reliable, Dependable</th>
                        <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="0" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="S" name="opinion2" ></label></td>
                      
                      </tr>
                      <tr>
                        <th scope="row">Creative, Unique		</th>
                        <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="I" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="I" name="opinion2" ></label></td>
                        
                      </tr>
                      <tr>
                        <th scope="row">Bottom line, Results oriented		</th>
                        <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="D" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="0" name="opinion2" ></label></td>
                       
                      </tr>
                      <tr>
                        <th scope="row">Hold high standards, Accurate	</th>
                        <td><label for="opinion" class="mr-2 qmost">D <input type="radio"  value="C" name="opinion1" ></label></td>
                        <td><label for="opinion" class="mr-2 qleast">D <input type="radio"value="0" name="opinion2" ></label></td> 
                      </tr>
                    </tbody>
                  </table>
              <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-25">
        <div class="col-xs-12">
            <div class="col-md-12">
                <button class="btn btn-success btn-lg pull-right" onclick="showMsg()" id="finish" type="submit">Finish!</button>
            </div>
        </div>
    </div>
</form>

{{-- modal start grom here --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Instructions</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="list_data">
            <ul>
                <li>
                    Choose the setting in which your responses will be made: work, home, social, etc. Keep to that role for all answers.
                </li>
                <li>
                    Each box below contains four phrases. Carefully read each of the four phrases and check the box which MOST describes you.
                </li>
                <li>
                    Also check the box which LEAST describes you.
                </li>
                <li>
                    For each box, choose ONLY ONE MOST and ONLY ONE LEAST response.
                </li>
                <li>
                    You should aim to complete this questionnaire to TEN MINUTES ideally. If you are taking longer, it’s a sign that you are overthinking.
                </li>
                <li>Be spontaneous. Follow your intuition. Don't over-think each answer you give.</li>
                <li>
                    Be honest. Don't waste your time or ours by trying to be clever - the software will tell us if you do this.
                </li>
                <li>
                    On some questions its normal for you to be challenged. Go with your intuition - it's always right!"
                </li>
            
            </ul>
        </div>
       
       
      </div>
    </div>
  </div>
{{-- </div> --}}
<script>
 var most=[];
 var least =[];
 var moid =['sibghat'];

    $(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
            $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-primary').addClass('btn-default');
        $item.addClass('btn-primary');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
        // console.log($target);
    }
});

allNextBtn.click(function(){
  if (!$("input[name='opinion1']").is(':checked') || !$("input[name='opinion2']").is(':checked')) {
   
    swal("Sorry!", "You did not Select all the data!", "warning");
   return false;
}
if ($("input[name='opinion1']").is(':checked') || $("input[name='opinion2']").is(':checked')){
 
  var a = $('input[name="opinion1"]:checked').closest('label').text();
  var b = $('input[name="opinion2"]:checked').closest('label').text();
    console.log(a);
    console.log(b);
    var x = $(".qmost input[name='opinion1']:checked").val();
    var y = $(".qleast input[name='opinion2']:checked").val();
    console.log(x+ " "+ y);
    if(a === b){
      swal("Sorry!", "You Cannot Select The Same", "warning");
      return false;
    }
   
}
    most.push(x);
    least.push(y);
    // console.log([x]);
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='radio'],input[type='url']"),
        isValid = true;

    $(".table").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
        if (!curInputs[i].validity.valid){
          // console.log(!curInputs[i].validity.valid);
            isValid = false;
            $(curInputs[i]).closest(".table").addClass("has-error");
        }
    }
   
    if (isValid){
     x= $(".qmost input:radio").attr("checked", false);
     y= $(".qleast input:radio").attr("checked", false);
     console.log("removed");
    nextStepWizard.removeAttr('disabled').trigger('click');
   
    }
    console.log( most);
    console.log( least);
      

       
  
});
$('div.setup-panel div a.btn-primary').trigger('click');

     

});
</script>
<script>
  function showMsg(){
    swal("Congratulation!", "You Data Has Been Save Successfuly!", "success");
    $('#finish').css('display','none');
    // storing data to the database
    $.ajax( {
            url        : '{{url("assesment")}}',
            method     : 'post',
            data       :  {'least_array':least , 'most_array':most} 
        } );
  }
</script>

@endsection