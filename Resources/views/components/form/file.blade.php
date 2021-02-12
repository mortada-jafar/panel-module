<div class="col m{{$col}} s12 ">
        <label>{{$label}}</label>
            <div class = "file-path-wrapper">
                <input type="file"  @if(isset($input_id)) id="{{$input_id}}" @endif  name="{{ $name }}"
                       @if(isset($required)) required @endif
                       @if(isset($start)) data-start="{{$start}}" @endif >
            </div>
</div>
