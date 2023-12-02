<div class="col-lg-4 col-12">
    <label>Compulsary Subject</label><br>
    @if($subject)
    @foreach ($subject as $v)
    @if($v->select_subject_type == 'CompulsorySubject')
    <input type="checkbox" name="subject_id[]" value="{{$v->id}}" checked id="subject{{$v->id}}">
    <label for="subject{{$v->id}}">{{$v->subject_name}} ({{$v->subject_code}})</label> <br>
    @endif
    @endforeach
    @endif
</div>
<div class="col-lg-4 col-12">
    <label>Group Subject</label><br>
    @if($subject)
    @foreach ($subject as $v)
    @if($v->select_subject_type == 'GroupSubject')
    <input type="checkbox" name="subject_id[]" value="{{$v->id}}" id="subject{{$v->id}}">
    <label for="subject{{$v->id}}">{{$v->subject_name}} ({{$v->subject_code}})</label> <br>
    @endif
    @endforeach
    @endif
</div>
<div class="col-lg-4 col-12">
    <label>Group Subject</label><br>
    @if($subject)
    @foreach ($subject as $v)
    @if($v->select_subject_type == 'OptionalSubject')
    <input type="radio" name="subject_id[]" value="{{$v->id}}" id="subject{{$v->id}}">
    <label for="subject{{$v->id}}">{{$v->subject_name}} ({{$v->subject_code}})</label> <br>
    @endif
    @endforeach
    @endif
</div>
