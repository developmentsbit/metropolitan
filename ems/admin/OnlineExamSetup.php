 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://mcq.sbit.com.bd/public/css/datepicker.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<div class="row">
        <div class="col-md-12">
           <div class="alert alert-danger" id="msg" style="display: none;">
   
</div>          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box grey-cascade">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa fa-globe"></i>Add Exam Information 
              </div>
              <div style="float:right">
                <a class="btn btn-xs btn-primary" href="https://mcq.sbit.com.bd/exam-view" style="margin-top:10px">View Exam Information</a>
              </div>
            
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
                <div class="row">

              <form class="form-horizontal" method="post" enctype="multipart/form-data" action="https://mcq.sbit.com.bd/exam-add" name="basic_validate" id="basic_validate" novalidate="novalidate">
                  <input type="hidden" name="_token" value="A8NyJ0k69pUoxMpUMPl9gnLke3rnQj5pXF6ggy35">

              
              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Exam Type: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <select name="ex_typeid" class="form-control">
                                          <option value="9">১ম মডেল টেস্ট</option>
                                          <option value="10">২য় মডেল টেস্ট</option>
                                          <option value="11">৩য় মডেল টেস্ট</option>
                                          <option value="12">অর্ধ বার্ষিক পরীক্ষা</option>
                                          <option value="13">বার্ষিক পরীক্ষা</option>
                                          <option value="14">প্রাক-নির্বাচনী পরীক্ষা</option>
                                          <option value="15">Pre-Test Examination</option>
                </select>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Class Name: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <select name="class_id" id="class_id" class="form-control" required onchange="getSubjects()">
                                                                                                <option value="1">CLass One</option>
                                                    <option value="2">Class Two</option>
                                                    <option value="3">Class Three</option>
                                                    <option value="4">Class Four</option>
                                                    <option value="5">Class Five</option>
                                                    <option value="7">Class Six</option>
                                                    <option value="8">Class Seven</option>
                                                    <option value="9">Class Eight</option>
                                                    <option value="10">Class Nine</option>
                                                    <option value="11">Class Ten</option>
                  </select>
                </div>

              </div>
              
              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Subject Name: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <select name="ex_subid" class="form-control subjects">
                                                              <option value="1">English</option>
                                          <option value="5">বাংলা</option>
                                          <option value="7">গণিত</option>
                                          <option value="11">ইসলাম শিক্ষা</option>
                                          <option value="16">বাংলা</option>
                                          <option value="17">English</option>
                                          <option value="18">গণিত</option>
                                          <option value="19">ইসলাম শিক্ষা</option>
                                          <option value="20">বাংলা</option>
                                          <option value="21">English</option>
                                          <option value="22">গণিত</option>
                                          <option value="23">ইসলাম শিক্ষা</option>
                                          <option value="24">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="25">বিজ্ঞান</option>
                                          <option value="26">বাংলা</option>
                                          <option value="27">English</option>
                                          <option value="28">গণিত</option>
                                          <option value="29">ইসলাম শিক্ষা</option>
                                          <option value="30">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="31">বিজ্ঞান</option>
                                          <option value="32">বাংলা</option>
                                          <option value="33">English</option>
                                          <option value="34">গণিত</option>
                                          <option value="35">ইসলাম শিক্ষা</option>
                                          <option value="36">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="37">বিজ্ঞান</option>
                                          <option value="38">বাংলা ১ম</option>
                                          <option value="39">বাংলা ২য়</option>
                                          <option value="40">English 1st</option>
                                          <option value="41">English 2nd</option>
                                          <option value="42">গণিত</option>
                                          <option value="43">ইসলাম শিক্ষা</option>
                                          <option value="44">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="45">বিজ্ঞান</option>
                                          <option value="46">বাংলা ১ম</option>
                                          <option value="47">বাংলা ২য়</option>
                                          <option value="48">English 1st</option>
                                          <option value="49">English 2nd</option>
                                          <option value="50">গণিত</option>
                                          <option value="51">ইসলাম শিক্ষা</option>
                                          <option value="52">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="53">বিজ্ঞান</option>
                                          <option value="54">বাংলা ১ম</option>
                                          <option value="55">বাংলা ২য়</option>
                                          <option value="56">English 1st</option>
                                          <option value="57">English 2nd</option>
                                          <option value="58">গণিত</option>
                                          <option value="59">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="60">বিজ্ঞান</option>
                                          <option value="61">ইসলাম শিক্ষা</option>
                                          <option value="62">বাংলা ১ম</option>
                                          <option value="63">বাংলা ২য়</option>
                                          <option value="64">English 1st</option>
                                          <option value="65">English 2nd</option>
                                          <option value="66">গণিত</option>
                                          <option value="67">ইসলাম শিক্ষা</option>
                                          <option value="68">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="69">ইসলাম শিক্ষা</option>
                                          <option value="70">পদার্থ বিজ্ঞান</option>
                                          <option value="71">রসায়ন</option>
                                          <option value="72">জীব বিজ্ঞান</option>
                                          <option value="73">আইসিটি</option>
                                          <option value="74">ভূগোল ও পরিবেশ</option>
                                          <option value="75">পৌরনীতি ও নাগরিকতা</option>
                                          <option value="76">ইতিহাস</option>
                                          <option value="77">হিসাব বিজ্ঞান</option>
                                          <option value="78">ফিন্যান্স ও ব্যাংকিং</option>
                                          <option value="79">ব্যবসায় উদ্যোগ</option>
                                          <option value="80">বিজ্ঞান</option>
                                          <option value="81">বাংলা ১ম</option>
                                          <option value="82">বাংলা ২য়</option>
                                          <option value="83">English 1st</option>
                                          <option value="84">English 2nd</option>
                                          <option value="85">গণিত</option>
                                          <option value="86">ইসলাম শিক্ষা</option>
                                          <option value="87">আইসিটি</option>
                                          <option value="88">বাংলাদেশ ও বিশ্ব পরিচয়</option>
                                          <option value="89">বিজ্ঞান</option>
                                          <option value="90">পদার্থ বিজ্ঞান</option>
                                          <option value="91">রসায়ন</option>
                                          <option value="92">ভূগোল ও পরিবেশ</option>
                                          <option value="93">ইতিহাস</option>
                                          <option value="94">পৌরনীতি ও নাগরিকতা</option>
                                          <option value="95">হিসাব বিজ্ঞান</option>
                                          <option value="96">ব্যবসায় উদ্যোগ</option>
                                          <option value="97">ফিন্যান্স ও ব্যাংকিং</option>
                                          <option value="98">জীব বিজ্ঞান</option>
                                                          </select>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Exam Code: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <input type="text" class="form-control" name="ex_code" value="" required>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Exam Name: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <input type="text" class="form-control" name="ex_name" value="" required>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Exam Date: <span class="required">* </span>
                </label>

                <div class="col-md-3">
                  <input type="text" class="form-control" name="ex_date" id="ex_date" value="" data-date-format="yyyy-mm-dd" required>
                </div>

                <label class="col-md-2 control-label">
                  Exam Time: <span class="required">* </span>
                </label>

                <div class="col-md-3">
                  <input type="text" class="form-control" name="ex_time" id="ex_time" value="" required>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Exam Duration: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <input type="number" class="form-control" name="ex_duration" value="" required>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Total Mark: <span class="required">* </span>
                </label>

                <div class="col-md-2">
                  <input type="number" class="form-control" name="ex_totalmark" value="" required>
                </div>


                <label class="col-md-2 control-label">
                  Marks Cut(Per Qustion): <!-- <span class="required">* </span> -->
                </label>

                <div class="col-md-2">
                  <input type="number" class="form-control" name="ex_marks_cut" id="ex_marks_cut" value="" required>
                </div>

               <label class="col-md-1 control-label">
                              Pass: <span class="required">* </span>
                            </label>

                            <div class="col-md-1">
                              <input type="number" class="form-control" name="pass_marks" id="pass_marks" value="" required>
                            </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Number Of Qustions: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <input type="number" class="form-control" name="ex_num_ques" value="" required>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Payment Type: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <select name="ex_pay_type" id="ex_pay_type" onchange="toggole_price();" class="form-control">
                    <option value="1">Paid</option>
                    <option value="0">Free</option>
                  </select>
                </div>

              </div>

              <div class="form-group" id="hidden_price">
                  
                <label class="col-md-2 control-label">
                  Payment Price: <span class="required">* </span>
                </label>

                <div class="col-md-8">
                  <input type="number" class="form-control" name="ex_price" value="" required>
                </div>

              </div>

              <div class="form-group">
                  
                <label class="col-md-2 control-label">
                  Available Date: <span class="required">* </span>
                </label>

                <div class="col-md-3">
                  <input type="text" class="form-control" name="ex_avdate" id="ex_avdate" value="" data-date-format="yyyy-mm-dd" required>
                </div>

                <label class="col-md-2 control-label">
                  Available Time: <span class="required">* </span>
                </label>

                <div class="col-md-3">
                  <input type="text" class="form-control" name="ex_avtime" id="ex_avtime" value="" required>
                </div>

              </div>

               <div class="form-group">

                <label class="col-md-2 control-label">
              
                </label>

                <div class="col-md-3">
                  <input type="submit" value="Save" class="btn btn-success">
                </div>                

              </div>
         

                    </div>          




                      </div>



                    </div>





                  </div>



                </div>



              </div>



            </div>



          </form>

                  </div>
                  
                </div>
              </div>
              
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
      </div>
        </div>
      </div>
<script src="https://mcq.sbit.com.bd/public/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        getSubjects();
    });
  
  
  $('#ex_date').datepicker();
  $('#ex_time').timepicker({   
       minuteStep: 1,
       disableFocus: true,
       template: 'dropdown',
       showMeridian:false
  });
  $('#ex_avdate').datepicker();
  $('#ex_avtime').timepicker({   
       minuteStep: 1,
       disableFocus: true,
       template: 'dropdown',
       showMeridian:false
  });
  function toggole_price() {
    var ex_pay_type=$('#ex_pay_type').val();
    if(ex_pay_type=="1"){
      $('#hidden_price').fadeIn();
    }else if(ex_pay_type=="0"){
      $('#hidden_price').fadeOut();
    }
  }
</script>