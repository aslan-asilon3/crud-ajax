<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h1>This is Room Rate Plan</h1>
    <div class="col-lg-5 ">
        <div class="panel panel-horison">
            <div class="panel-heading">
                <div class="panel-title white text-center" style="float:none">
                    <h2 class="white"><strong>Set Allotment</strong></h2>
                </div>
            </div>
            <div class="panel-body shadow" style="display: block;">
             <form action="">

             
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Room Type</label>
                            {{-- <input type="text"  class="form-control" name="room_type" id="room_type" disabled> --}}
                            <select  name="roomtype"  id="roomtype"  class="form-control">
                                @foreach ($rooms as $room)
                                <option class="" value="{{ $room->id }}" >{{ $room->room_name }}</option>
                                @endforeach
                                {{-- @foreach ($allotments as $allotment)
                                    @foreach ($allotment->room_rate_plans as $rrps)
                                        @foreach ($rrps->types as $typ)
                                        <option class="" value="{{ $typ->id }}" >{{ $typ->room_name }}</option>
                                        @endforeach
                                    @endforeach
                                @endforeach --}}
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Rates plan</label>
                            {{-- <input type="text"  class="form-control" name="room_type" id="room_type" disabled> --}}
                            <select  name="ratesplan_name"  id="ratesplan_id"  class="form-control">

                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Available Rate Plan</label>
                            <p style="margin:0px;font-weight:normal;">select available rate plan for this room</p>
                            <select  name="ratesplan_name"  id="ratesplan_id" onchange="" class="form-control">
                                <option hidden> Select Rate Plan</option>
                            </select>
                            {{-- <select  name="ratesplan_name"  id="ratesplan_id" class="form-control"> --}}
                        </div>
                    </div>

                    <div class="col-lg-6" >
                        <input type="hidden" id="room_id" name="room_id">
                        <input type="hidden" id="room_extrabed_rate">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Opened Allotment</label>
                            <input type="text" class="form-control thousandSeperator" id="room_allotment" style="width: 230px;" required>
                            <input type="hidden" class="form-control" id="room_allotment_input" >
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label ">Net Booked
                                <i class="fa fa-fw fa-info-circle net-booked"  title="Amount of allotment data has been booked"></i>
                            </label>
                            <p class="mb mt" placeholder="0">0</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Pending
                                <i class="fa fa-fw fa-info-circle pending" title="Amount of allotment data waiting for payment"></i>
                            </label>
                            <p class="mb mt" placeholder="0">0</p>
                        </div>
                    </div>



                    <div class="col-lg-12">
                        <hr>
                    </div>

                    {{-- <div class="col-lg-6">
                        <label for="field-1" class="control-label">Publish Rate (Rp)</label>
                        <div class="form-group">
                            <input type="text" id="room_publish_rate" class="form-control thousandSeperator"
                                required>
                            <input type="hidden" id="room_publish_rate_input" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="field-1" class="control-label">Room Only Rate (Rp)</label>
                        <div class="form-group">
                            <input type="text" id="room_ro_rate" class="form-control thousandSeperator" required>
                            <input type="hidden" id="room_ro_rate_input" class="form-control">
                        </div>
                    </div> --}}
                </div>
                <div class="row" >
                    {{-- NOTE --}}
                    <div class="col-lg-12">
                        <div class="col-lg-12 rates_card" style="display:none; border-left-style: solid; border-color: blue; margin-bottom: 50px;">
                            <label id="demo"></label>

                            <br>

                            <label for="weekday_rate">Base Rate
                            </label>
                            <div class="input-group col-lg-6" style="background-color:rgb(241, 239, 239);">
                                <span class="input-group-addon">Rp.</span>
                                <span class="room_price thousandSeperator" oninput="ambilRupiah(this);" id="baserate" style="width: 175px;" >0</span>
                                <input type="hidden" name="room_extrabed_rate" id="baserate" value="2" />
                            </div>
                            <br>
                            <label for="bed_price">Extra Bed Rate
                            </label>
                            <div class="input-group col-lg-6" style="background-color:rgb(241, 239, 239);" >
                                <span class="input-group-addon" style="width: 10px;">Rp.</span>
                                <span class="room_price thousandSeperator" id="extrabedrate"  style="width: 175px; padding-top:5px;" >0</span>
                                <input type="hidden" name="room_extrabed_rate" id="bed_price_input" value="2" />
                            </div>

                            <div class="input-group col-lg-12" style="margin-top:20px;padding-right:0px;">
                                <div class="col-lg-6" style="margin-left: -15px;">
                                    <label for="bed_price" style="margin-top:0px;width:200px;padding-right:21px;font-size:11px;">Enable/Disable Promo Rate</label>
                                    <input type="text" id="enable-promo" style="display: none;width:200px;" class="form-control thousandSeperator" id="room_allotment" required>
                                    <div class="input-group col-lg-12" id="enable-promo" style="display: none;">
                                        <span class="input-group-addon">Rp.</span>

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="toggle" style="margin-left:150px;">
                                        <input class="toggle-checkbox show-textbox" type="checkbox">
                                        <div class="toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="rates_card input-group col-lg-12" style="display: none;margin-top:20px;padding-right:0px;" >
                    <div class="col-lg-6" style="margin-left: -10px; margin-right;">
                        <label for="bed_price" style="margin-top:0px;padding-right:20px;">Activate this rate plan</label>
                        <input type="text" id="enable-promo" style="display: none;width:50px;" class="form-control thousandSeperator" id="room_allotment" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="toggle" style="margin-left:150px;">
                            <input class="toggle-checkbox " type="checkbox" >
                            <div class="toggle-switch"></div>
                        </label>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group" style="margin-top:13px;" align="left">
                            <a onClick="submitAllotment();"
                                class="btn btn-horison2 btn-lg"><strong>Save</strong></a>
                        </div>
                    </div>
                </div>

             </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
        $('#ratesplan_id').on('change', function() {
           var ratesplanID = $(this).val();
           if(ratesplanID) {
               $.ajax({
                   url: '/getRateplan/'+ratesplan,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#ratesplan_id').empty();
                        $('#ratesplan_id').append('<option hidden>Choose Rate Plan</option>');
                        $.each(data, function(key, ratesplan_id){
                            $('select[name="ratesplan_name"]').append('<option value="'+ key +'">' + ratesplan_id.rate_name+ '</option>');
                        });
                    }else{
                        $('#ratesplan_id').empty();
                    }
                 }
               });
           }else{
             $('#ratesplan_id').empty();
           }
        });
        });
    </script>
  </body>
</html>
