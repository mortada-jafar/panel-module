@if($dkp)
    <input name="dkp" type="number" style="height: 35px !important;
                border: 1px solid #a2a0a0 !important;" start="{{$dkp}}"
           class="input_dkp">

@else
    <form action="" id="dkpform">
    <input name="dkp" type="number"
           class="input_dkp" style=" height: 35px !important;
                border: 1px solid #a2a0a0 !important;">

    </form>
@endif

