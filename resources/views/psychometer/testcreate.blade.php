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
        <p class="text-center">Please read the test sentences and choose the best answer that fits you during the last 2
            weeks</p>
    </div>
    {{-- <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong style="font-size:30px">Instructions!</strong><p class="text-dark"> Choose one MOST and one LEAST description of you for each of the 24 statement sets. Answer spontaneously and don’t overthink your response.The assessment 
        will take around 15 minutes depending upon your behaviour type</p><a href="#" style="color:#47B8C6 !important" data-toggle="modal" data-target="#exampleModalCenter" id="modal" class="cursor-pointer">Click here to read more...</a>
      </div> --}}
    <div class="stepwizard  ">
        <div class="stepwizard-row setup-panel">
            @foreach ($test as $key => $tse)
                <div class="stepwizard-step">
                    <a href="#step-{{ $key + 1 }}" type="button"
                        class="btn btn-primary btn-circle">{{  1 }}</a>
                    <p>Step {{ 1 }}</p>
                </div>
            @endforeach
        </div>
    </div>
    <form role="form">
        @foreach ($test as $key => $tse)
            <div class="row setup-content mt-5" id="step-{{ $key + 1 }}">
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
                                    <td><label for="opinion" class="mr-2 qmost">A <input type="radio" value="S"
                                                name="opinion1" required="required"></label></td>
                                    <td><label for="opinion" class="mr-2 qleast">A <input type="radio" value="0"
                                                name="opinion2" required="required"></label></td>

                                </tr>
                                <tr>
                                    <th scope="row">Trusting, believing in others</th>
                                    <td><label for="opinion" class="mr-2 qmost">B <input type="radio" value="I"
                                                name="opinion1"></label></td>
                                    <td><label for="opinion" class="mr-2 qleast">B <input type="radio" value="I"
                                                name="opinion2"></label></td>

                                </tr>
                                <tr>
                                    <th scope="row">Adventurous, Risk taker</th>
                                    <td><label for="opinion" class="mr-2 qmost">C <input type="radio" value="0"
                                                name="opinion1"></label></td>
                                    <td><label for="opinion" class="mr-2 qleast">C <input type="radio" value="D"
                                                name="opinion2"></label></td>

                                </tr>
                                <tr>
                                    <th scope="row">Tolerant, Respectful</th>
                                    <td><label for="opinion" class="mr-2 qmost">D <input type="radio" value="C"
                                                name="opinion1"></label></td>
                                    <td><label for="opinion" class="mr-2 qleast">D <input type="radio" value="C"
                                                name="opinion2"></label></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary nextBtn secure btn-lg pull-right mb-4" type="button">Next</button>
                    </div>
                </div>

            </div>
        @endforeach


    </form>


    <script>
        var most = [];
        var least = [];
        var moid = ['sibghat'];

        $(document).ready(function() {

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function(e) {
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

            allNextBtn.click(function() {
                if (!$("input[name='opinion1']").is(':checked') || !$("input[name='opinion2']").is(
                        ':checked')) {

                    swal("Sorry!", "You did not Select all the data!", "warning");
                    return false;
                }
                if ($("input[name='opinion1']").is(':checked') || $("input[name='opinion2']").is(
                        ':checked')) {

                    var a = $('input[name="opinion1"]:checked').closest('label').text();
                    var b = $('input[name="opinion2"]:checked').closest('label').text();
                    console.log(a);
                    console.log(b);
                    var x = $(".qmost input[name='opinion1']:checked").val();
                    var y = $(".qleast input[name='opinion2']:checked").val();
                    console.log(x + " " + y);
                    if (a === b) {
                        swal("Sorry!", "You Cannot Select The Same", "warning");
                        return false;
                    }

                }
                most.push(x);
                least.push(y);
                // console.log([x]);
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
                    .children("a"),
                    curInputs = curStep.find("input[type='radio'],input[type='url']"),
                    isValid = true;

                $(".table").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) {
                    if (!curInputs[i].validity.valid) {
                        // console.log(!curInputs[i].validity.valid);
                        isValid = false;
                        $(curInputs[i]).closest(".table").addClass("has-error");
                    }
                }

                if (isValid) {
                    x = $(".qmost input:radio").attr("checked", false);
                    y = $(".qleast input:radio").attr("checked", false);
                    console.log("removed");
                    nextStepWizard.removeAttr('disabled').trigger('click');

                }
                console.log(most);
                console.log(least);




            });
            $('div.setup-panel div a.btn-primary').trigger('click');



        });
    </script>
    <script>
        function showMsg() {
            swal("Congratulation!", "You Data Has Been Save Successfuly!", "success");
            $('#finish').css('display', 'none');
            // storing data to the database
            $.ajax({
                url: '{{ url('assesment') }}',
                method: 'post',
                data: {
                    'least_array': least,
                    'most_array': most
                }
            });
        }
    </script>

@endsection
